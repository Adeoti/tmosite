@props(['post'])

<a href="{{ route('blog.show', $post) }}" class="tmo-blog-card" data-animate="up">

    <div class="tmo-blog-card__media">

        @if ($post->featured_image)
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" loading="lazy">
        @endif

        <div class="tmo-blog-card__overlay">
            <i>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </i>
        </div>

    </div>

    <div class="tmo-blog-card__body">

        <span class="tmo-blog-card__meta">
            {{ optional($post->published_at)->format('M d, Y') }}
            @if ($post->category)
                &middot; {{ $post->category->name }}
            @endif
        </span>

        <h3>{{ $post->title }}</h3>
        <p>{{ $post->excerpt }}</p>

    </div>

</a>