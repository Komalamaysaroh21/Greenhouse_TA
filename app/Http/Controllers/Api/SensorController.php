<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cahaya' => 'required|numeric',
            'kelembaban_tanah' => 'required|numeric',
            'ph_air' => 'required|numeric',
        ]);

        $data = SensorData::create([
            'cahaya' => $request->cahaya,
            'kelembaban_tanah' => $request->kelembaban_tanah,
            'ph_air' => $request->ph_air,
        ]);

        return response()->json([
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    // GET - ambil semua data
    public function index()
    {
        $data = SensorData::latest()->get();

        return response()->json($data);
    }
}
