@extends('layouts.app')

@section('title', 'Services')
@section('meta_description', 'Shopify and e-commerce, AI video production, 3D animation and AI voice agents, all under one roof at TMO Ultimate Innovations.')

@section('content')
    <section class="page-hero">
        <div class="container" style="max-width: 760px; text-align: center;">
            <div class="eyebrow" style="justify-content: center;">Services</div>
            <h1 data-animate="up">Four studios, one growth engine</h1>
            <p class="hero__subhead" data-animate="up" data-animate-delay="120">
                Pick a single studio or combine all four into one connected system that builds, films, animates and talks to your customers for you.
            </p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            @foreach ($categories as $category)
                <div class="service-detail {{ $loop->even ? 'service-detail--reverse' : '' }}" data-animate="up">
                    <div class="service-detail__copy">
                        <div class="eyebrow">{{ sprintf('0%d', $loop->iteration) }}</div>
                        <h2>{{ $category->name }}</h2>
                        <p>{{ $category->description }}</p>
                        <a href="{{ route('portfolio.category', $category) }}" class="btn btn-outline">
                            View {{ $category->name }} Work
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                    <div class="service-detail__visual {{ $category->image ? 'service-detail__visual--photo' : '' }}">
                        @if ($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" data-animate="zoom" loading="lazy">
                        @else
                            <svg viewBox="0 0 200 200" fill="none" stroke="currentColor" stroke-width="1.2">
                                <circle cx="100" cy="100" r="80"/>
                                <circle cx="100" cy="100" r="50"/>
                                <circle cx="100" cy="100" r="20"/>
                            </svg>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @if ($faqs->isNotEmpty())
        <section class="section" style="background: #F5F6F9;">
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

    <x-cta-band title="Not sure which studio you need?" subtitle="Book a free consultation and we'll map the right mix for your goals.">
        <a href="{{ route('booking') }}" class="btn btn-accent">Book a Free Consultation</a>
    </x-cta-band>
@endsection