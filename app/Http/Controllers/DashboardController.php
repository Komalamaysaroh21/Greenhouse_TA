<?php

namespace App\Http\Controllers;

use App\Models\SensorData;

class DashboardController extends Controller
{
    // =========================
    // DASHBOARD

    public function index()
{
    $filter = request('filter', 'today');

    $query = SensorData::query();

    if ($filter == 'today') {
        $query->whereDate('created_at', today());
    }

    elseif ($filter == 'week') {
        $query->whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ]);
    }

    elseif ($filter == 'month') {
        $query->whereMonth('created_at', now()->month);
    }

    $latest = SensorData::latest()->first();

    $sensorData = $query->latest()->take(20)->get();

    $data = $this->formatData($sensorData);

    // chart
    $chartLabels = $sensorData->pluck('created_at')
        ->map(fn($d) => $d->format('H:i'))
        ->reverse()
        ->values();

    $tanahChart = $sensorData->pluck('kelembaban_tanah')
        ->reverse()
        ->values();

    $cahayaChart = $sensorData->pluck('cahaya')
        ->reverse()
        ->values();

    $phChart = $sensorData->pluck('ph_air')
        ->reverse()
        ->values();

    return view('dashboard', compact(
    'latest',
    'data',
    'chartLabels',
    'tanahChart',
    'cahayaChart',
    'phChart',
    'filter'
),
[
    'statusTanah' => $latest ? $this->statusKelembaban($latest->kelembaban_tanah) : '-',
    'statusCahaya' => $latest ? $this->statusCahaya($latest->cahaya) : '-',
    'statusPh' => $latest ? $this->statusPh($latest->ph_air) : '-',
]);
}

    // =========================
    // API SENSOR

    public function apiSensor()
{
    $sensorData = SensorData::orderBy('id', 'desc')
        ->limit(20)
        ->get();

    $data = $this->formatData($sensorData);

    return response()->json($data->values());
}

    // =========================
    // FORMAT DATA

    private function formatData($items)
    {
        return $items->flatMap(function ($item) {

            return [

                [
                    'sensor' => 'Cahaya',
                    'waktu' => $item->created_at,
                    'nilai' => $item->cahaya,
                    'satuan' => 'Lux',
                    'status' => $this->statusCahaya($item->cahaya),
                ],

                [
                    'sensor' => 'Kelembaban Tanah',
                    'waktu' => $item->created_at,
                    'nilai' => $item->kelembaban_tanah,
                    'satuan' => '%',
                    'status' => $this->statusKelembaban($item->kelembaban_tanah),
                ],

                [
                    'sensor' => 'pH Air',
                    'waktu' => $item->created_at,
                    'nilai' => $item->ph_air,
                    'satuan' => 'pH',
                    'status' => $this->statusPh($item->ph_air),
                ]

            ];
        });
    }

    // =========================
    // STATUS CAHAYA
    // Arduino:
    // 0 - 199   = GELAP
    // 200 - 499 = NORMAL
    // >= 500    = TERANG

    private function statusCahaya($value)
    {
        if ($value < 200) {
            return 'gelap';
        }

        if ($value < 500) {
            return 'normal';
        }

        return 'terang';
    }

    // =========================
    // STATUS KELEMBABAN TANAH
    // Arduino:
    // 300 - 499 = BASAH
    // 500 - 599 = NORMAL
    // >= 600    = KERING

    private function statusKelembaban($value)
    {
        if ($value >= 300 && $value < 500) {
            return 'basah';
        }

        if ($value >= 500 && $value < 600) {
            return 'normal';
        }

        return 'kering';
    }

    // =========================
    // STATUS PH AIR
    // Arduino:
    // < 7       = ASAM
    // 7 - 7.5   = NETRAL
    // > 7.5     = BASA

    private function statusPh($value)
    {
        if ($value < 7) {
            return 'asam';
        }

        if ($value <= 7.5) {
            return 'normal';
        }

        return 'basa';
    }

    // =========================
    // AMBIL DATA SENSOR

    private function getSensorData($field, $callback)
    {
        return SensorData::select('id', $field, 'created_at')
            ->latest()
            ->paginate(5)
            ->through(function ($item) use ($field, $callback) {

                $item->status = $this->$callback($item->$field);

                return $item;
            });
    }

    // =========================
    // HALAMAN SENSOR

    public function cahaya()
    {
        $data = $this->getSensorData('cahaya', 'statusCahaya');

        return view('sensor.cahaya', compact('data'));
    }

    public function tanah()
    {
        $data = $this->getSensorData('kelembaban_tanah', 'statusKelembaban');

        return view('sensor.tanah', compact('data'));
    }

    public function air()
    {
        $data = $this->getSensorData('ph_air', 'statusPh');

        return view('sensor.air', compact('data'));
    }

   public function exportCsv()
{
    $limit = request('limit', 10);

    // TOTAL DATA DI DATABASE
    $totalData = SensorData::count();

    // VALIDASI LIMIT
    if($limit > $totalData){

        $limit = $totalData;
    }

    // MINIMAL 1
    if($limit <= 0){

        $limit = 1;
    }

    $fileName = 'greenhouse-monitoring-' . now()->format('Y-m-d_H-i-s') . '.csv';

    $headers = [
        "Content-Type" => "text/csv; charset=UTF-8",
        "Content-Disposition" => "attachment; filename={$fileName}",
    ];

    $callback = function () use ($limit) {

    $file = fopen('php://output', 'w');

    // UTF-8 BOM
    fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

    // =========================
    // HEADER TEMPLATE

    fputcsv($file, [
        'SMART GREENHOUSE MONITORING SYSTEM'
    ], ';');

    fputcsv($file, [], ';');

    fputcsv($file, [
        'Tanggal Export',
        now()->format('d-m-Y H:i:s')
    ], ';');

    fputcsv($file, [
        'Jumlah Data',
        $limit
    ], ';');

    fputcsv($file, [], ';');

    // =========================
    // HEADER TABLE

    fputcsv($file, [
        'No',
        'Tanggal',
        'Cahaya',
        'Kelembaban Tanah',
        'pH Air'
    ], ';');

    // =========================
    // DATA

    $data = SensorData::latest()
        ->take($limit)
        ->get();

    $no = 1;

    foreach ($data as $row) {

        fputcsv($file, [

            $no++,

            $row->created_at->format('d-m-Y H:i:s'),

            $row->cahaya . ' Lux',

            $row->kelembaban_tanah . ' %',

            $row->ph_air

        ], ';');
    }

    fclose($file);
};

    return response()->stream($callback, 200, $headers);
}
}