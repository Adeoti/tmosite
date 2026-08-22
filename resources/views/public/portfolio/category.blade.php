@extends('layouts.app')

@section('title', $category->name)
@section('meta_description', $category->description)

@section('content')
    <section class="page-hero">
        <div class="container" style="max-width: 760px; text-align: center;">
            <div class="eyebrow" style="justify-content: center;">Portfolio</div>
            <h1 data-animate="up">{{ $category->name }}</h1>
            <p class="hero__subhead" data-animate="up" data-animate-delay="120">{{ $category->description }}</p>
        </div>
    </section>

    <section class="section" style="padding-top: 0;">
        <div class="container">
            <div class="portfolio-filter" data-animate="fade">
                <a href="{{ route('portfolio.index') }}" class="portfolio-filter__chip">All</a>
                @foreach ($categories as $chip)
                    <a href="{{ route('portfolio.category', $chip) }}" class="portfolio-filter__chip {{ $chip->id === $category->id ? 'is-active' : '' }}">
                        {{ $chip->name }}
                    </a>
                @endforeach
            </div>

            @if ($portfolios->isEmpty())
                <div style="text-align: center; padding: 64px 0;">
                    <p style="color: var(--color-muted);">No published case studies in this category yet.</p>
                    <a href="{{ route('booking') }}" class="btn btn-primary">Book a Free Consultation</a>
                </div>
            @else
                <div class="grid grid-3" style="margin-top: 40px;">
                    @foreach ($portfolios as $portfolio)
                        <x-portfolio-card :portfolio="$portfolio" />
                    @endforeach
                </div>

                <div style="margin-top: 48px;">
                    {{ $portfolios->links() }}
                </div>
            @endif
        </div>
    </section>

    <x-cta-band title="Want results like these?" subtitle="Tell us about your project and we'll show you exactly how we'd approach it.">
        <a href="{{ route('booking') }}" class="btn btn-accent">Book a Free Consultation</a>
    </x-cta-band>
@endsection