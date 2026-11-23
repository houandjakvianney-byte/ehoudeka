
@extends('layouts.app')

@section('title', 'Mon profil')

@section('content')

{{-- HERO PROFIL --}}
<section class="relative isolate overflow-hidden bg-[#103A32] text-white">

    {{-- Décoration lumineuse --}}
    <div class="pointer-events-none absolute -right-32 -top-40 h-[28rem] w-[28rem] rounded-full bg-[#6BCBB2]/15 blur-[110px]"></div>
    <div class="pointer-events-none absolute -bottom-48 left-1/4 h-96 w-96 rounded-full bg-[#236653]/40 blur-[100px]"></div>
    <div class="pointer-events-none absolute inset-0 opacity-[0.035]"
         style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 28px 28px;">
    </div>

    <div class="relative mx-auto w-full max-w-7xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">

        <div class="flex flex-col gap-8 sm:flex-row sm:items-center sm:justify-between">

            {{-- Identité --}}
            <div class="flex items-center gap-5">

                <div class="relative flex h-20 w-20 shrink-0 items-center justify-center rounded-[1.6rem] border border-white/15 bg-white/10 font-heading text-2xl font-bold text-white shadow-xl backdrop-blur-sm sm:h-24 sm:w-24 sm:text-3xl">
                    {{ strtoupper(substr($user->prenom, 0, 1) . substr($user->nom, 0, 1)) }}

                    <span class="absolute -bottom-1 -right-1 h-5 w-5 rounded-full border-4 border-[#103A32] bg-[#6BCBB2]"></span>
                </div>

                <div class="min-w-0">

                    <span class="mb-2 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-[#6BCBB2]">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#6BCBB2]"></span>
                        Mon espace personnel
                    </span>

                    <h1 class="font-heading text-2xl font-bold tracking-tight text-white sm:text-3xl lg:text-4xl">
                        {{ $user->full_name }}
                    </h1>

                    <p class="mt-2 text-sm text-white/60">
                        Membre depuis {{ $user->created_at->translatedFormat('F Y') }}
                    </p>

                </div>
            </div>

            {{-- Action --}}
            <a href="{{ route('profile.edit') }}"
               class="inline-flex w-fit items-center justify-center gap-2 rounded-xl bg-[#6BCBB2] px-5 py-3 text-sm font-bold text-[#103A32] shadow-lg shadow-black/10 transition duration-300 hover:-translate-y-0.5 hover:bg-[#8BDCC8]">

                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16 4 4 4M4 20l4-.8L19.4 7.8a2 2 0 0 0-2.8-2.8L5 16.6 4 20Z" />
                </svg>

                Modifier mon profil
            </a>

        </div>

        {{-- Ligne décorative --}}
        <div class="mt-10 h-px w-full bg-gradient-to-r from-[#6BCBB2]/40 via-white/10 to-transparent"></div>

    </div>
</section>


