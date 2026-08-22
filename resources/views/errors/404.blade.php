@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
    <section class="section error-page">
        <div class="container" style="text-align: center; max-width: 560px;">
            <div class="error-page__code" data-animate="zoom">404</div>
            <h1 data-animate="up">This page took a wrong turn</h1>
            <p class="hero__subhead" data-animate="up" data-animate-delay="100">
                The page you're looking for doesn't exist or may have moved. Let's get you back on track.
            </p>
            <div class="hero__actions" style="justify-content: center;" data-animate="up" data-animate-delay="200">
                <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
                <a href="{{ route('contact') }}" class="btn btn-outline">Contact Us</a>
            </div>
        </div>
    </section>
@endsection