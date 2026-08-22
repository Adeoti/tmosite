<?php

// php artisan make:controller Public/ContactController

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactMessageReceived;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request): RedirectResponse
    {
        try {
            Mail::to(Setting::get('owner_alert_email'))->send(new ContactMessageReceived(
                $request->input('name'),
                $request->input('email'),
                $request->input('subject'),
                $request->input('message'),
            ));
        } catch (Throwable $exception) {
            Log::error('Contact form email failed', [
                'email' => $request->input('email'),
                'message' => $exception->getMessage(),
            ]);
        }

        return redirect()
            ->route('contact')
            ->with('contact_sent', true);
    }
}