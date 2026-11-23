
@extends('layouts.app')

@section('title', 'Modifier mon véhicule')

@section('content')

<div class="min-h-screen bg-[#F5F2EA]">

    {{-- HERO --}}
    <section class="relative isolate overflow-hidden bg-[#242C28] text-white">
        <div class="pointer-events-none absolute -right-24 -top-32 h-96 w-96 rounded-full bg-[#A9BCAF]/15 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-40 left-1/3 h-80 w-80 rounded-full bg-[#D8C6A0]/10 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            <a href="{{ route('vehicle.show') }}"
               class="inline-flex items-center gap-2 text-sm text-white/60 transition hover:text-white">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m15 18-6-6 6-6"/>
                </svg>
                Retour à mon véhicule
            </a>

            <div class="mt-7 max-w-2xl">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#A9BCAF]">
                    Espace conducteur
                </span>

                <h1 class="mt-3 font-heading text-3xl font-bold sm:text-4xl">
                    Modifier mon véhicule<span class="text-[#D8C6A0]">.</span>
                </h1>

                <p class="mt-3 text-sm leading-7 text-white/60">
                    Votre voiture a changé ? Actualisez sa photo, sa plaque
                    d'immatriculation et sa description.
                </p>
            </div>
        </div>
    </section>

    {{-- FORMULAIRE --}}
    <section class="mx-auto max-w-4xl px-4 py-10 sm:px-6 sm:py-14 lg:px-8">

        <form action="{{ route('vehicle.update') }}"
              method="POST"
              enctype="multipart/form-data"
              class="overflow-hidden rounded-3xl border border-[#A9BCAF]/30 bg-white shadow-sm">

            @csrf
            @method('PATCH')

            <div class="border-b border-[#A9BCAF]/20 px-6 py-6 sm:px-8">
                <h2 class="font-heading text-xl font-bold text-[#242C28]">
                    Informations du véhicule
                </h2>
                <p class="mt-1 text-sm text-[#858C85]">
                    Modifiez les informations que vous souhaitez actualiser.
                </p>
            </div>

            <div class="space-y-8 p-6 sm:p-8">

                {{-- PHOTO --}}
                <div>
                    <label class="mb-3 block text-sm font-bold text-[#242C28]">
                        Photo du véhicule
                    </label>

                    <div class="overflow-hidden rounded-2xl border border-[#A9BCAF]/30 bg-[#F5F2EA]">

                        <div class="relative">
                            <img
                                id="vehicle-preview"
                                src="{{ $vehicle->photo_url }}"
                                alt="Photo actuelle de votre véhicule"
                                class="h-56 w-full object-cover sm:h-72"
                            >

                            <span class="absolute bottom-3 left-3 rounded-full bg-[#242C28]/75 px-3 py-1.5 text-xs font-semibold text-white backdrop-blur">
                                Aperçu du véhicule
                            </span>
                        </div>

                        <div class="p-5">
                            <label for="photo"
                                   class="inline-flex min-h-11 cursor-pointer items-center justify-center gap-2 rounded-xl border border-[#A9BCAF]/50 bg-white px-5 py-3 text-sm font-bold text-[#242C28] transition hover:bg-[#F5F2EA]">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 4v12m-5-5 5 5 5-5"/>
                                </svg>

                                Choisir une nouvelle photo
                            </label>

                            <input
                                type="file"
                                name="photo"
                                id="photo"
                                accept="image/jpeg,image/png,image/webp"
                                class="sr-only"
                            >

                            <p class="mt-3 text-xs leading-5 text-[#858C85]">
                                JPEG, PNG ou WebP. Maximum 2 Mo.
                                Laissez ce champ vide pour conserver la photo actuelle.
                            </p>

                            @error('photo')
                                <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- PLAQUE --}}
                <div>
                    <label for="plaque" class="mb-2 block text-sm font-bold text-[#242C28]">
                        Plaque d'immatriculation
                    </label>

                    <input
                        type="text"
                        name="plaque"
                        id="plaque"
                        value="{{ old('plaque', $vehicle->plaque) }}"
                        required
                        maxlength="20"
                        placeholder="Ex. : TG-1234-AB"
                        class="w-full rounded-xl border border-[#A9BCAF]/40 bg-white px-4 py-3.5 text-sm text-[#242C28] outline-none transition placeholder:text-[#858C85]/60 focus:border-[#242C28] focus:ring-4 focus:ring-[#A9BCAF]/20"
                    >

                    @error('plaque')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- DESCRIPTION --}}
                <div>
                    <label for="description" class="mb-2 block text-sm font-bold text-[#242C28]">
                        Description du véhicule
                    </label>

                    <textarea
                        name="description"
                        id="description"
                        rows="5"
                        required
                        maxlength="1000"
                        placeholder="Décrivez votre véhicule : marque, modèle, couleur, nombre de places..."
                        class="w-full resize-y rounded-xl border border-[#A9BCAF]/40 bg-white px-4 py-3.5 text-sm leading-6 text-[#242C28] outline-none transition placeholder:text-[#858C85]/60 focus:border-[#242C28] focus:ring-4 focus:ring-[#A9BCAF]/20"
                    >{{ old('description', $vehicle->description) }}</textarea>

                    @error('description')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- INFORMATION --}}
                <div class="flex gap-3 rounded-2xl border border-[#D8C6A0]/50 bg-[#D8C6A0]/15 p-4">
                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#858C85]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.3 3.86L1.82 18a2 2 0 001.7 3h16.96a2 2 0 001.7-3L13.7 3.86a2 2 0 00-3.4 0z"/>
                    </svg>

                    <p class="text-xs leading-6 text-[#242C28]">
                        <strong>À savoir :</strong>
                        vos modifications remplaceront les informations actuelles
                        de votre véhicule. Vérifiez bien votre plaque avant de sauvegarder.
                    </p>
                </div>

            </div>

            {{-- ACTIONS --}}
            <div class="flex flex-col-reverse gap-3 border-t border-[#A9BCAF]/20 bg-[#F5F2EA]/60 px-6 py-5 sm:flex-row sm:justify-end sm:px-8">

                <a href="{{ route('vehicle.show') }}"
                   class="inline-flex min-h-12 items-center justify-center rounded-xl border border-[#A9BCAF]/50 bg-white px-6 py-3 text-sm font-bold text-[#242C28] transition hover:bg-[#F5F2EA]">
                    Annuler
                </a>

                <button type="submit"
                        class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-[#242C28] px-7 py-3 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-[#35443C] focus:outline-none focus:ring-4 focus:ring-[#A9BCAF]/40">

                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6"/>
                    </svg>

                    Enregistrer les modifications
                </button>

            </div>

        </form>
    </section>
</div>

{{-- APERÇU DE LA NOUVELLE PHOTO --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('photo');
        const preview = document.getElementById('vehicle-preview');

        if (!input || !preview) return;

        let previewUrl = null;

        input.addEventListener('change', function () {
            const file = this.files[0];

            if (!file) return;

            if (previewUrl) {
                URL.revokeObjectURL(previewUrl);
            }

            previewUrl = URL.createObjectURL(file);
            preview.src = previewUrl;
        });
    });
</script>

@endsection
