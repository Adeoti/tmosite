@extends('layouts.app')

@section('title', $post->metaTitle())
@section('meta_description', $post->metaDescription())
@section('canonical', $post->canonical_url ?: route('blog.show', $post))
@section('og_type', 'article')
@section('og_image', $post->metaImage())
@section('body_class', 'tmo-nav-dark')

@push('structured-data')
    @php
        $tmoArticleSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $post->title,
            'description' => $post->metaDescription(),
            'image' => $post->metaImage(),
            'datePublished' => optional($post->published_at)->toAtomString(),
            'dateModified' => $post->updated_at->toAtomString(),
            'author' => [
                '@type' => 'Person',
                'name' => $post->author_name ?? optional($post->author)->name ?? \App\Models\Setting::get('site_name'),
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => \App\Models\Setting::get('site_name'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/logo.png'),
                ],
            ],
            'mainEntityOfPage' => route('blog.show', $post),
        ];
    @endphp
    <x-structured-data :schema="$tmoArticleSchema" />
@endpush

@section('content')

<x-page-hero variant="dark">

    <div class="tmo-breadcrumb" data-animate="fade">
        <a href="{{ route('blog.index') }}">Blog</a>

        @if ($post->category)
            <span>/</span>
            <span>{{ $post->category->name }}</span>
        @endif
    </div>

    <h1 data-animate="up">{{ $post->title }}</h1>

    <div class="tmo-blog-post__meta" data-animate="up" data-animate-delay="80">
        <span>{{ $post->author_name ?? optional($post->author)->name }}</span>
        <span>&middot;</span>
        <span>{{ optional($post->published_at)->format('F d, Y') }}</span>
        <span>&middot;</span>
        <span>{{ $post->reading_minutes }} min read</span>
    </div>

</x-page-hero>

<article class="tmo-blog-post">
    <div class="container tmo-blog-post__inner">

        @if ($post->featured_image)
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="tmo-blog-post__cover" data-animate="zoom">
        @endif

        <div class="tmo-blog-post__content" data-animate="up">
            {!! $post->content !!}
        </div>

        @if ($post->tags->isNotEmpty())

            <div class="tmo-blog-post__tags">

                @foreach ($post->tags as $tag)
                    <span class="tmo-blog-post__tag">{{ $tag->name }}</span>
                @endforeach

            </div>

        @endif

    </div>
</article>

@if ($related->isNotEmpty())

    <section class="tmo-blog-related">
        <div class="container">

            <x-section-heading eyebrow="KEEP READING" align="left">
                Related articles
            </x-section-heading>

            <div class="tmo-page-grid tmo-page-grid--3">

                @foreach ($related as $item)
                    <x-blog-card :post="$item" />
                @endforeach

            </div>

        </div>
    </section>

@endif

<x-cta-band title="Have a project in mind?" subtitle="Book a free consultation and let's talk it through.">
    <a href="{{ route('booking') }}" class="tmo-btn tmo-btn--gold">
        Book a Free Consultation

        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M5 12h14"/>
            <path d="m13 6 6 6-6 6"/>
        </svg>
    </a>
</x-cta-band>

@endsection