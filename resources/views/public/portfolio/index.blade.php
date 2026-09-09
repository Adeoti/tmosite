@extends('layouts.app')

@section('title', 'Portfolio')
@section('meta_description', 'Explore TMO Ultimate Innovations portfolio across Shopify and e-commerce, AI video production, 3D animation and AI voice agents.')
@section('body_class', 'tmo-nav-dark')

@section('content')

<x-page-hero eyebrow="Portfolio" variant="dark">
    <h1 data-animate="up">Work, sectioned by craft</h1>
    <p class="tmo-page-hero__subhead" data-animate="up" data-animate-delay="120">
        Browse by studio to see the exact kind of work we do for businesses like yours.
    </p>
</x-page-hero>

<section class="tmo-portfolio-hub">
    <div class="container">

        <div class="tmo-page-grid tmo-page-grid--4">

            @foreach ($categories as $category)

                <a href="{{ route('portfolio.category', $category) }}" class="tmo-category-card" data-animate="up" data-animate-delay="{{ $loop->index * 80 }}">
                    <h3>{{ $category->name }}</h3>
                    <p>{{ $category->description }}</p>
                    <span class="tmo-category-card__count">{{ $category->portfolios_count }} {{ $category->portfolios_count === 1 ? 'project' : 'projects' }}</span>
                </a>

            @endforeach

        </div>

    </div>
</section>

@if ($featuredPortfolios->isNotEmpty())

    <section class="tmo-portfolio-featured">
        <div class="container">

            <x-section-heading eyebrow="FEATURED" align="left">
                Highlighted case studies
            </x-section-heading>

            <div class="tmo-page-grid tmo-page-grid--3">

                @foreach ($featuredPortfolios as $portfolio)
                    <x-portfolio-card :portfolio="$portfolio" />
                @endforeach

            </div>

        </div>
    </section>

@else

    <section class="tmo-portfolio-featured">
        <div class="container tmo-portfolio-empty">
            <p>Case studies for each studio are being added to the admin panel. Check back soon, or book a call to see recent work directly.</p>
            <a href="{{ route('booking') }}" class="tmo-btn tmo-btn--gold">Book a Free Consultation</a>
        </div>
    </section>

@endif

@endsection