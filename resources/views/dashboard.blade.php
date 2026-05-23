@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div id="refreshBtn"
        class="fixed bottom-6 right-6 z-50
                transform
                transition-all duration-500 ease-in-out
                translate-y-0 opacity-100">

        <button
            onclick="location.reload()"
            class="w-14 h-14 rounded-full
                bg-gradient-to-r from-emerald-500 to-cyan-500
                text-white shadow-xl
                flex items-center justify-center
                hover:scale-110 active:scale-95
                transition">

            <i class="fas fa-rotate-right text-lg"></i>

        </button>

    </div>

    <x-header 
        title="🌿🌺🌿 𝑰𝒐𝑻-𝑩𝒂𝒔𝒆𝒅 𝑺𝒎𝒂𝒓𝒕 𝑮𝒓𝒆𝒆𝒏𝒉𝒐𝒖𝒔𝒆 𝑴𝒐𝒏𝒊𝒕𝒐𝒓𝒊𝒏𝒈 𝑺𝒚𝒔𝒕𝒆𝒎 🌿🌺🌿 📊"
        desc="𝑅𝑒𝑎𝑙-𝑡𝑖𝑚𝑒 𝑚𝑜𝑛𝑖𝑡𝑜𝑟𝑖𝑛𝑔 𝑠𝑦𝑠𝑡𝑒𝑚 𝑓𝑜𝑟 𝑠𝑜𝑖𝑙 𝑚𝑜𝑖𝑠𝑡𝑢𝑟𝑒, 𝑙𝑖𝑔ℎ𝑡 𝑖𝑛𝑡𝑒𝑛𝑠𝑖𝑡𝑦, 𝑎𝑛𝑑 𝑤𝑎𝑡𝑒𝑟 𝑝𝐻."
    />

@php

$tanah = optional($latest)->kelembaban_tanah ?? 0;
$cahaya = optional($latest)->cahaya ?? 0;
$ph = optional($latest)->ph_air ?? 0;

$statusTanah = 'Normal';
$statusCahaya = 'Normal';
$statusPh = 'Normal';

$tanahColor = 'from-emerald-500 via-teal-500 to-cyan-500';
$cahayaColor = 'from-yellow-400 via-orange-400 to-amber-500';
$phColor = 'from-blue-500 via-cyan-500 to-sky-500';

// STATUS TANAH
if($tanah >= 600){
    $statusTanah = 'Kering';
    $tanahColor = 'from-red-500 via-rose-500 to-pink-500';
}
elseif($tanah >= 300 && $tanah < 500){
    $statusTanah = 'Basah';
    $tanahColor = 'from-blue-500 via-cyan-500 to-sky-500';
}

// STATUS CAHAYA
if($cahaya < 200){
    $statusCahaya = 'Gelap';
    $cahayaColor = 'from-gray-600 via-gray-700 to-black';
}
elseif($cahaya >= 500){
    $statusCahaya = 'Terang';
}

// STATUS PH
if($ph < 7){
    $statusPh = 'Asam';
    $phColor = 'from-red-500 via-pink-500 to-rose-500';
}
elseif($ph > 7.5){
    $statusPh = 'Basa';
    $phColor = 'from-purple-500 via-indigo-500 to-blue-500';
}

@endphp

