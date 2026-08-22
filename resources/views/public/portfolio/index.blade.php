@extends('layouts.app')

@section('title', 'Portfolio')
@section('meta_description', 'Explore TMO Ultimate Innovations portfolio across Shopify and e-commerce, AI video production, 3D animation and AI voice agents.')

@section('content')
    <section class="page-hero">
        <div class="container" style="max-width: 760px; text-align: center;">
            <div class="eyebrow" style="justify-content: center;">Portfolio</div>
            <h1 data-animate="up">Work, sectioned by craft</h1>
            <p class="hero__subhead" data-animate="up" data-animate-delay="120">
                Browse by studio to see the exact kind of work we do for businesses like yours.
            </p>
        </div>
    </section>

    <section class="section" style="padding-top: 0;">
        <div class="container">
            <div class="grid grid-4">
                @foreach ($categories as $category)
                    <a href="{{ route('portfolio.category', $category) }}" class="portfolio-category-card card" data-animate="up" data-animate-delay="{{ $loop->index * 80 }}">
                        <h3>{{ $category->name }}</h3>
                        <p>{{ $category->description }}</p>
                        <span class="portfolio-category-card__count">{{ $category->portfolios_count }} {{ $category->portfolios_count === 1 ? 'project' : 'projects' }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @if ($featuredPortfolios->isNotEmpty())
        <section class="section" style="background: #F5F6F9;">
            <div class="container">
                <x-section-heading eyebrow="Featured" align="left">
                    Highlighted case studies
                </x-section-heading>

                <div class="grid grid-3" style="margin-top: 40px;">
                    @foreach ($featuredPortfolios as $portfolio)
                        <x-portfolio-card :portfolio="$portfolio" />
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section class="section" style="background: #F5F6F9;">
            <div class="container" style="text-align: center; max-width: 560px;">
                <p style="color: var(--color-muted);">Case studies for each studio are being added to the admin panel. Check back soon, or book a call to see recent work directly.</p>
                <a href="{{ route('booking') }}" class="btn btn-primary">Book a Free Consultation</a>
            </div>
        </section>
    @endif
@endsection