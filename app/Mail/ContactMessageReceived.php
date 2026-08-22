<?php


namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageReceived extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $contactName,
        public string $contactEmail,
        public string $contactSubject,
        public string $contactBody,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), Setting::get('site_name')),
            replyTo: [new Address($this->contactEmail, $this->contactName)],
            subject: 'New Contact Form Message: ' . $this->contactSubject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-message-received',
            with: [
                'contactName' => $this->contactName,
                'contactEmail' => $this->contactEmail,
                'contactSubject' => $this->contactSubject,
                'contactBody' => $this->contactBody,
            ],
        );
    }
}