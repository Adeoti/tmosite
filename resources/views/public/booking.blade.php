@extends('layouts.app')

@section('title', 'Book a Consultation')
@section('meta_description', 'Book a free consultation with TMO Ultimate Innovations Ltd. Tell us about your project and pick a time that works for you.')

@section('content')
    <section class="page-hero">
        <div class="container" style="max-width: 720px; text-align: center;">
            <div class="eyebrow" style="justify-content: center;">Booking</div>
            <h1 data-animate="up">Book your free consultation</h1>
            <p class="hero__subhead" data-animate="up" data-animate-delay="120">
                Tell us a little about your project. We reply within one business day, and you'll get a confirmation plus a reminder before your call.
            </p>
        </div>
    </section>

    <section class="section" style="padding-top: 0;">
        <div class="container" style="max-width: 640px;">
            <div class="card booking-form-card" data-animate="up">
                @if ($errors->any())
                    <div class="form-alert form-alert--error">
                        <p>Please fix the following:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('booking.store') }}" class="tmo-form" novalidate>
                    @csrf
                    <div class="tmo-form__row">
                        <div class="tmo-form__field">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="tmo-form__field">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="tmo-form__row">
                        <div class="tmo-form__field">
                            <label for="phone">Phone (optional)</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="tmo-form__field">
                            <label for="service_type">Service of Interest</label>
                            <select id="service_type" name="service_type" required>
                                <option value="">Select a service</option>
                                <option value="Shopify & E-commerce" @selected(old('service_type') === 'Shopify & E-commerce')>Shopify &amp; E-commerce</option>
                                <option value="AI Video Production" @selected(old('service_type') === 'AI Video Production')>AI Video Production</option>
                                <option value="3D Video & Animation" @selected(old('service_type') === '3D Video & Animation')>3D Video &amp; Animation</option>
                                <option value="AI Voice Agents" @selected(old('service_type') === 'AI Voice Agents')>AI Voice Agents</option>
                                <option value="Passive Income System" @selected(old('service_type') === 'Passive Income System')>Passive Income System</option>
                                <option value="Not Sure Yet" @selected(old('service_type') === 'Not Sure Yet')>Not Sure Yet</option>
                            </select>
                        </div>
                    </div>
                    <div class="tmo-form__row">
                        <div class="tmo-form__field">
                            <label for="preferred_date">Preferred Date</label>
                            <input type="date" id="preferred_date" name="preferred_date" value="{{ old('preferred_date') }}" min="{{ now()->toDateString() }}" required>
                        </div>
                        <div class="tmo-form__field">
                            <label for="preferred_time">Preferred Time</label>
                            <input type="time" id="preferred_time" name="preferred_time" value="{{ old('preferred_time') }}" required>
                        </div>
                    </div>
                    <div class="tmo-form__field">
                        <label for="message">Tell us about your project (optional)</label>
                        <textarea id="message" name="message" rows="4">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Request Consultation</button>
                    <p class="tmo-form__note">
                        Prefer to talk now? <a href="{{ $whatsappLink ?? '#' }}" target="_blank" rel="noopener">Message us on WhatsApp</a> instead.
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection