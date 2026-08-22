@extends('layouts.app')

@section('title', 'Blog')
@section('meta_description', 'Insights on Shopify growth, AI video, 3D animation and AI voice agents from the TMO Ultimate Innovations team.')

@section('content')
    <section class="page-hero">
        <div class="container" style="max-width: 720px; text-align: center;">
            <div class="eyebrow" style="justify-content: center;">Blog</div>
            <h1 data-animate="up">Insights on growth and automation</h1>
            <p class="hero__subhead" data-animate="up" data-animate-delay="120">
                Practical breakdowns from the studios building Shopify stores, AI video, 3D animation and voice agents every day.
            </p>
        </div>
    </section>

    <section class="section" style="padding-top: 0;">
        <div class="container">
            @if ($posts->isEmpty())
                <div style="text-align: center; padding: 64px 0;">
                    <p style="color: var(--color-muted);">Our first articles are on the way. Check back soon.</p>
                </div>
            @else
                <div class="grid grid-3">
                    @foreach ($posts as $post)
                        <a href="{{ route('blog.show', $post) }}" class="blog-card card" data-animate="up" data-animate-delay="{{ ($loop->index % 3) * 80 }}">
                            @if ($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" loading="lazy">
                            @endif
                            <div class="blog-card__body">
                                <span class="blog-card__meta">
                                    {{ optional($post->published_at)->format('M d, Y') }}
                                    @if ($post->category)
                                        &middot; {{ $post->category->name }}
                                    @endif
                                </span>
                                <h3>{{ $post->title }}</h3>
                                <p>{{ $post->excerpt }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div style="margin-top: 48px;">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection