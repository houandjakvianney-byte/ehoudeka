
<div>
    @if (!$trips->isEmpty())
        <div class="mb-6 text-sm text-[#858C85]">
            <span class="font-semibold text-[#242C28]">
                {{ $trips->total() }}
            </span>
            {{ $trips->total() > 1 ? 'trajets disponibles' : 'trajet disponible' }}
        </div>
    @endif

    @if ($trips->isEmpty())
        <div class="rounded-3xl border border-[#A9BCAF]/40 bg-white px-6 py-14 text-center shadow-sm">
            <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-[#F5F2EA]">
                <svg
                    class="h-7 w-7 text-[#858C85]"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6"
                    aria-hidden="true"
                >
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="m20 20-4-4"></path>
                    <path d="M8.5 11h5"></path>
                </svg>
            </div>

            <h3 class="font-heading text-xl font-semibold text-[#242C28]">
                Aucun trajet trouvé
            </h3>

            <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-[#858C85]">
                Nous n'avons trouvé aucun trajet correspondant à ta recherche.
                Essaie avec d'autres villes ou une autre date.
            </p>

            <a
                href="{{ route('home') }}"
                class="mt-6 inline-flex items-center justify-center rounded-xl bg-[#242C28] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#858C85]"
            >
                Voir tous les trajets
            </a>
        </div>
    @else
        <div class="space-y-5">
            @foreach ($trips as $trip)
                <div class="home-reveal">
                    @include('trips.partials.card', ['trip' => $trip])
                </div>
            @endforeach
        </div>

        @if ($trips->hasPages())
            <div class="mt-10 home-reveal">
                {{ $trips->links() }}
            </div>
        @endif
    @endif
</div>