<!-- CARDS -->
<div class="flex flex-wrap justify-center gap-6 mb-8">

    <!-- CARD TANAH -->
    <div class="w-full sm:w-[320px] bg-gradient-to-br {{ $tanahColor }} text-white rounded-2xl p-5 shadow-lg">

        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-white/80">
                    Kelembaban Tanah
                </p>

                <h2 class="text-3xl font-bold mt-2">
                    {{ $tanah }}
                </h2>
            </div>

            <div class="text-4xl opacity-80">
                <i class="fas fa-seedling"></i>
            </div>
        </div>

        <div class="mt-4 text-sm">
            Status:
            <span class="font-bold">
                {{ $statusTanah }}
            </span>
        </div>

    </div>

    <!-- CARD CAHAYA -->
    <div class="w-full sm:w-[320px] bg-gradient-to-br {{ $cahayaColor }} text-white rounded-2xl p-5 shadow-lg">

        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-white/80">
                    Intensitas Cahaya
                </p>

                <h2 class="text-3xl font-bold mt-2">
                    {{ $cahaya }} Lux
                </h2>
            </div>

            <div class="text-4xl opacity-80">
                <i class="fas fa-sun"></i>
            </div>
        </div>

        <div class="mt-4 text-sm">
            Status:
            <span class="font-bold">
                {{ $statusCahaya }}
            </span>
        </div>

    </div>

    <!-- CARD PH -->
    <div class="w-full sm:w-[320px] bg-gradient-to-br {{ $phColor }} text-white rounded-2xl p-5 shadow-lg">

        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-white/80">
                    pH Air
                </p>

                <h2 class="text-3xl font-bold mt-2">
                    {{ $ph }}
                </h2>
            </div>

            <div class="text-4xl opacity-80">
                <i class="fas fa-tint"></i>
            </div>
        </div>

        <div class="mt-4 text-sm">
            Status:
            <span class="font-bold">
                {{ $statusPh }}
            </span>
        </div>

    </div>

    

    

</div>



<div class="flex items-center justify-between mb-6">

    <!-- FILTER BOX -->
    <div
        class="flex items-center gap-3
               bg-white border border-gray-200
               px-4 py-3 rounded-2xl
               shadow-sm">

        <!-- ICON -->
        <div
            class="w-10 h-10 rounded-full
                   bg-gradient-to-r from-indigo-500 to-purple-500
                   flex items-center justify-center
                   text-white shadow">

            <i class="fas fa-filter text-sm"></i>

        </div>

        <!-- TEXT + SELECT -->
        <div>

            <p class="text-xs text-gray-500 mb-1">
                Filter Data Monitoring
            </p>

            <form method="GET">

                <select
                    name="filter"
                    onchange="this.form.submit()"
                    class="text-sm font-semibold
                           bg-transparent
                           border-none
                           focus:outline-none
                           text-gray-800 cursor-pointer"
                >
                    <option value="today" {{ request('filter') == 'today' ? 'selected' : '' }}>
                        Hari Ini
                    </option>

                    <option value="week" {{ request('filter') == 'week' ? 'selected' : '' }}>
                        Minggu Ini
                    </option>

                    <option value="month" {{ request('filter') == 'month' ? 'selected' : '' }}>
                        Bulan Ini
                    </option>

                </select>

            </form>

        </div>

    </div>

    <!-- UPDATE INFO -->
    <div
        class="flex items-center gap-3
               bg-white border border-emerald-100
               px-4 py-3 rounded-2xl
               shadow-sm">

        <!-- ICON -->
        <div
            class="w-10 h-10 rounded-full
                   bg-gradient-to-r from-emerald-500 to-cyan-500
                   flex items-center justify-center
                   text-white shadow">

            <i class="fas fa-clock text-sm"></i>

        </div>

        <!-- TEXT -->
        <div>

            <p class="text-xs text-gray-500">
                Data Terakhir Diupdate
            </p>

            <h3 class="text-sm font-bold text-gray-800">
                {{ optional($latest)->created_at?->format('H:i:s') ?? '--:--:--' }}
            </h3>

        </div>

    </div>

</div>


<!-- GRAFIK -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="bg-white p-4 rounded-2xl shadow">
        <h3 class="font-bold mb-3">Kelembaban Tanah</h3>
        <canvas id="chartKelembaban"></canvas>
    </div>

    <div class="bg-white p-4 rounded-2xl shadow">
        <h3 class="font-bold mb-3">Intensitas Cahaya</h3>
        <canvas id="chartCahaya"></canvas>
    </div>

    <div class="bg-white p-4 rounded-2xl shadow">
        <h3 class="font-bold mb-3">pH Air</h3>
        <canvas id="chartPh"></canvas>
    </div>

</div>

