@props(['portfolio'])

<a href="{{ route('portfolio.show', [$portfolio->category, $portfolio]) }}" class="portfolio-card card" data-animate="up">
    <div class="portfolio-card__media">
        @if ($portfolio->cover_image)
            <img src="{{ asset('storage/' . $portfolio->cover_image) }}" alt="{{ $portfolio->title }}" loading="lazy">
        @else
            <div class="portfolio-card__placeholder">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
            </div>
        @endif
        <span class="portfolio-card__category">{{ $portfolio->category->name }}</span>
    </div>
    <div class="portfolio-card__body">
        <h3>{{ $portfolio->title }}</h3>
        <p>{{ $portfolio->summary }}</p>
    </div>
</a>