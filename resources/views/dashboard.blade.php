@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<x-header 
  title="Dashboard Sensor 📊" 
  desc="Monitoring semua sensor secara realtime" 
/>

<!-- CARDS -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <div class="group relative bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 text-white rounded-2xl p-5 overflow-hidden shadow hover:shadow-lg transition hover:-translate-y-1">
  
          <!-- LEFT INDICATOR -->
          <div class="absolute left-0 top-0 h-full w-1.5 bg-white/40"></div>

          <!-- ICON -->
          <div class="absolute top-2 right-2 z-10 w-10 h-10 flex items-center justify-center rounded-xl bg-white/20">
            <i class="fas fa-dollar-sign"></i>
          </div>

          <p class="relative z-10 text-white/80 text-sm pr-12">Lorem Ipsum </p>
          <p class="relative z-10 text-2xl font-bold mt-1">$45,231.89</p>
          <p class="relative z-10 text-emerald-100 text-sm mt-2 flex items-center gap-1">
            <i class="fas fa-arrow-up text-xs"></i> 12.5%
          </p>

          <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-white/80 to-transparent"></div>
        </div>

        <!-- CARD -->
        <div class="group relative bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 text-white rounded-2xl p-5 overflow-hidden shadow hover:shadow-lg transition hover:-translate-y-1">
          <div class="absolute top-2 right-2 z-10 w-10 h-10 flex items-center justify-center rounded-xl bg-white/20">
            <i class="fas fa-shopping-cart"></i>
          </div>
          <p class="relative z-10 text-white/80 text-sm pr-12">Lorem Ipsum</p>
          <p class="relative z-10 text-2xl font-bold mt-1">1,234</p>
          <p class="relative z-10 text-emerald-100 text-sm mt-2 flex items-center gap-1">
            <i class="fas fa-arrow-up text-xs"></i> 8.2%
          </p>
          <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-white/80 to-transparent"></div>
        </div>

        <!-- CARD -->
        <div class="group relative bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 text-white rounded-2xl p-5 overflow-hidden shadow hover:shadow-lg transition hover:-translate-y-1">
          <div class="absolute top-2 right-2 z-10 w-10 h-10 flex items-center justify-center rounded-xl bg-white/20">
            <i class="fas fa-users"></i>
          </div>
          <p class="relative z-10 text-white/80 text-sm pr-12">Lorem Ipsum</p>
          <p class="relative z-10 text-2xl font-bold mt-1">2,345</p>
          <p class="relative z-10 text-emerald-100 text-sm mt-2 flex items-center gap-1">
            <i class="fas fa-arrow-up text-xs"></i> 23.1%
          </p>
          <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-white/80 to-transparent"></div>
        </div>

        <!-- CARD -->
        <div class="group relative bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 text-white rounded-2xl p-5 overflow-hidden shadow hover:shadow-lg transition hover:-translate-y-1">
          <div class="absolute top-2 right-2 z-10 w-10 h-10 flex items-center justify-center rounded-xl bg-white/20">
            <i class="fas fa-chart-line"></i>
          </div>
          <p class="relative z-10 text-white/80 text-sm pr-12">Lorem Ipsum</p>
          <p class="relative z-10 text-2xl font-bold mt-1">3.24%</p>
          <p class="relative z-10 text-red-200 text-sm mt-2 flex items-center gap-1">
            <i class="fas fa-arrow-down text-xs"></i> 2.1%
          </p>
          <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-white/80 to-transparent"></div>
        </div>

      </div>

      {{--  --}}
      <div class="bg-white rounded-2xl shadow-md p-6 mb-8 hover:shadow-lg transition-shadow duration-300">
        <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
          <div>
            <h3 class="text-lg font-semibold text-gray-800">Revenue Overview</h3>
            <p class="text-sm text-gray-500 mt-1">Monthly revenue for the last 6 months</p>
          </div>
          <select class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent cursor-pointer">
            <option>Last 6 months</option>
            <option>Last 12 months</option>
            <option>This year</option>
          </select>
        </div>
        <canvas id="areaChart" height="100"></canvas>
      </div>

      {{--  --}}
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

              <tbody class="divide-y divide-gray-100">
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
  function renderTable(data){
    let html = '';

    data.forEach(item => {
      let waktu = item.waktu.replace('T', ' ').slice(0, 19);

      let color =
        item.status === 'normal' ? 'bg-emerald-100 text-emerald-700' :
        ['gelap','kering','asam'].includes(item.status) ? 'bg-red-100 text-red-700' :
        'bg-yellow-100 text-yellow-700';

      html += `
        <tr>
          <td class="px-6 py-4 font-semibold">${item.sensor}</td>
          <td class="px-6 py-4">${waktu}</td>
          <td class="px-6 py-4">${item.nilai} ${item.satuan ?? ''}</td>
          <td class="px-6 py-4">
            <span class="px-2 py-1 text-xs rounded-full ${color}">
              ${item.status}
            </span>
          </td>
        </tr>
      `;
    });

    document.getElementById('sensorTable').innerHTML = html;
  }

  function fetchData(){
    fetch('/api/sensor')
      .then(res => res.json())
      .then(data => renderTable(data))
      .catch(err => console.error(err));
  }

  fetchData();

  setInterval(fetchData, 5000);
</script>
@endsection