
@props(['trip', 'deletable' => false])

@once
    @push('head')
        <style>
            [x-cloak] {
                display: none !important;
            }

            .trip-skeleton {
                display: none;
            }

            html.trip-cards-loading .trip-skeleton {
                display: block;
            }

            html.trip-cards-loading .trip-card-content {
                display: none;
            }

            .skeleton-shimmer {
                position: relative;
                overflow: hidden;
                background: rgba(169, 188, 175, 0.22);
                border-radius: 8px;
            }

            .skeleton-shimmer::after {
                content: "";
                position: absolute;
                inset: 0;
                transform: translateX(-100%);
                background: linear-gradient(
                    90deg,
                    transparent,
                    rgba(255, 255, 255, 0.75),
                    transparent
                );
                animation: skeleton-shimmer 1.4s infinite;
            }

            @keyframes skeleton-shimmer {
                to {
                    transform: translateX(100%);
                }
            }

            @media (prefers-reduced-motion: reduce) {
                .skeleton-shimmer::after {
                    animation: none;
                }
            }
        </style>

        <script>
            document.documentElement.classList.add('trip-cards-loading');
        </script>
    @endpush

    @push('scripts')
        <script>
            (() => {
                const MIN_DURATION = 900;
                const SAFETY_TIMEOUT = 10000;

                let removed = false;
                const started = performance.now();

                function removeSkeleton() {
                    if (removed) return;

                    removed = true;
                    document.documentElement.classList.remove('trip-cards-loading');
                }

                function finishLoading() {
                    const elapsed = performance.now() - started;
                    const remaining = Math.max(0, MIN_DURATION - elapsed);

                    window.setTimeout(removeSkeleton, remaining);
                }

                if (document.readyState === 'complete') {
                    finishLoading();
                } else {
                    window.addEventListener('load', finishLoading, {
                        once: true
                    });
                }

                window.setTimeout(removeSkeleton, SAFETY_TIMEOUT);
            })();
        </script>
    @endpush
@endonce

@php
    $vehicle = $trip->user->vehicle;
    $driver = $trip->user;

    $initials = strtoupper(
        substr($driver->prenom ?? '', 0, 1) .
        substr($driver->nom ?? '', 0, 1)
    );

    $phone = preg_replace('/\s+/', '', $driver->telephone ?? '');
@endphp

