
@extends('layouts.app')

@section('title', 'Modifier mon profil')

@section('content')

{{-- HERO --}}
<section class="relative isolate overflow-hidden bg-[#111111]">
    <div class="pointer-events-none absolute -right-24 -top-32 h-80 w-80 rounded-full bg-edeka-orange/15 blur-[100px]"></div>
    <div class="pointer-events-none absolute -bottom-32 left-1/4 h-64 w-64 rounded-full bg-edeka-orange/10 blur-[90px]"></div>

    <div class="relative mx-auto w-full max-w-7xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
        <div class="flex flex-col justify-between gap-8 sm:flex-row sm:items-end">
            <div>
                <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-xs font-semibold uppercase tracking-[0.18em] text-orange-400">
                    <span class="h-1.5 w-1.5 rounded-full bg-edeka-orange"></span>
                    Mon espace personnel
                </div>

                <h1 class="font-heading text-3xl font-bold tracking-tight text-white sm:text-4xl lg:text-5xl">
                    Modifier mon <span class="text-edeka-orange">profil.</span>
                </h1>

                <p class="mt-4 max-w-xl text-sm leading-7 text-gray-400 sm:text-base">
                    Gardez vos informations à jour pour faciliter vos échanges
                    et vos déplacements avec la communauté EhouDeka.
                </p>
            </div>

            <a href="{{ route('profile.show') }}"
               class="inline-flex w-fit items-center gap-2 rounded-xl border border-white/15 bg-white/5 px-5 py-3 text-sm font-semibold text-white transition hover:border-edeka-orange/50 hover:bg-white/10">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m15 18-6-6 6-6" />
                </svg>
                Retour au profil
            </a>
        </div>
    </div>
</section>

{{-- FORMULAIRE --}}
<section class="w-full bg-gray-50">
    <div class="mx-auto w-full max-w-7xl px-4 py-10 sm:px-6 sm:py-14 lg:px-8">

        <div class="mx-auto max-w-3xl">

            {{-- INTRODUCTION --}}
            <div class="mb-7">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-edeka-orange">
                    Informations personnelles
                </span>
                <h2 class="mt-2 font-heading text-xl font-bold text-gray-900 sm:text-2xl">
                    Vos coordonnées
                </h2>
                <p class="mt-2 text-sm leading-6 text-gray-500">
                    Vérifiez vos informations avant d'enregistrer les modifications.
                </p>
            </div>

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                {{-- EN-TÊTE DU FORMULAIRE --}}
                <div class="flex items-center gap-4 border-b border-gray-100 px-5 py-5 sm:px-8">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-orange-50 text-edeka-orange">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 21a8 8 0 0 0-16 0m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="font-heading text-base font-bold text-gray-900">
                            Mes informations
                        </h3>
                        <p class="mt-1 text-xs text-gray-500">
                            Les champs marqués sont obligatoires.
                        </p>
                    </div>
                </div>

                <form method="POST" action="{{ route('profile.update') }}" class="space-y-7 p-5 sm:p-8">
                    @csrf
                    @method('PATCH')

                    {{-- NOM ET PRÉNOM --}}
                    <div>
                        <h4 class="mb-4 text-sm font-bold text-gray-900">
                            Identité
                        </h4>

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <x-label for="prenom" value="Prénom" />
                                <x-input
                                    id="prenom"
                                    name="prenom"
                                    :value="old('prenom', $user->prenom)"
                                    required
                                    autofocus
                                    autocomplete="given-name"
                                    placeholder="Votre prénom"
                                />
                                <x-error :messages="$errors->get('prenom')" />
                            </div>

                            <div>
                                <x-label for="nom" value="Nom" />
                                <x-input
                                    id="nom"
                                    name="nom"
                                    :value="old('nom', $user->nom)"
                                    required
                                    autocomplete="family-name"
                                    placeholder="Votre nom"
                                />
                                <x-error :messages="$errors->get('nom')" />
                            </div>
                        </div>
                    </div>

                    <div class="h-px bg-gray-100"></div>

                    {{-- COORDONNÉES --}}
                    <div>
                        <h4 class="mb-4 text-sm font-bold text-gray-900">
                            Coordonnées
                        </h4>

                        <div class="space-y-5">
                            <div>
                                <x-label for="telephone" value="Numéro de téléphone" />
                                <x-input
                                    id="telephone"
                                    name="telephone"
                                    type="tel"
                                    :value="old('telephone', $user->telephone)"
                                    required
                                    autocomplete="tel"
                                    placeholder="Ex. : +228 90 00 00 00"
                                />
                                <x-error :messages="$errors->get('telephone')" />
                                <p class="mt-2 text-xs text-gray-400">
                                    Utilisez un numéro auquel les autres membres peuvent vous joindre.
                                </p>
                            </div>

                            <div>
                                <div class="mb-2 flex items-center justify-between gap-3">
                                    <x-label value="Adresse e-mail" />
                                    <span class="rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-gray-500">
                                        Non modifiable
                                    </span>
                                </div>

                                <x-input
                                    :value="$user->email"
                                    type="email"
                                    disabled
                                    autocomplete="email"
                                />

                                <p class="mt-2 text-xs text-gray-400">
                                    Cette adresse est associée à votre compte et ne peut pas être modifiée ici.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="h-px bg-gray-100"></div>

                    {{-- ACTIONS --}}
                    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                        <a href="{{ route('profile.show') }}"
                           class="inline-flex items-center justify-center rounded-xl border border-gray-200 px-6 py-3 text-sm font-semibold text-gray-600 transition hover:border-gray-300 hover:bg-gray-50">
                            Annuler
                        </a>

                        <x-button>
                            <span class="inline-flex items-center justify-center gap-2">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7" />
                                </svg>
                                Enregistrer les modifications
                            </span>
                        </x-button>
                    </div>
                </form>
            </div>

            {{-- NOTE DE CONFIDENTIALITÉ --}}
            <div class="mt-5 flex items-start gap-3 rounded-xl border border-gray-200 bg-white p-4">
                <svg class="mt-0.5 h-5 w-5 shrink-0 text-edeka-orange" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3 4 6v5c0 5 3.5 8.5 8 10 4.5-1.5 8-5 8-10V6l-8-3Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 12 2 2 4-4" />
                </svg>

                <p class="text-xs leading-6 text-gray-500">
                    Vos informations personnelles sont utilisées dans le cadre du fonctionnement
                    de votre compte EhouDeka.
                </p>
            </div>

        </div>
    </div>
</section>

@endsection