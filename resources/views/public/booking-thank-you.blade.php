@extends('layouts.app')

@section('title', 'Booking Received')
@section('body_class', 'tmo-nav-dark')

@section('content')

<x-page-hero variant="dark">

    <div class="tmo-page-hero__icon" data-animate="zoom">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
            <polyline points="22 4 12 14.01 9 11.01"/>
        </svg>
    </div>

    <h1 data-animate="up">Your consultation request is in</h1>

    <p class="tmo-page-hero__subhead" data-animate="up" data-animate-delay="100">
        @if (session('booking_reference'))
            Reference <strong>{{ session('booking_reference') }}</strong>. We'll email you a confirmation shortly and follow up to lock in your time.
        @else
            We'll email you a confirmation shortly and follow up to lock in your time.
        @endif
    </p>

    <div class="tmo-page-hero__actions" data-animate="up" data-animate-delay="200">
        <a href="{{ route('home') }}" class="tmo-btn tmo-btn--ghost">Back to Home</a>
        <a href="{{ $whatsappLink ?? '#' }}" target="_blank" rel="noopener" class="btn btn-whatsapp">Message us on WhatsApp</a>
    </div>

</x-page-hero>

@endsection