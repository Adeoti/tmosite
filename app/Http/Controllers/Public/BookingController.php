<?php


namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Mail\BookingOwnerAlert;
use App\Mail\BookingRequestReceived;
use App\Models\Booking;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class BookingController extends Controller
{
    
    public function store(StoreBookingRequest $request): RedirectResponse
    {
        $booking = Booking::create($request->validated() + [
            'timezone' => config('app.timezone'),
            'status' => 'pending',
        ]);

        $this->notifyOwnerAndClient($booking);

        return redirect()
            ->route('booking.thank-you')
            ->with('booking_reference', $booking->reference);
    }

    protected function notifyOwnerAndClient(Booking $booking): void
    {
        try {
            Mail::to(Setting::get('owner_alert_email'))->send(new BookingOwnerAlert($booking));
            Mail::to($booking->email)->send(new BookingRequestReceived($booking));
        } catch (Throwable $exception) {
            Log::error('Booking notification email failed', [
                'booking_id' => $booking->id,
                'message' => $exception->getMessage(),
            ]);
        }
    }
}