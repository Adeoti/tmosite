@extends('layouts.app')

@section('title', 'Contact Us')
@section('meta_description', 'Contact TMO Ultimate Innovations Ltd. WhatsApp us directly or send a message and we will reply within one business day.')
@section('body_class', 'tmo-nav-dark')

@section('content')

<x-page-hero eyebrow="Contact" variant="dark">
    <h1 data-animate="up">Let's talk about your project</h1>
    <p class="tmo-page-hero__subhead" data-animate="up" data-animate-delay="120">
        WhatsApp is the fastest way to reach us. Prefer email? Send a message below and we'll reply within one business day.
    </p>
</x-page-hero>

<section class="tmo-contact">
    <div class="container tmo-contact__grid">

        <div class="tmo-contact-details" data-animate="left">

            <a href="{{ $whatsappLink ?? '#' }}" target="_blank" rel="noopener" class="tmo-contact-card">
                <div class="tmo-contact-card__icon tmo-contact-card__icon--whatsapp">
                    <svg viewBox="0 0 24 24" fill="#fff" aria-hidden="true">
                        <path d="M12.04 2c-5.46 0-9.9 4.44-9.9 9.9 0 1.75.46 3.45 1.32 4.95L2 22l5.28-1.38a9.9 9.9 0 0 0 4.76 1.21h.01c5.46 0 9.9-4.44 9.9-9.9 0-2.64-1.03-5.13-2.9-6.99A9.82 9.82 0 0 0 12.04 2Z"/>
                    </svg>
                </div>

                <div>
                    <h3>WhatsApp</h3>
                    <p>{{ $whatsappDisplay ?? '' }}</p>
                    <span>Start a chat</span>
                </div>
            </a>

            <a href="mailto:{{ \App\Models\Setting::get('contact_email') }}" class="tmo-contact-card">
                <div class="tmo-contact-card__icon tmo-contact-card__icon--navy">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" aria-hidden="true">
                        <rect x="3" y="5" width="18" height="14" rx="2"/>
                        <polyline points="3 7 12 13 21 7"/>
                    </svg>
                </div>

                <div>
                    <h3>Email</h3>
                    <p>{{ \App\Models\Setting::get('contact_email') }}</p>
                    <span>Send an email</span>
                </div>
            </a>

            <a href="{{ route('booking') }}" class="tmo-contact-card">
                <div class="tmo-contact-card__icon tmo-contact-card__icon--gold">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#0A0E1A" stroke-width="1.8" aria-hidden="true">
                        <rect x="3" y="4" width="18" height="18" rx="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                </div>

                <div>
                    <h3>Book a Call</h3>
                    <p>Free 20-minute consultation</p>
                    <span>Pick a time</span>
                </div>
            </a>

        </div>

        <div class="tmo-form-card" data-animate="right">

            @if (session('contact_sent'))
                <div class="tmo-form-alert tmo-form-alert--success">
                    <p>Thanks, your message is on its way to our team.</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="tmo-form-alert tmo-form-alert--error">
                    <p>Please fix the following:</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}" class="tmo-form" novalidate>
                @csrf

                <div class="tmo-form__field">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="tmo-form__field">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="tmo-form__field">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required>
                </div>

                <div class="tmo-form__field">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="tmo-btn tmo-btn--gold tmo-form__submit">
                    Send Message

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14"/>
                        <path d="m13 6 6 6-6 6"/>
                    </svg>
                </button>

            </form>

        </div>

    </div>
</section>

@endsection