
@extends('layouts.app')

@section('title', 'Mes trajets')

@section('content')

<div class="min-h-full bg-[#F5F2EA]">

    {{-- BANDEAU PRINCIPAL --}}
    <section class="relative isolate overflow-hidden bg-[#242C28] text-white">

        {{-- Décorations --}}
        <div class="pointer-events-none absolute -right-32 -top-40 h-[450px] w-[450px] rounded-full bg-[#A9BCAF]/15 blur-[100px]"></div>
        <div class="pointer-events-none absolute bottom-0 left-0 h-px w-full bg-gradient-to-r from-transparent via-[#D8C6A0]/60 to-transparent"></div>

        <div class="relative mx-auto w-full max-w-7xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">

            <div class="flex flex-col justify-between gap-8 md:flex-row md:items-end">

                <div class="max-w-2xl">

                    <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-xs font-semibold uppercase tracking-[0.16em] text-[#A9BCAF]">
                        <span class="h-2 w-2 rounded-full bg-[#D8C6A0]"></span>
                        Espace conducteur
                    </span>

                    <h1 class="mt-5 font-heading text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl">
                        Mes trajets<span class="text-[#D8C6A0]">.</span>
                    </h1>

                    <p class="mt-4 max-w-lg text-sm leading-7 text-white/65 sm:text-base">
                        Retrouvez vos déplacements publiés et gérez vos propositions de voyage en un seul endroit.
                    </p>

                </div>

                <a
                    href="{{ route('trips.create') }}"
                    class="group inline-flex min-h-12 items-center justify-center gap-3 rounded-xl bg-[#D8C6A0] px-6 py-3 font-heading text-sm font-bold text-[#242C28] transition duration-300 hover:-translate-y-1 hover:bg-[#E5D7BA] active:translate-y-0"
                >
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M12 5v14m-7-7h14"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"/>
                    </svg>

                    Proposer un trajet

                    <svg class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M5 12h14m-6-6 6 6-6 6"
                              stroke="currentColor"
                              stroke-width="1.8"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </a>

            </div>

            {{-- INDICATEUR --}}
            <div class="mt-10 flex flex-wrap items-center gap-4 border-t border-white/10 pt-6">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#A9BCAF]/10 text-[#A9BCAF]">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M3 13.5 5.5 7h13l2.5 6.5M3 13.5h18M3 13.5V18h2m16-4.5V18h-2M7 18h10"
                              stroke="currentColor"
                              stroke-width="1.7"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </div>

                <div>
                    <p class="font-heading text-2xl font-bold text-white tabular-nums">
                        {{ $trips->count() }}
                    </p>
                    <p class="text-xs text-white/55">
                        {{ $trips->count() > 1 ? 'Trajets dans cette liste' : 'Trajet dans cette liste' }}
                    </p>
                </div>

            </div>

        </div>
    </section>


    {{-- CONTENU --}}
    <section class="relative mx-auto w-full max-w-7xl px-4 py-10 sm:px-6 sm:py-14 lg:px-8">

        @if ($trips->isEmpty())

            {{-- ÉTAT VIDE --}}
            <div class="relative overflow-hidden rounded-3xl border border-dashed border-[#A9BCAF] bg-white px-6 py-14 text-center sm:px-12 sm:py-20">

                <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-[#A9BCAF]/15 blur-3xl"></div>
                <div class="pointer-events-none absolute -bottom-24 -left-20 h-64 w-64 rounded-full bg-[#F5F2EA] blur-3xl"></div>

                <div class="relative mx-auto max-w-md">

                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl border border-[#A9BCAF]/50 bg-[#F5F2EA] text-[#242C28]">

                        <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M3 13.5 5.5 7h13l2.5 6.5M3 13.5h18M3 13.5V18h2m16-4.5V18h-2M7 18h10"
                                  stroke="currentColor"
                                  stroke-width="1.6"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M12 9v4m-2-2h4"
                                  stroke="currentColor"
                                  stroke-width="1.6"
                                  stroke-linecap="round"/>
                        </svg>

                    </div>

                    <span class="mt-7 block text-xs font-bold uppercase tracking-[0.18em] text-[#858C85]">
                        Votre espace conducteur
                    </span>

                    <h2 class="mt-3 font-heading text-2xl font-bold text-[#242C28] sm:text-3xl">
                        La route vous attend.
                    </h2>

                    <p class="mt-4 text-sm leading-7 text-[#858C85]">
                        Vous n'avez encore publié aucun trajet. Proposez votre premier déplacement et donnez à d'autres personnes l'occasion de partager la route avec vous.
                    </p>

                    <a
                        href="{{ route('trips.create') }}"
                        class="mt-8 inline-flex min-h-12 items-center justify-center gap-3 rounded-xl bg-[#242C28] px-6 py-3 font-heading text-sm font-bold text-white transition duration-300 hover:-translate-y-1 hover:bg-[#35443C] active:translate-y-0"
                    >
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 5v14m-7-7h14"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  stroke-linecap="round"/>
                        </svg>
                        Publier mon premier trajet
                    </a>

                </div>
            </div>

        @else

            {{-- EN-TÊTE DE LA LISTE --}}
            <div class="mb-7 flex flex-col justify-between gap-3 sm:flex-row sm:items-end">

                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#858C85]">
                        Votre activité
                    </span>

                    <h2 class="mt-2 font-heading text-2xl font-bold text-[#242C28]">
                        Vos publications
                    </h2>

                    <p class="mt-2 text-sm text-[#858C85]">
                        Retrouvez ici les trajets que vous avez proposés.
                    </p>
                </div>

                <span class="inline-flex w-fit items-center gap-2 rounded-full border border-[#A9BCAF]/50 bg-white px-4 py-2 text-xs font-semibold text-[#858C85]">
                    <span class="h-2 w-2 rounded-full bg-[#A9BCAF]"></span>
                    {{ $trips->count() }} {{ $trips->count() > 1 ? 'trajets' : 'trajet' }}
                </span>

            </div>


            {{-- LISTE DES TRAJETS --}}
            <div class="space-y-5">

                @foreach ($trips as $trip)
                    @include('trips.partials.card', [
                        'trip' => $trip,
                        'updatable'=>true,
                        'deletable' => true
                    ])
                @endforeach

            </div>

        @endif

    </section>

</div>

@endsection
