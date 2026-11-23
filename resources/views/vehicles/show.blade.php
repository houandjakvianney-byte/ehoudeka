
@extends('layouts.app')

@section('title', 'Mon véhicule')

@section('content')
<div class="min-h-full bg-[#F5F2EA]">

    {{-- HERO --}}
    <section class="relative isolate overflow-hidden bg-[#242C28] text-white">

        <div class="pointer-events-none absolute -right-24 -top-32 h-96 w-96 rounded-full bg-[#A9BCAF]/15 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-40 left-1/3 h-80 w-80 rounded-full bg-[#D8C6A0]/10 blur-3xl"></div>

        <div
            class="pointer-events-none absolute inset-0 opacity-[0.06]"
            style="background-image: linear-gradient(rgba(255,255,255,.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.3) 1px, transparent 1px); background-size: 48px 48px;"
        ></div>

        <div class="relative mx-auto flex w-full max-w-7xl flex-col justify-between gap-8 px-4 py-12 sm:px-6 sm:py-14 lg:flex-row lg:items-center lg:px-8">

            <div class="max-w-2xl">

                <span class="inline-flex items-center gap-2 rounded-full border border-[#A9BCAF]/25 bg-[#A9BCAF]/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.18em] text-[#A9BCAF]">
                    <span class="h-2 w-2 rounded-full bg-[#D8C6A0]"></span>
                    Espace conducteur
                </span>

                <h1 class="mt-5 font-heading text-3xl font-bold leading-tight tracking-tight sm:text-4xl lg:text-5xl">
                    Mon véhicule<span class="text-[#D8C6A0]">.</span>
                </h1>

                <p class="mt-4 max-w-xl text-sm leading-7 text-white/65 sm:text-base">
                    Retrouvez les informations de votre véhicule et préparez vos prochains trajets avec EhouDeka.
                </p>

            </div>

            {{-- ILLUSTRATION --}}
            <div class="relative hidden w-64 shrink-0 lg:block">

                <svg class="w-full text-[#A9BCAF]" viewBox="0 0 300 160" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Illustration d'une voiture">

                    <path d="M18 130H282" stroke="currentColor" stroke-opacity=".3" stroke-width="2" stroke-dasharray="6 7"/>

                    <path d="M43 106L55 76C58 69 63 65 71 63L106 54L134 25C139 20 145 17 152 17H204C213 17 221 22 226 30L246 58L268 69C276 72 281 81 281 90V117H43V106Z"
                          fill="currentColor"
                          fill-opacity=".12"
                          stroke="currentColor"
                          stroke-width="2.5"/>

                    <path d="M116 52L139 29C143 25 148 23 153 23H201C208 23 214 27 218 33L235 58H109L116 52Z"
                          fill="currentColor"
                          fill-opacity=".2"
                          stroke="currentColor"
                          stroke-width="1.5"/>

                    <path d="M176 24V58" stroke="currentColor" stroke-opacity=".5" stroke-width="1.5"/>

                    <path d="M43 95H59M265 95H281" stroke="#D8C6A0" stroke-width="4" stroke-linecap="round"/>

                    <circle cx="91" cy="117" r="19" fill="#242C28" stroke="currentColor" stroke-width="3"/>
                    <circle cx="91" cy="117" r="7" fill="currentColor"/>

                    <circle cx="235" cy="117" r="19" fill="#242C28" stroke="currentColor" stroke-width="3"/>
                    <circle cx="235" cy="117" r="7" fill="currentColor"/>

                </svg>

            </div>

        </div>
    </section>


    {{-- CONTENU --}}
    <section class="mx-auto w-full max-w-7xl px-4 py-10 sm:px-6 sm:py-14 lg:px-8">

        @if (! $vehicle)

            {{-- AUCUN VÉHICULE --}}
            <div class="relative mx-auto max-w-3xl overflow-hidden rounded-3xl border border-[#A9BCAF]/35 bg-white shadow-sm">

                <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-[#A9BCAF] via-[#D8C6A0] to-[#F5F2EA]"></div>

                <div class="px-6 py-12 text-center sm:px-12 sm:py-16">

                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl border border-[#A9BCAF]/30 bg-[#F5F2EA] text-[#242C28]">

                        <svg class="h-10 w-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 17h14l1-5-2-5H6l-2 5 1 5zm0 0v2m14-2v2M7 12h.01M17 12h.01M7 17a2 2 0 104 0m2 0a2 2 0 104 0"/>
                        </svg>

                    </div>

                    <span class="mt-6 inline-block text-xs font-bold uppercase tracking-[0.2em] text-[#858C85]">
                        Configuration nécessaire
                    </span>

                    <h2 class="mt-3 font-heading text-2xl font-bold text-[#242C28] sm:text-3xl">
                        Aucun véhicule enregistré
                    </h2>

                    <p class="mx-auto mt-3 max-w-md text-sm leading-7 text-[#858C85]">
                        Vous n'avez pas encore enregistré de véhicule. Ajoutez-en un pour pouvoir proposer vos trajets sur EhouDeka.
                    </p>

                    <div class="mx-auto mt-8 max-w-md rounded-2xl border border-[#D8C6A0]/50 bg-[#D8C6A0]/15 p-4 text-left">

                        <div class="flex items-start gap-3">

                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#858C85]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.3 3.86L1.82 18a2 2 0 001.7 3h16.96a2 2 0 001.7-3L13.7 3.86a2 2 0 00-3.4 0z"/>
                            </svg>

                            <p class="text-xs leading-6 text-[#242C28]">
                                <strong>À savoir :</strong> l'enregistrement d'un véhicule est obligatoire avant de pouvoir proposer un trajet.
                            </p>

                        </div>
                    </div>

                    <a
                        href="{{ route('vehicle.create') }}"
                        class="mt-8 inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-[#242C28] px-7 py-3.5 font-heading text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-[#35443C] focus:outline-none focus:ring-4 focus:ring-[#A9BCAF]/50 sm:w-auto"
                    >
                        Enregistrer mon véhicule

                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
                        </svg>
                    </a>

                </div>
            </div>

        @else

            {{-- VÉHICULE ENREGISTRÉ --}}
            <div class="grid items-start gap-7 lg:grid-cols-[1.15fr_0.85fr] lg:gap-10">

                {{-- PHOTO --}}
                <div class="overflow-hidden rounded-3xl border border-[#A9BCAF]/35 bg-white shadow-sm">

                    <div class="relative overflow-hidden bg-[#F5F2EA]">

                        <img
                            src="{{ $vehicle->photo_url }}"
                            alt="Photo de mon véhicule"
                            class="h-64 w-full object-cover transition duration-700 hover:scale-[1.03] sm:h-80 lg:h-[420px]"
                        >

                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-[#242C28]/80 via-[#242C28]/25 to-transparent px-6 pb-6 pt-20">

                            <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-[#242C28]/50 px-3 py-1.5 text-xs font-semibold text-white backdrop-blur-md">
                                <span class="h-2 w-2 rounded-full bg-[#A9BCAF]"></span>
                                Véhicule enregistré
                            </span>

                        </div>
                    </div>

                    <div class="p-5 sm:p-6">

                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#858C85]">
                            Identification du véhicule
                        </p>

                        <div class="mt-3 flex flex-wrap items-center justify-between gap-3">

                            <div>
                                <p class="font-heading text-2xl font-bold tracking-wide text-[#242C28] sm:text-3xl">
                                    {{ $vehicle->plaque }}
                                </p>

                                <p class="mt-1 text-xs text-[#858C85]">
                                    Numéro de plaque
                                </p>
                            </div>

                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#A9BCAF]/20 text-[#242C28]">

                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 17h16M6 7V5a1 1 0 011-1h10a1 1 0 011 1v2M6 17v2a1 1 0 001 1h10a1 1 0 001-1v-2M4 7h16v10H4z"/>
                                </svg>

                            </div>
                                <a href="{{ route('vehicle.edit') }}"class="mt-5 inline-flex min-h-11 w-full items-center justify-center gap-2 rounded-xl border border-[#A9BCAF]/50 bg-white px-5 py-3 text-sm font-bold text-[#242C28] transition hover:border-[#242C28] hover:bg-[#F5F2EA]">

                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                stroke-width="1.8" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16 4 4 4M4 20l4-.8L19.4 7.8a2 2 0 0 0-2.8-2.8L5 16.6 4 20Z"/>
                                            </svg>

                                                        Modifier mon véhicule
                                                    </a>
                        </div>
                    </div>
                </div>


                {{-- DÉTAILS --}}
                <div class="space-y-6">

                    <div>

                        <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#858C85]">
                            Fiche du véhicule
                        </span>

                        <h2 class="mt-2 font-heading text-2xl font-bold text-[#242C28] sm:text-3xl">
                            Vos informations
                        </h2>

                        <p class="mt-2 text-sm leading-6 text-[#858C85]">
                            Voici les informations associées à votre véhicule.
                        </p>

                    </div>


                    {{-- PLAQUE --}}
                    <div class="rounded-2xl border border-[#A9BCAF]/30 bg-white p-5 shadow-sm">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#A9BCAF]/20 text-[#242C28]">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 17h16M6 7V5a1 1 0 011-1h10a1 1 0 011 1v2M6 17v2a1 1 0 001 1h10a1 1 0 001-1v-2M4 7h16v10H4z"/>
                                </svg>

                            </div>

                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-[#858C85]">
                                    Numéro de plaque
                                </p>

                                <p class="mt-1 font-heading text-lg font-bold text-[#242C28]">
                                    {{ $vehicle->plaque }}
                                </p>
                            </div>

                        </div>
                    </div>


                    {{-- DESCRIPTION --}}
                    <div class="rounded-2xl border border-[#A9BCAF]/30 bg-white p-5 shadow-sm">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#A9BCAF]/20 text-[#242C28]">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                                </svg>

                            </div>

                            <p class="text-xs font-semibold uppercase tracking-wider text-[#858C85]">
                                Description
                            </p>

                        </div>

                        <p class="mt-4 whitespace-pre-line break-words text-sm leading-7 text-[#858C85]">
                            {{ $vehicle->description }}
                        </p>

                    </div>


                    {{-- ACTION --}}
                    <div class="rounded-2xl bg-[#242C28] p-5 text-white shadow-sm sm:p-6">

                        <div class="flex items-start gap-3">

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#A9BCAF]/15 text-[#A9BCAF]">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 17h14l1-5-2-5H6l-2 5 1 5zm0 0v2m14-2v2M7 12h.01M17 12h.01M7 17a2 2 0 104 0m2 0a2 2 0 104 0"/>
                                </svg>

                            </div>

                            <div>
                                <h3 class="font-heading font-bold">
                                    Prêt à prendre la route ?
                                </h3>

                                <p class="mt-1 text-xs leading-6 text-white/55">
                                    Votre véhicule est enregistré. Vous pouvez maintenant proposer un trajet.
                                </p>
                            </div>

                        </div>

                        <a
                            href="{{ route('trips.create') }}"
                            class="mt-5 inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-[#D8C6A0] px-6 py-3.5 text-sm font-bold text-[#242C28] transition hover:-translate-y-0.5 hover:bg-[#E5D7BA] focus:outline-none focus:ring-4 focus:ring-[#D8C6A0]/30"
                        >
                            Proposer un trajet

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
                            </svg>

                        </a>

                    </div>

                </div>

            </div>

        @endif

    </section>
</div>
@endsection
