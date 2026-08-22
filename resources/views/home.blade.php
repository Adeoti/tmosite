@extends('layouts.app')

@section('title', \App\Models\Setting::get('site_name'))
@section('meta_description', \App\Models\Setting::get('hero_subheadline'))

@section('content')
    <x-hero-carousel :slides="$heroSlides" />

    <section class="hero-stats-strip">
        <div class="container hero-stats-strip__inner" data-animate="up">
            <x-stat-counter :value="(int) \App\Models\Setting::get('stat1_value', 0)" :suffix="\App\Models\Setting::get('stat1_suffix', '')" :label="\App\Models\Setting::get('stat1_label', '')" />
            <x-stat-counter :value="(int) \App\Models\Setting::get('stat2_value', 0)" :suffix="\App\Models\Setting::get('stat2_suffix', '')" :label="\App\Models\Setting::get('stat2_label', '')" />
            <x-stat-counter :value="(int) \App\Models\Setting::get('stat3_value', 0)" :suffix="\App\Models\Setting::get('stat3_suffix', '')" :label="\App\Models\Setting::get('stat3_label', '')" />
        </div>
    </section>

    <section class="section" id="services" style="padding-top: 56px;">
        <div class="container">
            <x-section-heading eyebrow="What We Build" align="left" :description="'Four specialist studios under one roof, so every part of your growth engine speaks the same language.'">
                Services engineered for growth
            </x-section-heading>

            <div class="grid grid-4" style="margin-top: 48px;">
                @foreach ($categories as $category)
                    <a href="{{ route('portfolio.category', $category) }}" class="service-card card" data-animate="up" data-animate-delay="{{ $loop->index * 80 }}">
                        <div class="service-card__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="12" cy="12" r="9"/><path d="M9 12l2 2 4-4"/></svg>
                        </div>
                        <h3>{{ $category->name }}</h3>
                        <p>{{ $category->description }}</p>
                        <span class="service-card__link">
                            View Work
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @if ($featuredPortfolios->isNotEmpty())
        <section class="section" id="portfolio" style="background: #F5F6F9;">
            <div class="container">
                <x-section-heading eyebrow="Recent Work" align="left">
                    Featured case studies
                </x-section-heading>

                <div class="grid grid-3" style="margin-top: 48px;">
                    @foreach ($featuredPortfolios as $portfolio)
                        <x-portfolio-card :portfolio="$portfolio" />
                    @endforeach
                </div>

                <div style="text-align: center; margin-top: 40px;">
                    <a href="{{ route('portfolio.index') }}" class="btn btn-outline">See All Portfolio</a>
                </div>
            </div>
        </section>
    @endif

    <section class="section" id="passive-income" style="background: var(--color-navy); color: #fff;">
        <div class="container" style="text-align: center; max-width: 720px;">
            <div class="eyebrow" style="justify-content: center;">New</div>
            <h2 style="color: #fff;" data-animate="up">Passive Income Systems</h2>
            <p style="opacity: 0.82;" data-animate="up" data-animate-delay="100">
                Done-for-you digital assets and automated funnels engineered to earn while you sleep, from AI-run stores to voice-agent lead machines.
            </p>
            <a href="{{ route('passive-income') }}" class="btn btn-accent" style="margin-top: 12px;" data-animate="up" data-animate-delay="180">Explore Passive Income</a>
        </div>
    </section>

    @if ($testimonials->isNotEmpty())
        <section class="section">
            <div class="container">
                <x-section-heading eyebrow="Client Voices" align="center">
                    Trusted by ambitious brands
                </x-section-heading>

                <div class="grid grid-3" style="margin-top: 48px;">
                    @foreach ($testimonials as $testimonial)
                        <x-testimonial-card :testimonial="$testimonial" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($latestPosts->isNotEmpty())
        <section class="section" style="background: #F5F6F9;" id="blog">
            <div class="container">
                <x-section-heading eyebrow="From the Blog" align="left">
                    Insights on growth and automation
                </x-section-heading>

                <div class="home-blog" style="margin-top: 48px;">
                    @php
                        $tmoLeadPost = $latestPosts->first();
                        $tmoRestPosts = $latestPosts->slice(1);
                    @endphp

                    <a href="{{ route('blog.show', $tmoLeadPost) }}" class="home-blog__lead card" data-animate="up">
                        <div class="home-blog__lead-media">
                            @if ($tmoLeadPost->featured_image)
                                <img src="{{ asset('storage/' . $tmoLeadPost->featured_image) }}" alt="{{ $tmoLeadPost->title }}" loading="lazy">
                            @endif
                        </div>
                        <div class="home-blog__lead-body">
                            <span class="blog-card__meta">
                                {{ optional($tmoLeadPost->published_at)->format('M d, Y') }}
                                @if ($tmoLeadPost->category)
                                    &middot; {{ $tmoLeadPost->category->name }}
                                @endif
                            </span>
                            <h3>{{ $tmoLeadPost->title }}</h3>
                            <p>{{ $tmoLeadPost->excerpt }}</p>
                            <span class="service-card__link">
                                Read Article
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                            </span>
                        </div>
                    </a>

                    @if ($tmoRestPosts->isNotEmpty())
                        <div class="home-blog__grid">
                            @foreach ($tmoRestPosts as $post)
                                <a href="{{ route('blog.show', $post) }}" class="home-blog__item card" data-animate="up" data-animate-delay="{{ $loop->index * 70 }}">
                                    <div class="home-blog__item-media">
                                        @if ($post->featured_image)
                                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="home-blog__item-body">
                                        <span class="blog-card__meta">{{ optional($post->published_at)->format('M d, Y') }}</span>
                                        <h4>{{ $post->title }}</h4>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div style="text-align: center; margin-top: 40px;">
                    <a href="{{ route('blog.index') }}" class="btn btn-outline">Read More Articles</a>
                </div>
            </div>
        </section>
    @endif

    <x-cta-band title="Ready to elevate your business?" subtitle="Book a free 20-minute consultation and leave with a clear plan.">
        <a href="{{ route('booking') }}" class="btn btn-accent">Book a Free Consultation</a>
        <a href="{{ $whatsappLink ?? '#' }}" target="_blank" rel="noopener" class="btn btn-outline" style="color: #fff; border-color: rgba(255,255,255,0.4);">Chat on WhatsApp</a>
    </x-cta-band>
@endsection