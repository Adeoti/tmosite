@extends('layouts.app')

@section('title', 'Services')
@section('meta_description', 'Shopify and e-commerce, AI video production, 3D animation and AI voice agents, all under one roof at TMO Ultimate Innovations.')
@section('body_class', 'tmo-nav-dark')

@section('content')

<x-page-hero eyebrow="Services" variant="dark">
    <h1 data-animate="up">Four studios, one growth engine</h1>
    <p class="tmo-page-hero__subhead" data-animate="up" data-animate-delay="120">
        Pick a single studio or combine all four into one connected system that builds, films, animates and talks to your customers for you.
    </p>
</x-page-hero>

<section class="tmo-services">
    <div class="container">

        @foreach ($categories as $category)

            <div class="tmo-service-detail {{ $loop->even ? 'tmo-service-detail--reverse' : '' }}" data-animate="up">

                <div class="tmo-service-detail__copy">

                    <span class="tmo-section-number">
                        {{ sprintf('0%d / %s', $loop->iteration, strtoupper($category->name)) }}
                    </span>

                    <h2>{{ $category->name }}</h2>

                    <p>{{ $category->description }}</p>

                    <a href="{{ route('portfolio.category', $category) }}" class="tmo-btn tmo-btn--outline-light">
                        View {{ $category->name }} Work

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14"/>
                            <path d="m13 6 6 6-6 6"/>
                        </svg>
                    </a>

                </div>

                <div class="tmo-service-detail__visual">

                    @if ($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" loading="lazy">
                    @else
                        <div class="tmo-service-detail__placeholder">
                            <svg viewBox="0 0 200 200" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true">
                                <circle cx="100" cy="100" r="80"/>
                                <circle cx="100" cy="100" r="50"/>
                                <circle cx="100" cy="100" r="20"/>
                            </svg>
                        </div>
                    @endif

                    <div class="tmo-service-detail__ring"></div>

                </div>

            </div>

        @endforeach

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

<x-cta-band title="Not sure which studio you need?" subtitle="Book a free consultation and we'll map the right mix for your goals.">
    <a href="{{ route('booking') }}" class="tmo-btn tmo-btn--gold">
        Book a Free Consultation

        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M5 12h14"/>
            <path d="m13 6 6 6-6 6"/>
        </svg>
    </a>
</x-cta-band>

@endsection