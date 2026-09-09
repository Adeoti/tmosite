@props(['portfolio'])

<a href="{{ route('portfolio.show', [$portfolio->category, $portfolio]) }}" class="tmo-portfolio-card" data-animate="up">

    <div class="tmo-portfolio-card__media">

        @if ($portfolio->cover_image)
            <img src="{{ asset('storage/' . $portfolio->cover_image) }}" alt="{{ $portfolio->title }}" loading="lazy">
        @endif

        <div class="tmo-portfolio-card__overlay">
            <i>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </i>
        </div>

        @if ($portfolio->category)
            <span class="tmo-portfolio-card__category">{{ $portfolio->category->name }}</span>
        @endif

    </div>

    <div class="tmo-portfolio-card__body">
        <h3>{{ $portfolio->title }}</h3>
        <p>{{ $portfolio->summary }}</p>
    </div>

</a>