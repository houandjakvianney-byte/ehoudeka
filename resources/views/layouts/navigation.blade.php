
<nav

    x-data="{ open: false, profileOpen: false }"
    @keydown.escape.window="open = false; profileOpen = false"
    class="relative z-40 border-b border-[#E5EEE9] bg-[#103A32] text-white"
>
    {{-- Signature visuelle --}}
    <div class="h-[3px] w-full bg-gradient-to-r from-[#164E41] via-[#6BCBB2] to-[#164E41]"></div>

    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex h-[72px] items-center justify-between">

            {{-- LOGO --}}
            <div class="flex items-center">
                <a
                    href="{{ route('dashboard') }}"
                    class="group inline-flex items-center gap-3 rounded-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#6BCBB2]"
                    aria-label="EhouDeka — Tableau de bord"
                >
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl border border-[#6BCBB2]/30 bg-[#6BCBB2]/10 text-[#6BCBB2] transition duration-300 group-hover:border-[#6BCBB2]/60 group-hover:bg-[#6BCBB2]/20 group-active:scale-95">
                        <svg class="h-7 w-7" viewBox="0 0 40 40" fill="none" aria-hidden="true">
                            <path d="M13 34C13 27 27 23 27 16C27 11 23.5 7 19 7"
                                  stroke="currentColor"
                                  stroke-width="3"
                                  stroke-linecap="round"/>
                            <path d="M19 7L14 12M19 7L24 12"
                                  stroke="currentColor"
                                  stroke-width="3"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <circle cx="13" cy="34" r="3" fill="currentColor"/>
                        </svg>
                    </span>

                    <span class="font-heading text-[23px] font-bold tracking-tight">
                        <span class="text-white">Ehou</span><span class="text-[#6BCBB2]">Deka</span>
                    </span>
                </a>
            </div>


            {{-- NAVIGATION DESKTOP --}}
            <div class="hidden items-center sm:flex">
                    
                <a
                    href="{{ route('dashboard') }}"
                    @class([
                        'relative rounded-xl px-4 py-3 text-sm font-semibold transition duration-200',
                        'bg-white/10 text-[#6BCBB2]' => request()->routeIs('dashboard'),
                        'text-white/75 hover:bg-white/5 hover:text-white' => !request()->routeIs('dashboard'),
                    ])
                >
                    {{ __('Dashboard') }}

                    @if(request()->routeIs('dashboard'))
                        <span class="absolute bottom-0 left-4 right-4 h-[2px] rounded-full bg-[#6BCBB2]"></span>
                    @endif
                </a>

            </div>


            {{-- PROFIL ET DÉCONNEXION --}}
            <div class="hidden items-center gap-3 sm:flex">

                <div class="relative">

                    <button
                        type="button"
                        @click="profileOpen = !profileOpen"
                        :aria-expanded="profileOpen.toString()"
                        aria-haspopup="true"
                        class="group inline-flex items-center gap-3 rounded-xl border border-white/10 bg-white/5 px-3 py-2 transition hover:border-[#6BCBB2]/40 hover:bg-white/10 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#6BCBB2]"
                    >
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#6BCBB2]/15 font-heading text-sm font-bold text-[#6BCBB2]">
                            {{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                        </span>

                        <span class="max-w-[150px] text-left">
                            <span class="block truncate text-sm font-semibold text-white">
                                {{ Auth::user()->name }}
                            </span>
                            <span class="block text-xs text-white/50">
                                Mon compte
                            </span>
                        </span>

                        <svg
                            class="h-4 w-4 text-white/50 transition-transform duration-200"
                            :class="{ 'rotate-180': profileOpen }"
                            viewBox="0 0 24 24"
                            fill="none"
                            aria-hidden="true"
                        >
                            <path d="m6 9 6 6 6-6"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </button>


                    {{-- MENU PROFIL --}}
                    <div
                        x-show="profileOpen"
                        x-cloak
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                        @click.outside="profileOpen = false"
                        class="absolute right-0 top-full mt-3 w-64 overflow-hidden rounded-2xl border border-white/10 bg-[#103A32] shadow-2xl shadow-black/25"
                    >
                        <div class="border-b border-white/10 px-5 py-4">
                            <p class="truncate text-sm font-semibold text-white">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="mt-1 truncate text-xs text-white/50">
                                {{ Auth::user()->email }}
                            </p>
                        </div>

                        <div class="p-2">
                            <a
                                href="{{ route('profile.edit') }}"
                                class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm text-white/75 transition hover:bg-white/5 hover:text-[#6BCBB2]"
                            >
                                <svg class="h-5 w-5 text-white/50" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.7"/>
                                    <path d="M4 21a8 8 0 0 1 16 0" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                                </svg>
                                Mon profil
                            </a>

                            <div class="my-2 border-t border-white/10"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button
                                    type="submit"
                                    class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-left text-sm text-red-300 transition hover:bg-red-500/10 hover:text-red-200"
                                >
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M10 17l5-5-5-5m5 5H3m9-9h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"
                                              stroke="currentColor"
                                              stroke-width="1.7"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>


            {{-- BOUTON MOBILE --}}
            <button
                type="button"
                @click="open = !open"
                :aria-expanded="open.toString()"
                aria-controls="responsive-navigation"
                :aria-label="open ? 'Fermer le menu' : 'Ouvrir le menu'"
                class="flex h-11 w-11 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-white transition hover:border-[#6BCBB2]/40 hover:bg-[#6BCBB2]/10 active:scale-95 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#6BCBB2] sm:hidden"
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


    {{-- NAVIGATION MOBILE --}}
    <div
        id="responsive-navigation"
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="border-t border-white/10 bg-[#103A32] sm:hidden"
    >
        <div class="space-y-2 px-4 py-5">

            {{-- Tableau de bord --}}
            <a
                href="{{ route('dashboard') }}"
                @click="open = false"
                @class([
                    'flex items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold transition',
                    'bg-[#6BCBB2]/10 text-[#6BCBB2]' => request()->routeIs('dashboard'),
                    'text-white/75 hover:bg-white/5 hover:text-white' => !request()->routeIs('dashboard'),
                ])
            >
                {{ __('Dashboard') }}

                @if(request()->routeIs('dashboard'))
                    <span class="h-2 w-2 rounded-full bg-[#6BCBB2]"></span>
                @endif
            </a>

            {{-- Informations utilisateur --}}
            <div class="my-4 border-t border-white/10"></div>

            <div class="flex items-center gap-3 rounded-xl border border-white/5 bg-white/5 p-4">
                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#6BCBB2]/15 font-heading text-lg font-bold text-[#6BCBB2]">
                    {{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                </span>

                <div class="min-w-0">
                    <p class="truncate text-sm font-semibold text-white">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="truncate text-xs text-white/50">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>

            {{-- Profil --}}
            <a
                href="{{ route('profile.edit') }}"
                @click="open = false"
                class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-white/75 transition hover:bg-white/5 hover:text-[#6BCBB2]"
            >
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.7"/>
                    <path d="M4 21a8 8 0 0 1 16 0" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                </svg>
                Mon profil
            </a>

            {{-- Déconnexion --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-left text-sm font-semibold text-red-300 transition hover:bg-red-500/10 hover:text-red-200"
                >
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M10 17l5-5-5-5m5 5H3m9-9h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"
                              stroke="currentColor"
                              stroke-width="1.7"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    Déconnexion
                </button>
            </form>

        </div>
    </div>

</nav>
