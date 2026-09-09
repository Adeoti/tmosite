@extends('layouts.app')

@section('title', 'Blog')
@section('meta_description', 'Insights on Shopify growth, AI video, 3D animation and AI voice agents from the TMO Ultimate Innovations team.')
@section('body_class', 'tmo-nav-dark')

@section('content')

<x-page-hero eyebrow="Blog" variant="dark">
    <h1 data-animate="up">Insights on growth and automation</h1>
    <p class="tmo-page-hero__subhead" data-animate="up" data-animate-delay="120">
        Practical breakdowns from the studios building Shopify stores, AI video, 3D animation and voice agents every day.
    </p>
</x-page-hero>

<section class="tmo-blog-listing">
    <div class="container">

        @if ($posts->isEmpty())

            <div class="tmo-blog-empty">
                <p>Our first articles are on the way. Check back soon.</p>
            </div>

        @else

            <div class="tmo-page-grid tmo-page-grid--3">

                @foreach ($posts as $post)
                    <x-blog-card :post="$post" />
                @endforeach

            </div>

            <div class="tmo-pagination">
                {{ $posts->links() }}
            </div>

        @endif

    </div>
</section>

@endsection