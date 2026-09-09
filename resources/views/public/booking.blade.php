@extends('layouts.app')

@section('title', 'Book a Consultation')
@section('meta_description',
    'Book a free consultation with TMO Ultimate Innovations Ltd. Tell us about your project and
    pick a time that works for you.')
@section('body_class', 'tmo-nav-dark')

@section('content')

    <x-page-hero eyebrow="Booking" variant="dark">
        <h1 data-animate="up">Book your free consultation</h1>
        <p class="tmo-page-hero__subhead" data-animate="up" data-animate-delay="120">
            Tell us a little about your project. We reply within one business day, and you'll get a confirmation plus a
            reminder before your call.
        </p>
    </x-page-hero>

    <section class="tmo-booking">
        <div class="container tmo-booking__inner">

            <div class="tmo-form-card" data-animate="up">

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

                            @php
                                    $selectedService = old('service_type', request()->query('service_type'));

                            @endphp

                            <select id="service_type" name="service_type" required>
                                <option value="">Select a service</option>

                                @foreach ($services as $service)
                                    <option value="{{ $service->name }}" @selected($selectedService === $service->slug || $selectedService === $service->name)>
                                        {{ $service->name }}
                                    </option>
                                @endforeach

                                <option value="Not Sure Yet" @selected($selectedService === 'Not Sure Yet')>
                                    Not Sure Yet
                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="tmo-form__row">
                        <div class="tmo-form__field">
                            <label for="preferred_date">Preferred Date</label>
                            <input type="date" id="preferred_date" name="preferred_date"
                                value="{{ old('preferred_date') }}" min="{{ now()->toDateString() }}" required>
                        </div>

                        <div class="tmo-form__field">
                            <label for="preferred_time">Preferred Time</label>
                            <input type="time" id="preferred_time" name="preferred_time"
                                value="{{ old('preferred_time') }}" required>
                        </div>
                    </div>

                    <div class="tmo-form__field">
                        <label for="message">Tell us about your project (optional)</label>
                        <textarea id="message" name="message" rows="4">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="tmo-btn tmo-btn--gold tmo-form__submit">
                        Request Consultation

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14" />
                            <path d="m13 6 6 6-6 6" />
                        </svg>
                    </button>

                    <p class="tmo-form__note">
                        Prefer to talk now? <a href="{{ $whatsappLink ?? '#' }}" target="_blank" rel="noopener">Message us
                            on WhatsApp</a> instead.
                    </p>

                </form>

            </div>

        </div>
    </section>

@endsection
