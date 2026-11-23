@extends('layouts.app')

@section('title', 'Créer un compte')

@push('head')
<style>
    .register-page {
        --sage: #A9BCAF;
        --champagne: #D8C6A0;
        --ivory: #F5F2EA;
        --white: #FFFFFF;
        --charcoal: #242C28;
        --muted: #858C85;

        background: var(--ivory);
        color: var(--charcoal);
        min-height: 100vh;
        padding: 3.5rem 1.25rem;
    }

    .register-layout {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 0.9fr 1.1fr;
        gap: 4rem;
        align-items: center;
    }

    /* INTRODUCTION */

    .register-intro {
        position: relative;
        padding: 2rem 0;
    }

    .register-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.7rem;
        color: var(--muted);
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .register-eyebrow::before {
        content: "";
        width: 28px;
        height: 1px;
        background: var(--champagne);
    }

    .register-title {
        margin-top: 2rem;
        font-size: clamp(2.8rem, 5vw, 4.7rem);
        line-height: 1.03;
        letter-spacing: -0.065em;
        font-weight: 700;
    }

    .register-title span {
        display: block;
        color: var(--muted);
        font-family: Georgia, serif;
        font-weight: 400;
        font-style: italic;
    }

    .register-description {
        max-width: 390px;
        margin-top: 1.5rem;
        color: var(--muted);
        font-size: 0.98rem;
        line-height: 1.9;
    }

    .register-visual {
        position: relative;
        margin-top: 3rem;
        min-height: 205px;
        overflow: hidden;
        border-radius: 1.5rem;
        background: var(--charcoal);
        padding: 1.6rem;
        color: var(--white);
    }

    .register-visual::before,
    .register-visual::after {
        content: "";
        position: absolute;
        border: 1px solid rgba(169, 188, 175, 0.22);
        border-radius: 50%;
        pointer-events: none;
    }

    .register-visual::before {
        width: 270px;
        height: 270px;
        right: -65px;
        top: -130px;
    }

    .register-visual::after {
        width: 190px;
        height: 190px;
        right: -25px;
        top: -90px;
    }

    .visual-number {
        position: relative;
        z-index: 1;
        color: var(--champagne);
        font-size: 0.72rem;
        letter-spacing: 0.15em;
        font-weight: 700;
    }

    .visual-message {
        position: relative;
        z-index: 1;
        max-width: 270px;
        margin-top: 2rem;
        font-family: Georgia, serif;
        font-size: 1.65rem;
        line-height: 1.3;
    }

    .visual-message em {
        color: var(--sage);
    }

    .visual-route {
        position: absolute;
        right: 1.5rem;
        bottom: 1.5rem;
        width: 100px;
        height: 55px;
        opacity: 0.8;
    }

    .register-note {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-top: 1.5rem;
        color: var(--muted);
        font-size: 0.8rem;
    }

    .register-note svg {
        flex-shrink: 0;
        color: var(--sage);
    }

    /* FORMULAIRE */

    .register-card {
        position: relative;
        background: var(--white);
        border: 1px solid rgba(36, 44, 40, 0.06);
        border-radius: 1.5rem;
        padding: clamp(1.5rem, 4vw, 2.75rem);
        box-shadow: 0 20px 60px rgba(36, 44, 40, 0.055);
    }

    .register-card-header {
        margin-bottom: 2rem;
    }

    .register-card-header h2 {
        font-size: 1.65rem;
        font-weight: 700;
        letter-spacing: -0.04em;
    }

    .register-card-header p {
        margin-top: 0.45rem;
        color: var(--muted);
        font-size: 0.88rem;
    }

    .register-form {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .register-form .field label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--charcoal);
        font-size: 0.8rem;
        font-weight: 600;
    }

    .register-form .field input {
        width: 100%;
        min-height: 48px;
        padding: 0.75rem 0.9rem;
        border: 1px solid #E8E8E2;
        border-radius: 0.75rem;
        background: #FCFCFA;
        color: var(--charcoal);
        font-size: 0.9rem;
        outline: none;
        transition: border-color 180ms ease, box-shadow 180ms ease, background 180ms ease;
    }

    .register-form .field input::placeholder {
        color: #A5AAA4;
    }

    .register-form .field input:hover {
        border-color: var(--sage);
    }

    .register-form .field input:focus {
        border-color: var(--sage);
        background: var(--white);
        box-shadow: 0 0 0 3px rgba(169, 188, 175, 0.2);
    }

    .register-form .field input.is-invalid {
        border-color: #B86B63;
    }

    .register-form .field-error {
        margin-top: 0.4rem;
        color: #A34E47;
        font-size: 0.75rem;
    }

    .register-form .field-help {
        margin-top: 0.45rem;
        color: var(--muted);
        font-size: 0.73rem;
    }

    .register-fields-row {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1rem;
    }

    .register-submit {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.7rem;
        width: 100%;
        min-height: 52px;
        margin-top: 0.35rem;
        padding: 0.9rem 1.2rem;
        border: 0;
        border-radius: 0.8rem;
        background: var(--charcoal);
        color: var(--white);
        font-size: 0.88rem;
        font-weight: 700;
        cursor: pointer;
        transition: background 180ms ease, transform 180ms ease;
    }

    .register-submit:hover {
        background: #38443D;
        transform: translateY(-2px);
    }

    .register-submit:focus-visible {
        outline: 3px solid var(--sage);
        outline-offset: 3px;
    }

    .register-divider {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin: 1.5rem 0;
        color: var(--muted);
        font-size: 0.7rem;
    }

    .register-divider::before,
    .register-divider::after {
        content: "";
        height: 1px;
        flex: 1;
        background: #ECECE7;
    }

    .register-login {
        text-align: center;
        color: var(--muted);
        font-size: 0.84rem;
    }

    .register-login a {
        color: var(--charcoal);
        font-weight: 700;
        text-decoration: underline;
        text-decoration-color: var(--champagne);
        text-decoration-thickness: 2px;
        text-underline-offset: 4px;
        transition: color 180ms ease;
    }

    .register-login a:hover {
        color: var(--muted);
    }

    @media (max-width: 850px) {
        .register-layout {
            max-width: 600px;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .register-intro {
            padding: 0;
        }

        .register-title {
            margin-top: 1.25rem;
            font-size: clamp(2.7rem, 9vw, 4rem);
        }

        .register-visual {
            display: none;
        }

        .register-note {
            margin-top: 1rem;
        }
    }

    @media (max-width: 480px) {
        .register-page {
            padding: 2rem 1rem;
        }

        .register-layout {
            gap: 1.5rem;
        }

        .register-title {
            font-size: 2.7rem;
        }

        .register-card {
            padding: 1.4rem;
            border-radius: 1.2rem;
        }

        .register-fields-row {
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }

        .register-form {
            gap: 1.1rem;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .register-page *,
        .register-page *::before,
        .register-page *::after {
            transition-duration: 0.01ms !important;
            animation-duration: 0.01ms !important;
        }
    }
</style>
@endpush

@section('content')
<div class="register-page">
    <div class="register-layout">

        {{-- INTRODUCTION --}}
        <section class="register-intro">
            <span class="register-eyebrow">Bienvenue chez EhouDeka</span>

            <h1 class="register-title">
                La route est
                <span>plus belle ensemble.</span>
            </h1>

            <p class="register-description">
                Créez votre compte et découvrez une nouvelle façon
                de partager vos trajets. Quelques informations suffisent
                pour commencer votre aventure.
            </p>

            <div class="register-visual">
                <span class="visual-number">EHOUDEKA — 01</span>

                <p class="visual-message">
                    Chaque trajet commence par une
                    <em>rencontre.</em>
                </p>

                <svg class="visual-route" viewBox="0 0 110 60" fill="none" aria-hidden="true">
                    <path d="M5 48C25 48 25 12 53 12S78 48 105 48"
                          stroke="#A9BCAF" stroke-width="1.5"
                          stroke-dasharray="4 5" stroke-linecap="round"/>
                    <circle cx="5" cy="48" r="4" fill="#D8C6A0"/>
                    <circle cx="105" cy="48" r="4" fill="#D8C6A0"/>
                    <circle cx="53" cy="12" r="4" fill="#A9BCAF"/>
                </svg>
            </div>

            <div class="register-note">
                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M12 3L19 6V11C19 16 15.5 19.5 12 21C8.5 19.5 5 16 5 11V6L12 3Z"
                          stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                    <path d="M9 12L11 14L15 10"
                          stroke="currentColor" stroke-width="1.5"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Une inscription simple pour commencer.</span>
            </div>
        </section>

        {{-- FORMULAIRE --}}
        <section class="register-card">
            <div class="register-card-header">
                <h2>Créer mon compte</h2>
                <p>Renseignez vos informations pour rejoindre EhouDeka.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="register-form">
                @csrf

                <div class="register-fields-row">
                    <div class="field">
                        <label for="prenom">Prénom</label>
                        <input
                            id="prenom"
                            name="prenom"
                            type="text"
                            value="{{ old('prenom') }}"
                            placeholder="Votre prénom"
                            autocomplete="given-name"
                            class="@error('prenom') is-invalid @enderror"
                            required
                            autofocus
                        >
                        @error('prenom')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="nom">Nom</label>
                        <input
                            id="nom"
                            name="nom"
                            type="text"
                            value="{{ old('nom') }}"
                            placeholder="Votre nom"
                            autocomplete="family-name"
                            class="@error('nom') is-invalid @enderror"
                            required
                        >
                        @error('nom')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="telephone">Numéro de téléphone</label>
                    <input
                        id="telephone"
                        name="telephone"
                        type="tel"
                        value="{{ old('telephone') }}"
                        placeholder="+228 90 00 00 00"
                        autocomplete="tel"
                        class="@error('telephone') is-invalid @enderror"
                        required
                    >
                    @error('telephone')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="email">Adresse e-mail</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        placeholder="vous@exemple.com"
                        autocomplete="email"
                        class="@error('email') is-invalid @enderror"
                        required
                    >
                    @error('email')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="password">Mot de passe</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Choisissez un mot de passe"
                        autocomplete="new-password"
                        class="@error('password') is-invalid @enderror"
                        required
                    >
                    <p class="field-help">Minimum 8 caractères.</p>
                    @error('password')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Saisissez à nouveau le mot de passe"
                        autocomplete="new-password"
                        class="@error('password_confirmation') is-invalid @enderror"
                        required
                    >
                    @error('password_confirmation')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="register-submit">
                    Créer mon compte
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M5 12H19M12 5L19 12L12 19"
                              stroke="currentColor" stroke-width="1.7"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </form>

            <div class="register-divider">VOUS AVEZ DÉJÀ UN COMPTE ?</div>

            <p class="register-login">
                <a href="{{ route('login') }}">Se connecter à mon compte</a>
            </p>
        </section>

    </div>
</div>
@endsection