<article class="group relative isolate overflow-hidden rounded-[24px] border border-[#A9BCAF]/40 bg-white shadow-[0_4px_20px_rgba(36,44,40,0.035)] transition duration-300 hover:-translate-y-1 hover:border-[#A9BCAF] hover:shadow-[0_18px_45px_rgba(36,44,40,0.09)]">

    {{-- SKELETON --}}
    <div class="trip-skeleton p-5 sm:p-7" aria-hidden="true">

        <div class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">

            <div class="space-y-7">
                <div class="flex justify-between">
                    <div class="skeleton-shimmer h-3 w-32"></div>
                    <div class="skeleton-shimmer h-7 w-24 rounded-full"></div>
                </div>

                <div class="flex gap-5">
                    <div class="flex flex-col items-center">
                        <div class="skeleton-shimmer h-4 w-4 rounded-full"></div>
                        <div class="my-2 h-14 border-l-2 border-dashed border-[#A9BCAF]"></div>
                        <div class="skeleton-shimmer h-4 w-4 rounded-full"></div>
                    </div>

                    <div class="flex flex-1 flex-col gap-7">
                        <div class="space-y-2">
                            <div class="skeleton-shimmer h-3 w-20"></div>
                            <div class="skeleton-shimmer h-6 w-48"></div>
                            <div class="skeleton-shimmer h-3 w-36"></div>
                        </div>
                        <div class="space-y-2">
                            <div class="skeleton-shimmer h-3 w-20"></div>
                            <div class="skeleton-shimmer h-6 w-48"></div>
                            <div class="skeleton-shimmer h-3 w-36"></div>
                        </div>
                    </div>
                </div>

                <div class="skeleton-shimmer h-16 w-full rounded-xl"></div>
            </div>

            <div class="space-y-5 border-t border-[#A9BCAF]/30 pt-6 lg:border-l lg:border-t-0 lg:pl-7 lg:pt-0">
                <div class="skeleton-shimmer h-3 w-32"></div>
                <div class="flex items-center gap-3">
                    <div class="skeleton-shimmer h-12 w-12 rounded-2xl"></div>
                    <div class="flex-1 space-y-2">
                        <div class="skeleton-shimmer h-4 w-36"></div>
                        <div class="skeleton-shimmer h-3 w-24"></div>
                    </div>
                </div>
                <div class="skeleton-shimmer h-32 w-full rounded-2xl"></div>
            </div>
        </div>

        <div class="mt-7 flex justify-between border-t border-[#A9BCAF]/30 pt-5">
            <div class="skeleton-shimmer h-9 w-36 rounded-full"></div>
            <div class="skeleton-shimmer h-11 w-40 rounded-xl"></div>
        </div>
    </div>

    {{-- CONTENU --}}
    <div class="trip-card-content relative">

        {{-- Lien couvrant la carte --}}
        <a
            href="{{ route('trips.show', $trip) }}"
            class="absolute inset-0 z-10 rounded-[24px] focus:outline-none focus:ring-4 focus:ring-inset focus:ring-[#A9BCAF]/70"
            aria-label="Voir les détails du trajet de {{ $trip->ville_depart }} à {{ $trip->ville_arrivee }}"
        ></a>

        {{-- Accent supérieur --}}
        <div class="pointer-events-none absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-[#242C28] via-[#A9BCAF] to-[#D8C6A0] opacity-0 transition duration-300 group-hover:opacity-100"></div>

        <div class="p-5 sm:p-7 lg:p-8">

            {{-- CONTENU PRINCIPAL --}}
            <div class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr] lg:gap-10">

                {{-- ITINÉRAIRE --}}
                <section class="min-w-0">

                    <div class="mb-7 flex flex-wrap items-center justify-between gap-3">

                        <span class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#858C85]">
                            Itinéraire
                        </span>

                        <span class="inline-flex items-center gap-2 rounded-full bg-[#F5F2EA] px-3 py-1.5 text-[11px] font-semibold text-[#858C85]">
                            <span class="h-1.5 w-1.5 rounded-full bg-[#A9BCAF]"></span>
                            EhouDeka
                        </span>
                    </div>

                    <div class="relative flex gap-4 sm:gap-5">

                        {{-- Ligne verticale --}}
                        <div class="flex w-5 shrink-0 flex-col items-center pt-1">
                            <span class="z-10 h-3.5 w-3.5 rounded-full border-[3px] border-white bg-[#242C28] shadow-[0_0_0_2px_#A9BCAF]"></span>

                            <span class="my-2 min-h-16 flex-1 border-l-2 border-dashed border-[#A9BCAF]"></span>

                            <span class="z-10 h-3.5 w-3.5 rounded-full border-[3px] border-white bg-[#D8C6A0] shadow-[0_0_0_2px_#D8C6A0]"></span>
                        </div>

                        <div class="flex min-w-0 flex-1 flex-col justify-between gap-8">

                            {{-- DÉPART --}}
                            <div class="min-w-0">
                                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#858C85]">
                                    Départ
                                </p>

                                <h3 class="mt-1.5 break-words font-heading text-xl font-bold leading-tight text-[#242C28] sm:text-2xl">
                                    {{ $trip->ville_depart }}
                                </h3>

                                <p class="mt-1.5 break-words text-sm leading-6 text-[#858C85]">
                                    {{ $trip->lieu_depart }}
                                </p>
                            </div>

                            {{-- ARRIVÉE --}}
                            <div class="min-w-0">
                                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#858C85]">
                                    Destination
                                </p>

                                <h3 class="mt-1.5 break-words font-heading text-xl font-bold leading-tight text-[#242C28] sm:text-2xl">
                                    {{ $trip->ville_arrivee }}
                                </h3>

                                <p class="mt-1.5 break-words text-sm leading-6 text-[#858C85]">
                                    {{ $trip->lieu_arrivee }}
                                </p>
                            </div>

                        </div>
                    </div>

                    {{-- DATE --}}
                    <div class="mt-8 flex items-center gap-3 rounded-2xl border border-[#A9BCAF]/30 bg-[#F5F2EA]/70 p-4">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white text-[#242C28] shadow-sm">
                            <svg class="h-5 w-5" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>

                        <div class="min-w-0">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-[#858C85]">
                                Date et heure
                            </p>

                            <p class="mt-1 text-sm font-semibold text-[#242C28]">
                                {{ $trip->depart_at->translatedFormat('l d M Y') }}
                                <span class="mx-1 text-[#A9BCAF]">·</span>
                                {{ $trip->depart_at->format('H:i') }}
                            </p>
                        </div>
                    </div>

                </section>

                {{-- CONDUCTEUR + VÉHICULE --}}
                <section class="min-w-0 space-y-6 border-t border-[#A9BCAF]/30 pt-6 lg:border-l lg:border-t-0 lg:pl-8 lg:pt-0">

                    {{-- CONDUCTEUR --}}
                    <div>
                        <p class="mb-4 text-[11px] font-bold uppercase tracking-[0.18em] text-[#858C85]">
                            Votre conducteur
                        </p>

                        <div class="flex min-w-0 items-center gap-3">

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#242C28] font-heading text-sm font-bold text-white">
                                {{ $initials ?: '?' }}
                            </div>

                            <div class="min-w-0">
                                <p class="truncate font-heading text-base font-bold text-[#242C28]">
                                    {{ $driver->full_name }}
                                </p>

                                <p class="mt-1 text-xs text-[#858C85]">
                                    Conducteur EhouDeka
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- VÉHICULE --}}
                    <div>
                        <div class="mb-3 flex items-center justify-between gap-2">
                            <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#858C85]">
                                Véhicule
                            </p>

                            <span class="text-[10px] font-medium text-[#A9BCAF]">
                                Photo du véhicule
                            </span>
                        </div>

                        <div class="overflow-hidden rounded-2xl border border-[#A9BCAF]/35 bg-[#F5F2EA]/60">

                            {{-- Photo plus grande --}}
                            <div class="relative overflow-hidden bg-[#E9ECE8]">
                                <img
                                    src="{{ $vehicle?->photo_url ?? asset('images/vehicle-default.svg') }}"
                                    alt="Véhicule du conducteur"
                                    loading="lazy"
                                    class="h-40 w-full object-cover transition duration-500 group-hover:scale-[1.02] sm:h-44"
                                >

                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>

                            <div class="p-4">

                                <p class="text-[10px] font-bold uppercase tracking-wider text-[#858C85]">
                                    Plaque d'immatriculation
                                </p>

                                <p class="mt-1 font-heading text-base font-bold tracking-wide text-[#242C28]">
                                    {{ $vehicle?->plaque ?? 'Non renseignée' }}
                                </p>

                                <p class="mt-2 line-clamp-2 text-xs leading-5 text-[#858C85]">
                                    {{ $vehicle?->description ?? 'Aucune description disponible.' }}
                                </p>

                            </div>
                        </div>
                    </div>

                </section>
            </div>

            {{-- PIED DE CARTE --}}
            <div class="relative z-20 mt-8 flex flex-col gap-4 border-t border-[#A9BCAF]/30 pt-6 sm:flex-row sm:items-center sm:justify-between">

                {{-- PLACES --}}
                <div class="flex flex-wrap items-center gap-3">

                    <span class="inline-flex items-center gap-2 rounded-full bg-[#A9BCAF]/25 px-4 py-2.5 text-sm font-semibold text-[#242C28]">
                        <svg class="h-4 w-4" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m16 0v-2a4 4 0 00-3-3.87M14 3.13a4 4 0 010 7.75M14 7a4 4 0 01-4 4 4 4 0 110-8 4 4 0 014 4z"/>
                        </svg>

                        {{ $trip->places_disponibles }}
                        {{ $trip->places_disponibles > 1 ? 'places disponibles' : 'place disponible' }}
                    </span>

                    @if ($deletable && $trip->is_past)
                        <span class="rounded-full bg-[#858C85]/15 px-3.5 py-2 text-xs font-semibold text-[#858C85]">
                            Trajet passé
                        </span>
                    @endif

                </div>

                {{-- ACTIONS --}}
                @if ($deletable)

                    <form
                        method="POST"
                        action="{{ route('trips.destroy', $trip) }}"
                        class="w-full sm:w-auto"
                        onsubmit="return confirm('Voulez-vous vraiment supprimer ce trajet ? Cette action est irréversible.');"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl border border-[#A9BCAF]/50 bg-white px-5 py-3 text-sm font-semibold text-[#858C85] transition hover:border-red-200 hover:bg-red-50 hover:text-red-700 focus:outline-none focus:ring-4 focus:ring-[#A9BCAF]/40 sm:w-auto"
                        >
                            <svg class="h-4 w-4" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 6h18m-2 0-.9 14H5.9L5 6m4 0V4a1 1 0 011-1h4a1 1 0 011 1v2m-5 4v6m4-6v6"/>
                            </svg>
                            Supprimer le trajet
                        </button>
                    </form>

                @else

                    <a
                        href="tel:{{ $phone }}"
                        class="inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-[#242C28] px-6 py-3 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-[#858C85] focus:outline-none focus:ring-4 focus:ring-[#A9BCAF]/40 sm:w-auto"
                    >
                        Contacter le conducteur

                        <svg class="h-4 w-4" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5 12h14m-6-6 6 6-6 6"/>
                        </svg>
                    </a>

                @endif

            </div>

            {{-- INDICATION DE NAVIGATION --}}
            <div class="mt-5 flex items-center justify-end gap-2 text-xs font-medium text-[#858C85] transition group-hover:text-[#242C28]">
                Voir les détails du trajet
                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1"
                     viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 12h14m-6-6 6 6-6 6"/>
                </svg>
            </div>

        </div>
    </div>
</article>