<!-- TABLE -->
<div class="bg-white rounded-2xl shadow-md overflow-hidden mt-8">

    <div class="px-6 py-5 border-b border-gray-100
            flex flex-col sm:flex-row
            sm:items-center sm:justify-between
            gap-4">

    <!-- TITLE -->
    <div>

        <h3 class="text-lg font-semibold text-gray-800">
            Sensor Data
        </h3>

        <p class="text-sm text-gray-500 mt-1">
            Monitoring data sensor greenhouse terbaru
        </p>

    </div>

    <!-- ACTION BUTTON -->
    <div class="flex gap-3">

        <button
    onclick="exportCsv()"
    class="inline-flex items-center gap-2
           bg-blue-500 hover:bg-blue-600
           text-white text-sm font-medium
           px-4 py-2 rounded-xl
           shadow transition">

    <i class="fas fa-file-csv"></i>

    Export CSV

</button>

    </div>

</div>

    <div class="overflow-x-auto max-h-[400px] overflow-y-auto">

        <table class="w-full">

            <thead class="bg-gray-50 sticky top-0">

                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                        Sensor
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                        Tanggal
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                        Status
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                        Nilai
                    </th>
                </tr>

            </thead>

            <tbody id="sensorTable" class="divide-y divide-gray-100">
            </tbody>

        </table>

    </div>

</div>

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const labels = @json($chartLabels);
const kelembaban = @json($tanahChart);
const cahaya = @json($cahayaChart);
const phAir = @json($phChart);

// CHART TANAH
new Chart(document.getElementById('chartKelembaban'), {

    type: 'line',

    data: {
        labels: labels,

        datasets: [{
            label: 'Kelembaban Tanah',
            data: kelembaban,
            borderColor: '#10b981',
            backgroundColor: 'rgba(16,185,129,0.2)',
            tension: 0.4,
            fill: true
        }]
    }

});

// CHART CAHAYA
new Chart(document.getElementById('chartCahaya'), {

    type: 'line',

    data: {
        labels: labels,

        datasets: [{
            label: 'Intensitas Cahaya',
            data: cahaya,
            borderColor: '#f59e0b',
            backgroundColor: 'rgba(245,158,11,0.2)',
            tension: 0.4,
            fill: true
        }]
    }

});

// CHART PH
new Chart(document.getElementById('chartPh'), {

    type: 'line',

    data: {
        labels: labels,

        datasets: [{
            label: 'pH Air',
            data: phAir,
            borderColor: '#3b82f6',
            backgroundColor: 'rgba(59,130,246,0.2)',
            tension: 0.4,
            fill: true
        }]
    }

});

// REALTIME TABLE
function renderTable(data){

    let html = '';

    data.forEach(item => {

        let color =
            item.status === 'normal'
            ? 'bg-emerald-100 text-emerald-700'
            : ['gelap','kering','asam'].includes(item.status)
            ? 'bg-red-100 text-red-700'
            : 'bg-yellow-100 text-yellow-700';

        html += `
            <tr>

                <td class="px-6 py-4 text-sm font-medium text-gray-700">
                    Sensor ${item.sensor}
                </td>

                <td class="px-6 py-4 text-sm text-gray-600">
                    ${item.waktu}
                </td>

                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-xs font-semibold ${color}">
                        ${item.status}
                    </span>
                </td>

                <td class="px-6 py-4 text-sm font-bold text-gray-800">
                    ${item.nilai} ${item.satuan}
                </td>

            </tr>
        `;
    });

    document.getElementById('sensorTable').innerHTML = html;
}

// FETCH DATA
function fetchSensorData(){

    fetch('/api/sensor')

    .then(response => response.json())

    .then(data => {

        renderTable(data);

    })

    .catch(error => {

        console.log(error);

    });

}

// LOAD AWAL
fetchSensorData();

// AUTO REFRESH
setInterval(fetchSensorData, 5000);




// 
function exportCsv(){

    let maxData = {{ \App\Models\SensorData::count() }};

    let total = prompt(
    "Masukkan jumlah data yang ingin diexport:",
    10
);

    // BATAL
    if(total == null || total == ""){

        return;
    }

    total = parseInt(total);

    // VALIDASI ANGKA
    if(isNaN(total) || total <= 0){

        alert("Jumlah data tidak valid!");

        return;
    }

    // VALIDASI MAKSIMUM
    if(total > maxData){

        alert("Data hanya tersedia " + maxData);

        return;
    }

    // EXPORT
    window.location.href = "/export/csv?limit=" + total;
}

</script>

@endsection