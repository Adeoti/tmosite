@extends('layouts.app')

@section('title', 'Booking Received')

@section('content')
    <section class="section" style="min-height: 60vh; display: flex; align-items: center;">
        <div class="container" style="max-width: 560px; text-align: center;">
            <div class="thank-you-icon" data-animate="zoom">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </div>
            <h1 data-animate="up">Your consultation request is in</h1>
            <p class="hero__subhead" data-animate="up" data-animate-delay="100">
                @if (session('booking_reference'))
                    Reference <strong>{{ session('booking_reference') }}</strong>. We'll email you a confirmation shortly and follow up to lock in your time.
                @else
                    We'll email you a confirmation shortly and follow up to lock in your time.
                @endif
            </p>
            <div class="hero__actions" style="justify-content: center;" data-animate="up" data-animate-delay="200">
                <a href="{{ route('home') }}" class="btn btn-outline">Back to Home</a>
                <a href="{{ $whatsappLink ?? '#' }}" target="_blank" rel="noopener" class="btn btn-whatsapp">Message us on WhatsApp</a>
            </div>
        </div>
    </section>
@endsection