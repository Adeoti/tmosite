@extends('layouts.app')

@section('title', 'Admin Login')
@section('body_class', 'tmo-nav-dark')

@section('content')

<x-page-hero eyebrow="Admin" variant="dark">
    <h1 data-animate="up">TMO Control Panel</h1>
    <p class="tmo-page-hero__subhead" data-animate="up" data-animate-delay="120">
        Sign in to manage your portfolio, content and bookings.
    </p>
</x-page-hero>

<section class="tmo-admin-login">
    <div class="container tmo-admin-login__inner">

        <div class="tmo-form-card" data-animate="up">

            @if ($errors->any())
                <div class="tmo-form-alert tmo-form-alert--error">
                    <p>{{ $errors->first() }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.attempt') }}" class="tmo-form">
                @csrf

                <div class="tmo-form__field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="tmo-form__field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="admin-checkbox-row">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="tmo-btn tmo-btn--gold tmo-form__submit">Sign In</button>

            </form>

        </div>

    </div>
</section>

@endsection