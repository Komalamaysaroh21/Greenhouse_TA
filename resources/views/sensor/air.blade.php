@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<x-header 
  title="Sensor pH Air 💧" 
  desc="Monitoring kualitas air" 
/>

<div id="tableWrapper" 
     class="bg-white rounded-2xl shadow-md overflow-hidden mt-8
            opacity-0 scale-95 transition-all duration-700 ease-out">

  <div class="px-6 py-5 border-b border-gray-100">
    <h3 class="text-lg font-semibold text-gray-800">Sensor Log pH Air</h3>
    <p class="text-sm text-gray-500 mt-1">Riwayat data sensor terbaru</p>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full">

      <thead>
        <tr class="bg-gray-50 border-b border-gray-100">
          <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">ID</th>
          <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Waktu</th>
          <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
          <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Nilai (pH)</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-gray-100">
          @forelse ($data as $item)
              <tr class="hover:bg-gray-50 transition opacity-0"
                  style="transition: opacity 0.4s ease; transition-delay: {{ $loop->index * 60 }}ms;">

                  <td class="px-6 py-4 text-sm font-medium text-gray-900">
                      #{{ str_pad($item->id, 3, '0', STR_PAD_LEFT) }}
                  </td>

                  <td class="px-6 py-4 text-sm text-gray-600">
                      {{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i:s') }}
                  </td>

                  <td class="px-6 py-4">
                      <span class="px-2.5 py-1 text-xs rounded-full font-medium
                          {{ $item->status == 'asam' ? 'bg-red-100 text-red-700' : '' }}
                          {{ $item->status == 'normal' ? 'bg-emerald-100 text-emerald-700' : '' }}
                          {{ $item->status == 'basa' ? 'bg-blue-100 text-blue-700' : '' }}">
                          {{ ucfirst($item->status) }}
                      </span>
                  </td>

                  <td class="px-6 py-4 text-sm font-semibold text-gray-900">
                      {{ $item->ph_air }}
                  </td>

              </tr>
          @empty
              <tr>
                  <td colspan="4" class="py-10">
                      <x-empty-state 
                          title="Belum ada data pH"
                          subtitle="Menunggu data dari sensor air"
                      >
                          <x-slot name="icon">
                              <svg class="w-12 h-12 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path d="M12 3C12 3 6 10 6 14a6 6 0 0012 0c0-4-6-11-6-11z"/>
                              </svg>
                          </x-slot>
                      </x-empty>
                  </td>
              </tr>
          @endforelse
      </tbody>

    </table>
  </div>

  <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
    {{ $data->links() }}
  </div>

</div>

@endsection


@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {

    const wrapper = document.getElementById('tableWrapper');

    // animasi container (tanpa translate biar gak bikin scroll)
    setTimeout(() => {
        wrapper.classList.remove('opacity-0', 'scale-95');
    }, 100);

    // animasi row (fade only, no translate)
    document.querySelectorAll('tbody tr').forEach(row => {
        row.classList.remove('opacity-0');
    });

});
</script>
@endsection