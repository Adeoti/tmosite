
@extends('layouts.app')

@section('title', $post->metaTitle())
@section('meta_description', $post->metaDescription())
@section('canonical', $post->canonical_url ?: route('blog.show', $post))
@section('og_type', 'article')
@section('og_image', $post->metaImage())

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
    <article class="section blog-post">
        <div class="container" style="max-width: 780px;">
            <div class="breadcrumb" data-animate="fade">
                <a href="{{ route('blog.index') }}">Blog</a>
                @if ($post->category)
                    <span>/</span>
                    <span>{{ $post->category->name }}</span>
                @endif
            </div>

            <h1 data-animate="up">{{ $post->title }}</h1>

            <div class="blog-post__meta" data-animate="up" data-animate-delay="80">
                <span>{{ $post->author_name ?? optional($post->author)->name }}</span>
                <span>&middot;</span>
                <span>{{ optional($post->published_at)->format('F d, Y') }}</span>
                <span>&middot;</span>
                <span>{{ $post->reading_minutes }} min read</span>
            </div>

            @if ($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="blog-post__cover" data-animate="zoom">
            @endif

            <div class="blog-post__content" data-animate="up">
                {!! $post->content !!}
            </div>

            @if ($post->tags->isNotEmpty())
                <div class="blog-post__tags">
                    @foreach ($post->tags as $tag)
                        <span class="blog-post__tag">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif
        </div>
    </article>

    @if ($related->isNotEmpty())
        <section class="section" style="background: #F5F6F9;">
            <div class="container">
                <x-section-heading eyebrow="Keep Reading" align="left">
                    Related articles
                </x-section-heading>
                <div class="grid grid-3" style="margin-top: 40px;">
                    @foreach ($related as $item)
                        <a href="{{ route('blog.show', $item) }}" class="blog-card card" data-animate="up">
                            @if ($item->featured_image)
                                <img src="{{ asset('storage/' . $item->featured_image) }}" alt="{{ $item->title }}" loading="lazy">
                            @endif
                            <div class="blog-card__body">
                                <h3>{{ $item->title }}</h3>
                                <p>{{ $item->excerpt }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-cta-band title="Have a project in mind?" subtitle="Book a free consultation and let's talk it through.">
        <a href="{{ route('booking') }}" class="btn btn-accent">Book a Free Consultation</a>
    </x-cta-band>
@endsection