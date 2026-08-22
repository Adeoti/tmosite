@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
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

    <form method="POST" action="{{ route('admin.settings.update') }}" class="tmo-form">
        @csrf
        @method('PUT')

        <div class="admin-form-card">
            <h3 style="margin-top: 0;">General</h3>
            <div class="tmo-form__row">
                <div class="tmo-form__field">
                    <label for="site_name">Site Name</label>
                    <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $groups['general']['site_name'] ?? '') }}" required>
                </div>
                <div class="tmo-form__field">
                    <label for="site_tagline">Tagline</label>
                    <input type="text" id="site_tagline" name="site_tagline" value="{{ old('site_tagline', $groups['general']['site_tagline'] ?? '') }}">
                </div>
            </div>
        </div>

        <div class="admin-form-card">
            <h3 style="margin-top: 0;">Homepage Hero</h3>
            <div class="tmo-form__field">
                <label for="hero_headline">Headline</label>
                <input type="text" id="hero_headline" name="hero_headline" value="{{ old('hero_headline', $groups['home']['hero_headline'] ?? '') }}" required>
            </div>
            <div class="tmo-form__field">
                <label for="hero_subheadline">Subheadline</label>
                <textarea id="hero_subheadline" name="hero_subheadline" rows="3" required>{{ old('hero_subheadline', $groups['home']['hero_subheadline'] ?? '') }}</textarea>
            </div>
        </div>

        <div class="admin-form-card">
            <h3 style="margin-top: 0;">Homepage Stats</h3>
            <p class="admin-field-hint" style="margin-top: -4px;">These three numbers appear in the floating stats strip beneath the homepage hero carousel.</p>

            <div class="tmo-form__row tmo-form__row--3col">
                <div class="tmo-form__field">
                    <label for="stat1_value">Stat 1 Number</label>
                    <input type="number" id="stat1_value" name="stat1_value" min="0" value="{{ old('stat1_value', $groups['stats']['stat1_value'] ?? 0) }}" required>
                </div>
                <div class="tmo-form__field">
                    <label for="stat1_suffix">Stat 1 Suffix (optional)</label>
                    <input type="text" id="stat1_suffix" name="stat1_suffix" value="{{ old('stat1_suffix', $groups['stats']['stat1_suffix'] ?? '') }}" placeholder="+ or %">
                </div>
                <div class="tmo-form__field">
                    <label for="stat1_label">Stat 1 Label</label>
                    <input type="text" id="stat1_label" name="stat1_label" value="{{ old('stat1_label', $groups['stats']['stat1_label'] ?? '') }}" required>
                </div>
            </div>

            <div class="tmo-form__row tmo-form__row--3col">
                <div class="tmo-form__field">
                    <label for="stat2_value">Stat 2 Number</label>
                    <input type="number" id="stat2_value" name="stat2_value" min="0" value="{{ old('stat2_value', $groups['stats']['stat2_value'] ?? 0) }}" required>
                </div>
                <div class="tmo-form__field">
                    <label for="stat2_suffix">Stat 2 Suffix (optional)</label>
                    <input type="text" id="stat2_suffix" name="stat2_suffix" value="{{ old('stat2_suffix', $groups['stats']['stat2_suffix'] ?? '') }}" placeholder="+ or %">
                </div>
                <div class="tmo-form__field">
                    <label for="stat2_label">Stat 2 Label</label>
                    <input type="text" id="stat2_label" name="stat2_label" value="{{ old('stat2_label', $groups['stats']['stat2_label'] ?? '') }}" required>
                </div>
            </div>

            <div class="tmo-form__row tmo-form__row--3col">
                <div class="tmo-form__field">
                    <label for="stat3_value">Stat 3 Number</label>
                    <input type="number" id="stat3_value" name="stat3_value" min="0" value="{{ old('stat3_value', $groups['stats']['stat3_value'] ?? 0) }}" required>
                </div>
                <div class="tmo-form__field">
                    <label for="stat3_suffix">Stat 3 Suffix (optional)</label>
                    <input type="text" id="stat3_suffix" name="stat3_suffix" value="{{ old('stat3_suffix', $groups['stats']['stat3_suffix'] ?? '') }}" placeholder="+ or %">
                </div>
                <div class="tmo-form__field">
                    <label for="stat3_label">Stat 3 Label</label>
                    <input type="text" id="stat3_label" name="stat3_label" value="{{ old('stat3_label', $groups['stats']['stat3_label'] ?? '') }}" required>
                </div>
            </div>
        </div>

        <div class="admin-form-card">
            <h3 style="margin-top: 0;">Contact &amp; WhatsApp</h3>
            <div class="tmo-form__row">
                <div class="tmo-form__field">
                    <label for="whatsapp_number">WhatsApp Number (digits only, with country code)</label>
                    <input type="text" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number', $groups['contact']['whatsapp_number'] ?? '') }}" required>
                </div>
                <div class="tmo-form__field">
                    <label for="whatsapp_display">WhatsApp Display Format</label>
                    <input type="text" id="whatsapp_display" name="whatsapp_display" value="{{ old('whatsapp_display', $groups['contact']['whatsapp_display'] ?? '') }}" required>
                </div>
            </div>
            <div class="tmo-form__field">
                <label for="whatsapp_qr_link">WhatsApp QR Link</label>
                <input type="url" id="whatsapp_qr_link" name="whatsapp_qr_link" value="{{ old('whatsapp_qr_link', $groups['contact']['whatsapp_qr_link'] ?? '') }}">
            </div>
            <div class="tmo-form__row">
                <div class="tmo-form__field">
                    <label for="contact_email">Public Contact Email</label>
                    <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $groups['contact']['contact_email'] ?? '') }}" required>
                </div>
                <div class="tmo-form__field">
                    <label for="owner_alert_email">Owner Alert Email (receives booking alerts)</label>
                    <input type="email" id="owner_alert_email" name="owner_alert_email" value="{{ old('owner_alert_email', $groups['contact']['owner_alert_email'] ?? '') }}" required>
                </div>
            </div>
        </div>

        <div class="admin-form-card">
            <h3 style="margin-top: 0;">Booking</h3>
            <div class="tmo-form__field">
                <label for="booking_timezone">Booking Timezone</label>
                <input type="text" id="booking_timezone" name="booking_timezone" value="{{ old('booking_timezone', $groups['booking']['booking_timezone'] ?? '') }}" required>
            </div>
        </div>

        <div class="admin-form-actions">
            <button type="submit" class="btn btn-primary">Save Settings</button>
        </div>
    </form>

    <div class="admin-form-card" style="margin-top: 32px;">
        <h3 style="margin-top: 0;">Change Admin Password</h3>
        <form method="POST" action="{{ route('admin.settings.password') }}" class="tmo-form">
            @csrf
            @method('PUT')
            <div class="tmo-form__field">
                <label for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            <div class="tmo-form__row">
                <div class="tmo-form__field">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="tmo-form__field">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>
            <button type="submit" class="btn btn-outline">Update Password</button>
        </form>
    </div>
@endsection