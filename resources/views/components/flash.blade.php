
@foreach ([
    'success' => [
        'title' => 'Opération réussie',
        'color' => 'green',
        'icon' => 'check',
    ],
    'error' => [
        'title' => 'Une erreur est survenue',
        'color' => 'red',
        'icon' => 'error',
    ],
    'warning' => [
        'title' => 'Attention',
        'color' => 'orange',
        'icon' => 'warning',
    ],
    'info' => [
        'title' => 'Information',
        'color' => 'gray',
        'icon' => 'info',
    ],
] as $type => $config)
    @if (session($type))
        <div
            role="alert"
            aria-live="polite"
            class="group relative mb-5 flex items-start gap-3 overflow-hidden rounded-2xl border border-{{ $config['color'] }}-200/70 bg-white p-4 shadow-sm transition-all duration-300 hover:shadow-md sm:p-5"
        >
            <div class="absolute inset-y-0 left-0 w-1 bg-{{ $config['color'] }}-500"></div>

            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-{{ $config['color'] }}-50 text-{{ $config['color'] }}-600">
                @if ($config['icon'] === 'check')
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
                    </svg>
                @elseif ($config['icon'] === 'error')
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <circle cx="12" cy="12" r="9" />
                        <path stroke-linecap="round" d="M12 8v5m0 3h.01" />
                    </svg>
                @elseif ($config['icon'] === 'warning')
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.3 3.9 2.8 17a2 2 0 0 0 1.7 3h15a2 2 0 0 0 1.7-3l-7.5-13.1a2 2 0 0 0-3.4 0Z" />
                    </svg>
                @else
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <circle cx="12" cy="12" r="9" />
                        <path stroke-linecap="round" d="M12 11v5m0-8h.01" />
                    </svg>
                @endif
            </div>

            <div class="min-w-0 flex-1 pt-0.5">
                <p class="text-sm font-semibold text-gray-900">
                    {{ $config['title'] }}
                </p>
                <p class="mt-1 text-sm leading-relaxed text-gray-600">
                    {{ session($type) }}
                </p>
            </div>
        </div>
    @endif
@endforeach
