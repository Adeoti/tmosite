@extends('layouts.app')

@section('title', $portfolio->title)
@section('meta_description', $portfolio->summary)
@section('canonical', route('portfolio.show', [$category, $portfolio]))
@section('og_type', 'article')
@section('og_image', $portfolio->cover_image ? asset('storage/' . $portfolio->cover_image) : asset('images/logo.png'))

@push('structured-data')
    @php
        $tmoPortfolioSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'CreativeWork',
            'name' => $portfolio->title,
            'description' => $portfolio->summary,
            'image' => $portfolio->cover_image ? asset('storage/' . $portfolio->cover_image) : asset('images/logo.png'),
            'creator' => [
                '@type' => 'Organization',
                'name' => \App\Models\Setting::get('site_name'),
            ],
            'about' => $category->name,
        ];

        $tmoBreadcrumbSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Portfolio', 'item' => route('portfolio.index')],
                ['@type' => 'ListItem', 'position' => 2, 'name' => $category->name, 'item' => route('portfolio.category', $category)],
                ['@type' => 'ListItem', 'position' => 3, 'name' => $portfolio->title, 'item' => route('portfolio.show', [$category, $portfolio])],
            ],
        ];
    @endphp
    <x-structured-data :schema="$tmoPortfolioSchema" />
    <x-structured-data :schema="$tmoBreadcrumbSchema" />
@endpush

@section('content')
    <section class="page-hero">
        <div class="container" style="max-width: 780px;">
            <div class="breadcrumb" data-animate="fade">
                <a href="{{ route('portfolio.index') }}">Portfolio</a>
                <span>/</span>
                <a href="{{ route('portfolio.category', $category) }}">{{ $category->name }}</a>
            </div>
            <h1 data-animate="up">{{ $portfolio->title }}</h1>
            <p class="hero__subhead" data-animate="up" data-animate-delay="100">{{ $portfolio->summary }}</p>

            <div class="portfolio-meta" data-animate="up" data-animate-delay="180">
                @if ($portfolio->client_name)
                    <div>
                        <span>Client</span>
                        <strong>{{ $portfolio->client_name }}</strong>
                    </div>
                @endif
                <div>
                    <span>Category</span>
                    <strong>{{ $category->name }}</strong>
                </div>
                @if ($portfolio->project_url)
                    <div>
                        <span>Live Project</span>
                        <a href="{{ $portfolio->project_url }}" target="_blank" rel="noopener"><strong>Visit Site</strong></a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @if ($portfolio->cover_image)
        <section class="container" style="margin-bottom: 48px;">
            <img src="{{ asset('storage/' . $portfolio->cover_image) }}" alt="{{ $portfolio->title }}" class="portfolio-cover" data-animate="zoom">
        </section>
    @endif

    <section class="section" style="padding-top: 0;">
        <div class="container grid grid-2">
            <div class="portfolio-description" data-animate="left">
                <h2>The Project</h2>
                <p>{{ $portfolio->description }}</p>

                @if ($portfolio->video_url)
                    <div class="portfolio-video">
                        <iframe src="{{ $portfolio->video_url }}" title="{{ $portfolio->title }}" allowfullscreen loading="lazy"></iframe>
                    </div>
                @endif
            </div>

            @if (!empty($portfolio->results))
                <div class="portfolio-results" data-animate="right">
                    <h2>Results</h2>
                    <div class="portfolio-results__grid">
                        @foreach ($portfolio->results as $result)
                            <div class="portfolio-results__item">
                                <strong>{{ $result['value'] ?? '' }}</strong>
                                <span>{{ $result['label'] ?? '' }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    @if (!empty($portfolio->gallery))
        <section class="section" style="padding-top: 0;">
            <div class="container">
                <x-section-heading eyebrow="Gallery" align="left">Project gallery</x-section-heading>
                <div class="portfolio-gallery" data-lightbox-gallery style="margin-top: 32px;">
                    @foreach ($portfolio->gallery as $image)
                        <button type="button" class="portfolio-gallery__item" data-lightbox-trigger data-lightbox-src="{{ asset('storage/' . $image) }}">
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $portfolio->title }} gallery image" loading="lazy">
                        </button>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($related->isNotEmpty())
        <section class="section" style="background: #F5F6F9;">
            <div class="container">
                <x-section-heading eyebrow="More From This Studio" align="left">
                    Related work
                </x-section-heading>
                <div class="grid grid-3" style="margin-top: 40px;">
                    @foreach ($related as $item)
                        <x-portfolio-card :portfolio="$item" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-cta-band title="Want a project like this?" subtitle="Book a free consultation and tell us about your goals.">
        <a href="{{ route('booking') }}" class="btn btn-accent">Book a Free Consultation</a>
    </x-cta-band>
@endsection

@push('scripts')
    <div class="lightbox" data-lightbox aria-hidden="true">
        <button type="button" class="lightbox__close" data-lightbox-close aria-label="Close gallery">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
        <img src="" alt="" data-lightbox-image>
    </div>
@endpush