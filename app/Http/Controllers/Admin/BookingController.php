<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmed;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class BookingController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status');

        $bookings = Booking::query()
            ->when($status, fn ($query) => $query->where('status', $status))
            ->orderBy('preferred_date')
            ->orderBy('preferred_time')
            ->paginate(15)
            ->withQueryString();

        $counts = [
            'all' => Booking::count(),
            'pending' => Booking::where('status', 'pending')->count(),
            'confirmed' => Booking::where('status', 'confirmed')->count(),
            'cancelled' => Booking::where('status', 'cancelled')->count(),
        ];

        return view('admin.bookings.index', compact('bookings', 'counts', 'status'));
    }

    public function confirm(Booking $booking): RedirectResponse
    {
        $booking->update([
            'status' => 'confirmed',
            'confirmed_at' => now(),
        ]);

        try {
            Mail::to($booking->email)->send(new BookingConfirmed($booking));
        } catch (Throwable $exception) {
            Log::error('Booking confirmation email failed', [
                'booking_id' => $booking->id,
                'message' => $exception->getMessage(),
            ]);
        }

        return back()->with('status', 'Booking confirmed and the client has been emailed.');
    }

    public function cancel(Booking $booking): RedirectResponse
    {
        $booking->update(['status' => 'cancelled']);

        return back()->with('status', 'Booking cancelled.');
    }
}