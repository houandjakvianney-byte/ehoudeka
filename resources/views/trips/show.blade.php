
@extends('layouts.app')

@section('title', 'Détails du trajet')

@section('content')

<div class="min-h-screen bg-[#F5F2EA]">

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        {{-- RETOUR --}}
        <a href="{{ url()->previous() }}"
           class="mb-8 inline-flex items-center gap-2 text-sm font-semibold text-[#858C85] transition hover:text-[#242C28]">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2">
                <path d="M19 12H5m7 7-7-7 7-7"
                      stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Retour aux trajets
        </a>

        {{-- EN-TÊTE --}}
        <div class="mb-8">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#858C85]">
                EhouDeka · Détails du trajet
            </span>

            <h1 class="mt-3 font-heading text-3xl font-bold text-[#242C28] sm:text-4xl">
                Votre prochain voyage,
                <span class="text-[#858C85]">en toute simplicité.</span>
            </h1>

            <p class="mt-3 max-w-2xl text-sm leading-7 text-[#858C85]">
                Retrouvez toutes les informations concernant cet itinéraire,
                son conducteur et le véhicule utilisé.
            </p>
        </div>

        <div class="grid items-start gap-8 lg:grid-cols-[1.15fr_0.85fr]">

            {{-- COLONNE PRINCIPALE --}}
            <div class="space-y-7">

                {{-- PHOTO DU VÉHICULE --}}
                <section class="overflow-hidden rounded-3xl border border-[#A9BCAF]/40 bg-white shadow-sm">

                    <div class="relative">
                        <img
                            src="{{ $vehicle?->photo_url ?? asset('images/vehicle-default.svg') }}"
                            alt="Photo du véhicule du conducteur"
                            class="h-64 w-full bg-[#F5F2EA] object-cover sm:h-80 lg:h-[420px]"
                        >

                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent p-6 sm:p-8">
                            <span class="inline-flex rounded-full border border-white/20 bg-white/15 px-3 py-1.5 text-xs font-semibold text-white backdrop-blur-md">
                                Véhicule du conducteur
                            </span>

                            <h2 class="mt-3 font-heading text-2xl font-bold text-white sm:text-3xl">
                                {{ $vehicle?->plaque ?? 'Véhicule non renseigné' }}
                            </h2>
                        </div>
                    </div>

                    <div class="p-5 sm:p-7">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#858C85]">
                            À propos du véhicule
                        </p>

                        <p class="mt-3 text-sm leading-7 text-[#242C28]">
                            {{ $vehicle?->description ?? 'Aucune description disponible.' }}
                        </p>
                    </div>
                </section>

                {{-- ITINÉRAIRE --}}
                <section class="rounded-3xl border border-[#A9BCAF]/40 bg-white p-6 shadow-sm sm:p-8">

                    <div class="mb-7">
                        <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#858C85]">
                            Votre itinéraire
                        </span>

                        <h2 class="mt-2 font-heading text-2xl font-bold text-[#242C28]">
                            Départ et destination
                        </h2>
                    </div>

                    <div class="relative space-y-9">

                        <div class="absolute bottom-3 left-[11px] top-3 border-l-2 border-dashed border-[#A9BCAF]"></div>

                        {{-- DÉPART --}}
                        <div class="relative flex gap-4">
                            <span class="z-10 h-6 w-6 shrink-0 rounded-full border-[6px] border-white bg-[#242C28] shadow-[0_0_0_2px_#A9BCAF]"></span>

                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-[#858C85]">
                                    Point de départ
                                </p>

                                <h3 class="mt-1 font-heading text-xl font-bold text-[#242C28]">
                                    {{ $trip->ville_depart }}
                                </h3>

                                <p class="mt-1 text-sm text-[#858C85]">
                                    {{ $trip->lieu_depart }}
                                </p>
                            </div>
                        </div>

                        {{-- ARRIVÉE --}}
                        <div class="relative flex gap-4">
                            <span class="z-10 h-6 w-6 shrink-0 rounded-full border-[6px] border-white bg-[#D8C6A0] shadow-[0_0_0_2px_#D8C6A0]"></span>

                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-[#858C85]">
                                    Destination
                                </p>

                                <h3 class="mt-1 font-heading text-xl font-bold text-[#242C28]">
                                    {{ $trip->ville_arrivee }}
                                </h3>

                                <p class="mt-1 text-sm text-[#858C85]">
                                    {{ $trip->lieu_arrivee }}
                                </p>
                            </div>
                        </div>

                    </div>
                </section>

            </div>

            {{-- COLONNE LATÉRALE --}}
            <aside class="space-y-6 lg:sticky lg:top-8">

                {{-- INFORMATIONS DU TRAJET --}}
                <section class="rounded-3xl bg-[#242C28] p-6 text-white shadow-xl sm:p-8">

                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#A9BCAF]">
                        Informations pratiques
                    </span>

                    <div class="mt-7 space-y-6">

                        <div class="flex items-start gap-4">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white/10">
                                <svg class="h-5 w-5" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>

                            <div>
                                <p class="text-xs text-gray-400">Date de départ</p>
                                <p class="mt-1 font-semibold">
                                    {{ $trip->depart_at->translatedFormat('l d F Y') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white/10">
                                <svg class="h-5 w-5" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="1.8">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 7v5l3 2"/>
                                </svg>
                            </div>

                            <div>
                                <p class="text-xs text-gray-400">Heure de départ</p>
                                <p class="mt-1 font-semibold">
                                    {{ $trip->depart_at->format('H:i') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white/10">
                                <svg class="h-5 w-5" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m16 0v-2a4 4 0 00-3-3.87M14 3.13a4 4 0 010 7.75M14 7a4 4 0 01-4 4 4 4 0 110-8 4 4 0 014 4z"/>
                                </svg>
                            </div>

                            <div>
                                <p class="text-xs text-gray-400">Places disponibles</p>
                                <p class="mt-1 font-semibold">
                                    {{ $trip->places_disponibles }}
                                    {{ $trip->places_disponibles > 1 ? 'places' : 'place' }}
                                </p>
                            </div>
                        </div>

                    </div>
                </section>

                {{-- CONDUCTEUR --}}
                <section class="rounded-3xl border border-[#A9BCAF]/40 bg-white p-6 shadow-sm sm:p-7">

                    <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#858C85]">
                        Votre conducteur
                    </span>

                    <div class="mt-5 flex items-center gap-4">

                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-[#242C28] font-heading text-lg font-bold text-white">
                            {{ strtoupper(substr($driver->prenom, 0, 1) . substr($driver->nom, 0, 1)) }}
                        </div>

                        <div class="min-w-0">
                            <h2 class="truncate font-heading text-lg font-bold text-[#242C28]">
                                {{ $driver->full_name }}
                            </h2>

                            <p class="mt-1 text-xs text-[#858C85]">
                                Conducteur EhouDeka
                            </p>
                        </div>
                    </div>

                    <a
                        href="tel:{{ preg_replace('/\s+/', '', $driver->telephone) }}"
                        class="mt-6 inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-[#242C28] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#858C85] focus:outline-none focus:ring-4 focus:ring-[#A9BCAF]/40"
                    >
                        Contacter le conducteur

                        <svg class="h-4 w-4" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5 12h14m-6-6 6 6-6 6"/>
                        </svg>
                    </a>

                </section>

            </aside>

        </div>
    </div>
</div>

@endsection
