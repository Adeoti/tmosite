<x-emails.layout :subject="'New Booking Request'">
    <h1>New consultation request</h1>
    <p>A new booking request just came in through the website. Confirm or decline it from the admin panel.</p>

    <table class="email-detail-table">
        <tr>
            <td class="label">Reference</td>
            <td class="value">{{ $booking->reference }}</td>
        </tr>
        <tr>
            <td class="label">Name</td>
            <td class="value">{{ $booking->name }}</td>
        </tr>
        <tr>
            <td class="label">Email</td>
            <td class="value">{{ $booking->email }}</td>
        </tr>
        <tr>
            <td class="label">Phone</td>
            <td class="value">{{ $booking->phone ?: '—' }}</td>
        </tr>
        <tr>
            <td class="label">Service</td>
            <td class="value">{{ $booking->service_type }}</td>
        </tr>
        <tr>
            <td class="label">Preferred Date</td>
            <td class="value">{{ $booking->preferred_date->format('l, F j, Y') }}</td>
        </tr>
        <tr>
            <td class="label">Preferred Time</td>
            <td class="value">{{ $booking->preferred_time }}</td>
        </tr>
    </table>

    @if ($booking->message)
        <p><strong>Message:</strong><br>{{ $booking->message }}</p>
    @endif

    <p style="text-align: center; margin-top: 28px;">
        <a href="{{ route('admin.bookings.index') }}" class="email-button">Review in Admin Panel</a>
    </p>
</x-emails.layout>