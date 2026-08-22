<x-emails.layout :subject="'Reminder: your consultation is tomorrow'">
    <h1>See you tomorrow, {{ $booking->name }}</h1>
    <p>This is a friendly reminder about your upcoming consultation with {{ \App\Models\Setting::get('site_name') }}.</p>

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

    <p>Running late or need to reschedule? Message us on WhatsApp and we'll sort it out.</p>

    <p style="text-align: center; margin-top: 28px;">
        <a href="{{ $whatsappLink }}" class="email-button">Message Us on WhatsApp</a>
    </p>
</x-emails.layout>