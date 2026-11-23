
@extends('layouts.app')

@section('title', 'Page introuvable')

@section('content')
    <main class="relative isolate flex min-h-[75vh] items-center justify-center overflow-hidden bg-[#F5F2EA] px-5 py-16">

        {{-- Décorations d'arrière-plan --}}
        <div class="pointer-events-none absolute -right-32 -top-32 h-96 w-96 rounded-full bg-[#A9BCAF]/20 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-32 -left-32 h-96 w-96 rounded-full bg-[#D8C6A0]/20 blur-3xl"></div>

        <section class="relative w-full max-w-xl text-center">

            {{-- Illustration --}}
            <div class="relative mx-auto mb-9 flex h-36 w-36 items-center justify-center">

                <div class="absolute inset-0 rounded-full border border-[#A9BCAF]/40"></div>
                <div class="absolute inset-3 rounded-full border border-dashed border-[#A9BCAF]/60"></div>

                <div class="flex h-24 w-24 items-center justify-center rounded-[2rem] bg-white shadow-[0_15px_45px_rgba(36,44,40,0.08)]">
                    <svg class="h-12 w-12 text-[#858C85]" fill="none" stroke="currentColor"
                         stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

                <span class="absolute right-1 top-5 h-3 w-3 rounded-full bg-[#D8C6A0]"></span>
                <span class="absolute bottom-5 left-1 h-2.5 w-2.5 rounded-full bg-[#A9BCAF]"></span>
            </div>

            {{-- Code erreur --}}
            <div class="mb-3">
                <span class="font-heading text-7xl font-extrabold tracking-[-0.07em] text-[#242C28] sm:text-8xl">
                    404
                </span>
            </div>

            <span class="inline-flex items-center gap-2 rounded-full border border-[#A9BCAF]/50 bg-white/70 px-4 py-2 text-xs font-semibold uppercase tracking-[0.18em] text-[#858C85]">
                <span class="h-1.5 w-1.5 rounded-full bg-[#A9BCAF]"></span>
                Destination introuvable
            </span>

            {{-- Message --}}
            <h1 class="mt-6 font-heading text-2xl font-bold tracking-tight text-[#242C28] sm:text-3xl">
                Oups ! Vous avez pris un mauvais chemin.
            </h1>

            <p class="mx-auto mt-4 max-w-md text-sm leading-7 text-[#858C85] sm:text-base">
                La page que vous recherchez n'existe pas, a été déplacée
                ou le trajet demandé n'est plus disponible à cette adresse.
                Pas d'inquiétude, nous pouvons vous aider à retrouver votre chemin.
            </p>

            {{-- Actions --}}
            <div class="mt-9 flex flex-col items-center justify-center gap-3 sm:flex-row">

                <a href="{{ route('home') }}"
                   class="inline-flex w-full items-center justify-center gap-2.5 rounded-xl bg-[#242C28] px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-[#242C28]/10 transition duration-300 hover:-translate-y-0.5 hover:bg-[#35443B] hover:shadow-xl sm:w-auto">

                    <svg class="h-4 w-4" fill="none" stroke="currentColor"
                         stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m3 10 9-7 9 7v10a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1V10z"/>
                    </svg>

                    Retour à l'accueil
                </a>

                <button type="button"
                        onclick="history.back()"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-[#A9BCAF]/60 bg-white/70 px-7 py-3.5 text-sm font-semibold text-[#242C28] transition duration-300 hover:border-[#A9BCAF] hover:bg-white sm:w-auto">

                    <svg class="h-4 w-4" fill="none" stroke="currentColor"
                         stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M10 19l-7-7m0 0 7-7m-7 7h18"/>
                    </svg>

                    Page précédente
                </button>
            </div>

            {{-- Signature --}}
            <div class="mx-auto mt-14 flex max-w-xs items-center justify-center gap-3">
                <span class="h-px flex-1 bg-[#A9BCAF]/50"></span>
                <span class="text-xs font-medium tracking-wide text-[#858C85]">
                    EhouDeka · Voyagez ensemble
                </span>
                <span class="h-px flex-1 bg-[#A9BCAF]/50"></span>
            </div>

        </section>
    </main>
@endsection
