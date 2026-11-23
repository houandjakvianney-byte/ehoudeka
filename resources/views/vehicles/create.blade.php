
@extends('layouts.app')

@section('title', 'Enregistrer mon véhicule')

@section('content')
<div class="relative isolate min-h-full overflow-hidden bg-[#F5F2EA]">

    {{-- EN-TÊTE IMMERSIF --}}
    <section class="relative overflow-hidden bg-[#242C28] text-white">

        <div class="pointer-events-none absolute -right-24 -top-32 h-96 w-96 rounded-full bg-[#A9BCAF]/15 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-40 left-1/4 h-80 w-80 rounded-full bg-[#D8C6A0]/10 blur-3xl"></div>

        <div
            class="pointer-events-none absolute inset-0 opacity-[0.06]"
            style="background-image: linear-gradient(rgba(255,255,255,.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.3) 1px, transparent 1px); background-size: 48px 48px;"
        ></div>

        <div class="relative mx-auto grid w-full max-w-7xl items-center gap-10 px-4 py-12 sm:px-6 sm:py-16 lg:grid-cols-[1fr_0.8fr] lg:px-8 lg:py-20">

            {{-- TEXTE --}}
            <div>

                <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-[#A9BCAF]/25 bg-[#A9BCAF]/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.18em] text-[#A9BCAF]">
                    <span class="h-2 w-2 rounded-full bg-[#D8C6A0]"></span>
                    Espace conducteur
                </div>

                <h1 class="max-w-2xl font-heading text-3xl font-bold leading-tight tracking-tight sm:text-4xl lg:text-5xl">
                    Votre véhicule,
                    <span class="text-[#D8C6A0]">votre prochain trajet.</span>
                </h1>

                <p class="mt-5 max-w-xl text-sm leading-7 text-white/65 sm:text-base">
                    Renseignez les informations de votre véhicule pour permettre aux passagers de mieux vous identifier et de voyager en toute confiance.
                </p>

                <div class="mt-8 flex flex-wrap gap-x-6 gap-y-4 text-sm text-white/75">

                    <div class="flex items-center gap-2">
                        <svg class="h-5 w-5 text-[#A9BCAF]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Un seul véhicule par compte
                    </div>

                    <div class="flex items-center gap-2">
                        <svg class="h-5 w-5 text-[#A9BCAF]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-7a2 2 0 00-2-2H6a2 2 0 00-2 2v7a2 2 0 002 2zm10-11V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Informations de votre véhicule
                    </div>

                </div>
            </div>

            {{-- ILLUSTRATION --}}
            <div class="relative mx-auto w-full max-w-lg">

                <div class="absolute inset-8 rounded-full bg-[#A9BCAF]/10 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/[0.04] p-5 shadow-2xl backdrop-blur-sm sm:p-8">

                    <div class="mb-5 flex items-center justify-between gap-3">
                        <span class="text-xs font-bold uppercase tracking-[0.2em] text-white/50">
                            Votre espace véhicule
                        </span>

                        <span class="rounded-full border border-[#D8C6A0]/20 bg-[#D8C6A0]/10 px-3 py-1 text-xs font-semibold text-[#D8C6A0]">
                            Configuration
                        </span>
                    </div>

                    <svg class="mx-auto w-full max-w-sm text-[#A9BCAF]" viewBox="0 0 440 230" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Illustration d'une voiture">

                        <path d="M42 173H398" stroke="currentColor" stroke-opacity=".25" stroke-width="2" stroke-dasharray="7 8"/>

                        <path d="M75 151L91 112C95 102 103 95 114 92L153 81L190 43C196 36 205 32 214 32H285C297 32 307 38 313 48L337 88L369 100C383 105 391 118 391 133V164H75V151Z"
                              fill="#A9BCAF"
                              fill-opacity=".12"
                              stroke="currentColor"
                              stroke-width="3"/>

                        <path d="M164 79L193 49C198 44 205 41 212 41H280C289 41 297 46 302 53L323 88H157L164 79Z"
                              fill="currentColor"
                              fill-opacity=".2"
                              stroke="currentColor"
                              stroke-width="2"/>

                        <path d="M229 42V87" stroke="currentColor" stroke-opacity=".5" stroke-width="2"/>
                        <path d="M94 119H369" stroke="currentColor" stroke-opacity=".35" stroke-width="2"/>
                        <path d="M76 145H100M366 145H390" stroke="#D8C6A0" stroke-width="5" stroke-linecap="round"/>

                        <circle cx="139" cy="164" r="25" fill="#242C28" stroke="currentColor" stroke-width="4"/>
                        <circle cx="139" cy="164" r="10" fill="currentColor"/>

                        <circle cx="329" cy="164" r="25" fill="#242C28" stroke="currentColor" stroke-width="4"/>
                        <circle cx="329" cy="164" r="10" fill="currentColor"/>

                        <path d="M104 188H364" stroke="currentColor" stroke-opacity=".2" stroke-width="2" stroke-linecap="round"/>
                        <path d="M58 202H382" stroke="currentColor" stroke-opacity=".1" stroke-width="2" stroke-linecap="round"/>

                    </svg>

                    <div class="mt-4 grid grid-cols-3 gap-2 border-t border-white/10 pt-5 text-center">

                        <div>
                            <p class="font-heading text-lg font-bold text-white">01</p>
                            <p class="mt-1 text-[10px] uppercase tracking-wider text-white/40">Photo</p>
                        </div>

                        <div>
                            <p class="font-heading text-lg font-bold text-white">02</p>
                            <p class="mt-1 text-[10px] uppercase tracking-wider text-white/40">Plaque</p>
                        </div>

                        <div>
                            <p class="font-heading text-lg font-bold text-white">03</p>
                            <p class="mt-1 text-[10px] uppercase tracking-wider text-white/40">Description</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>


    {{-- FORMULAIRE --}}
    <section class="relative mx-auto w-full max-w-7xl px-4 py-10 sm:px-6 sm:py-14 lg:px-8">

        <div class="mx-auto max-w-3xl">

            {{-- INTRODUCTION --}}
            <div class="mb-8">

                <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#858C85]">
                    Étape de configuration
                </p>

                <h2 class="mt-2 font-heading text-2xl font-bold text-[#242C28] sm:text-3xl">
                    Les informations du véhicule
                </h2>

                <p class="mt-2 text-sm leading-6 text-[#858C85]">
                    Complétez les trois champs ci-dessous. Les informations seront utilisées pour présenter votre véhicule sur vos trajets.
                </p>

            </div>


            {{-- CARTE DU FORMULAIRE --}}
            <div class="overflow-hidden rounded-2xl border border-[#A9BCAF]/35 bg-white shadow-sm">

                <div class="border-b border-[#A9BCAF]/20 bg-[#F5F2EA]/60 px-5 py-4 sm:px-7">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#A9BCAF]/25 text-[#242C28]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 17h14l1-5-2-5H6l-2 5 1 5zm0 0v2m14-2v2M7 12h.01M17 12h.01M7 17a2 2 0 104 0m2 0a2 2 0 104 0"/>
                            </svg>
                        </div>

                        <div>
                            <h3 class="font-heading font-bold text-[#242C28]">
                                Mon véhicule
                            </h3>
                            <p class="text-xs text-[#858C85]">
                                Informations obligatoires
                            </p>
                        </div>

                    </div>
                </div>


                <form
                    method="POST"
                    action="{{ route('vehicle.store') }}"
                    enctype="multipart/form-data"
                    class="space-y-7 p-5 sm:p-7"
                >
                    @csrf

                    {{-- PHOTO --}}
                    <div>

                        <label for="photo" class="mb-2 block text-sm font-semibold text-[#242C28]">
                            Photo du véhicule
                            <span class="text-[#858C85]">*</span>
                        </label>

                        <label
                            for="photo"
                            class="group relative flex cursor-pointer flex-col items-center justify-center overflow-hidden rounded-2xl border-2 border-dashed border-[#A9BCAF] bg-[#F5F2EA]/60 px-5 py-8 text-center transition hover:border-[#858C85] hover:bg-[#A9BCAF]/10"
                        >

                            <div id="vehicle-placeholder" class="flex flex-col items-center">

                                <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#A9BCAF]/25 text-[#242C28] transition group-hover:scale-105">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.5-4.5a2 2 0 012.8 0L15 15m-1-1l1.5-1.5a2 2 0 012.8 0L20 14m-2-7h.01M4 5h16a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                    </svg>
                                </div>

                                <p class="font-semibold text-[#242C28]">
                                    Cliquez pour choisir une photo
                                </p>

                                <p class="mt-1 text-xs text-[#858C85]">
                                    JPG, PNG ou WebP — 40 Mo maximum
                                </p>

                            </div>


                            <div id="vehicle-preview-container" class="hidden w-full">

                                <img
                                    id="vehicle-preview"
                                    src=""
                                    alt="Aperçu du véhicule sélectionné"
                                    class="mx-auto max-h-64 w-full rounded-xl object-contain"
                                >

                                <p id="vehicle-file-name" class="mt-3 break-all text-sm font-semibold text-[#242C28]"></p>

                                <p class="mt-1 text-xs text-[#858C85]">
                                    Cliquez pour changer la photo
                                </p>

                            </div>

                        </label>

                        <input
                            id="photo"
                            name="photo"
                            type="file"
                            accept="image/jpeg,image/png,image/webp"
                            required
                            class="sr-only"
                        >

                        <x-error :messages="$errors->get('photo')" />

                    </div>


                    {{-- PLAQUE --}}
                    <div>

                        <label for="plaque" class="mb-2 block text-sm font-semibold text-[#242C28]">
                            Numéro de plaque
                            <span class="text-[#858C85]">*</span>
                        </label>

                        <div class="relative">

                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-[#858C85]">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 17h16M6 7V5a1 1 0 011-1h10a1 1 0 011 1v2M6 17v2a1 1 0 001 1h10a1 1 0 001-1v-2M4 7h16v10H4z"/>
                                </svg>
                            </div>

                            <input
                                id="plaque"
                                name="plaque"
                                type="text"
                                value="{{ old('plaque') }}"
                                placeholder="AB-123-CD"
                                required
                                autocomplete="off"
                                class="w-full rounded-xl border-[#A9BCAF]/60 bg-white py-3 pl-12 pr-4 text-sm text-[#242C28] shadow-sm transition placeholder:text-[#858C85]/70 focus:border-[#858C85] focus:ring-[#A9BCAF]"
                            >

                        </div>

                        <p class="mt-2 text-xs text-[#858C85]">
                            Saisissez le numéro inscrit sur la plaque d'immatriculation.
                        </p>

                        <x-error :messages="$errors->get('plaque')" />

                    </div>


                    {{-- DESCRIPTION --}}
                    <div>

                        <label for="description" class="mb-2 block text-sm font-semibold text-[#242C28]">
                            Description du véhicule
                            <span class="text-[#858C85]">*</span>
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            required
                            placeholder="Modèle, couleur, particularités (climatisation, coffre…)"
                            class="w-full rounded-xl border-[#A9BCAF]/60 bg-white text-sm text-[#242C28] shadow-sm transition placeholder:text-[#858C85]/70 focus:border-[#858C85] focus:ring-[#A9BCAF]"
                        >{{ old('description') }}</textarea>

                        <p class="mt-2 text-xs text-[#858C85]">
                            Précisez le modèle, la couleur et les équipements utiles aux passagers.
                        </p>

                        <x-error :messages="$errors->get('description')" />

                    </div>


                    {{-- ACTIONS --}}
                    <div class="flex flex-col-reverse gap-3 border-t border-[#A9BCAF]/25 pt-6 sm:flex-row sm:items-center sm:justify-between">

                        <a
                            href="{{ route('vehicle.show') }}"
                            class="inline-flex min-h-12 w-full items-center justify-center rounded-xl border border-[#A9BCAF]/60 bg-white px-6 py-3 text-sm font-semibold text-[#858C85] transition hover:border-[#858C85] hover:bg-[#F5F2EA] sm:w-auto"
                        >
                            Annuler
                        </a>

                        <button
                            type="submit"
                            class="inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-[#242C28] px-7 py-3.5 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-[#35443C] focus:outline-none focus:ring-4 focus:ring-[#A9BCAF]/50 sm:w-auto"
                        >
                            Enregistrer mon véhicule

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
                            </svg>

                        </button>

                    </div>

                </form>
            </div>


            {{-- CONSEIL --}}
            <div class="mt-5 flex gap-3 rounded-xl border border-[#D8C6A0]/60 bg-[#D8C6A0]/15 p-4">

                <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#858C85]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.3 3.86L1.82 18a2 2 0 001.7 3h16.96a2 2 0 001.7-3L13.7 3.86a2 2 0 00-3.4 0z"/>
                </svg>

                <p class="text-xs leading-6 text-[#242C28]">
                    <strong>Conseil :</strong> choisissez une photo nette de votre véhicule et vérifiez que votre plaque est correctement renseignée. Cela aidera les passagers à vous reconnaître au moment du départ.
                </p>

            </div>

        </div>
    </section>

</div>
@endsection


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('photo');
    const placeholder = document.getElementById('vehicle-placeholder');
    const previewContainer = document.getElementById('vehicle-preview-container');
    const preview = document.getElementById('vehicle-preview');
    const fileName = document.getElementById('vehicle-file-name');

    if (!input || !placeholder || !previewContainer || !preview || !fileName) {
        return;
    }

    let currentObjectUrl = null;

    input.addEventListener('change', function () {

        const file = this.files && this.files[0];

        if (!file) {
            return;
        }

        const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

        if (!allowedTypes.includes(file.type)) {
            this.value = '';
            alert('Veuillez sélectionner une image JPG, PNG ou WebP.');
            return;
        }

        if (file.size > 40 * 1024 * 1024) {
            this.value = '';
            alert('La photo ne doit pas dépasser 40 Mo.');
            return;
        }

        if (currentObjectUrl) {
            URL.revokeObjectURL(currentObjectUrl);
        }

        currentObjectUrl = URL.createObjectURL(file);

        preview.src = currentObjectUrl;
        fileName.textContent = file.name;

        placeholder.classList.add('hidden');
        previewContainer.classList.remove('hidden');

    });

    // Libérer l'URL temporaire de l'image à la fermeture de la page.
    window.addEventListener('beforeunload', function () {
        if (currentObjectUrl) {
            URL.revokeObjectURL(currentObjectUrl);
        }
    });

});
</script>
@endpush
