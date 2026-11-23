
@extends('layouts.app')

@section('title', 'Proposer un trajet')

@section('content')

<div class="relative isolate min-h-full overflow-hidden bg-gray-50">

    {{-- Décoration de fond --}}
    <div class="pointer-events-none absolute -right-40 top-0 h-96 w-96 rounded-full bg-orange-100/70 blur-[100px]"></div>
    <div class="pointer-events-none absolute -left-40 bottom-0 h-96 w-96 rounded-full bg-orange-50 blur-[100px]"></div>

    <div class="relative mx-auto w-full max-w-7xl px-4 py-10 sm:px-6 sm:py-14 lg:px-8">

        {{-- En-tête --}}
        <div class="mb-10">
            <a href="{{ route('trips.mine') }}"
               class="mb-6 inline-flex items-center gap-2 text-sm font-medium text-edeka-gray transition hover:text-edeka-orange">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M19 12H5m7 7-7-7 7-7"
                          stroke="currentColor"
                          stroke-width="1.8"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
                Retour à mes trajets
            </a>

            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
                <div>
                    
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-edeka-orange">
                        Conducteur · Nouvel itinéraire
                    </span>

                    <h1 class="mt-3 font-heading text-3xl font-bold tracking-tight text-edeka-black sm:text-4xl lg:text-5xl">
                        Votre trajet,<br class="sm:hidden">
                        <span class="text-edeka-orange">à partager.</span>
                    </h1>

                    <p class="mt-4 max-w-xl text-sm leading-7 text-edeka-gray sm:text-base">
                        Renseignez votre itinéraire et les places disponibles pour permettre aux passagers de vous retrouver.
                    </p>
                </div>

                <div class="hidden items-center gap-2 rounded-full border border-orange-200 bg-orange-50 px-4 py-2 text-sm font-medium text-orange-700 sm:inline-flex">
                    <span class="h-2 w-2 rounded-full bg-edeka-orange"></span>
                    Publication de trajet
                </div>
            </div>
        </div>


        {{-- Mise en page principale --}}
        <div class="grid items-start gap-8 lg:grid-cols-[0.85fr_1.15fr] xl:gap-12">

            {{-- COLONNE GAUCHE --}}
            <aside class="space-y-6 lg:sticky lg:top-8">

                {{-- Présentation du trajet --}}
                <div class="relative isolate overflow-hidden rounded-3xl bg-edeka-black p-6 text-white shadow-xl sm:p-8">

                    <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-edeka-orange/20 blur-[70px]"></div>
                    <div class="pointer-events-none absolute bottom-0 left-0 h-px w-full bg-gradient-to-r from-transparent via-edeka-orange/60 to-transparent"></div>

                    <div class="relative">
                        <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-xs font-semibold text-gray-300">
                            <span class="h-1.5 w-1.5 rounded-full bg-edeka-orange"></span>
                            Votre espace conducteur
                        </span>

                        <h2 class="mt-6 font-heading text-2xl font-bold leading-snug sm:text-3xl">
                            Chaque place libre est une occasion de partager la route.
                        </h2>

                        <p class="mt-4 text-sm leading-7 text-gray-400">
                            Proposez votre déplacement, indiquez votre itinéraire et précisez combien de passagers vous pouvez accueillir.
                        </p>

                        {{-- Illustration itinéraire --}}
                        <div class="mt-8 rounded-2xl border border-white/10 bg-white/[0.04] p-5">

                            <p class="mb-6 text-xs font-bold uppercase tracking-[0.16em] text-edeka-orange">
                                Votre itinéraire
                            </p>

                            <div class="relative space-y-7">

                                <div class="absolute bottom-3 left-[11px] top-3 border-l-2 border-dashed border-edeka-orange/50"></div>

                                <div class="relative flex items-center gap-4">
                                    <span class="z-10 h-6 w-6 rounded-full border-[6px] border-edeka-orange bg-edeka-black"></span>
                                    <div>
                                        <p class="text-xs text-gray-500">Point de départ</p>
                                        <p class="font-heading font-semibold">Votre ville de départ</p>
                                    </div>
                                </div>

                                <div class="relative flex items-center gap-4">
                                    <span class="z-10 flex h-6 w-6 items-center justify-center rounded-full bg-white">
                                        <span class="h-2 w-2 rounded-full bg-edeka-black"></span>
                                    </span>
                                    <div>
                                        <p class="text-xs text-gray-500">Destination</p>
                                        <p class="font-heading font-semibold">Votre ville d'arrivée</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Véhicule utilisé --}}
                <div class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm">

                    <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4 sm:px-6">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.15em] text-edeka-orange">
                                Votre véhicule
                            </p>
                            <h2 class="mt-1 font-heading font-semibold text-edeka-black">
                                Véhicule sélectionné
                            </h2>
                        </div>

                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-orange-50 text-edeka-orange">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M3 13.5 5.5 7h13l2.5 6.5M3 13.5h18M3 13.5V18h2m16-4.5V18h-2M7 18h10"
                                      stroke="currentColor"
                                      stroke-width="1.7"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </div>

                    <div class="p-5 sm:p-6">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                            <img
                                src="{{ $vehicle->photo_url }}"
                                alt="Photo du véhicule"
                                class="h-40 w-full rounded-2xl bg-gray-100 object-cover sm:h-24 sm:w-36"
                            >

                            <div class="min-w-0 flex-1">
                                <p class="text-xs font-medium text-edeka-gray">
                                    Plaque d'immatriculation
                                </p>

                                <p class="mt-1 font-heading text-xl font-bold tracking-wide text-edeka-black">
                                    {{ $vehicle->plaque }}
                                </p>

                                <p class="mt-2 text-sm leading-6 text-edeka-gray">
                                    {{ Str::limit($vehicle->description, 100) }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>


                {{-- Petit rappel --}}
                <div class="flex gap-4 rounded-2xl border border-orange-200/70 bg-orange-50/70 p-5">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-edeka-orange shadow-sm">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 9v4m0 4h.01M10.3 3.86 1.82 18.14A2 2 0 0 0 3.53 21h16.94a2 2 0 0 0 1.71-2.86L13.7 3.86a2 2 0 0 0-3.4 0Z"
                                  stroke="currentColor"
                                  stroke-width="1.7"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <div>
                        <h3 class="font-heading text-sm font-semibold text-edeka-black">
                            Soyez précis
                        </h3>
                        <p class="mt-1 text-xs leading-6 text-edeka-gray">
                            Indiquez des points de départ et d'arrivée suffisamment précis pour faciliter la rencontre avec vos passagers.
                        </p>
                    </div>
                </div>

            </aside>


            {{-- COLONNE DROITE : FORMULAIRE --}}
            <section class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm">

                {{-- En-tête formulaire --}}
                <div class="border-b border-gray-100 px-6 py-6 sm:px-8">
                    <span class="text-xs font-bold uppercase tracking-[0.16em] text-edeka-orange">
                        Nouvelle publication
                    </span>

                    <h2 class="mt-2 font-heading text-2xl font-bold text-edeka-black">
                        Décrivez votre trajet
                    </h2>

                    <p class="mt-2 text-sm leading-6 text-edeka-gray">
                        Complétez les informations ci-dessous pour publier votre déplacement.
                    </p>
                </div>


                <form method="POST" action="{{ route('trips.store') }}" class="space-y-8 p-6 sm:p-8">
                    @csrf


                    {{-- DÉPART --}}
                    <fieldset class="space-y-5">

                        <legend class="mb-5 flex w-full items-center gap-3">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-orange-50 font-heading font-bold text-edeka-orange">
                                01
                            </span>

                            <span>
                                <span class="block font-heading text-lg font-semibold text-edeka-black">
                                    Point de départ
                                </span>
                                <span class="block text-xs text-edeka-gray">
                                    Où commence votre trajet ?
                                </span>
                            </span>
                        </legend>

                        <div>
                            <x-label for="ville_depart" value="Ville de départ" />

                            <div class="mt-2">
                                <x-input
                                    id="ville_depart"
                                    name="ville_depart"
                                    :value="old('ville_depart')"
                                    placeholder="Ex : Lomé"
                                    required
                                    class="w-full"
                                />
                            </div>

                            <x-error :messages="$errors->get('ville_depart')" />
                        </div>

                        <div>
                            <x-label for="lieu_depart" value="Lieu précis de départ" />

                            <div class="mt-2">
                                <x-input
                                    id="lieu_depart"
                                    name="lieu_depart"
                                    :value="old('lieu_depart')"
                                    placeholder="Ex : Agoè, carrefour des 300 mètres"
                                    required
                                    class="w-full"
                                />
                            </div>

                            <p class="mt-2 text-xs text-gray-400">
                                Précisez un quartier, un carrefour ou un point de repère.
                            </p>

                            <x-error :messages="$errors->get('lieu_depart')" />
                        </div>

                    </fieldset>


                    {{-- ARRIVÉE --}}
                    <fieldset class="space-y-5 border-t border-gray-100 pt-7">

                        <legend class="mb-5 flex w-full items-center gap-3">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-orange-50 font-heading font-bold text-edeka-orange">
                                02
                            </span>

                            <span>
                                <span class="block font-heading text-lg font-semibold text-edeka-black">
                                    Destination
                                </span>
                                <span class="block text-xs text-edeka-gray">
                                    Où souhaitez-vous vous rendre ?
                                </span>
                            </span>
                        </legend>

                        <div>
                            <x-label for="ville_arrivee" value="Ville d'arrivée" />

                            <div class="mt-2">
                                <x-input
                                    id="ville_arrivee"
                                    name="ville_arrivee"
                                    :value="old('ville_arrivee')"
                                    placeholder="Ex : Kpalimé"
                                    required
                                    class="w-full"
                                />
                            </div>

                            <x-error :messages="$errors->get('ville_arrivee')" />
                        </div>

                        <div>
                            <x-label for="lieu_arrivee" value="Lieu précis d'arrivée" />

                            <div class="mt-2">
                                <x-input
                                    id="lieu_arrivee"
                                    name="lieu_arrivee"
                                    :value="old('lieu_arrivee')"
                                    placeholder="Ex : Gare routière, face au marché"
                                    required
                                    class="w-full"
                                />
                            </div>

                            <p class="mt-2 text-xs text-gray-400">
                                Aidez vos passagers à identifier facilement le lieu d'arrivée.
                            </p>

                            <x-error :messages="$errors->get('lieu_arrivee')" />
                        </div>

                    </fieldset>


                    {{-- DÉTAILS --}}
                    <fieldset class="space-y-5 border-t border-gray-100 pt-7">

                        <legend class="mb-5 flex w-full items-center gap-3">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-orange-50 font-heading font-bold text-edeka-orange">
                                03
                            </span>

                            <span>
                                <span class="block font-heading text-lg font-semibold text-edeka-black">
                                    Organisation
                                </span>
                                <span class="block text-xs text-edeka-gray">
                                    Quand partez-vous et combien de places proposez-vous ?
                                </span>
                            </span>
                        </legend>

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div class="sm:col-span-2">
                                <x-label for="depart_at" value="Date et heure de départ" />

                                <div class="mt-2">
                                    <x-input
                                        id="depart_at"
                                        name="depart_at"
                                        type="datetime-local"
                                        :value="old('depart_at')"
                                        required
                                        class="w-full"
                                    />
                                </div>

                                <x-error :messages="$errors->get('depart_at')" />
                            </div>

                            <div class="sm:col-span-2">
                                <x-label for="places_disponibles" value="Nombre de places disponibles" />

                                <div class="mt-2">
                                    <x-input
                                        id="places_disponibles"
                                        name="places_disponibles"
                                        type="number"
                                        min="1"
                                        max="8"
                                        :value="old('places_disponibles', 3)"
                                        required
                                        class="w-full"
                                    />
                                </div>

                                <p class="mt-2 text-xs text-gray-400">
                                    Vous pouvez proposer entre 1 et 8 places.
                                </p>

                                <x-error :messages="$errors->get('places_disponibles')" />
                            </div>

                        </div>

                    </fieldset>


                    {{-- ACTIONS --}}
                    <div class="border-t border-gray-100 pt-7">

                        <div class="flex flex-col-reverse gap-3 sm:flex-row">

                            <a
                                href="{{ route('trips.mine') }}"
                                class="inline-flex min-h-12 items-center justify-center rounded-xl border border-gray-200 px-6 py-3 text-sm font-semibold text-edeka-gray transition hover:border-gray-300 hover:bg-gray-50"
                            >
                                Annuler
                            </a>

                            <button
                                type="submit"
                                class="edeka-button inline-flex min-h-12 flex-1 items-center justify-center gap-3 rounded-xl bg-edeka-orange px-6 py-3 font-heading text-sm font-bold text-white shadow-lg shadow-orange-500/20 transition duration-300 hover:-translate-y-0.5 hover:bg-orange-600 hover:shadow-orange-500/30 active:translate-y-0"
                            >
                                Publier mon trajet

                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M5 12h14m-6-6 6 6-6 6"
                                          stroke="currentColor"
                                          stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </button>

                        </div>

                        <p class="mt-4 text-center text-xs leading-6 text-gray-400">
                            Vérifiez vos informations avant de publier votre trajet.
                        </p>

                    </div>

                </form>

            </section>

        </div>
    </div>
</div>

@endsection
