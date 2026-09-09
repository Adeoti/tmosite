@extends('layouts.app')

@section('title', \App\Models\Setting::get('site_name'))

@section('meta_description', \App\Models\Setting::get('hero_subheadline', 'AI-powered commerce, cinematic content, 3D
    experiences and intelligent automation for ambitious businesses.'))

@section('content')

    {{-- =========================================================
   HERO
   ========================================================= --}}
    <section class="tmo-hero">

        <div class="tmo-hero__orb tmo-hero__orb--one"></div>
        <div class="tmo-hero__orb tmo-hero__orb--two"></div>
        <div class="tmo-hero__grid"></div>

        <div class="container tmo-hero__inner">

            <div class="tmo-hero__content">

                <div class="tmo-kicker">
                    <span class="tmo-kicker__dot"></span>
                    TMO Ultimate Innovations
                </div>

                <h1>
                    We build the
                    <span>systems behind</span>
                    ambitious businesses.
                </h1>

                <p>
                    {{ \App\Models\Setting::get(
                        'hero_subheadline',
                        'AI-powered commerce, cinematic content, 3D experiences and intelligent automation — designed to move your business forward.',
                    ) }}
                </p>

                <div class="tmo-hero__actions">

                    <a href="{{ route('booking') }}" class="tmo-btn tmo-btn--light">
                        Start a Project

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14" />
                            <path d="m13 6 6 6-6 6" />
                        </svg>
                    </a>

                    <a href="{{ route('portfolio.index') }}" class="tmo-btn tmo-btn--ghost">
                        Explore Our Work
                    </a>

                </div>

            </div>


            <div class="tmo-hero__visual" aria-hidden="true">

                <div class="tmo-hero-card tmo-hero-card--main">

                    <div class="tmo-hero-card__top">
                        <span>INNOVATION SYSTEM</span>

                        <span class="tmo-hero-card__status">
                            <i></i>
                            LIVE
                        </span>
                    </div>

                    <div class="tmo-hero-card__sphere">
                        <div class="tmo-sphere"></div>

                        <div class="tmo-sphere__ring tmo-sphere__ring--one"></div>
                        <div class="tmo-sphere__ring tmo-sphere__ring--two"></div>
                        <div class="tmo-sphere__ring tmo-sphere__ring--three"></div>
                    </div>

                    <div class="tmo-hero-card__bottom">
                        <span>AI</span>
                        <span>COMMERCE</span>
                        <span>3D</span>
                        <span>AUTOMATION</span>
                    </div>

                </div>


                <div class="tmo-floating-card tmo-floating-card--top">
                    <span class="tmo-floating-card__label">
                        DIGITAL
                    </span>

                    <strong>01</strong>
                </div>


                <div class="tmo-floating-card tmo-floating-card--bottom">
                    <span class="tmo-floating-card__label">
                        INTELLIGENT
                    </span>

                    <strong>∞</strong>
                </div>

            </div>

        </div>


        <div class="tmo-hero__bottom">

            <div class="container">

                <div class="tmo-hero__scroll">
                    <span>Scroll to explore</span>
                    <div class="tmo-hero__scroll-line"></div>
                </div>

                <div class="tmo-hero__statement">
                    <span>01</span>
                    <p>
                        Technology should create momentum, not complexity.
                    </p>
                </div>

            </div>

        </div>

    </section>

    <section class="tmo-stats">
        <div class="container tmo-stats__grid">
            <x-stat-counter :value="\App\Models\Setting::get('stat1_value', 0)" :suffix="\App\Models\Setting::get('stat1_suffix', '')" :label="\App\Models\Setting::get('stat1_label', '')" />

            <x-stat-counter :value="\App\Models\Setting::get('stat2_value', 0)" :suffix="\App\Models\Setting::get('stat2_suffix', '')" :label="\App\Models\Setting::get('stat2_label', '')" />

            <x-stat-counter :value="\App\Models\Setting::get('stat3_value', 0)" :suffix="\App\Models\Setting::get('stat3_suffix', '')" :label="\App\Models\Setting::get('stat3_label', '')" />
        </div>
    </section>

    {{-- =========================================================
   INTRO
   ========================================================= --}}
    <section class="tmo-intro">

        <div class="container">

            <div class="tmo-intro__grid">

                <div class="tmo-intro__eyebrow">
                    <span>02</span>
                    What we do
                </div>

                <div class="tmo-intro__content">

                    <h2>
                        Ideas are everywhere.
                        <em>Execution is rare.</em>
                    </h2>

                    <p>
                        TMO brings strategy, technology and creative production
                        together under one roof — so your digital presence
                        doesn't just look better, it performs better.
                    </p>

                    <a href="{{ route('portfolio.index') }}" class="tmo-text-link">

                        Discover what we build

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14" />
                            <path d="m13 6 6 6-6 6" />
                        </svg>

                    </a>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
   CAPABILITIES
   ========================================================= --}}
    <section class="tmo-capabilities" id="services">

        <div class="container">

            <div class="tmo-section-head">

                <div>

                    <span class="tmo-section-number">
                        03 / CAPABILITIES
                    </span>

                    <h2>
                        Built for the
                        <span>next version</span>
                        of business.
                    </h2>

                </div>

                <p>
                    Four disciplines. One connected growth engine.
                </p>

            </div>


            <div class="tmo-capabilities__list">

                @foreach ($categories as $category)
                    <a href="{{ route('portfolio.category', $category) }}" class="tmo-capability" data-animate="up">

                        <div class="tmo-capability__number">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </div>

                        <div class="tmo-capability__title">
                            <h3>{{ $category->name }}</h3>
                        </div>

                        <div class="tmo-capability__description">

                            <p>
                                {{ $category->description }}
                            </p>

                            <span>
                                Explore

                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M5 12h14" />
                                    <path d="m13 6 6 6-6 6" />
                                </svg>
                            </span>

                        </div>

                        <div class="tmo-capability__arrow">

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M5 12h14" />
                                <path d="m13 5 7 7-7 7" />
                            </svg>

                        </div>

                    </a>
                @endforeach

            </div>

        </div>

    </section>


    {{-- =========================================================
   SELECTED WORK
========================================================= --}}
    @if ($featuredPortfolios->isNotEmpty())

        <section class="tmo-work" id="portfolio">

            <div class="container">

                <div class="tmo-work__header">
                    <div>
                        <span class="tmo-section-number">04 / SELECTED WORK</span>

                        <h2>
                            Work that
                            <span>speaks for itself.</span>
                        </h2>
                    </div>

                    <a href="{{ route('portfolio.index') }}" class="tmo-work__view-all">
                        <span>View all work</span>

                        <i>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14" />
                                <path d="m13 6 6 6-6 6" />
                            </svg>
                        </i>
                    </a>
                </div>


                <div class="tmo-work-orbit">

                    @foreach ($featuredPortfolios as $portfolio)
                        <a href="{{ route('portfolio.show', [$portfolio->category, $portfolio]) }}"
                        class="tmo-orbit-card"
                        data-animate="up"
                        data-animate-delay="{{ $loop->index * 90 }}"
                        >

                        <div class="tmo-orbit-card__circle">

                            <img src="{{ asset('storage/' . $portfolio->cover_image) }}"
                                alt="{{ $portfolio->title }}" loading="lazy">

                            <div class="tmo-orbit-card__ring"></div>

                            <div class="tmo-orbit-card__overlay">
                                <i>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="m13 6 6 6-6 6" />
                                    </svg>
                                </i>
                            </div>

                        </div>

                        <div class="tmo-orbit-card__meta">

                            <span class="tmo-orbit-card__category">
                                {{ $portfolio->category->name ?? 'Project' }}
                            </span>

                            <h3>{{ $portfolio->title }}</h3>

                            <span class="tmo-orbit-card__number">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>

                        </div>

                        </a>
                    @endforeach

                </div>

            </div>

        </section>

    @endif

    {{-- =========================================================
   TMO DIFFERENCE
   ========================================================= --}}
    <section class="tmo-difference">

        <div class="container">

            <div class="tmo-difference__grid">

                <div class="tmo-difference__intro">

                    <span class="tmo-section-number">
                        05 / THE TMO DIFFERENCE
                    </span>

                    <h2>
                        Where technology
                        meets <span>imagination.</span>
                    </h2>

                    <p>
                        We don't believe technology and creativity should live
                        in separate departments. The strongest brands happen
                        where the two collide.
                    </p>

                </div>


                <div class="tmo-difference__stack">

                    <div class="tmo-difference-card">
                        <span>01</span>

                        <h3>Strategy</h3>

                        <p>
                            We identify the opportunity before we build
                            the solution.
                        </p>
                    </div>


                    <div class="tmo-difference-card">
                        <span>02</span>

                        <h3>Design</h3>

                        <p>
                            Every interaction is designed to feel intentional,
                            premium and unmistakably yours.
                        </p>
                    </div>


                    <div class="tmo-difference-card">
                        <span>03</span>

                        <h3>Technology</h3>

                        <p>
                            AI, automation and digital infrastructure turn
                            ideas into systems that scale.
                        </p>
                    </div>


                    <div class="tmo-difference-card">
                        <span>04</span>

                        <h3>Growth</h3>

                        <p>
                            The end goal isn't technology.
                            It's measurable momentum.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
   PASSIVE INCOME
   ========================================================= --}}
    <section class="tmo-passive" id="passive-income">

        <div class="tmo-passive__glow"></div>

        <div class="container">

            <div class="tmo-passive__content">

                <span class="tmo-section-number">
                    06 / PASSIVE INCOME SYSTEMS
                </span>

                <h2>
                    What if your
                    business kept working
                    <em>without you?</em>
                </h2>

                <p>
                    We build digital assets, automated funnels, AI-powered
                    stores and intelligent lead systems designed to create
                    revenue beyond the hours you spend working.
                </p>

                <a href="{{ route('passive-income') }}" class="tmo-btn tmo-btn--light">

                    Explore Passive Income

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14" />
                        <path d="m13 6 6 6-6 6" />
                    </svg>

                </a>

            </div>


            <div class="tmo-passive__visual" aria-hidden="true">

                <div class="tmo-passive__ring tmo-passive__ring--one"></div>
                <div class="tmo-passive__ring tmo-passive__ring--two"></div>
                <div class="tmo-passive__ring tmo-passive__ring--three"></div>

                <div class="tmo-passive__core">
                    <span>∞</span>
                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
   PROCESS
   ========================================================= --}}
    <section class="tmo-process">

        <div class="container">

            <div class="tmo-section-head">

                <div>

                    <span class="tmo-section-number">
                        07 / PROCESS
                    </span>

                    <h2>
                        From first
                        <span>conversation</span>
                        to launch.
                    </h2>

                </div>

            </div>


            <div class="tmo-process__timeline">

                <div class="tmo-process__line"></div>


                <div class="tmo-process-step">

                    <span>01</span>

                    <h3>Discover</h3>

                    <p>
                        Understand the business, audience and opportunity.
                    </p>

                </div>


                <div class="tmo-process-step">

                    <span>02</span>

                    <h3>Design</h3>

                    <p>
                        Shape the experience, strategy and creative direction.
                    </p>

                </div>


                <div class="tmo-process-step">

                    <span>03</span>

                    <h3>Build</h3>

                    <p>
                        Turn the strategy into a working digital system.
                    </p>

                </div>


                <div class="tmo-process-step">

                    <span>04</span>

                    <h3>Scale</h3>

                    <p>
                        Optimise, automate and create the next opportunity.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
   CLIENT STORIES
