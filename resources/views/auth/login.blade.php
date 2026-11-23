@extends('layouts.app')

@section('title', 'Connexion')

@push('head')
<style>
    .login-page {
        --sage: #A9BCAF;
        --champagne: #D8C6A0;
        --ivory: #F5F2EA;
        --white: #FFFFFF;
        --charcoal: #242C28;
        --muted: #858C85;

        min-height: calc(100vh - 5rem);
        background: var(--ivory);
        color: var(--charcoal);
    }

    .login-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: calc(100vh - 5rem);
    }

   

    .login-aside {
        position: relative;
        isolation: isolate;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
        padding: clamp(2.5rem, 5vw, 5rem);
        background: var(--charcoal);
        color: var(--white);
    }

    .login-aside::before {
        content: "";
        position: absolute;
        z-index: -1;
        width: 480px;
        height: 480px;
        top: 15%;
        right: -230px;
        border: 1px solid rgba(169, 188, 175, 0.2);
        border-radius: 50%;
        box-shadow:
            0 0 0 45px rgba(169, 188, 175, 0.035),
            0 0 0 90px rgba(169, 188, 175, 0.025);
    }

    .login-aside::after {
        content: "";
        position: absolute;
        z-index: -1;
        width: 300px;
        height: 300px;
        left: -180px;
        bottom: -120px;
        border-radius: 50%;
        background: rgba(216, 198, 160, 0.09);
        filter: blur(65px);
    }

    .login-grid-pattern {
        position: absolute;
        z-index: -1;
        inset: 0;
        opacity: 0.07;
        pointer-events: none;
        background-image: radial-gradient(#fff 1px, transparent 1px);
        background-size: 28px 28px;
    }

    .login-brand {
        display: inline-flex;
        align-items: center;
        gap: 0.85rem;
        color: var(--white);
        text-decoration: none;
    }

    .login-brand-icon {
        display: flex;
        width: 45px;
        height: 45px;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.13);
        border-radius: 13px;
        background: rgba(255,255,255,0.08);
    }

    .login-brand-icon img {
        width: 25px;
        height: 25px;
        object-fit: contain;
    }

    .login-brand-name {
        font-size: 1.2rem;
        font-weight: 700;
        letter-spacing: -0.04em;
    }

    .login-aside-content {
        position: relative;
        max-width: 540px;
        margin: 4rem 0;
    }

    .login-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        color: var(--sage);
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .login-eyebrow::before {
        content: "";
        width: 26px;
        height: 1px;
        background: var(--champagne);
    }

    .login-aside-title {
        margin-top: 2rem;
        font-size: clamp(2.8rem, 4.3vw, 4.5rem);
        line-height: 1.08;
        font-weight: 700;
        letter-spacing: -0.065em;
    }

    .login-aside-title span {
        display: block;
        color: var(--sage);
        font-family: Georgia, serif;
        font-weight: 400;
        font-style: italic;
        letter-spacing: -0.045em;
    }

    .login-aside-description {
        max-width: 390px;
        margin-top: 1.5rem;
        color: rgba(255,255,255,0.58);
        font-size: 0.95rem;
        line-height: 1.9;
    }

   

    .login-illustration {
        position: relative;
        margin-top: 3.5rem;
        padding: 1.5rem;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 1.25rem;
        background: rgba(255,255,255,0.045);
    }

    .login-illustration-top {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .login-illustration-icon {
        display: flex;
        width: 46px;
        height: 46px;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: rgba(169,188,175,0.13);
        color: var(--sage);
    }

    .login-illustration-title {
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--white);
    }

    .login-illustration-subtitle {
        margin-top: 0.3rem;
        font-size: 0.73rem;
        color: rgba(255,255,255,0.48);
    }

    .login-route {
        position: relative;
        display: flex;
        align-items: center;
        margin-top: 2rem;
        padding: 0 0.25rem;
    }

    .login-route-point {
        position: relative;
        z-index: 1;
        width: 9px;
        height: 9px;
        flex-shrink: 0;
        border: 2px solid var(--charcoal);
        border-radius: 50%;
        background: var(--champagne);
        box-shadow: 0 0 0 1px var(--champagne);
    }

    .login-route-line {
        flex: 1;
        height: 1px;
        margin: 0 0.4rem;
        background: repeating-linear-gradient(
            to right,
            rgba(169,188,175,0.7) 0,
            rgba(169,188,175,0.7) 5px,
            transparent 5px,
            transparent 10px
        );
    }

    .login-aside-footer {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 1rem;
        color: rgba(255,255,255,0.38);
        font-size: 0.7rem;
    }

   

    .login-main {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem clamp(1.5rem, 6vw, 6rem);
    }

    .login-form-wrapper {
        width: 100%;
        max-width: 430px;
    }

    .login-mobile-brand {
        display: none;
    }

    .login-form-header {
        margin-bottom: 2.5rem;
    }

    .login-form-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.65rem;
        color: var(--muted);
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
    }

    .login-form-eyebrow::before {
        content: "";
        width: 23px;
        height: 1px;
        background: var(--champagne);
    }

    .login-form-title {
        margin-top: 1.1rem;
        font-size: clamp(2.5rem, 4vw, 3.5rem);
        font-weight: 700;
        letter-spacing: -0.065em;
        line-height: 1.1;
    }

    .login-form-title span {
        color: var(--sage);
    }

    .login-form-description {
        margin-top: 1rem;
        color: var(--muted);
        font-size: 0.9rem;
        line-height: 1.8;
    }

   

    .login-status {
        display: flex;
        align-items: flex-start;
        gap: 0.8rem;
        margin-bottom: 1.5rem;
        padding: 1rem;
        border: 1px solid rgba(169,188,175,0.6);
        border-radius: 0.85rem;
        background: rgba(169,188,175,0.17);
        color: var(--charcoal);
        font-size: 0.82rem;
        line-height: 1.6;
    }

    .login-status svg {
        flex-shrink: 0;
        margin-top: 1px;
        color: #617B68;
    }

   

    .login-form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .login-field label {
        display: block;
        margin-bottom: 0.6rem;
        color: var(--charcoal);
        font-size: 0.8rem;
        font-weight: 600;
    }

    .login-input-wrapper {
        position: relative;
    }

    .login-input-icon {
        position: absolute;
        top: 50%;
        left: 1rem;
        display: flex;
        transform: translateY(-50%);
        pointer-events: none;
        color: var(--muted);
    }

    .login-input-wrapper input {
        width: 100%;
        min-height: 53px;
        padding: 0.8rem 3rem 0.8rem 3rem;
        border: 1px solid #E8E8E2;
        border-radius: 0.8rem;
        outline: none;
        background: rgba(255,255,255,0.85);
        color: var(--charcoal);
        font-size: 0.88rem;
        transition: border-color 180ms ease, box-shadow 180ms ease;
    }

    .login-input-wrapper input::placeholder {
        color: #A5AAA4;
    }

    .login-input-wrapper input:hover {
        border-color: var(--sage);
    }

    .login-input-wrapper input:focus {
        border-color: var(--sage);
        background: var(--white);
        box-shadow: 0 0 0 3px rgba(169,188,175,0.2);
    }

    .login-input-wrapper input.is-invalid {
        border-color: #B86B63;
    }

    .login-field-error {
        margin-top: 0.5rem;
        color: #A34E47;
        font-size: 0.75rem;
    }

   

    .login-password-toggle {
        position: absolute;
        top: 50%;
        right: 0.9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        transform: translateY(-50%);
        border: 0;
        border-radius: 7px;
        background: transparent;
        color: var(--muted);
        cursor: pointer;
        transition: background 180ms ease, color 180ms ease;
    }

    .login-password-toggle:hover {
        background: var(--ivory);
        color: var(--charcoal);
    }

    .login-password-toggle:focus-visible {
        outline: 2px solid var(--sage);
        outline-offset: 2px;
    }

   

    .login-options {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-top: -0.2rem;
    }

    .login-remember {
        display: inline-flex;
        align-items: center;
        gap: 0.65rem;
        cursor: pointer;
        color: var(--muted);
        font-size: 0.8rem;
    }

    .login-remember input {
        width: 16px;
        height: 16px;
        accent-color: var(--charcoal);
        cursor: pointer;
    }

   

    .login-submit {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
        width: 100%;
        min-height: 54px;
        margin-top: 0.2rem;
        padding: 0.9rem 1.2rem;
        border: 0;
        border-radius: 0.85rem;
        background: var(--charcoal);
        color: var(--white);
        font-size: 0.88rem;
        font-weight: 700;
        cursor: pointer;
        transition: transform 180ms ease, background 180ms ease;
    }

    .login-submit:hover {
        transform: translateY(-2px);
        background: #38443D;
    }

    .login-submit:focus-visible {
        outline: 3px solid var(--sage);
        outline-offset: 3px;
    }

    .login-submit svg {
        transition: transform 180ms ease;
    }

    .login-submit:hover svg {
        transform: translateX(4px);
    }

   

    .login-register {
        margin-top: 2rem;
        padding-top: 1.6rem;
        border-top: 1px solid rgba(36,44,40,0.09);
        text-align: center;
        color: var(--muted);
        font-size: 0.84rem;
    }

    .login-register a {
        margin-left: 0.3rem;
        color: var(--charcoal);
        font-weight: 700;
        text-decoration: underline;
        text-decoration-color: var(--champagne);
        text-decoration-thickness: 2px;
        text-underline-offset: 4px;
        transition: color 180ms ease;
    }

    .login-register a:hover {
        color: var(--muted);
    }

    .login-copyright {
        margin-top: 2.5rem;
        text-align: center;
        color: var(--muted);
        font-size: 0.7rem;
    }

    @media (max-width: 1023px) {
        .login-layout {
            grid-template-columns: 1fr;
        }

        .login-aside {
            display: none;
        }

        .login-main {
            min-height: calc(100vh - 5rem);
            padding: 3rem 1.5rem;
        }

        .login-mobile-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 3rem;
        }

        .login-mobile-brand-icon {
            display: flex;
            width: 43px;
            height: 43px;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 12px;
            background: var(--charcoal);
        }

        .login-mobile-brand-icon img {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }

        .login-mobile-brand-name {
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: -0.04em;
        }
    }

    @media (max-width: 480px) {
        .login-main {
            padding: 2rem 1.15rem;
        }

        .login-mobile-brand {
            margin-bottom: 2.5rem;
        }

        .login-form-header {
            margin-bottom: 2rem;
        }

        .login-form-title {
            font-size: 2.65rem;
        }

        .login-options {
            flex-wrap: wrap;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .login-page *,
        .login-page *::before,
        .login-page *::after {
            transition-duration: 0.01ms !important;
            animation-duration: 0.01ms !important;
        }
    }
</style>
@endpush

@section('content')
<section class="login-page">
    <div class="login-layout">

        {{-- PANNEAU DE PRÉSENTATION --}}
        <aside class="login-aside">
            <div class="login-grid-pattern"></div>

            <div>
                <a href="{{ route('home') }}" class="login-brand">
                    <div>
                        <img src="{{ asset('favicon.svg') }}" alt="EhouDeka">
                    </div>

                    <span class="login-brand-name">EhouDeka</span>
                </a>
            </div>

            <div class="login-aside-content">
                <span class="login-eyebrow">
                    Votre espace de mobilité
                </span>

                <h2 class="login-aside-title">
                    La route est plus belle
                    <span>ensemble.</span>
                </h2>

                <p class="login-aside-description">
                    Retrouvez votre espace personnel, gérez votre véhicule
                    et retrouvez facilement vos trajets publiés.
                </p>

                <div class="login-illustration">
                    <div class="login-illustration-top">
                        <div class="login-illustration-icon">
                            <svg class="h-6 w-6" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.6" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 21s7-5.5 7-12a7 7 0 1 0-14 0c0 6.5 7 12 7 12Z"/>
                                <circle cx="12" cy="9" r="2.5"/>
                            </svg>
                        </div>

                        <div>
                            <p class="login-illustration-title">
                                Un trajet, plusieurs possibilités
                            </p>
                            <p class="login-illustration-subtitle">
                                Retrouvez votre espace en quelques instants.
                            </p>
                        </div>
                    </div>

                    <div class="login-route" aria-hidden="true">
                        <span class="login-route-point"></span>
                        <span class="login-route-line"></span>
                        <span class="login-route-point"></span>
                    </div>
                </div>
            </div>

            <div class="login-aside-footer">
                <span>© {{ date('Y') }} EhouDeka</span>
                <span>Ensemble, facilitons nos déplacements.</span>
            </div>
        </aside>

        {{-- FORMULAIRE DE CONNEXION --}}
        <main class="login-main">
            <div class="login-form-wrapper">

                {{-- IDENTITÉ MOBILE --}}
                <a href="{{ route('home') }}" class="login-mobile-brand">
                    <div class="login-mobile-brand-icon">
                        <img src="{{ asset('favicon.svg') }}" alt="EhouDeka">
                    </div>
                    <span class="login-mobile-brand-name">EhouDeka</span>
                </a>

                {{-- EN-TÊTE --}}
                <div class="login-form-header">
                    <span class="login-form-eyebrow">
                        Heureux de vous revoir
                    </span>

                    <h1 class="login-form-title">
                        Connexion<span>.</span>
                    </h1>

                    <p class="login-form-description">
                        Connectez-vous à votre compte pour retrouver
                        votre espace personnel.
                    </p>
                </div>

                {{-- MESSAGE DE SESSION --}}
                @if (session('status'))
                    <div class="login-status" role="status" aria-live="polite">
                        <svg class="h-5 w-5" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m5 12 4 4L19 6"/>
                        </svg>

                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                {{-- FORMULAIRE --}}
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf

                    {{-- EMAIL --}}
                    <div class="login-field">
                        <label for="email">Adresse e-mail</label>

                        <div class="login-input-wrapper">
                            <span class="login-input-icon">
                                <svg class="h-5 w-5" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor"
                                     stroke-width="1.7" aria-hidden="true">
                                    <rect x="3" y="5" width="18" height="14" rx="2"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m3 7 9 6 9-6"/>
                                </svg>
                            </span>

                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="vous@exemple.com"
                                class="@error('email') is-invalid @enderror"
                            >
                        </div>

                        @error('email')
                            <p class="login-field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- MOT DE PASSE --}}
                    <div class="login-field">
                        <label for="password">Mot de passe</label>

                        <div class="login-input-wrapper">
                            <span class="login-input-icon">
                                <svg class="h-5 w-5" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor"
                                     stroke-width="1.7" aria-hidden="true">
                                    <rect x="4" y="10" width="16" height="11" rx="2"/>
                                    <path stroke-linecap="round"
                                          d="M8 10V7a4 4 0 1 1 8 0v3"/>
                                </svg>
                            </span>

                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                autocomplete="current-password"
                                placeholder="Votre mot de passe"
                                class="@error('password') is-invalid @enderror"
                            >

                            <button
                                type="button"
                                class="login-password-toggle"
                                id="toggle-password"
                                aria-label="Afficher le mot de passe"
                                aria-pressed="false"
                            >
                                <svg id="password-eye" class="h-5 w-5"
                                     viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="1.7"
                                     aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>

                        @error('password')
                            <p class="login-field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- SE SOUVENIR --}}
                    <div class="login-options">
                        <label for="remember" class="login-remember">
                            <input
                                id="remember"
                                name="remember"
                                type="checkbox"
                                value="1"
                            >
                            <span>Se souvenir de moi</span>
                        </label>
                    </div>

                    {{-- BOUTON --}}
                    <button type="submit" class="login-submit">
                        Se connecter

                        <svg class="h-4 w-4" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5 12h14m-7-7 7 7-7 7"/>
                        </svg>
                    </button>
                </form>

                {{-- INSCRIPTION --}}
                <div class="login-register">
                    Pas encore de compte ?
                    <a href="{{ route('register') }}">S'inscrire</a>
                </div>

                <p class="login-copyright">
                    © {{ date('Y') }} EhouDeka. Tous droits réservés.
                </p>
            </div>
        </main>

    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('toggle-password');
        const eyeIcon = document.getElementById('password-eye');

        if (!passwordInput || !toggleButton || !eyeIcon) {
            return;
        }

        toggleButton.addEventListener('click', function () {
            const isPasswordHidden = passwordInput.type === 'password';

            passwordInput.type = isPasswordHidden ? 'text' : 'password';

            toggleButton.setAttribute(
                'aria-label',
                isPasswordHidden
                    ? 'Masquer le mot de passe'
                    : 'Afficher le mot de passe'
            );

            toggleButton.setAttribute(
                'aria-pressed',
                isPasswordHidden ? 'true' : 'false'
            );

            eyeIcon.innerHTML = isPasswordHidden
                ? '<path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18M10.6 10.6a2 2 0 0 0 2.8 2.8"/><path stroke-linecap="round" stroke-linejoin="round" d="M9.9 5.2A10.7 10.7 0 0 1 12 5c6.5 0 10 7 10 7a16 16 0 0 1-3.1 3.8M6.2 6.2C3.5 8 2 12 2 12s3.5 7 10 7c1.2 0 2.3-.2 3.3-.6"/>'
                : '<path stroke-linecap="round" stroke-linejoin="round" d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>';
        });
    });
</script>
@endpush
