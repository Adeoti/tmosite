@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
    <section class="section" style="min-height: 80vh; display: flex; align-items: center;">
        <div class="container" style="max-width: 420px;">
            <div class="card" style="padding: 40px;">
                <h2 style="text-align: center;">Admin Sign In</h2>
                <p style="text-align: center; color: var(--color-muted); font-size: 14px;">TMO Ultimate Control Panel</p>

                @if ($errors->any())
                    <div style="background: #FDECEC; color: #B42318; padding: 12px 16px; border-radius: 8px; font-size: 14px; margin-bottom: 16px;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.attempt') }}">
                    @csrf
                    <div style="margin-bottom: 16px;">
                        <label style="display:block; font-size: 13px; margin-bottom: 6px;">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                               style="width: 100%; padding: 12px 14px; border-radius: 8px; border: 1px solid var(--color-border);">
                    </div>
                    <div style="margin-bottom: 16px;">
                        <label style="display:block; font-size: 13px; margin-bottom: 6px;">Password</label>
                        <input type="password" name="password" required
                               style="width: 100%; padding: 12px 14px; border-radius: 8px; border: 1px solid var(--color-border);">
                    </div>
                    <label style="display:flex; align-items:center; gap:8px; font-size: 13px; margin-bottom: 20px;">
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Sign In</button>
                </form>
            </div>
        </div>
    </section>
@endsection