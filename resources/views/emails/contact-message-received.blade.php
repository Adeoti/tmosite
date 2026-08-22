<x-emails.layout :subject="'New Contact Form Message'">
    <h1>New message from the contact form</h1>
    <p>Someone just reached out through the website contact form.</p>

    <table class="email-detail-table">
        <tr>
            <td class="label">Name</td>
            <td class="value">{{ $contactName }}</td>
        </tr>
        <tr>
            <td class="label">Email</td>
            <td class="value">{{ $contactEmail }}</td>
        </tr>
        <tr>
            <td class="label">Subject</td>
            <td class="value">{{ $contactSubject }}</td>
        </tr>
    </table>

    <p><strong>Message:</strong><br>{{ $contactBody }}</p>

    <p style="text-align: center; margin-top: 28px;">
        <a href="mailto:{{ $contactEmail }}" class="email-button">Reply to {{ $contactName }}</a>
    </p>
</x-emails.layout>