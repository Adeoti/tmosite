<x-emails.layout :subject="'We received your request'">
    <h1>Thanks, {{ $booking->name }} — we've got your request</h1>
    <p>Your consultation request has been received. We'll confirm your slot shortly and follow up by email.</p>

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
            <td class="label">Requested Date</td>
            <td class="value">{{ $booking->preferred_date->format('l, F j, Y') }}</td>
        </tr>
        <tr>
            <td class="label">Requested Time</td>
            <td class="value">{{ $booking->preferred_time }}</td>
        </tr>
    </table>

    <p>Need to talk sooner? Message us directly on WhatsApp and we'll pick it up from there.</p>

    <p style="text-align: center; margin-top: 28px;">
        <a href="{{ $whatsappLink }}" class="email-button">Message Us on WhatsApp</a>
    </p>
</x-emails.layout>