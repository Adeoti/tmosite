<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $subject ?? \App\Models\Setting::get('site_name') }}</title>
<style>
body { margin: 0; padding: 0; background-color: #efede5; font-family: 'Helvetica Neue', Arial, sans-serif; }
.email-wrapper { width: 100%; background-color: #efede5; padding: 32px 0; }
.email-card { max-width: 560px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; }
.email-header { background-color: #0e6b50; padding: 28px 32px; }
.email-header img { height: 36px; }
.email-body { padding: 36px 32px; color: #071311; }
.email-body h1 { font-size: 20px; color: #0e6b50; margin: 0 0 16px; }
.email-body p { font-size: 15px; line-height: 1.6; margin: 0 0 16px; color: #53605b; }
.email-detail-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
.email-detail-table td { padding: 10px 0; font-size: 14px; border-bottom: 1px solid #e5e1d6; }
.email-detail-table td.label { color: #77827d; width: 140px; }
.email-detail-table td.value { color: #0e6b50; font-weight: 600; }
.email-button { display: inline-block; background-color: #f3d6a0; color: #071311 !important; text-decoration: none; padding: 14px 28px; border-radius: 999px; font-weight: 600; font-size: 14px; }
.email-footer { padding: 24px 32px 32px; text-align: center; }
.email-footer p { font-size: 12px; color: #77827d; margin: 4px 0; }
</style>
</head>
<body>
<div class="email-wrapper">
    <div class="email-card">
        <div class="email-header">
            <img src="{{ asset('images/logo.png') }}" alt="{{ \App\Models\Setting::get('site_name') }}">
        </div>
        <div class="email-body">
            {{ $slot }}
        </div>
        <div class="email-footer">
            <p>{{ \App\Models\Setting::get('site_name') }}</p>
            <p>WhatsApp: {{ \App\Models\Setting::get('whatsapp_display') }} &middot; {{ \App\Models\Setting::get('contact_email') }}</p>
        </div>
    </div>
</div>
</body>
</html>