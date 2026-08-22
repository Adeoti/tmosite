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

class BookingConfirmed extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public Booking $booking)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), Setting::get('site_name')),
            subject: 'Your consultation is confirmed',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking-confirmed',
            with: [
                'booking' => $this->booking,
                'whatsappLink' => WhatsApp::link('Hi, following up on my confirmed consultation.'),
            ],
        );
    }
}