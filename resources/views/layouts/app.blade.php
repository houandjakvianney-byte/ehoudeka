<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">
    <meta name="theme-color" content="#242C28">
    <meta name="description" content="@yield('description', 'EhouDeka : partagez vos trajets et voyagez ensemble à Lomé.')">

    <title>@yield('title', 'Accueil') — EhouDeka</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')

    <style>
        [x-cloak] {
            display: none !important;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            -webkit-tap-highlight-color: transparent;
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body class="flex min-h-full flex-col bg-[#F5F2EA] font-sans text-[#242C28] antialiased">

    <header
        class="relative z-50 border-b border-white/10 bg-[#242C28] text-white shadow-lg shadow-[#242C28]/10"
        x-data="{ open: false }"
        @keydown.escape.window="open = false"
    >
        
        <div class="h-[3px] w-full bg-gradient-to-r from-[#A9BCAF] via-[#D8C6A0] to-[#A9BCAF]"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="flex h-[72px] items-center justify-between">

                <a
                    href="{{ route('home') }}"
                    class="group inline-flex items-center gap-2.5 rounded-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#A9BCAF] focus-visible:ring-offset-4 focus-visible:ring-offset-[#242C28]"
                    aria-label="EhouDeka — Accueil"
                >
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl border border-[#A9BCAF]/20 bg-[#A9BCAF]/10 transition duration-300 group-hover:border-[#A9BCAF]/50 group-hover:bg-[#A9BCAF]/20 group-active:scale-95">
                        <svg
                            viewBox="0 0 40 40"
                            fill="none"
                            class="h-7 w-7"
                            aria-hidden="true"
                        >
                            <path
                                d="M13 34C13 27 27 23 27 16C27 11 23.5 7 19 7"
                                stroke="#A9BCAF"
                                stroke-width="3"
                                stroke-linecap="round"
                            />
                            <path
                                d="M19 7L14 12M19 7L24 12"
                                stroke="#A9BCAF"
                                stroke-width="3"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <circle cx="13" cy="34" r="3" fill="#FFFFFF"/>
                        </svg>
                    </span>

                    <span class="font-heading text-[23px] font-bold tracking-tight">
                        <span class="text-white">Ehou</span><span class="text-[#A9BCAF]">Deka</span>
                    </span>
                </a>

                <nav
                    class="hidden items-center gap-1 md:flex"
                    aria-label="Navigation principale"
                    
                >
                    <a
                        href="{{ route('home') }}"
                        @class([
                            'relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200',
                            'bg-white/10 text-[#A9BCAF]' => request()->routeIs('home'),
                            'text-white/70 hover:bg-white/5 hover:text-white' => !request()->routeIs('home'),
                        ])
                    >
                        Trajets

                        @if(request()->routeIs('home'))
                            <span class="absolute bottom-0 left-4 right-4 h-[2px] rounded-full bg-[#D8C6A0]"></span>
                        @endif
                    </a>

                    @auth
                        <a
                            href="{{ route('trips.create') }}"
                            @class([
                                'relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200',
                                'bg-white/10 text-[#A9BCAF]' => request()->routeIs('trips.create'),
                                'text-white/70 hover:bg-white/5 hover:text-white' => !request()->routeIs('trips.create'),
                            ])
                        >
                            Proposer un trajet

                            @if(request()->routeIs('trips.create'))
                                <span class="absolute bottom-0 left-4 right-4 h-[2px] rounded-full bg-[#D8C6A0]"></span>
                            @endif
                        </a>

                        <a
                            href="{{ route('trips.mine') }}"
                            @class([
                                'relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200',
                                'bg-white/10 text-[#A9BCAF]' => request()->routeIs('trips.mine'),
                                'text-white/70 hover:bg-white/5 hover:text-white' => !request()->routeIs('trips.mine'),
                            ])
                        >
                            Mes trajets

                            @if(request()->routeIs('trips.mine'))
                                <span class="absolute bottom-0 left-4 right-4 h-[2px] rounded-full bg-[#D8C6A0]"></span>
                            @endif
                        </a>

                        <a
                            href="{{ route('vehicle.show') }}"
                            @class([
                                'relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200',
                                'bg-white/10 text-[#A9BCAF]' => request()->routeIs('vehicle.*'),
                                'text-white/70 hover:bg-white/5 hover:text-white' => !request()->routeIs('vehicle.*'),
                            ])
                        >
                            Mon véhicule

                            @if(request()->routeIs('vehicle.*'))
                                <span class="absolute bottom-0 left-4 right-4 h-[2px] rounded-full bg-[#D8C6A0]"></span>
                            @endif
                        </a>

                        <a
                            href="{{ route('profile.show') }}"
                            @class([
                                'relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200',
                                'bg-white/10 text-[#A9BCAF]' => request()->routeIs('profile.*'),
                                'text-white/70 hover:bg-white/5 hover:text-white' => !request()->routeIs('profile.*'),
                            ])
                        >
                            Mon profil

                            @if(request()->routeIs('profile.*'))
                                <span class="absolute bottom-0 left-4 right-4 h-[2px] rounded-full bg-[#D8C6A0]"></span>
                            @endif
                        </a>

                        {{-- DÉCONNEXION --}}
                        <form method="POST" action="{{ route('logout') }}" class="ml-3">
                            @csrf

                            <button
                                type="submit"
                                class="rounded-xl border border-white/15 px-4 py-2.5 text-sm font-semibold text-white/80 transition duration-200 hover:border-[#A9BCAF]/50 hover:bg-[#A9BCAF]/10 hover:text-[#A9BCAF] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#A9BCAF]"
                            >
                                Déconnexion
                            </button>
                        </form>

                    @else

                        <div class="ml-4 flex items-center gap-4 border-l border-white/15 pl-5">
                            <a
                                href="{{ route('login') }}"
                                class="text-sm font-semibold text-white/70 transition hover:text-white"
                            >
                                Connexion
                            </a>

                            <a
                                href="{{ route('register') }}"
                                class="inline-flex items-center gap-2 rounded-xl bg-[#A9BCAF] px-5 py-2.5 text-sm font-bold text-[#242C28] shadow-lg shadow-black/10 transition duration-200 hover:-translate-y-0.5 hover:bg-[#D8C6A0] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-[#242C28]"
                            >
                                Inscription

                                <svg
                                    class="h-4 w-4 transition-transform duration-200"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    aria-hidden="true"
                                >
                                    <path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>

                    @endauth
                </nav>

                <button
                    type="button"
                    @click="open = !open"
                    :aria-expanded="open.toString()"
                    aria-controls="mobile-navigation"
                    :aria-label="open ? 'Fermer le menu' : 'Ouvrir le menu'"
                    class="flex h-11 w-11 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-white transition hover:border-[#A9BCAF]/40 hover:bg-[#A9BCAF]/10 active:scale-95 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#A9BCAF] md:hidden"
                >
                    <svg
                        x-show="!open"
                        class="h-6 w-6"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        aria-hidden="true"
                    >
                        <path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/>
                    </svg>

                    <svg
                        x-show="open"
                        x-cloak
                        class="h-6 w-6"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        aria-hidden="true"
                    >
                        <path d="m6 6 12 12M18 6 6 18" stroke-linecap="round"/>
                    </svg>
                </button>

            </div>
        </div>

        <div
            id="mobile-navigation"
            x-show="open"
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="border-t border-white/10 bg-[#242C28] md:hidden"
        >
            <nav
                class="mx-auto max-w-7xl space-y-1 px-4 py-4 sm:px-6"
                aria-label="Navigation mobile"
            >

                <a
                    href="{{ route('home') }}"
                    @click="open = false"
                    @class([
                        'flex items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold transition',
                        'bg-[#A9BCAF]/10 text-[#A9BCAF]' => request()->routeIs('home'),
                        'text-white/75 hover:bg-white/5 hover:text-white' => !request()->routeIs('home'),
                    ])
                >
                    Trajets

                    @if(request()->routeIs('home'))
                        <span class="h-2 w-2 rounded-full bg-[#D8C6A0]"></span>
                    @endif
                </a>

                @auth
                    <a
                        href="{{ route('trips.create') }}"
                        @click="open = false"
                        @class([
                            'block rounded-xl px-4 py-3 text-sm font-semibold transition',
                            'bg-[#A9BCAF]/10 text-[#A9BCAF]' => request()->routeIs('trips.create'),
                            'text-white/75 hover:bg-white/5 hover:text-white' => !request()->routeIs('trips.create'),
                        ])
                    >
                        Proposer un trajet
                    </a>

                    <a
                        href="{{ route('trips.mine') }}"
                        @click="open = false"
                        @class([
                            'block rounded-xl px-4 py-3 text-sm font-semibold transition',
                            'bg-[#A9BCAF]/10 text-[#A9BCAF]' => request()->routeIs('trips.mine'),
                            'text-white/75 hover:bg-white/5 hover:text-white' => !request()->routeIs('trips.mine'),
                        ])
                    >
                        Mes trajets
                    </a>

                    <a
                        href="{{ route('vehicle.show') }}"
                        @click="open = false"
                        @class([
                            'block rounded-xl px-4 py-3 text-sm font-semibold transition',
                            'bg-[#A9BCAF]/10 text-[#A9BCAF]' => request()->routeIs('vehicle.*'),
                            'text-white/75 hover:bg-white/5 hover:text-white' => !request()->routeIs('vehicle.*'),
                        ])
                    >
                        Mon véhicule
                    </a>

                    <a
                        href="{{ route('profile.show') }}"
                        @click="open = false"
                        @class([
                            'block rounded-xl px-4 py-3 text-sm font-semibold transition',
                            'bg-[#A9BCAF]/10 text-[#A9BCAF]' => request()->routeIs('profile.*'),
                            'text-white/75 hover:bg-white/5 hover:text-white' => !request()->routeIs('profile.*'),
                        ])
                    >
                        Mon profil
                    </a>

                    <div class="my-3 border-t border-white/10"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="flex w-full items-center rounded-xl px-4 py-3 text-left text-sm font-semibold text-white/80 transition hover:bg-white/5 hover:text-[#D8C6A0]"
                        >
                            Déconnexion
                        </button>
                    </form>

                @else

                    <div class="my-3 border-t border-white/10"></div>

                    <a
                        href="{{ route('login') }}"
                        @click="open = false"
                        class="block rounded-xl px-4 py-3 text-sm font-semibold text-white/75 transition hover:bg-white/5 hover:text-white"
                    >
                        Connexion
                    </a>

                    <a
                        href="{{ route('register') }}"
                        @click="open = false"
                        class="mt-2 flex items-center justify-center rounded-xl bg-[#A9BCAF] px-4 py-3 text-sm font-bold text-[#242C28] transition hover:bg-[#D8C6A0]"
                    >
                        Créer un compte
                    </a>

                @endauth

            </nav>
        </div>
    </header>


   

    <main class="min-w-0 w-full flex-grow">

        <div class="mx-auto w-full max-w-7xl px-4 pt-5 sm:px-6 lg:px-8">
            <x-flash />
        </div>

        @yield('content')

    </main>


    <footer class="relative mt-auto overflow-hidden bg-[#242C28] text-white/60">

        <div class="h-px w-full bg-gradient-to-r from-transparent via-[#D8C6A0]/70 to-transparent"></div>

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            <div class="flex flex-col items-center justify-between gap-5 sm:flex-row">

                <a
                    href="{{ route('home') }}"
                    class="font-heading text-xl font-bold tracking-tight transition-opacity hover:opacity-80"
                >
                    <span class="text-white">Ehou</span><span class="text-[#A9BCAF]">Deka</span>
                    <p class="text-center text-white"> Build by HandyDev </p>
                </a>
                                
                <p class="text-center text-xs leading-relaxed sm:text-right sm:text-sm">
                    &copy; {{ date('Y') }} EhouDeka. 
                    <span class="mx-1 text-[#D8C6A0]">·</span>
                    Lomé, Togo
                </p>

            </div>

            <div class="mt-6 border-t border-white/10 pt-5 text-center">
                <p class="text-[11px] tracking-wide text-white/40">
                    Pensé pour rapprocher les personnes, un trajet à la fois.
                </p>
            </div>

        </div>
    </footer>

    @stack('scripts')

</body>
</html>
