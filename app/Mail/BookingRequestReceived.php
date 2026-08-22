<?php


namespace App\Mail;

use App\Models\Booking;
use App\Models\Setting;
use App\Support\WhatsApp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingRequestReceived extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public Booking $booking)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), Setting::get('site_name')),
            subject: 'We received your consultation request',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking-request-received',
            with: [
                'booking' => $this->booking,
                'whatsappLink' => WhatsApp::link('Hi, I just booked a consultation and had a quick question.'),
            ],
        );
    }
}