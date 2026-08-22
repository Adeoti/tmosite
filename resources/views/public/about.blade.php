@extends('layouts.app')

@section('title', 'About Us')
@section('meta_description', 'Meet TMO Ultimate Innovations Ltd, the team behind Shopify, AI video, 3D animation and AI voice agent builds that grow revenue.')

@section('content')
    <section class="page-hero">
        <div class="container" style="max-width: 760px; text-align: center;">
            <div class="eyebrow" style="justify-content: center;">About TMO Ultimate</div>
            <h1 data-animate="up">We build the systems behind ambitious brands</h1>
            <p class="hero__subhead" data-animate="up" data-animate-delay="120">
                TMO Ultimate Innovations Ltd. is a multi-disciplinary studio combining Shopify engineering, AI video production, 3D animation and conversational AI to help businesses innovate, empower their teams, and elevate revenue.
            </p>
        </div>
    </section>

    <section class="section">
        <div class="container grid grid-2" style="align-items: center;">
            <div data-animate="left">
                <div class="eyebrow">Our Story</div>
                <h2>Built by operators, not just designers</h2>
                <p>TMO Ultimate Innovations was founded on a simple belief: every business deserves a growth engine that runs itself. We started in e-commerce, building Shopify stores that converted, then expanded into AI video, 3D animation and voice agents as our clients asked us to automate more of their pipeline.</p>
                <p>Today our name reflects our method &mdash; T-M-O: Test the idea, Model the system, Optimize relentlessly. Every engagement runs through that loop.</p>
            </div>
            <div class="about-pillars" data-animate="right">
                <div class="about-pillar card">
                    <span class="about-pillar__letter">T</span>
                    <h3>Test</h3>
                    <p>We validate the offer, funnel or automation on a small scale before scaling spend or scope.</p>
                </div>
                <div class="about-pillar card">
                    <span class="about-pillar__letter">M</span>
                    <h3>Model</h3>
                    <p>We build the repeatable system: the store, the video pipeline, the voice agent script, the booking flow.</p>
                </div>
                <div class="about-pillar card">
                    <span class="about-pillar__letter">O</span>
                    <h3>Optimize</h3>
                    <p>We measure, iterate and hand you a dashboard, not a guess.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section" style="background: #F5F6F9;">
        <div class="container">
            <x-section-heading eyebrow="Our Values" align="center">
                Innovate. Empower. Elevate.
            </x-section-heading>

            <div class="grid grid-3" style="margin-top: 40px;">
                <div class="card" style="padding: 32px;" data-animate="up">
                    <h3>Innovate</h3>
                    <p>We stay ahead of the tools &mdash; AI video, voice agents, headless commerce &mdash; so your business does too.</p>
                </div>
                <div class="card" style="padding: 32px;" data-animate="up" data-animate-delay="100">
                    <h3>Empower</h3>
                    <p>We hand off systems your team can run and update, including full admin control over your own portfolio and content.</p>
                </div>
                <div class="card" style="padding: 32px;" data-animate="up" data-animate-delay="200">
                    <h3>Elevate</h3>
                    <p>Every engagement is measured against one outcome: is this moving revenue and reputation upward.</p>
                </div>
            </div>
        </div>
    </section>

    @if ($team->isNotEmpty())
        <section class="section">
            <div class="container">
                <x-section-heading eyebrow="The Team" align="center">
                    The people behind the work
                </x-section-heading>

                <div class="grid grid-4" style="margin-top: 40px;">
                    @foreach ($team as $member)
                        <div class="team-card" data-animate="up" data-animate-delay="{{ $loop->index * 80 }}">
                            <div class="team-card__photo">
                                @if ($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}">
                                @else
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/></svg>
                                @endif
                            </div>
                            <h3>{{ $member->name }}</h3>
                            <span>{{ $member->role }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-cta-band title="Let's build your next system" subtitle="Tell us what you're trying to grow and we'll map the fastest path there.">
        <a href="{{ route('booking') }}" class="btn btn-accent">Book a Free Consultation</a>
    </x-cta-band>
@endsection