<x-emails.layout :subject="'Your consultation is confirmed'">
    <h1>You're confirmed, {{ $booking->name }}</h1>
    <p>Your free consultation with {{ \App\Models\Setting::get('site_name') }} is locked in. We'll send a reminder the day before.</p>

    <table class="email-detail-table">
        <tr>
            <td class="label">Reference</td>
            <td class="value">{{ $booking->reference }}</td>
        </tr>
        <tr>
            <td class="label">Service</td>
            <td class="value">{{ $booking->service_type }}</td>
        </tr>
        <tr>
            <td class="label">Date</td>
            <td class="value">{{ $booking->preferred_date->format('l, F j, Y') }}</td>
        </tr>
        <tr>
            <td class="label">Time</td>
            <td class="value">{{ $booking->preferred_time }}</td>
        </tr>
    </table>

    <p>If anything changes on your end, just reply to this email or message us on WhatsApp.</p>

    <p style="text-align: center; margin-top: 28px;">
        <a href="{{ $whatsappLink }}" class="email-button">Message Us on WhatsApp</a>
    </p>
</x-emails.layout>