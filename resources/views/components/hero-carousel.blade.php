@props(['slides'])

@php
    $tmoSlides = $slides->isNotEmpty() ? $slides : collect([
        (object) [
            'headline' => \App\Models\Setting::get('hero_headline'),
            'subheadline' => \App\Models\Setting::get('hero_subheadline'),
            'image' => null,
            'cta_label' => 'Book a Free Consultation',
            'cta_url' => route('booking'),
            'secondary_cta_label' => 'View Portfolio',
            'secondary_cta_url' => route('portfolio.index'),
        ],
    ]);
    $tmoMultiSlide = $tmoSlides->count() > 1;
@endphp

<section class="hero-carousel" data-hero-carousel>
    <div class="hero-carousel__track">
        @foreach ($tmoSlides as $slide)
            <div
                class="hero-carousel__slide {{ $loop->first ? 'is-active' : '' }} {{ empty($slide->image) ? 'hero-carousel__slide--gradient' : '' }}"
                data-hero-slide
                @unless (empty($slide->image))
                    style="background-image: url('{{ asset('storage/' . $slide->image) }}');"
                @endunless
            >
                <div class="hero-carousel__scrim"></div>
                <div class="container hero-carousel__content">
                    <div class="eyebrow" style="color: var(--color-champagne);">Innovate | Empower | Elevate</div>
                    <h1 class="hero-carousel__headline">{{ $slide->headline }}</h1>
                    @if (!empty($slide->subheadline))
                        <p class="hero-carousel__subhead">{{ $slide->subheadline }}</p>
                    @endif
                    <div class="hero-carousel__actions">
                        @if (!empty($slide->cta_label) && !empty($slide->cta_url))
                            <a href="{{ $slide->cta_url }}" class="btn btn-accent">{{ $slide->cta_label }}</a>
                        @endif
                        @if (!empty($slide->secondary_cta_label) && !empty($slide->secondary_cta_url))
                            <a href="{{ $slide->secondary_cta_url }}" class="btn hero-carousel__btn-ghost">{{ $slide->secondary_cta_label }}</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if ($tmoMultiSlide)
        <button type="button" class="hero-carousel__arrow hero-carousel__arrow--prev" data-hero-prev aria-label="Previous slide">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
        </button>
        <button type="button" class="hero-carousel__arrow hero-carousel__arrow--next" data-hero-next aria-label="Next slide">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </button>

        <div class="hero-carousel__dots" data-hero-dots>
            @foreach ($tmoSlides as $slide)
                <button type="button" class="hero-carousel__dot {{ $loop->first ? 'is-active' : '' }}" data-hero-dot data-hero-index="{{ $loop->index }}" aria-label="Go to slide {{ $loop->iteration }}"></button>
            @endforeach
        </div>
    @endif

    <div class="hero-carousel__scroll-cue" data-animate="fade" data-animate-delay="600">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><polyline points="18 13 12 19 6 13"/></svg>
    </div>
</section>