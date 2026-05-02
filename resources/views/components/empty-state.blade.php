@props([
    'title' => 'Tidak ada data',
    'subtitle' => 'Data akan muncul nanti'
])

<div class="flex flex-col items-center justify-center py-10 text-gray-500">

    <div class="mb-3">
        @isset($icon)
            {{ $icon }}
        @else
            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 7h18M3 12h18M3 17h18" />
            </svg>
        @endisset
    </div>

    <p class="text-sm">{{ $title }}</p>

    <p class="text-xs text-gray-400 mt-1">
        {{ $subtitle }}
    </p>

    <div class="mt-3">
        {{ $slot }}
    </div>

</div>