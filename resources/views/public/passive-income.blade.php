@extends('layouts.app')

@section('title', 'Passive Income Systems')
@section('meta_description', 'Done-for-you passive income systems from TMO Ultimate Innovations: automated stores, AI content engines and voice-agent lead funnels.')

@section('content')
    <section class="page-hero" style="background: var(--color-navy); color: #fff;">
        <div class="container" style="max-width: 780px; text-align: center;">
            <div class="eyebrow" style="justify-content: center;">Passive Income</div>
            <h1 style="color: #fff;" data-animate="up">Income systems that run without you in the room</h1>
            <p class="hero__subhead" style="color: rgba(255,255,255,0.82);" data-animate="up" data-animate-delay="120">
                We design, build and hand over done-for-you digital assets, automated stores, content engines and voice-agent funnels, so revenue keeps moving while you focus elsewhere.
            </p>
            <div class="hero__actions" style="justify-content: center;" data-animate="up" data-animate-delay="220">
                <a href="{{ route('booking') }}" class="btn btn-accent">Book a Free Consultation</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <x-section-heading eyebrow="How It Works" align="center">
                Three done-for-you tracks
            </x-section-heading>

            <div class="grid grid-3" style="margin-top: 48px;">
                <div class="card pricing-card" data-animate="up">
                    <div class="pricing-card__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M3 9l9-6 9 6-9 6-9-6z"/><path d="M3 9v6l9 6 9-6V9"/></svg>
                    </div>
                    <h3>Automated Storefronts</h3>
                    <p>A Shopify store built, stocked and connected to fulfillment and email flows, so orders come in without daily hands-on management.</p>
                    <ul class="pricing-card__list">
                        <li>Store build and theme setup</li>
                        <li>Supplier and fulfillment automation</li>
                        <li>Email and retention flows</li>
                    </ul>
                </div>
                <div class="card pricing-card" data-animate="up" data-animate-delay="100">
                    <div class="pricing-card__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg>
                    </div>
                    <h3>AI Content Engines</h3>
                    <p>An AI video and content pipeline that keeps publishing across your channels, driving traffic on autopilot.</p>
                    <ul class="pricing-card__list">
                        <li>AI video production pipeline</li>
                        <li>Scheduled multi-channel publishing</li>
                        <li>Monthly performance reporting</li>
                    </ul>
                </div>
                <div class="card pricing-card" data-animate="up" data-animate-delay="200">
                    <div class="pricing-card__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/></svg>
                    </div>
                    <h3>Voice Agent Funnels</h3>
                    <p>A trained AI voice agent that answers calls, qualifies leads and books consultations directly into your calendar.</p>
                    <ul class="pricing-card__list">
                        <li>Custom-trained conversation flow</li>
                        <li>CRM and calendar integration</li>
                        <li>Ongoing tuning included</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section" style="background: #F5F6F9;">
        <div class="container grid grid-2" style="align-items: center;">
            <div data-animate="left">
                <div class="eyebrow">Why Passive Income</div>
                <h2>Built once, engineered to keep earning</h2>
                <p>Most agencies hand you a project and disappear. We build systems designed to keep producing revenue after launch, and we stay on to tune them. You get full visibility through your admin dashboard, and updates without waiting on a developer.</p>
                <a href="{{ route('booking') }}" class="btn btn-primary">Book a Free Consultation</a>
            </div>
            <div class="about-pillars" data-animate="right">
                <div class="about-pillar card">
                    <span class="about-pillar__letter">1</span>
                    <h3>Discovery Call</h3>
                    <p>We map your goals, budget and timeline in a free 20-minute consultation.</p>
                </div>
                <div class="about-pillar card">
                    <span class="about-pillar__letter">2</span>
                    <h3>Build &amp; Launch</h3>
                    <p>Our studios build the system in parallel, then launch with tracking in place.</p>
                </div>
                <div class="about-pillar card">
                    <span class="about-pillar__letter">3</span>
                    <h3>Tune &amp; Scale</h3>
                    <p>We monitor performance and optimize monthly so the system compounds.</p>
                </div>
            </div>
        </div>
    </section>

    @if ($faqs->isNotEmpty())
        <section class="section">
            <div class="container" style="max-width: 800px;">
                <x-section-heading eyebrow="Questions" align="center">
                    Frequently asked
                </x-section-heading>

                <div class="faq-list" style="margin-top: 32px;">
                    @foreach ($faqs as $faq)
                        <details class="faq-item" data-animate="up">
                            <summary>{{ $faq->question }}</summary>
                            <p>{{ $faq->answer }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-cta-band title="Ready to build income that runs itself?" subtitle="Book a free consultation and we'll scope the right track for you.">
        <a href="{{ route('booking') }}" class="btn btn-accent">Book a Free Consultation</a>
    </x-cta-band>
@endsection