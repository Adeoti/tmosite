<?php


namespace App\Console\Commands;

use App\Mail\BookingReminder;
use App\Models\Booking;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendBookingReminders extends Command
{
    protected $signature = 'bookings:send-reminders';

    protected $description = 'Send a reminder email to clients with a confirmed booking tomorrow';

    public function handle(): int
    {
        $bookings = Booking::awaitingReminder()->get();

        if ($bookings->isEmpty()) {
            $this->info('No bookings due for a reminder.');

            return self::SUCCESS;
        }

        foreach ($bookings as $booking) {
            try {
                Mail::to($booking->email)->send(new BookingReminder($booking));
                $booking->update(['reminder_sent_at' => now()]);
                $this->info("Reminder sent for booking {$booking->reference}.");
            } catch (Throwable $exception) {
                Log::error('Booking reminder email failed', [
                    'booking_id' => $booking->id,
                    'message' => $exception->getMessage(),
                ]);
                $this->error("Failed to send reminder for booking {$booking->reference}.");
            }
        }

        return self::SUCCESS;
    }
}