{{-- CONTENU --}}
<section class="min-h-[55vh] w-full bg-[#F7F5EF]">

    <div class="mx-auto w-full max-w-7xl px-4 py-10 sm:px-6 sm:py-14 lg:px-8">

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">

            {{-- INFORMATIONS PERSONNELLES --}}
            <div class="lg:col-span-2">

                <div class="overflow-hidden rounded-2xl border border-[#E5E7EB] bg-white shadow-[0_4px_24px_rgba(24,41,35,0.035)]">

                    {{-- En-tête --}}
                    <div class="flex items-center justify-between border-b border-[#E5E7EB] px-5 py-6 sm:px-7">

                        <div>
                            <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#236653]">
                                Mon compte
                            </span>

                            <h2 class="mt-1 font-heading text-lg font-bold text-[#182923] sm:text-xl">
                                Informations personnelles
                            </h2>

                            <p class="mt-1 text-sm text-[#6B7280]">
                                Les informations associées à votre compte.
                            </p>
                        </div>

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#E7F3EE] text-[#164E41]">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 21a8 8 0 0 0-16 0m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" />
                            </svg>
                        </div>

                    </div>

                    {{-- Données du compte --}}
                    <dl class="divide-y divide-[#E5E7EB] px-5 sm:px-7">

                        {{-- Prénom --}}
                        <div class="flex flex-col gap-1 py-5 sm:flex-row sm:items-center sm:justify-between sm:gap-4">
                            <dt class="text-sm text-[#6B7280]">
                                Prénom
                            </dt>

                            <dd class="text-sm font-semibold text-[#182923] sm:text-right">
                                {{ $user->prenom }}
                            </dd>
                        </div>

                        {{-- Nom --}}
                        <div class="flex flex-col gap-1 py-5 sm:flex-row sm:items-center sm:justify-between sm:gap-4">
                            <dt class="text-sm text-[#6B7280]">
                                Nom
                            </dt>

                            <dd class="text-sm font-semibold text-[#182923] sm:text-right">
                                {{ $user->nom }}
                            </dd>
                        </div>

                        {{-- Téléphone --}}
                        <div class="flex flex-col gap-1 py-5 sm:flex-row sm:items-center sm:justify-between sm:gap-4">
                            <dt class="text-sm text-[#6B7280]">
                                Téléphone
                            </dt>

                            <dd class="text-sm font-semibold text-[#182923] sm:text-right">
                                {{ $user->telephone }}
                            </dd>
                        </div>

                        {{-- Email --}}
                        <div class="flex flex-col gap-1 py-5 sm:flex-row sm:items-center sm:justify-between sm:gap-4">
                            <dt class="text-sm text-[#6B7280]">
                                Adresse e-mail
                            </dt>

                            <dd class="break-all text-sm font-semibold text-[#182923] sm:text-right">
                                {{ $user->email }}
                            </dd>
                        </div>

                    </dl>

                    {{-- Pied de carte --}}
                    <div class="border-t border-[#E5E7EB] bg-[#F3F5F2] px-5 py-5 sm:px-7">

                        <a href="{{ route('profile.edit') }}"
                           class="group inline-flex items-center gap-2 text-sm font-bold text-[#164E41] transition hover:text-[#236653]">

                            Mettre à jour mes informations

                            <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7" />
                            </svg>

                        </a>

                    </div>

                </div>

            </div>


            {{-- RACCOURCIS --}}
            <aside class="space-y-5">

                <div class="mb-2">
                    <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#236653]">
                        Navigation
                    </span>

                    <h2 class="mt-1 font-heading text-lg font-bold text-[#182923]">
                        Mon espace EhouDeka
                    </h2>

                    <p class="mt-1 text-sm text-[#6B7280]">
                        Retrouvez rapidement vos fonctionnalités.
                    </p>
                </div>


                {{-- Mon véhicule --}}
                <a href="{{ route('vehicle.show') }}"
                   class="group flex items-center gap-4 rounded-2xl border border-[#E5E7EB] bg-white p-5 shadow-[0_3px_15px_rgba(24,41,35,0.025)] transition duration-300 hover:-translate-y-1 hover:border-[#6BCBB2] hover:shadow-[0_10px_30px_rgba(22,78,65,0.08)]">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#E7F3EE] text-[#164E41] transition duration-300 group-hover:bg-[#164E41] group-hover:text-white">

                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 17h14l1-6-2-5H6l-2 5 1 6Zm0 0v2m14-2v2M5 11h14M7 14h.01M17 14h.01" />
                        </svg>

                    </div>

                    <div class="min-w-0 flex-1">
                        <h3 class="font-heading text-sm font-bold text-[#182923]">
                            Mon véhicule
                        </h3>

                        <p class="mt-1 text-xs leading-5 text-[#6B7280]">
                            Consulter mes informations véhicule
                        </p>
                    </div>

                    <svg class="h-5 w-5 shrink-0 text-[#94A3A0] transition group-hover:translate-x-1 group-hover:text-[#164E41]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>

                </a>


                {{-- Mes trajets --}}
                <a href="{{ route('trips.mine') }}"
                   class="group flex items-center gap-4 rounded-2xl border border-[#E5E7EB] bg-white p-5 shadow-[0_3px_15px_rgba(24,41,35,0.025)] transition duration-300 hover:-translate-y-1 hover:border-[#6BCBB2] hover:shadow-[0_10px_30px_rgba(22,78,65,0.08)]">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#E7F3EE] text-[#164E41] transition duration-300 group-hover:bg-[#164E41] group-hover:text-white">

                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M5 12l2-6h10l2 6M5 12v5h14v-5m-11 5v2m8-2v2" />
                        </svg>

                    </div>

                    <div class="min-w-0 flex-1">
                        <h3 class="font-heading text-sm font-bold text-[#182923]">
                            Mes trajets
                        </h3>

                        <p class="mt-1 text-xs leading-5 text-[#6B7280]">
                            Retrouver mes trajets publiés
                        </p>
                    </div>

                    <svg class="h-5 w-5 shrink-0 text-[#94A3A0] transition group-hover:translate-x-1 group-hover:text-[#164E41]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>

                </a>


                {{-- Paramètres --}}
                <a href="{{ route('profile.edit') }}"
                   class="group flex items-center gap-4 rounded-2xl border border-[#E5E7EB] bg-white p-5 shadow-[0_3px_15px_rgba(24,41,35,0.025)] transition duration-300 hover:-translate-y-1 hover:border-[#6BCBB2] hover:shadow-[0_10px_30px_rgba(22,78,65,0.08)]">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#F3F5F2] text-[#164E41] transition duration-300 group-hover:bg-[#164E41] group-hover:text-white">

                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16 4 4 4M4 20l4-.8L19.4 7.8a2 2 0 0 0-2.8-2.8L5 16.6 4 20Z" />
                        </svg>

                    </div>

                    <div class="min-w-0 flex-1">
                        <h3 class="font-heading text-sm font-bold text-[#182923]">
                            Paramètres du profil
                        </h3>

                        <p class="mt-1 text-xs leading-5 text-[#6B7280]">
                            Modifier mes coordonnées
                        </p>
                    </div>

                    <svg class="h-5 w-5 shrink-0 text-[#94A3A0] transition group-hover:translate-x-1 group-hover:text-[#164E41]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>

                </a>

            </aside>

        </div>

    </div>

</section>

@endsection
