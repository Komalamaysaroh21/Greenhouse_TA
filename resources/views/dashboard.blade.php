@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

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
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">

    <!-- CARD TANAH -->
    <div class="bg-gradient-to-br {{ $tanahColor }} text-white rounded-2xl p-5 shadow-lg">

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
    <div class="bg-gradient-to-br {{ $cahayaColor }} text-white rounded-2xl p-5 shadow-lg">

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
    <div class="bg-gradient-to-br {{ $phColor }} text-white rounded-2xl p-5 shadow-lg">

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

    <!-- CARD REFRESH -->
    <div class="bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 text-white rounded-2xl p-5 shadow-lg">

        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-white/80">
                    Update Data
                </p>

                <h2 class="text-2xl font-bold mt-2">
                    Refresh
                </h2>
            </div>

            <div class="text-4xl opacity-80">
                <i class="fas fa-rotate-right"></i>
            </div>
        </div>

        <button onclick="location.reload()"
            class="mt-4 px-4 py-2 bg-white text-indigo-600 rounded-xl text-sm font-semibold hover:bg-gray-100 transition">

            Refresh Dashboard

        </button>

    </div>

</div>
<!-- CARD UPDATE TERAKHIR -->
<div class="bg-gradient-to-br from-gray-700 via-gray-800 to-black text-white rounded-2xl p-5 shadow-lg">

    <div class="flex justify-between items-center">

        <div>

            <p class="text-sm text-white/70">
                Update Terakhir
            </p>

            <h2 class="text-xl font-bold mt-2">
                {{ optional($latest)->created_at ? optional($latest)->created_at->format('H:i:s') : '-' }}
            </h2>

            <p class="text-sm mt-2 text-white/80">
                {{ optional($latest)->created_at ? optional($latest)->created_at->format('d M Y') : '-' }}
            </p>

        </div>

        <div class="text-4xl opacity-70">
            <i class="fas fa-clock"></i>
        </div>

    </div>

</div>

<!-- FILTER -->
<form method="GET" class="mb-6">
    <select
        name="filter"
        onchange="this.form.submit()"
        class="px-4 py-2 rounded-xl border border-gray-300 shadow-sm"
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

    <div class="px-6 py-5 border-b border-gray-100">
        <h3 class="text-lg font-semibold text-gray-800">
            Sensor Data
        </h3>
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

</script>

@endsection