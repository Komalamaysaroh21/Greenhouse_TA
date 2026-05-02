@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<x-header 
  title="Sensor Cahaya ☀️" 
  desc="Data intensitas cahaya terbaru" 
/>

<div id="tableWrapper"
     class="bg-white rounded-2xl shadow-md overflow-hidden mt-8
            opacity-0 scale-105 transition-all duration-700 ease-out">

  <!-- HEADER -->
  <div class="px-6 py-5 border-b border-gray-100">
    <h3 class="text-lg font-semibold text-gray-800">Sensor Log Cahaya</h3>
    <p class="text-sm text-gray-500 mt-1">Riwayat data sensor terbaru</p>
  </div>

  <!-- TABLE -->
  <div class="overflow-x-auto">
    <table class="w-full">

      <thead>
        <tr class="bg-gray-50 border-b border-gray-100">
          <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">ID</th>
          <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Waktu</th>
          <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
          <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Nilai</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-gray-100">
          @forelse ($data as $item)
              <tr class="hover:bg-gray-50 transition opacity-0 -translate-y-4"
                  style="transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1); transition-delay: {{ $loop->index * 70 }}ms;">
                
                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                  #{{ str_pad($item->id, 3, '0', STR_PAD_LEFT) }}
                </td>

                <td class="px-6 py-4 text-sm text-gray-600">
                  {{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i:s') }}
                </td>

                <td class="px-6 py-4">
                  <span class="px-2.5 py-1 text-xs rounded-full font-medium
                    {{ $item->status == 'gelap' ? 'bg-gray-100 text-gray-700' : '' }}
                    {{ $item->status == 'normal' ? 'bg-emerald-100 text-emerald-700' : '' }}
                    {{ $item->status == 'terang' ? 'bg-yellow-100 text-yellow-700' : '' }}">
                    {{ ucfirst($item->status) }}
                  </span>
                </td>

                <td class="px-6 py-4 text-sm font-semibold text-gray-900">
                  {{ $item->cahaya }} lux
                </td>

              </tr>
          @empty
              <tr>
                  <td colspan="4" class="py-10">
                      <x-empty-state 
                          title="Belum ada data cahaya"
                          subtitle="Sensor belum mengirim data"
                      >
                          <x-slot name="icon">
                              <svg class="w-12 h-12 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <circle cx="12" cy="12" r="4"/>
                              </svg>
                          </x-slot>

                          <!-- <a href="#" class="text-blue-500 text-sm mt-2">Refresh</a> -->
                      </x-empty>
                  </td>
              </tr>
          @endforelse
      </tbody>

    </table>
  </div>

  <!-- PAGINATION -->
  <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
    {{ $data->links() }}
  </div>

</div>

@endsection


@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {

    const wrapper = document.getElementById('tableWrapper');

    // container muncul (zoom in halus)
    setTimeout(() => {
        wrapper.classList.remove('opacity-0', 'scale-105');
    }, 100);

    // row turun dari atas (wave effect)
    document.querySelectorAll('tbody tr').forEach(row => {
        row.classList.remove('opacity-0', '-translate-y-4');
    });

});
</script>
@endsection