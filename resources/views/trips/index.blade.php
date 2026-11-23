
@extends('layouts.app')

@section('title', 'Trouvez votre prochain trajet')

@push('head')
<style>
    :root {
        --home-sage: #A9BCAF;
        --home-champagne: #D8C6A0;
        --home-ivory: #F5F2EA;
        --home-white: #FFFFFF;
        --home-charcoal: #242C28;
        --home-muted: #858C85;
        --home-ease: cubic-bezier(.2,.75,.25,1);
    }

    /* =====================================================
       BASE & LOADER
    ===================================================== */

    .home-page {
        overflow: clip;
        background: var(--home-ivory);
        color: var(--home-charcoal);
    }

    .home-loader {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: grid;
        place-items: center;
        background: var(--home-charcoal);
        transition: opacity .65s ease, visibility .65s ease;
    }

    .home-loader.is-hidden {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
    }

    .loader-content {
        width: min(85%, 300px);
        text-align: center;
    }

    .loader-logo {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        color: white;
        font-family: var(--font-heading);
        font-size: 28px;
        font-weight: 700;
        letter-spacing: -.06em;
    }

    .loader-logo-mark {
        display: grid;
        width: 46px;
        height: 46px;
        place-items: center;
        border: 1px solid rgba(169,188,175,.35);
        border-radius: 15px;
        background: rgba(169,188,175,.09);
    }

    .loader-logo-mark svg {
        width: 27px;
    }

    .loader-route {
        position: relative;
        height: 2px;
        margin-top: 42px;
        background: rgba(255,255,255,.13);
    }

    .loader-route-fill {
        width: 0;
        height: 100%;
        background: var(--home-sage);
        animation: loaderProgress 1.5s ease forwards;
    }

    .loader-car {
        position: absolute;
        top: -13px;
        left: 0;
        width: 30px;
        animation: loaderCar 1.5s ease forwards;
    }

    .loader-caption {
        margin-top: 22px;
        color: rgba(255,255,255,.5);
        font-size: 10px;
        letter-spacing: .22em;
        text-transform: uppercase;
    }

    @keyframes loaderProgress {
        to { width: 100%; }
    }

    @keyframes loaderCar {
        to { left: calc(100% - 30px); }
    }

    /* =====================================================
       TYPOGRAPHIE & ELEMENTS COMMUNS
    ===================================================== */

    .home-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        color: var(--home-muted);
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
    }

    .home-eyebrow::before {
        width: 25px;
        height: 1px;
        background: var(--home-champagne);
        content: "";
    }

    .home-heading {
        color: var(--home-charcoal);
        font-family: var(--font-heading);
        font-weight: 600;
        letter-spacing: -.055em;
        line-height: 1.08;
    }

    .home-copy {
        color: var(--home-muted);
        font-size: 14px;
        line-height: 1.9;
    }

    .home-section {
        position: relative;
        padding-block: 105px;
    }

    .home-reveal {
        opacity: 1;
        transform: none;
    }

    .motion-ready .home-reveal {
        opacity: 0;
        transform: translateY(28px);
        transition:
            opacity .85s var(--home-ease),
            transform .85s var(--home-ease);
    }

    .motion-ready .home-reveal.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .home-delay-1 { transition-delay: .12s !important; }
    .home-delay-2 { transition-delay: .24s !important; }
    .home-delay-3 { transition-delay: .36s !important; }

    /* =====================================================
       HERO — INTRODUCTION IMMERSIVE
    ===================================================== */

    .home-hero {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        min-height: 760px;
        background: var(--home-charcoal);
        color: white;
    }

    .home-hero::before {
        position: absolute;
        inset: 0;
        z-index: -2;
        background-image:
            linear-gradient(rgba(255,255,255,.035) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,.035) 1px, transparent 1px);
        background-size: 64px 64px;
        mask-image: linear-gradient(to bottom, black, transparent 90%);
        content: "";
    }

    .home-hero::after {
        position: absolute;
        top: -30%;
        right: -15%;
        z-index: -1;
        width: 65vw;
        height: 65vw;
        max-width: 850px;
        max-height: 850px;
        border: 1px solid rgba(169,188,175,.12);
        border-radius: 50%;
        box-shadow:
            0 0 0 65px rgba(169,188,175,.025),
            0 0 0 130px rgba(169,188,175,.018);
        content: "";
        pointer-events: none;
    }

    .home-hero-glow {
        position: absolute;
        z-index: -1;
        top: 12%;
        right: 8%;
        width: 360px;
        height: 360px;
        border-radius: 50%;
        background: rgba(169,188,175,.13);
        filter: blur(100px);
        pointer-events: none;
    }

    .home-hero-inner {
        position: relative;
        display: grid;
        width: min(100% - 48px, 1320px);
        min-height: 760px;
        margin-inline: auto;
        align-items: center;
        gap: 45px;
        padding-block: 100px 120px;
    }

    .home-hero-content {
        position: relative;
        z-index: 3;
        max-width: 650px;
    }

    .home-hero-kicker {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 34px;
        color: var(--home-sage);
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .23em;
        text-transform: uppercase;
    }

    .home-hero-kicker span {
        width: 32px;
        height: 1px;
        background: var(--home-champagne);
    }

    .home-hero-title {
        font-family: var(--font-heading);
        font-size: clamp(3.4rem, 7.2vw, 6.7rem);
        font-weight: 600;
        letter-spacing: -.075em;
        line-height: .98;
    }

    .home-hero-title .line {
        display: block;
    }

    .home-hero-title .accent {
        color: var(--home-sage);
    }

    .home-hero-title .outline {
        color: transparent;
        -webkit-text-stroke: 1px rgba(255,255,255,.65);
    }

    .home-hero-description {
        max-width: 470px;
        margin-top: 30px;
        color: rgba(255,255,255,.62);
        font-size: 15px;
        line-height: 1.95;
    }

    .home-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 13px;
        margin-top: 38px;
    }

    .home-button-primary,
    .home-button-outline {
        display: inline-flex;
        min-height: 55px;
        align-items: center;
        justify-content: center;
        gap: 15px;
        padding: 0 23px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 700;
        transition:
            transform .3s var(--home-ease),
            background .3s ease,
            border-color .3s ease;
    }

    .home-button-primary {
        background: var(--home-sage);
        color: var(--home-charcoal);
    }

    .home-button-primary:hover {
        transform: translateY(-3px);
        background: var(--home-champagne);
    }

    .home-button-outline {
        border: 1px solid rgba(255,255,255,.22);
        color: white;
    }

    .home-button-outline:hover {
        transform: translateY(-3px);
        border-color: var(--home-sage);
        background: rgba(255,255,255,.05);
    }

    .home-button-arrow {
        transition: transform .3s ease;
    }

    .home-button-primary:hover .home-button-arrow {
        transform: translateX(5px);
    }

    .home-hero-footnote {
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
        margin-top: 38px;
        color: rgba(255,255,255,.48);
        font-size: 11px;
    }

    .home-hero-footnote span {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .home-hero-footnote i {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: var(--home-champagne);
    }

    /* Illustration du hero */

    .home-hero-visual {
        position: relative;
        width: 100%;
        max-width: 650px;
        margin-inline: auto;
        perspective: 1200px;
    }

    .home-visual-frame {
        position: relative;
        aspect-ratio: 1 / .9;
        transform-style: preserve-3d;
    }

    .home-visual-ring {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 75%;
        aspect-ratio: 1;
        border: 1px solid rgba(169,188,175,.18);
        border-radius: 50%;
        transform: translate(-50%,-50%);
    }

    .home-visual-ring::before,
    .home-visual-ring::after {
        position: absolute;
        inset: 12%;
        border: 1px dashed rgba(216,198,160,.2);
        border-radius: 50%;
        content: "";
    }

    .home-visual-ring::after {
        inset: 25%;
        border-style: solid;
        border-color: rgba(169,188,175,.12);
    }

    .home-route-svg {
        position: absolute;
        inset: 5%;
        width: 90%;
        height: 90%;
        overflow: visible;
    }

    .home-route-line {
        fill: none;
        stroke: rgba(169,188,175,.2);
        stroke-width: 20;
        stroke-linecap: round;
    }

    .home-route-dash {
        fill: none;
        stroke: var(--home-sage);
        stroke-width: 2;
        stroke-dasharray: 6 10;
        stroke-linecap: round;
        animation: routeTravel 22s linear infinite;
    }

    @keyframes routeTravel {
        to { stroke-dashoffset: -320; }
    }

    .home-car-illustration {
        position: absolute;
        top: 43%;
        left: 42%;
        width: 25%;
        max-width: 150px;
        transform: translate(-50%,-50%);
        animation: carHover 5s ease-in-out infinite;
        filter: drop-shadow(0 22px 24px rgba(0,0,0,.3));
    }

    @keyframes carHover {
        0%, 100% { translate: 0 0; }
        50% { translate: 0 -12px; }
    }

    .home-map-point {
        position: absolute;
        display: grid;
        width: 36px;
        height: 36px;
        place-items: center;
        border: 1px solid rgba(255,255,255,.2);
        border-radius: 50%;
        background: var(--home-charcoal);
        box-shadow: 0 0 0 8px rgba(169,188,175,.07);
    }

    .home-map-point::after {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--home-sage);
        content: "";
    }

    .home-map-point.start {
        bottom: 19%;
        left: 9%;
    }

    .home-map-point.end {
        right: 8%;
        bottom: 20%;
        box-shadow: 0 0 0 8px rgba(216,198,160,.08);
    }

    .home-map-point.end::after {
        background: var(--home-champagne);
    }

    .home-visual-label {
        position: absolute;
        padding: 13px 16px;
        border: 1px solid rgba(255,255,255,.12);
        border-radius: 9px;
        background: rgba(255,255,255,.07);
        backdrop-filter: blur(14px);
    }

    .home-visual-label small {
        display: block;
        color: var(--home-champagne);
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .16em;
        text-transform: uppercase;
    }

    .home-visual-label strong {
        display: block;
        margin-top: 5px;
        color: white;
        font-size: 12px;
        font-weight: 600;
    }

    .home-visual-label.label-one {
        top: 8%;
        left: 0;
    }

    .home-visual-label.label-two {
        right: 0;
        bottom: 7%;
    }

    .home-hero-index {
        position: absolute;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        gap: 12px;
        color: rgba(255,255,255,.38);
        font-size: 10px;
        letter-spacing: .15em;
    }

    .home-hero-index::before {
        width: 35px;
        height: 1px;
        background: var(--home-champagne);
        content: "";
    }

    .home-hero-bottom {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 22px max(24px, calc((100% - 1320px) / 2));
        border-top: 1px solid rgba(255,255,255,.1);
        color: rgba(255,255,255,.4);
        font-size: 9px;
        letter-spacing: .18em;
        text-transform: uppercase;
    }

    .home-scroll-hint {
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .home-scroll-hint span {
        display: block;
        width: 26px;
        height: 1px;
        background: var(--home-sage);
    }

    /* =====================================================
       SECTION INTRO — UNE AUTRE FAÇON DE VOYAGER
    ===================================================== */

    .home-intro {
        position: relative;
        padding-block: 125px 115px;
        background: var(--home-ivory);
    }

    .home-intro-layout {
        display: grid;
        gap: 55px;
    }

    .home-intro-aside {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 30px;
    }

    .home-intro-number {
        color: rgba(36,44,40,.12);
        font-family: var(--font-heading);
        font-size: clamp(5rem, 12vw, 9rem);
        font-weight: 600;
        letter-spacing: -.09em;
        line-height: .8;
    }

    .home-intro-quote {
        max-width: 270px;
        color: var(--home-muted);
        font-size: 12px;
        line-height: 1.9;
    }

    .home-intro-main h2 {
        max-width: 760px;
        margin-top: 23px;
        font-size: clamp(2.4rem, 5vw, 4.7rem);
    }

    .home-intro-main h2 em {
        color: var(--home-muted);
        font-style: normal;
    }

    .home-intro-main > p {
        max-width: 530px;
        margin-top: 25px;
    }

    .home-intro-link {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        margin-top: 30px;
        color: var(--home-charcoal);
        font-size: 12px;
        font-weight: 700;
    }

    .home-intro-link span {
        display: grid;
        width: 34px;
        height: 34px;
        place-items: center;
        border: 1px solid rgba(36,44,40,.2);
        border-radius: 50%;
        transition: background .3s ease, color .3s ease, transform .3s ease;
    }

    .home-intro-link:hover span {
        transform: translateX(4px);
        background: var(--home-charcoal);
        color: white;
    }

    /* =====================================================
       AVANTAGES — EDITORIAL
    ===================================================== */

    .home-benefits {
        padding-block: 105px 120px;
        background: white;
    }

    .home-benefits-heading {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 25px;
        margin-bottom: 65px;
    }

    .home-benefits-heading h2 {
        max-width: 620px;
        margin-top: 20px;
        font-size: clamp(2.4rem, 5vw, 4.3rem);
    }

    .home-benefits-heading p {
        max-width: 320px;
    }

    .home-benefit {
        position: relative;
        min-height: 270px;
        padding: 27px 24px 30px 0;
        border-top: 1px solid rgba(133,140,133,.35);
        transition: border-color .35s ease, transform .35s var(--home-ease);
    }

    .home-benefit:hover {
        transform: translateY(-6px);
        border-color: var(--home-charcoal);
    }

    .home-benefit-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .home-benefit-number {
        color: var(--home-muted);
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .15em;
    }

    .home-benefit-icon {
        display: grid;
        width: 46px;
        height: 46px;
        place-items: center;
        border: 1px solid rgba(169,188,175,.55);
        border-radius: 50%;
        color: var(--home-charcoal);
        transition: background .35s ease, transform .35s ease;
    }

    .home-benefit:hover .home-benefit-icon {
        transform: rotate(-8deg);
        background: var(--home-sage);
    }

    .home-benefit h3 {
        margin-top: 50px;
        font-family: var(--font-heading);
        font-size: 23px;
        font-weight: 600;
        letter-spacing: -.04em;
    }

    .home-benefit p {
        max-width: 300px;
        margin-top: 13px;
        color: var(--home-muted);
        font-size: 13px;
        line-height: 1.9;
    }

    /* =====================================================
       RECHERCHE — ESPACE CENTRAL
    ===================================================== */

    .home-search-section {
        position: relative;
        padding-block: 110px 120px;
        background: var(--home-ivory);
    }

    .home-search-header {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 25px;
        margin-bottom: 50px;
    }

    .home-search-header h2 {
        max-width: 650px;
        margin-top: 20px;
        font-size: clamp(2.5rem, 5vw, 4.4rem);
    }

    .home-search-header p {
        max-width: 350px;
    }

    .home-search-panel {
        position: relative;
        padding: 32px;
        border: 1px solid rgba(169,188,175,.55);
        border-radius: 3px;
        background: white;
        box-shadow: 0 25px 70px rgba(36,44,40,.055);
    }

    .home-search-panel::before {
        position: absolute;
        top: -1px;
        left: 32px;
        width: 65px;
        height: 3px;
        background: var(--home-champagne);
        content: "";
    }

    .home-search-field {
        min-width: 0;
        padding-bottom: 13px;
        border-bottom: 1px solid rgba(133,140,133,.35);
        transition: border-color .3s ease;
    }

    .home-search-field:focus-within {
        border-color: var(--home-charcoal);
    }

    .home-search-field > div {
        display: flex;
        min-height: 54px;
        align-items: center;
        gap: 13px;
    }

    .home-search-field svg {
        flex-shrink: 0;
        color: var(--home-muted);
    }

    .home-search-input,
    .home-search-field input {
        display: block !important;
        width: 100% !important;
        min-width: 0 !important;
        min-height: 48px !important;
        padding: 9px 2px !important;
        border: 0 !important;
        border-radius: 0 !important;
        outline: none !important;
        background: transparent !important;
        color: var(--home-charcoal) !important;
        box-shadow: none !important;
        font-family: var(--font-sans);
        font-size: 15px !important;
        font-weight: 500 !important;
    }

    .home-search-input::placeholder {
        color: var(--home-muted) !important;
        opacity: .7;
    }

    .home-search-field input[type="datetime-local"] {
        font-size: 13px !important;
    }

    .home-search-field input[type="datetime-local"]::-webkit-calendar-picker-indicator {
        cursor: pointer;
        opacity: .65;
    }

    .home-search-submit,
    .home-search-clear {
        display: inline-flex;
        min-height: 53px;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 700;
        transition: transform .3s ease, background .3s ease;
    }

    .home-search-submit {
        background: var(--home-charcoal);
        color: white;
    }

    .home-search-submit:hover:not(:disabled) {
        transform: translateY(-3px);
        background: var(--home-muted);
    }

    .home-search-submit:disabled {
        cursor: wait;
        opacity: .6;
    }

    .home-search-clear {
        border: 1px solid rgba(133,140,133,.3);
        padding-inline: 17px;
        color: var(--home-muted);
    }

    .home-search-clear:hover {
        background: var(--home-ivory);
        color: var(--home-charcoal);
    }

    .home-search-note {
        display: flex;
        align-items: center;
        gap: 9px;
        margin-top: 22px;
        color: var(--home-muted);
        font-size: 10px;
    }

    .home-search-note svg {
        color: var(--home-sage);
    }

    /* =====================================================
       TRAJETS DISPONIBLES
    ===================================================== */

    .home-trips-section {
        position: relative;
        padding-block: 110px 120px;
        background: white;
    }

    .home-trips-heading {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 22px;
        margin-bottom: 45px;
    }

    .home-trips-heading h2 {
        margin-top: 18px;
        font-size: clamp(2.4rem, 5vw, 4.2rem);
    }

    .home-trips-heading p {
        max-width: 360px;
    }

    .home-trips-marker {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--home-muted);
        font-size: 10px;
        letter-spacing: .1em;
        text-transform: uppercase;
    }

    .home-trips-marker::before {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--home-sage);
        box-shadow: 0 0 0 5px rgba(169,188,175,.15);
        content: "";
    }

    #trip-results {
        scroll-margin-top: 110px;
        contain: layout style;
    }

    #trip-results[aria-busy="true"] {
        cursor: progress;
    }

    .trip-skeleton {
        position: relative;
        overflow: hidden;
        background: linear-gradient(
            90deg,
            rgba(169,188,175,.14) 25%,
            rgba(255,255,255,.9) 45%,
            rgba(169,188,175,.14) 65%
        );
        background-size: 250% 100%;
        animation: skeletonLoading 1.4s ease-in-out infinite;
    }

    @keyframes skeletonLoading {
        from { background-position: 100% 0; }
        to { background-position: -150% 0; }
    }

    .trip-result-arrival {
        animation: resultArrival .65s var(--home-ease) both;
    }

    @keyframes resultArrival {
        from {
            opacity: 0;
            transform: translateY(22px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* =====================================================
       COMMENT ÇA MARCHE — ROUTE NARRATIVE
    ===================================================== */

    .home-steps-section {
        position: relative;
        overflow: hidden;
        padding-block: 115px 125px;
        background: var(--home-charcoal);
        color: white;
    }

    .home-steps-section::before {
        position: absolute;
        top: -250px;
        right: -170px;
        width: 600px;
        height: 600px;
        border: 1px solid rgba(169,188,175,.12);
        border-radius: 50%;
        box-shadow: 0 0 0 60px rgba(169,188,175,.025);
        content: "";
        pointer-events: none;
    }

    .home-steps-header {
        position: relative;
        z-index: 1;
        max-width: 700px;
        margin-bottom: 75px;
    }

    .home-steps-header .home-eyebrow {
        color: var(--home-champagne);
    }

    .home-steps-header h2 {
        margin-top: 20px;
        color: white;
        font-size: clamp(2.5rem, 5vw, 4.5rem);
    }

    .home-steps-header p {
        max-width: 490px;
        margin-top: 23px;
        color: rgba(255,255,255,.52);
    }

    .home-steps-grid {
        position: relative;
        display: grid;
        gap: 45px;
    }

    .home-steps-connector {
        position: absolute;
        top: 31px;
        right: 15%;
        left: 15%;
        height: 1px;
        background: repeating-linear-gradient(
            to right,
            rgba(169,188,175,.55) 0 5px,
            transparent 5px 12px
        );
    }

    .home-step {
        position: relative;
        z-index: 1;
    }

    .home-step-marker {
        display: grid;
        width: 62px;
        height: 62px;
        place-items: center;
        border: 1px solid rgba(169,188,175,.5);
        border-radius: 50%;
        background: var(--home-charcoal);
        color: var(--home-sage);
        transition: background .35s ease, color .35s ease, transform .35s ease;
    }

    .home-step:hover .home-step-marker {
        transform: translateY(-5px);
        background: var(--home-sage);
        color: var(--home-charcoal);
    }

    .home-step-number {
        display: block;
        margin-top: 30px;
        color: var(--home-champagne);
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .17em;
    }

    .home-step h3 {
        margin-top: 12px;
        font-family: var(--font-heading);
        font-size: 23px;
        font-weight: 600;
        letter-spacing: -.035em;
    }

    .home-step p {
        max-width: 300px;
        margin-top: 12px;
        color: rgba(255,255,255,.5);
        font-size: 13px;
        line-height: 1.9;
    }

    /* =====================================================
       CTA FINAL
    ===================================================== */

    .home-final-section {
        padding: 100px 24px;
        background: var(--home-ivory);
    }

    .home-final-panel {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        max-width: 1320px;
        margin-inline: auto;
        padding: clamp(40px, 7vw, 90px);
        background: var(--home-sage);
    }

    .home-final-panel::before {
        position: absolute;
        top: -260px;
        right: -120px;
        z-index: -1;
        width: 620px;
        height: 620px;
        border: 1px solid rgba(36,44,40,.16);
        border-radius: 50%;
        box-shadow:
            0 0 0 55px rgba(36,44,40,.035),
            0 0 0 110px rgba(36,44,40,.025);
        content: "";
    }

    .home-final-panel::after {
        position: absolute;
        right: 15%;
        bottom: -180px;
        z-index: -1;
        width: 300px;
        height: 300px;
        border: 1px dashed rgba(36,44,40,.2);
        border-radius: 50%;
        content: "";
    }

    .home-final-content {
        position: relative;
        z-index: 1;
        max-width: 760px;
    }

    .home-final-content h2 {
        margin-top: 23px;
        color: var(--home-charcoal);
        font-size: clamp(2.6rem, 6vw, 5.2rem);
    }

    .home-final-content p {
        max-width: 500px;
        margin-top: 23px;
        color: rgba(36,44,40,.7);
        font-size: 14px;
        line-height: 1.9;
    }

    .home-final-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 35px;
    }

    .home-final-primary,
    .home-final-secondary {
        display: inline-flex;
        min-height: 54px;
        align-items: center;
        justify-content: center;
        padding: 0 23px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 700;
        transition: transform .3s ease, background .3s ease;
    }

    .home-final-primary {
        background: var(--home-charcoal);
        color: white;
    }

    .home-final-primary:hover {
        transform: translateY(-3px);
        background: var(--home-muted);
    }

    .home-final-secondary {
        border: 1px solid rgba(36,44,40,.3);
        color: var(--home-charcoal);
    }

    .home-final-secondary:hover {
        transform: translateY(-3px);
        background: rgba(255,255,255,.25);
    }

    /* =====================================================
       PROGRESSION DE LECTURE
    ===================================================== */

    .scroll-road {
        position: fixed;
        z-index: 40;
        top: 27%;
        right: 18px;
        width: 22px;
        height: 44vh;
        pointer-events: none;
        opacity: .65;
    }

    .scroll-road-track {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 10px;
        border-left: 2px dashed rgba(133,140,133,.4);
    }

    .scroll-road-progress {
        position: absolute;
        top: 0;
        left: 10px;
        width: 2px;
        height: var(--scroll-progress, 0%);
        background: var(--home-sage);
    }

    .scroll-road-car {
        position: absolute;
        top: var(--scroll-progress, 0%);
        left: 0;
        width: 22px;
        transform: translateY(-50%);
    }

    .scroll-road-car svg {
        width: 22px;
        filter: drop-shadow(0 2px 3px rgba(36,44,40,.15));
    }

    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (min-width: 900px) {
        .home-hero-inner {
            grid-template-columns: 1fr 1fr;
        }

        .home-intro-layout {
            grid-template-columns: .65fr 1.35fr;
        }

        .home-benefits-heading,
        .home-search-header,
        .home-trips-heading {
            flex-direction: row;
            align-items: end;
        }

        .home-benefits-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0,1fr));
            gap: 35px;
        }

        .home-search-form {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr auto;
            align-items: end;
            gap: 28px;
        }

        .home-trips-heading {
            margin-bottom: 55px;
        }

        .home-steps-grid {
            grid-template-columns: repeat(3, minmax(0,1fr));
            gap: 55px;
        }
    }

    @media (max-width: 899px) {
        .home-hero-inner {
            grid-template-columns: 1fr;
            padding-top: 90px;
            padding-bottom: 110px;
        }

        .home-hero-content {
            max-width: 700px;
        }

        .home-hero-visual {
            max-width: 570px;
        }

        .home-steps-connector {
            display: none;
        }

        .home-benefits-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0,1fr));
            gap: 15px 30px;
        }

        .home-search-form {
            display: grid;
            grid-template-columns: repeat(2, minmax(0,1fr));
            gap: 30px;
        }
    }

    @media (max-width: 640px) {
        .home-section,
        .home-intro,
        .home-benefits,
        .home-search-section,
        .home-trips-section,
        .home-steps-section {
            padding-block: 75px;
        }

        .home-hero {
            min-height: auto;
        }

        .home-hero-inner {
            width: min(100% - 40px, 1320px);
            min-height: auto;
            gap: 35px;
            padding-top: 75px;
            padding-bottom: 95px;
        }

        .home-hero-title {
            font-size: clamp(3.3rem, 15vw, 5.3rem);
        }

        .home-hero-description {
            margin-top: 23px;
            font-size: 14px;
        }

        .home-hero-actions {
            flex-direction: column;
        }

        .home-button-primary,
        .home-button-outline {
            width: 100%;
        }

        .home-hero-footnote {
            gap: 13px 20px;
            margin-top: 27px;
        }

        .home-hero-visual {
            max-width: 460px;
            margin-top: 5px;
        }

        .home-visual-label {
            padding: 10px 12px;
        }

        .home-visual-label strong {
            font-size: 10px;
        }

        .home-hero-bottom {
            padding-inline: 20px;
            font-size: 8px;
        }

        .home-intro {
            padding-block: 80px;
        }

        .home-intro-layout {
            gap: 35px;
        }

        .home-intro-number {
            font-size: 5rem;
        }

        .home-benefits-grid {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .home-benefit {
            min-height: 220px;
            padding-top: 23px;
        }

        .home-benefit h3 {
            margin-top: 35px;
        }

        .home-search-form {
            grid-template-columns: 1fr;
            gap: 27px;
        }

        .home-search-panel {
            padding: 25px 20px;
        }

        .home-search-actions {
            display: grid;
            grid-template-columns: 1fr auto;
        }

        .home-search-note {
            align-items: flex-start;
            line-height: 1.7;
        }

        .home-steps-grid {
            gap: 40px;
        }

        .home-step {
            display: grid;
            grid-template-columns: 62px 1fr;
            column-gap: 20px;
        }

        .home-step-marker {
            grid-row: span 3;
        }

        .home-step-number {
            margin-top: 2px;
        }

        .home-step h3 {
            margin-top: 8px;
        }

        .home-step p {
            margin-top: 8px;
        }

        .home-final-section {
            padding: 65px 18px;
        }

        .home-final-panel {
            padding: 45px 25px;
        }

        .home-final-actions {
            flex-direction: column;
        }

        .home-final-primary,
        .home-final-secondary {
            width: 100%;
        }

        .scroll-road {
            display: none;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            scroll-behavior: auto !important;
            animation-duration: .01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: .01ms !important;
        }

        .motion-ready .home-reveal {
            opacity: 1 !important;
            transform: none !important;
        }

        .scroll-road {
            display: none;
        }
    }
</style>
@endpush

@section('content')

<div class="home-page">

    {{-- LOADER --}}
    <div id="home-loader" class="home-loader" aria-label="Chargement d'EhouDeka">
        <div class="loader-content">
            <div class="loader-logo">
                <span class="loader-logo-mark">
                    <svg viewBox="0 0 40 40" fill="none" aria-hidden="true">
                        <path d="M13 34C13 27 27 23 27 16C27 11 23.5 7 19 7"
                              stroke="#A9BCAF" stroke-width="3" stroke-linecap="round"/>
                        <path d="M19 7L14 12M19 7L24 12"
                              stroke="#A9BCAF" stroke-width="3" stroke-linecap="round"/>
                        <circle cx="13" cy="34" r="3" fill="#FFFFFF"/>
                    </svg>
                </span>
                <span>Ehou<span style="color:#A9BCAF">Deka</span></span>
            </div>

            <div class="loader-route">
                <div class="loader-route-fill"></div>
                <svg class="loader-car" viewBox="0 0 40 28" fill="none" aria-hidden="true">
                    <path d="M5 18 8 10h24l3 8v6H5v-6Z"
                          fill="#D8C6A0" stroke="#D8C6A0" stroke-width="1.5"/>
                    <path d="m11 10 3-6h12l4 6"
                          stroke="#D8C6A0" stroke-width="1.5"/>
                    <circle cx="11" cy="24" r="3" fill="#242C28" stroke="#A9BCAF"/>
                    <circle cx="29" cy="24" r="3" fill="#242C28" stroke="#A9BCAF"/>
                </svg>
            </div>

            <p class="loader-caption">Préparation de votre itinéraire</p>
        </div>
    </div>

    <noscript>
        <style>#home-loader { display:none !important; }</style>
    </noscript>

    {{-- INDICATEUR DE PARCOURS --}}
    <div class="scroll-road" aria-hidden="true">
        <div class="scroll-road-track"></div>
        <div class="scroll-road-progress"></div>
        <div class="scroll-road-car">
            <svg viewBox="0 0 24 30" fill="none">
                <rect x="4" y="4" width="16" height="22" rx="6"
                      fill="#A9BCAF" stroke="#242C28" stroke-width="1.3"/>
                <path d="M7 10h10l-1.5-4h-7L7 10Z"
                      fill="#FFFFFF" stroke="#242C28" stroke-width="1"/>
                <path d="M7 19h10" stroke="#242C28" stroke-width="1.2"/>
                <circle cx="7" cy="5" r="1.5" fill="#D8C6A0"/>
                <circle cx="17" cy="5" r="1.5" fill="#D8C6A0"/>
            </svg>
        </div>
    </div>

    {{-- =================================================
         HERO
    ================================================== --}}
    <section class="home-hero">
        <div class="home-hero-glow"></div>

        <div class="home-hero-inner">

            <div class="home-hero-content">
                <div class="home-hero-kicker home-reveal">
                    <span></span>
                    Le covoiturage autrement
                </div>

                <h1 class="home-hero-title home-reveal home-delay-1">
                    <span class="accent">Ehou<span class=" text-white">Deka,</span></span>
                    <span class="line">Emon<span class="accent">Deka.</span></span>
                </h1>

                <p class="home-hero-description home-reveal home-delay-2">
                    Et si votre prochain déplacement devenait le début d'une belle rencontre ?
                    Découvrez une autre façon de partager la route, de voyager et de réduire vos frais.
                </p>

                <div class="home-hero-actions home-reveal home-delay-3">
                    <a href="#recherche" class="home-button-primary">
                        Explorer les trajets
                        <svg class="home-button-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 12h14m-6-6 6 6-6 6"
                                  stroke="currentColor" stroke-width="1.8"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>

                    <a href="{{ auth()->check() ? route('trips.create') : route('register') }}"
                       class="home-button-outline">
                        Proposer un trajet
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 5v14m-7-7h14"
                                  stroke="#D8C6A0" stroke-width="1.8"
                                  stroke-linecap="round"/>
                        </svg>
                    </a>
                </div>

                <div class="home-hero-footnote home-reveal home-delay-3">
                    <span><i></i> Partagez les frais</span>
                    <span><i></i> Rencontrez autrement</span>
                    <span><i></i> Allez plus loin</span>
                </div>
            </div>

            {{-- VISUEL ABSTRAIT DE LA ROUTE --}}
            <div class="home-hero-visual home-reveal">
                <div class="home-visual-frame">

                    <div class="home-visual-ring"></div>

                    <svg class="home-route-svg" viewBox="0 0 560 450"
                         fill="none" aria-hidden="true">
                        <path class="home-route-line"
                              d="M75 330 C145 330 135 115 250 115 S350 345 475 345"/>
                        <path class="home-route-dash"
                              d="M75 330 C145 330 135 115 250 115 S350 345 475 345"/>

                        <circle cx="75" cy="330" r="25"
                                fill="#A9BCAF" fill-opacity=".12"/>
                        <circle cx="75" cy="330" r="8" fill="#A9BCAF"/>

                        <circle cx="475" cy="345" r="25"
                                fill="#D8C6A0" fill-opacity=".12"/>
                        <circle cx="475" cy="345" r="8" fill="#D8C6A0"/>

                        <circle cx="165" cy="65" r="3" fill="#D8C6A0"/>
                        <circle cx="410" cy="110" r="4" fill="#A9BCAF"/>
                        <circle cx="390" cy="405" r="3" fill="#D8C6A0"/>
                        <circle cx="110" cy="200" r="2" fill="#A9BCAF"/>
                    </svg>

                    <div class="home-car-illustration">
                        <svg viewBox="0 0 150 110" fill="none" aria-hidden="true">
                            <path d="M18 57 28 28Q31 20 40 20H108Q116 20 121 29L134 57V78H16V59Z"
                                  fill="#A9BCAF" fill-opacity=".2"
                                  stroke="#A9BCAF" stroke-width="2"/>
                            <path d="M39 23 48 39H105L115 23"
                                  fill="#A9BCAF" fill-opacity=".35"
                                  stroke="#D8C6A0" stroke-width="1.5"/>
                            <path d="M16 57H134" stroke="#A9BCAF" stroke-width="2"/>
                            <path d="M24 65H126" stroke="#A9BCAF" stroke-opacity=".5"/>
                            <circle cx="39" cy="79" r="12" fill="#242C28" stroke="#D8C6A0" stroke-width="2"/>
                            <circle cx="111" cy="79" r="12" fill="#242C28" stroke="#D8C6A0" stroke-width="2"/>
                            <circle cx="39" cy="79" r="4" fill="#D8C6A0"/>
                            <circle cx="111" cy="79" r="4" fill="#D8C6A0"/>
                            <path d="M25 51H35M115 51H125"
                                  stroke="#D8C6A0" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </div>

                    <div class="home-map-point start"></div>
                    <div class="home-map-point end"></div>

                    <div class="home-visual-label label-one">
                        <small>Un même voiture</small>
                        <strong>Une même destination</strong>
                    </div>

                    <div class="home-visual-label label-two">
                        <small>Une autre expérience</small>
                        <strong>Allons plus loin.</strong>
                    </div>
                </div>
            </div>

            <div class="home-hero-index">01 — Une nouvelle façon de voyager</div>
        </div>

        <div class="home-hero-bottom">
            <span>EhouDeka — Ensemble sur la route</span>
            <a href="#decouvrir" class="home-scroll-hint">
                Découvrir <span></span>
            </a>
        </div>
    </section>

    {{-- =================================================
         INTRODUCTION
    ================================================== --}}
    <section id="decouvrir" class="home-intro">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">
            <div class="home-intro-layout">
                <div class="home-intro-aside home-reveal">
                    <div class="home-intro-number">01.</div>
                    <p class="home-intro-quote">
                        « La destination compte. Mais les personnes avec qui l'on partage le chemin aussi. »
                    </p>
                </div>

                <div class="home-intro-main home-reveal home-delay-1">
                    <span class="home-eyebrow">Une idée simple, un autre regard</span>

                    <h2 class="home-heading">
                        La route est plus belle quand elle se <em>partage.</em>
                    </h2>

                    <p class="home-copy">
                        EhouDeka rapproche les personnes qui vont dans la même direction.
                        Trouvez un trajet proposé par un conducteur ou partagez le vôtre avec
                        d'autres voyageurs.
                    </p>

                    <a href="#recherche" class="home-intro-link">
                        Découvrir les trajets
                        <span aria-hidden="true">↗</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- =================================================
         AVANTAGES
    ================================================== --}}
    <section class="home-benefits">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">
    
            <div class="home-benefits-heading home-reveal">
                
                <div>
                    <span class="home-eyebrow">Pourquoi EhouDeka ?</span>
                    <h2 class="home-heading">
                        Le trajet ne se résume pas à une destination.
                    </h2>
                </div>
                
                <p class="home-copy">
                    Une manière plus humaine et plus économique d'envisager
                    les déplacements du quotidien.
                </p>
            </div>

            <div class="home-benefits-grid">
                
                <article class="home-benefit home-reveal">
                    <div class="home-benefit-top">
                        <span class="home-benefit-number">01 / ÉCONOMIE</span>
                        <span class="home-benefit-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 2v20m5-16H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"
                                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </div>
                    <h3>Dépensez moins.</h3>
                    <p>
                        Partagez les frais du déplacement et profitez d'une manière
                        plus économique de voyager.
                    </p>
                </article>

                <article class="home-benefit home-reveal home-delay-1">
                    <div class="home-benefit-top">
                        <span class="home-benefit-number">02 / RENCONTRES</span>
                        <span class="home-benefit-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2m7-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm9-5a4 4 0 0 1 0 8m4 7v-2a4 4 0 0 0-3-3.87"
                                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </div>
                    <h3>Voyagez ensemble.</h3>
                    <p>
                        Transformez un déplacement ordinaire en une occasion
                        de partager la route avec d'autres personnes.
                    </p>
                </article>

                <article class="home-benefit home-reveal home-delay-2">
                    <div class="home-benefit-top">
                        <span class="home-benefit-number">03 / LIBERTÉ</span>
                        <span class="home-benefit-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"
                                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="m9 12 2 2 4-4"
                                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </div>
                    <h3>Choisissez votre trajet.</h3>
                    <p>
                        Consultez les informations des trajets proposés et
                        identifiez celui qui correspond à votre destination.
                    </p>
                </article>

            </div>
        </div>
    </section>

    {{-- =================================================
         RECHERCHE
    ================================================== --}}
    <section id="recherche" class="home-search-section scroll-mt-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">

            <div class="home-search-header home-reveal">
                <div>
                    <span class="home-eyebrow">Votre prochaine destination</span>
                    <h2 class="home-heading">Alors, où vous emmène la route ?</h2>
                </div>

                <p class="home-copy">
                    Indiquez votre destination et votre date de départ.
                    Votre prochain trajet commence ici.
                </p>
            </div>

            <div class="home-search-panel home-reveal">
                <form
                    id="trip-search-form"
                    method="GET"
                    action="{{ route('home') }}"
                    class="home-search-form"
                >

                    <div class="home-search-field">
                        <x-label for="ville_depart" value="VILLE DE DÉPART"
                                 class="!text-[10px] !font-bold !tracking-[.14em] !text-[#858C85]" />

                        <div class="mt-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.6"/>
                                <circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="1.6"/>
                            </svg>

                            <x-input
                                id="ville_depart"
                                name="ville_depart"
                                :value="$filters['ville_depart'] ?? ''"
                                placeholder="Ex : Lomé"
                                class="home-search-input !border-0 !p-0 !shadow-none focus:!ring-0"
                            />
                        </div>
                    </div>

                    <div class="home-search-field">
                        <x-label for="ville_arrivee" value="VILLE D'ARRIVÉE"
                                 class="!text-[10px] !font-bold !tracking-[.14em] !text-[#858C85]" />

                        <div class="mt-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"
                                      stroke="currentColor" stroke-width="1.6"/>
                                <circle cx="12" cy="10" r="2.5" stroke="currentColor" stroke-width="1.6"/>
                            </svg>

                            <x-input
                                id="ville_arrivee"
                                name="ville_arrivee"
                                :value="$filters['ville_arrivee'] ?? ''"
                                placeholder="Ex : Kpalimé"
                                class="home-search-input !border-0 !p-0 !shadow-none focus:!ring-0"
                            />
                        </div>
                    </div>

                    <div class="home-search-field">
                        <x-label for="date_depart" value="DATE DE DÉPART"
                                 class="!text-[10px] !font-bold !tracking-[.14em] !text-[#858C85]" />

                        <div class="mt-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <rect x="3" y="5" width="18" height="16" rx="2"
                                      stroke="currentColor" stroke-width="1.6"/>
                                <path d="M16 3v4M8 3v4M3 10h18"
                                      stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                            </svg>

                            <x-input
                                id="date_depart"
                                name="date_depart"
                                type="datetime-local"
                                :value="$filters['date_depart'] ?? ''"
                                class="home-search-input !border-0 !p-0 !shadow-none focus:!ring-0"
                            />
                        </div>
                    </div>

                    <div class="home-search-actions flex gap-3 pt-2">
                        <button type="submit"
                                class="home-search-submit flex-1 px-6">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/>
                                <path d="m16 16 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            Rechercher
                        </button>

                        <a href="{{ route('home') }}"
                           class="home-search-clear px-4"
                           aria-label="Effacer les filtres">
                            Effacer
                        </a>
                    </div>
                </form>

                <p class="home-search-note">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M12 11v5m0-8h.01" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    Renseignez les informations de votre déplacement pour explorer les résultats.
                </p>
            </div>
        </div>
    </section>

    {{-- =================================================
         TRAJETS DISPONIBLES
    ================================================== --}}
    <section id="trajets-disponibles" class="home-trips-section">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">

            <div class="home-trips-heading home-reveal">
                <div>
                    <span class="home-eyebrow">Les opportunités du moment</span>
                    <h2 class="home-heading">
                        La route vous attend<span style="color:#D8C6A0">.</span>
                    </h2>
                </div>

                <div>
                    <p class="home-copy">
                        Découvrez les déplacements proposés par la communauté
                        et trouvez peut-être votre prochaine destination.
                    </p>
                    <div class="home-trips-marker mt-5">Trajets proposés</div>
                </div>
            </div>

            <div id="trip-results" aria-live="polite" aria-busy="false">
                @include('trips.partials.results', ['trips' => $trips])
            </div>

        </div>
    </section>

    {{-- =================================================
         COMMENT ÇA MARCHE
    ================================================== --}}
    <section class="home-steps-section">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">

            <div class="home-steps-header home-reveal">
                <span class="home-eyebrow">Le voyage commence ici</span>

                <h2 class="home-heading">
                    Trois étapes.<br>
                    Et la route s'ouvre à vous.
                </h2>

                <p class="home-copy">
                    Que vous cherchiez une place ou que vous souhaitiez partager
                    votre véhicule, le principe reste simple.
                </p>
            </div>

            <div class="home-steps-grid">
                <div class="home-steps-connector" aria-hidden="true"></div>

                <article class="home-step home-reveal">
                    <div class="home-step-marker">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.6"/>
                            <path d="m16 16 4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <span class="home-step-number">ÉTAPE 01</span>
                    <h3>Recherchez.</h3>
                    <p>
                        Indiquez votre ville de départ, votre destination
                        et la date souhaitée.
                    </p>
                </article>

                <article class="home-step home-reveal home-delay-1">
                    <div class="home-step-marker">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M3 13.5 5.5 7h13l2.5 6.5M3 13.5h18M3 13.5V18h2m16-4.5V18h-2M7 18h10"
                                  stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <span class="home-step-number">ÉTAPE 02</span>
                    <h3>Choisissez.</h3>
                    <p>
                        Consultez les trajets proposés et identifiez
                        celui qui correspond à votre besoin.
                    </p>
                </article>

                <article class="home-step home-reveal home-delay-2">
                    <div class="home-step-marker">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2m7-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm9-5a4 4 0 0 1 0 8m4 7v-2a4 4 0 0 0-3-3.87"
                                  stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <span class="home-step-number">ÉTAPE 03</span>
                    <h3>Partagez la route.</h3>
                    <p>
                        Retrouvez votre conducteur ou vos passagers
                        et partagez le déplacement.
                    </p>
                </article>
            </div>
        </div>
    </section>

    {{-- =================================================
         CTA FINAL
    ================================================== --}}
    <section class="home-final-section">
        <div class="home-final-panel">

            <div class="home-final-content home-reveal">
                <span class="home-eyebrow" style="color:rgba(36,44,40,.7)">
                    La prochaine histoire commence peut-être ici
                </span>

                <h2 class="home-heading">
                    Et si votre prochain trajet était partagé ?
                </h2>

                <p>
                    Une destination, plusieurs chemins possibles.
                    Rejoignez EhouDeka, trouvez un trajet ou proposez le vôtre.
                </p>

                <div class="home-final-actions">
                    <a href="#recherche" class="home-final-primary">
                        Trouver un trajet <span class="ml-3">↗</span>
                    </a>

                    <a href="{{ auth()->check() ? route('trips.create') : route('register') }}"
                       class="home-final-secondary">
                        Proposer un trajet
                    </a>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection

{{-- =====================================================
     JAVASCRIPT
===================================================== --}}

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {

    const loader = document.getElementById('home-loader');
    const searchForm = document.getElementById('trip-search-form');
    const resultsContainer = document.getElementById('trip-results');
    const resultsSection = document.getElementById('trajets-disponibles');

    const reducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    ).matches;

    /* =================================================
       1. LOADER
    ================================================= */

    const loaderStartedAt = Date.now();
    const minimumLoaderDuration = reducedMotion ? 0 : 700;

    let pageLoaded = document.readyState === 'complete';

    function hideLoader() {
        if (!loader || loader.classList.contains('is-hidden')) {
            return;
        }

        const elapsed = Date.now() - loaderStartedAt;
        const remaining = Math.max(0, minimumLoaderDuration - elapsed);

        window.setTimeout(() => {
            loader.classList.add('is-hidden');

            window.setTimeout(() => {
                loader.remove();
            }, 700);
        }, remaining);
    }

    if (loader) {
        if (pageLoaded) {
            hideLoader();
        } else {
            window.addEventListener('load', () => {
                pageLoaded = true;
                hideLoader();
            }, { once: true });

            window.setTimeout(hideLoader, 2600);
        }
    }

    /* =================================================
       2. APPARITION DES ELEMENTS AU SCROLL
    ================================================= */

    let revealObserver = null;

    function observeRevealElements(container = document) {
        const elements = container.querySelectorAll(
            '.home-reveal:not(.is-visible)'
        );

        if (reducedMotion || !('IntersectionObserver' in window)) {
            elements.forEach(element => {
                element.classList.add('is-visible');
            });
            return;
        }

        document.documentElement.classList.add('motion-ready');

        if (!revealObserver) {
            revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.12,
                rootMargin: '0px 0px -35px 0px'
            });
        }

        elements.forEach(element => {
            revealObserver.observe(element);
        });
    }

    observeRevealElements();

    /* =================================================
       3. PROGRESSION DE LA PAGE
    ================================================= */

    const updateScrollRoad = () => {
        const documentHeight =
            document.documentElement.scrollHeight - window.innerHeight;

        const progress = documentHeight <= 0
            ? 0
            : Math.min(100, Math.max(
                0,
                (window.scrollY / documentHeight) * 100
            ));

        document.documentElement.style.setProperty(
            '--scroll-progress',
            `${progress}%`
        );
    };

    let scrollFrame = null;

    window.addEventListener('scroll', () => {
        if (scrollFrame) return;

        scrollFrame = window.requestAnimationFrame(() => {
            updateScrollRoad();
            scrollFrame = null;
        });
    }, { passive: true });

    window.addEventListener('resize', updateScrollRoad);
    updateScrollRoad();

    /* =================================================
       4. RECHERCHE AJAX
    ================================================= */

    if (!searchForm || !resultsContainer) {
        return;
    }

    const submitButton = searchForm.querySelector(
        'button[type="submit"]'
    );

    let isLoading = false;
    let activeController = null;

    function scrollToFirstResult() {
        window.requestAnimationFrame(() => {
            window.requestAnimationFrame(() => {
                const firstCard = resultsContainer.querySelector(
                    '.home-reveal'
                );

                const emptyState = resultsContainer.querySelector(
                    '.rounded-3xl'
                );

                const target = firstCard || emptyState || resultsSection;

                if (!target) return;

                const top = target.getBoundingClientRect().top +
                    window.scrollY - 115;

                window.scrollTo({
                    top: Math.max(0, top),
                    behavior: reducedMotion ? 'auto' : 'smooth'
                });
            });
        });
    }

    function renderSkeletons(count = 3) {
        return Array.from({ length: count }, () => `
            <div class="rounded-2xl border border-[#A9BCAF]/30 bg-white p-5 sm:p-6">
                <div class="flex items-center justify-between gap-4">
                    <div class="trip-skeleton h-4 w-28 rounded-full"></div>
                    <div class="trip-skeleton h-7 w-20 rounded-full"></div>
                </div>

                <div class="my-6 grid grid-cols-[1fr_auto_1fr] items-center gap-3">
                    <div>
                        <div class="trip-skeleton mb-2 h-6 w-24 rounded"></div>
                        <div class="trip-skeleton h-3 w-16 rounded"></div>
                    </div>

                    <div class="trip-skeleton h-8 w-8 rounded-full"></div>

                    <div class="text-right">
                        <div class="trip-skeleton mb-2 ml-auto h-6 w-24 rounded"></div>
                        <div class="trip-skeleton ml-auto h-3 w-16 rounded"></div>
                    </div>
                </div>

                <div class="flex items-center justify-between border-t border-[#F5F2EA] pt-4">
                    <div class="flex items-center gap-3">
                        <div class="trip-skeleton h-10 w-10 rounded-full"></div>
                        <div>
                            <div class="trip-skeleton mb-2 h-3 w-24 rounded"></div>
                            <div class="trip-skeleton h-3 w-16 rounded"></div>
                        </div>
                    </div>

                    <div class="trip-skeleton h-10 w-24 rounded-xl"></div>
                </div>
            </div>
        `).join('');
    }

    function syncFormFromUrl(url) {
        const params = new URL(url).searchParams;

        ['ville_depart', 'ville_arrivee', 'date_depart'].forEach(name => {
            const field = searchForm.elements.namedItem(name);

            if (field) {
                field.value = params.get(name) || '';
            }
        });
    }

    async function loadResults(url, updateHistory = true) {
        if (isLoading) {
            if (activeController) {
                activeController.abort();
            }
        }

        isLoading = true;
        activeController = new AbortController();

        resultsContainer.setAttribute('aria-busy', 'true');

        if (submitButton) {
            submitButton.disabled = true;
            submitButton.setAttribute('aria-busy', 'true');
        }

        resultsContainer.innerHTML = renderSkeletons(3);
        scrollToFirstResult();

        try {
            const response = await fetch(url.toString(), {
                method: 'GET',
                signal: activeController.signal,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error('Impossible de charger les trajets.');
            }

            const data = await response.json();

            if (typeof data.html !== 'string') {
                throw new Error('La réponse du serveur est invalide.');
            }

            resultsContainer.innerHTML = data.html;

            if (updateHistory) {
                window.history.pushState({}, '', url.toString());
            }

            syncFormFromUrl(url);
            observeRevealElements(resultsContainer);

            const firstCard = resultsContainer.querySelector('.home-reveal');

            if (firstCard) {
                firstCard.classList.add('trip-result-arrival');
            }

            updateScrollRoad();
            scrollToFirstResult();

        } catch (error) {
            if (error.name === 'AbortError') {
                return;
            }

            console.error('Erreur de recherche AJAX :', error);
            window.location.assign(url.toString());
            return;

        } finally {
            isLoading = false;
            activeController = null;

            resultsContainer.setAttribute('aria-busy', 'false');

            if (submitButton) {
                submitButton.disabled = false;
                submitButton.removeAttribute('aria-busy');
            }
        }
    }

    /* =================================================
       5. SOUMISSION DU FORMULAIRE
    ================================================= */

    searchForm.addEventListener('submit', event => {
        event.preventDefault();

        const url = new URL(
            searchForm.action,
            window.location.origin
        );

        const formData = new FormData(searchForm);

        formData.forEach((value, key) => {
            if (value !== '') {
                url.searchParams.set(key, value);
            } else {
                url.searchParams.delete(key);
            }
        });

        url.searchParams.delete('page');

        loadResults(url);
    });

    /* =================================================
       6. PAGINATION AJAX
    ================================================= */

    resultsContainer.addEventListener('click', event => {
        const link = event.target.closest('a[href]');

        if (!link) return;

        const url = new URL(link.href, window.location.origin);

        if (
            url.origin !== window.location.origin ||
            url.pathname !== window.location.pathname
        ) {
            return;
        }

        event.preventDefault();
        loadResults(url);
    });

    

    window.addEventListener('popstate', () => {
        const url = new URL(window.location.href);
        syncFormFromUrl(url);
        loadResults(url, false);
    });

});
</script>
@endpush
