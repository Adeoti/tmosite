@extends('layouts.app')

@section('title', 'Passive Income Systems')
@section('meta_description', 'Done-for-you passive income systems from TMO Ultimate Innovations: automated stores, AI content engines and voice-agent lead funnels.')
@section('body_class', 'tmo-nav-dark')

@section('content')

<x-page-hero eyebrow="Passive Income" variant="dark">
    <h1 data-animate="up">Income systems that run without you in the room</h1>
    <p class="tmo-page-hero__subhead" data-animate="up" data-animate-delay="120">
        We design, build and hand over done-for-you digital assets, automated stores, content engines and voice-agent funnels, so revenue keeps moving while you focus elsewhere.
    </p>

    <div class="tmo-page-hero__actions" data-animate="up" data-animate-delay="220">
        <a href="{{ route('booking') }}" class="tmo-btn tmo-btn--gold">
            Book a Free Consultation

            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M5 12h14"/>
                <path d="m13 6 6 6-6 6"/>
            </svg>
        </a>
    </div>
</x-page-hero>

<section class="tmo-passive-tracks">
    <div class="container">

        <x-section-heading eyebrow="HOW IT WORKS" align="center">
            Three done-for-you tracks
        </x-section-heading>

        <div class="tmo-page-grid tmo-page-grid--3">

            <div class="tmo-track-card" data-animate="up">
                <div class="tmo-track-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M3 9l9-6 9 6-9 6-9-6z"/>
                        <path d="M3 9v6l9 6 9-6V9"/>
                    </svg>
                </div>

                <h3>Automated Storefronts</h3>

                <p>A Shopify store built, stocked and connected to fulfillment and email flows, so orders come in without daily hands-on management.</p>

                <ul class="tmo-track-card__list">
                    <li>Store build and theme setup</li>
                    <li>Supplier and fulfillment automation</li>
                    <li>Email and retention flows</li>
                </ul>
            </div>

            <div class="tmo-track-card" data-animate="up" data-animate-delay="100">
                <div class="tmo-track-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <rect x="3" y="5" width="18" height="14" rx="2"/>
                        <path d="M8 21h8"/>
                        <path d="M12 17v4"/>
                    </svg>
                </div>

                <h3>AI Content Engines</h3>

                <p>An AI video and content pipeline that keeps publishing across your channels, driving traffic on autopilot.</p>

                <ul class="tmo-track-card__list">
                    <li>AI video production pipeline</li>
                    <li>Scheduled multi-channel publishing</li>
                    <li>Monthly performance reporting</li>
                </ul>
            </div>

            <div class="tmo-track-card" data-animate="up" data-animate-delay="200">
                <div class="tmo-track-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/>
                        <path d="M19 10v2a7 7 0 0 1-14 0v-2"/>
                        <line x1="12" y1="19" x2="12" y2="23"/>
                    </svg>
                </div>

                <h3>Voice Agent Funnels</h3>

                <p>A trained AI voice agent that answers calls, qualifies leads and books consultations directly into your calendar.</p>

                <ul class="tmo-track-card__list">
                    <li>Custom-trained conversation flow</li>
                    <li>CRM and calendar integration</li>
                    <li>Ongoing tuning included</li>
                </ul>
            </div>

        </div>

    </div>
</section>

<section class="tmo-passive-why">
    <div class="container tmo-passive-why__grid">

        <div class="tmo-passive-why__copy" data-animate="left">
            <span class="tmo-section-number">WHY PASSIVE INCOME</span>

            <h2>Built once, engineered to keep earning</h2>

            <p>
                Most agencies hand you a project and disappear. We build systems designed to keep producing revenue after launch, and we stay on to tune them. You get full visibility through your admin dashboard, and updates without waiting on a developer.
            </p>

            <a href="{{ route('booking') }}" class="tmo-btn tmo-btn--gold">
                Book a Free Consultation

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </a>
        </div>

        <div class="tmo-passive-steps" data-animate="right">

            <div class="tmo-passive-step">
                <span class="tmo-passive-step__number">1</span>
                <h3>Discovery Call</h3>
                <p>We map your goals, budget and timeline in a free 20-minute consultation.</p>
            </div>

            <div class="tmo-passive-step">
                <span class="tmo-passive-step__number">2</span>
                <h3>Build &amp; Launch</h3>
                <p>Our studios build the system in parallel, then launch with tracking in place.</p>
            </div>

            <div class="tmo-passive-step">
                <span class="tmo-passive-step__number">3</span>
                <h3>Tune &amp; Scale</h3>
                <p>We monitor performance and optimize monthly so the system compounds.</p>
            </div>

        </div>

    </div>
</section>

@if ($faqs->isNotEmpty())

    <section class="tmo-services-faq">
        <div class="container">

            <x-section-heading eyebrow="QUESTIONS" align="center">
                Frequently asked
            </x-section-heading>

            <div class="tmo-faq-list">

                @foreach ($faqs as $faq)

                    <details class="tmo-faq-item" data-animate="up">
                        <summary>
                            {{ $faq->question }}

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M5 12h14"/>
                                <path d="M12 5v14"/>
                            </svg>
                        </summary>

                        <p>{{ $faq->answer }}</p>
                    </details>

                @endforeach

            </div>

        </div>
    </section>

@endif

<x-cta-band title="Ready to build income that runs itself?" subtitle="Book a free consultation and we'll scope the right track for you.">
    <a href="{{ route('booking') }}" class="tmo-btn tmo-btn--gold">
        Book a Free Consultation

        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M5 12h14"/>
            <path d="m13 6 6 6-6 6"/>
        </svg>
    </a>
</x-cta-band>

@endsection