========================================================= --}}
    @if ($testimonials->isNotEmpty())

        <section class="tmo-testimonial">

            <div class="tmo-testimonial__orb tmo-testimonial__orb--one"></div>
            <div class="tmo-testimonial__orb tmo-testimonial__orb--two"></div>

            <div class="container">

                <div class="tmo-testimonial__header">

                    <span class="tmo-section-number">
                        08 / CLIENT STORIES
                    </span>

                    <span class="tmo-testimonial__eyebrow">
                        Real people. Real outcomes.
                    </span>

                </div>


                <div class="tmo-testimonial__intro">

                    <div class="tmo-testimonial__symbol">
                        <span>“</span>
                    </div>

                    <div class="tmo-testimonial__headline">

                        <h2>
                            We don't just want clients
                            to be satisfied.
                            <em>We want them to feel transformed.</em>
                        </h2>

                    </div>

                </div>


                <div class="tmo-testimonial__stories">

                    @foreach ($testimonials->take(2) as $testimonial)
                        <article class="tmo-testimonial-story" data-animate="up"
                            data-animate-delay="{{ $loop->index * 120 }}">

                            <div class="tmo-testimonial-story__index">
                                <span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>


                            <div class="tmo-testimonial-story__main">

                                <div class="tmo-testimonial-story__stars">
                                    @for ($i = 0; $i < $testimonial->rating; $i++)
                                        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                    @endfor
                                </div>

                                <blockquote>
                                    “{{ $testimonial->content }}”
                                </blockquote>

                            </div>


                            <div class="tmo-testimonial-story__author">

                                <span class="tmo-testimonial-story__author-line"></span>

                                <div>
                                    <strong>
                                        {{ $testimonial->client_name }}
                                    </strong>

                                    <span>
                                        {{ $testimonial->client_role }}
                                        @if ($testimonial->company)
                                            · {{ $testimonial->company }}
                                        @endif
                                    </span>
                                </div>

                            </div>

                        </article>
                    @endforeach

                </div>


                <div class="tmo-testimonial__footer">

                    <span>TRUSTED BY PEOPLE BUILDING WHAT'S NEXT</span>

                    <div class="tmo-testimonial__footer-line"></div>

                    <span>{{ str_pad($testimonials->count(), 2, '0', STR_PAD_LEFT) }}+ client voices</span>

                </div>

            </div>

        </section>

    @endif


    {{-- =========================================================
   INSIGHTS
========================================================= --}}
    @if ($latestPosts->isNotEmpty())

        <section class="tmo-insights" id="blog">

            <div class="container">

                @php
                    $tmoLeadPost = $latestPosts->first();
                    $tmoRestPosts = $latestPosts->slice(1)->take(3);
                @endphp


                <div class="tmo-insights__header">

                    <div>

                        <span class="tmo-section-number">
                            09 / INSIGHTS
                        </span>

                        <h2>
                            Thinking beyond
                            <span>the obvious.</span>
                        </h2>

                    </div>


                    <a href="{{ route('blog.index') }}" class="tmo-insights__journal">

                        <span>Enter the journal</span>

                        <i>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14" />
                                <path d="m13 6 6 6-6 6" />
                            </svg>
                        </i>

                    </a>

                </div>


                <div class="tmo-insights__editorial">

                    {{-- LEAD STORY --}}
                    <a href="{{ route('blog.show', $tmoLeadPost) }}" class="tmo-insight-featured" data-animate="up">

                        <div class="tmo-insight-featured__media">

                            @if ($tmoLeadPost->featured_image)
                                <img src="{{ asset('storage/' . $tmoLeadPost->featured_image) }}"
                                    alt="{{ $tmoLeadPost->title }}" loading="lazy">
                            @endif

                            <div class="tmo-insight-featured__veil"></div>

                            <div class="tmo-insight-featured__number">
                                01
                            </div>

                            <div class="tmo-insight-featured__read">
                                <span>Read story</span>

                                <i>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="m13 6 6 6-6 6" />
                                    </svg>
                                </i>
                            </div>

                        </div>


                        <div class="tmo-insight-featured__content">

                            <div class="tmo-insight-featured__date">
                                {{ optional($tmoLeadPost->published_at)->format('M d, Y') }}
                            </div>

                            <h3>
                                {{ $tmoLeadPost->title }}
                            </h3>

                            @if ($tmoLeadPost->excerpt)
                                <p>
                                    {{ $tmoLeadPost->excerpt }}
                                </p>
                            @endif

                        </div>

                    </a>


                    {{-- SECONDARY STORIES --}}
                    <div class="tmo-insights__list">

                        @foreach ($tmoRestPosts as $post)
                            <a href="{{ route('blog.show', $post) }}" class="tmo-insight-row" data-animate="up"
                                data-animate-delay="{{ $loop->index * 90 }}">

                                <div class="tmo-insight-row__number">
                                    {{ str_pad($loop->iteration + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>


                                <div class="tmo-insight-row__image">

                                    @if ($post->featured_image)
                                        <img src="{{ asset('storage/' . $post->featured_image) }}"
                                            alt="{{ $post->title }}" loading="lazy">
                                    @endif

                                </div>


                                <div class="tmo-insight-row__content">

                                    <span>
                                        {{ optional($post->published_at)->format('M d, Y') }}
                                    </span>

                                    <h3>
                                        {{ $post->title }}
                                    </h3>

                                </div>


                                <div class="tmo-insight-row__arrow">

                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="m13 6 6 6-6 6" />
                                    </svg>

                                </div>

                            </a>
                        @endforeach

                    </div>

                </div>


                <div class="tmo-insights__bottom">

                    <span>IDEAS · TECHNOLOGY · STRATEGY · CULTURE</span>

                    <span class="tmo-insights__bottom-mark">TMO / JOURNAL</span>

                </div>

            </div>

        </section>

    @endif


    {{-- =========================================================
   FINAL CTA
   ========================================================= --}}
    <section class="tmo-final-cta">

        <div class="tmo-final-cta__grid"></div>

        <div class="container">

            <div class="tmo-final-cta__content">

                <span class="tmo-section-number">
                    10 / LET'S BUILD
                </span>

                <h2>
                    Your next chapter
                    starts <em>here.</em>
                </h2>

                <p>
                    Tell us where you want to go.
                    We'll help you build the system to get there.
                </p>


                <div class="tmo-final-cta__actions">

                    <a href="{{ route('booking') }}" class="tmo-btn tmo-btn--light">

                        Book a Free Consultation

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14" />
                            <path d="m13 6 6 6-6 6" />
                        </svg>

                    </a>


                    <a href="{{ $whatsappLink ?? '#' }}" target="_blank" rel="noopener" class="tmo-btn tmo-btn--ghost">
                        Chat on WhatsApp
                    </a>

                </div>

            </div>

        </div>

    </section>

@endsection
