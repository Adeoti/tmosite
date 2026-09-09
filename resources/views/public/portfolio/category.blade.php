@extends('layouts.app')

@section('title', $category->name)
@section('meta_description', $category->description)
@section('body_class', 'tmo-nav-dark')

@section('content')

<x-page-hero eyebrow="Portfolio" variant="dark">
    <h1 data-animate="up">{{ $category->name }}</h1>
    <p class="tmo-page-hero__subhead" data-animate="up" data-animate-delay="120">{{ $category->description }}</p>
</x-page-hero>

<section class="tmo-portfolio-listing">
    <div class="container">

        <div class="tmo-portfolio-filter" data-animate="fade">

            <a href="{{ route('portfolio.index') }}" class="tmo-portfolio-filter__chip">All</a>

            @foreach ($categories as $chip)

                <a href="{{ route('portfolio.category', $chip) }}" class="tmo-portfolio-filter__chip {{ $chip->id === $category->id ? 'is-active' : '' }}">
                    {{ $chip->name }}
                </a>

            @endforeach

        </div>

        @if ($portfolios->isEmpty())

            <div class="tmo-portfolio-empty">
                <p>No published case studies in this category yet.</p>
                <a href="{{ route('booking') }}" class="tmo-btn tmo-btn--gold">Book a Free Consultation</a>
            </div>

        @else

            <div class="tmo-page-grid tmo-page-grid--3 tmo-portfolio-grid">

                @foreach ($portfolios as $portfolio)
                    <x-portfolio-card :portfolio="$portfolio" />
                @endforeach

            </div>

            <div class="tmo-pagination">
                {{ $portfolios->links() }}
            </div>

        @endif

    </div>
</section>

<x-cta-band title="Want results like these?" subtitle="Tell us about your project and we'll show you exactly how we'd approach it.">
    <a href="{{ route('booking') }}" class="tmo-btn tmo-btn--gold">
        Book a Free Consultation

        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M5 12h14"/>
            <path d="m13 6 6 6-6 6"/>
        </svg>
    </a>
</x-cta-band>

@endsection