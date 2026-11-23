
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="theme-color" content="#111111">
    <meta name="description" content="Rejoignez EhouDeka et partagez vos trajets en toute simplicité.">

    <title>{{ config('app.name', 'EhouDeka') }}</title>

    {{-- Assets locaux et styles EhouDeka --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')

    <style>
        [x-cloak] {
            display: none !important;
        }

        html {
            min-height: 100%;
        }

        body {
            -webkit-tap-highlight-color: transparent;
        }

        .guest-grid {
            background-image:
                linear-gradient(rgba(255,255,255,.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.025) 1px, transparent 1px);
            background-size: 48px 48px;
            mask-image: linear-gradient(to bottom, black, transparent 90%);
            -webkit-mask-image: linear-gradient(to bottom, black, transparent 90%);
        }

        .guest-glow {
            background: radial-gradient(
                circle,
                rgba(249,115,22,.17) 0%,
                rgba(249,115,22,.05) 38%,
                transparent 72%
            );
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body class="min-h-screen overflow-x-hidden bg-edeka-black font-sans text-white antialiased">

    <main class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden px-4 py-10 sm:px-6">

        {{-- Décorations d'arrière-plan --}}
        <div class="guest-grid pointer-events-none absolute inset-0"></div>

        <div class="guest-glow pointer-events-none absolute -left-40 -top-40 h-[500px] w-[500px] rounded-full"></div>

        <div class="guest-glow pointer-events-none absolute -bottom-48 -right-40 h-[550px] w-[550px] rounded-full"></div>

        <div class="pointer-events-none absolute left-0 top-0 h-[3px] w-full bg-edeka-orange"></div>

        {{-- Contenu --}}
        <div class="relative z-10 w-full max-w-md">

            {{-- Identité EhouDeka --}}
            <div class="mb-8 text-center">

                <a href="{{ route('home') }}"
                   class="group inline-flex items-center justify-center gap-3 rounded-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-edeka-orange focus-visible:ring-offset-4 focus-visible:ring-offset-edeka-black">

                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl border border-edeka-orange/30 bg-edeka-orange/10 text-edeka-orange transition duration-300 group-hover:scale-105 group-hover:bg-edeka-orange/20">

                        <svg class="h-7 w-7" viewBox="0 0 40 40" fill="none" aria-hidden="true">
                            <path
                                d="M13 34C13 27 27 23 27 16C27 11 23.5 7 19 7"
                                stroke="currentColor"
                                stroke-width="3"
                                stroke-linecap="round"
                            />
                            <path
                                d="M19 7L14 12M19 7L24 12"
                                stroke="currentColor"
                                stroke-width="3"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <circle cx="13" cy="34" r="3" fill="currentColor"/>
                        </svg>

                    </span>

                    <span class="font-heading text-3xl font-bold tracking-tight">
                        <span class="text-white">Ehou</span><span class="text-edeka-orange">Deka</span>
                    </span>

                </a>

                <p class="mt-3 text-sm text-gray-400">
                    La route, ensemble.
                </p>

            </div>

            {{-- Carte du formulaire --}}
            <div class="overflow-hidden rounded-3xl border border-white/10 bg-[#191919]/95 shadow-2xl shadow-black/40 backdrop-blur-xl">

                {{-- Signature supérieure --}}
                <div class="h-1 w-full bg-gradient-to-r from-transparent via-edeka-orange to-transparent"></div>

                <div class="px-6 py-8 sm:px-9 sm:py-10">

                    {{ $slot }}

                </div>

            </div>

            {{-- Retour à l'accueil --}}
            <div class="mt-7 text-center">

                <a href="{{ route('home') }}"
                   class="inline-flex items-center gap-2 text-sm text-gray-400 transition hover:text-edeka-orange">

                    <svg class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-1"
                         viewBox="0 0 24 24"
                         fill="none"
                         aria-hidden="true">
                        <path d="M19 12H5m7 7-7-7 7-7"
                              stroke="currentColor"
                              stroke-width="1.8"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>

                    Retour à l'accueil

                </a>

            </div>

            {{-- Signature --}}
            <p class="mt-8 text-center text-[11px] tracking-wide text-gray-600">
                &copy; {{ date('Y') }} EhouDeka · Lomé, Togo
            </p>

        </div>

    </main>

    @stack('scripts')

</body>
</html>
