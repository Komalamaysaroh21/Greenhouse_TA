@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<x-header 
  title="🌿🌺🌿 𝑰𝒐𝑻-𝑩𝒂𝒔𝒆𝒅 𝑺𝒎𝒂𝒓𝒕 𝑮𝒓𝒆𝒆𝒏𝒉𝒐𝒖𝒔𝒆 𝑴𝒐𝒏𝒊𝒕𝒐𝒓𝒊𝒏𝒈 𝑺𝒚𝒔𝒕𝒆𝒎 🌿🌺🌿 📊" 
  desc="𝑅𝑒𝑎𝑙-𝑡𝑖𝑚𝑒 𝑚𝑜𝑛𝑖𝑡𝑜𝑟𝑖𝑛𝑔 𝑠𝑦𝑠𝑡𝑒𝑚 𝑓𝑜𝑟 𝑠𝑜𝑖𝑙 𝑚𝑜𝑖𝑠𝑡𝑢𝑟𝑒, 𝑙𝑖𝑔ℎ𝑡 𝑖𝑛𝑡𝑒𝑛𝑠𝑖𝑡𝑦, 𝑎𝑛𝑑 𝑤𝑎𝑡𝑒𝑟 𝑝𝐻 𝑖𝑛 𝑎 𝑠𝑚𝑎𝑟𝑡 𝑔𝑟𝑒𝑒𝑛ℎ𝑜𝑢𝑠𝑒 𝑒𝑛𝑣𝑖𝑟𝑜𝑛𝑚𝑒𝑛𝑡." 
/>

<!-- CARDS -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <div class="group relative bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 text-white rounded-2xl p-5 overflow-hidden shadow hover:shadow-lg transition hover:-translate-y-1">
  
          <!-- LEFT INDICATOR -->
          <div class="absolute left-0 top-0 h-full w-1.5 bg-white/40"></div>

          <!-- ICON -->
          <div class="absolute top-2 right-2 z-10 w-10 h-10 flex items-center justify-center rounded-xl bg-white/20">
            <i class="fas fa-seedling"></i>
          </div>

          <p class="relative z-10 text-white/80 text-sm pr-12">Kelembaban Tanah </p>
          <p class="relative z-10 text-2xl font-bold mt-1">
  {{ $latest->kelembaban_tanah }}
</p>
          <p class="relative z-10 text-emerald-100 text-sm mt-2 flex items-center gap-1">
            <i class="fas fa-arrow-up text-xs"></i> 12.5%
          </p>

          <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-white/80 to-transparent"></div>
        </div>

        <!-- CARD -->
        <div class="group relative bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 text-white rounded-2xl p-5 overflow-hidden shadow hover:shadow-lg transition hover:-translate-y-1">
          <div class="absolute top-2 right-2 z-10 w-10 h-10 flex items-center justify-center rounded-xl bg-white/20">
            <i class="fas fa-sun"></i>
          </div>
          <p class="relative z-10 text-white/80 text-sm pr-12">Intensitas Cahaya</p>
          <p class="relative z-10 text-2xl font-bold mt-1">
    {{ $latest->cahaya ?? 0 }} Lux
</p>
          <p class="relative z-10 text-emerald-100 text-sm mt-2 flex items-center gap-1">
            <i class="fas fa-arrow-up text-xs"></i> 8.2%
          </p>
          <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-white/80 to-transparent"></div>
        </div>

        <!-- CARD -->
        <div class="group relative bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 text-white rounded-2xl p-5 overflow-hidden shadow hover:shadow-lg transition hover:-translate-y-1">
          <div class="absolute top-2 right-2 z-10 w-10 h-10 flex items-center justify-center rounded-xl bg-white/20">
            <i class="fas fa-tint"></i>
          </div>
          <p class="relative z-10 text-white/80 text-sm pr-12">pH Air</p>
          <p class="relative z-10 text-2xl font-bold mt-1">
    {{ $latest->ph_air ?? 0 }}
</p>
          <p class="relative z-10 text-emerald-100 text-sm mt-2 flex items-center gap-1">
            <i class="fas fa-arrow-up text-xs"></i> 23.1%
          </p>
          <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-white/80 to-transparent"></div>
        </div>

      </div>
      {{-- GRAFIK --}}
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

      {{-- table --}}
      <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 mt-8">
        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center flex-wrap gap-4">
          <div>
            <h3 class="text-lg font-semibold text-gray-800">Sensor Data</h3>
            <p class="text-sm text-gray-500 mt-1">Monitoring data dari sensor terbaru</p>
          </div>
        </div>

        <div class="overflow-x-auto max-h-[400px] overflow-y-auto">
          <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-100 sticky top-0 z-10">
              <tr class="bg-gray-50 border-b border-gray-100">
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Sensor</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nilai</th>
              </tr>
            </thead>

              <tbody id="sensorTable" class="divide-y divide-gray-100">
                @forelse ($data as $item)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm text-gray-700 font-medium">
                            Sensor {{ $item['sensor'] }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($item['waktu'])->format('Y-m-d H:i:s') }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-xs rounded-full font-medium
                                {{ $item['status'] == 'normal' ? 'bg-emerald-100 text-emerald-700' : '' }}
                                {{ in_array($item['status'], ['gelap','kering','asam']) ? 'bg-red-100 text-red-700' : '' }}
                                {{ in_array($item['status'], ['terang','basah','basa']) ? 'bg-yellow-100 text-yellow-700' : '' }}">
                                {{ ucfirst($item['status']) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">
                            {{ $item['nilai'] }} {{ $item['satuan'] }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <x-empty-state 
                                title="Belum ada data sensor"
                                subtitle="Data akan muncul setelah sensor mengirimkan informasi"
                            />
                        </td>
                    </tr>
                @endforelse
            </tbody>
          </table>
        </div>
      </div>

@endsection

@section('scripts')

<script>
  
const labels = @json(
    $chartData->pluck('created_at')->map(function($item){
        return \Carbon\Carbon::parse($item)->format('H:i');
    })
);

const kelembaban = @json($chartData->pluck('kelembaban_tanah'));
const cahaya = @json($chartData->pluck('cahaya'));
const phAir = @json($chartData->pluck('ph_air'));

// =====================
// CHART KELEMBABAN
// =====================

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

// =====================
// CHART CAHAYA
// =====================

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

// =====================
// CHART PH
// =====================

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

</script>

@endsection