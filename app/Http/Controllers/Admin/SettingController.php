<?php

// php artisan make:controller Admin/SettingController

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        $groups = [
            'general' => Setting::group('general'),
            'contact' => Setting::group('contact'),
            'home' => Setting::group('home'),
            'booking' => Setting::group('booking'),
            'stats' => Setting::group('stats'),
        ];

        return view('admin.settings.edit', compact('groups'));
    }

    public function update(Request $request): RedirectResponse
    {
        $fields = [
            'site_name' => 'general',
            'site_tagline' => 'general',
            'whatsapp_number' => 'contact',
            'whatsapp_display' => 'contact',
            'whatsapp_qr_link' => 'contact',
            'contact_email' => 'contact',
            'owner_alert_email' => 'contact',
            'booking_timezone' => 'booking',
            'hero_headline' => 'home',
            'hero_subheadline' => 'home',
            'stat1_value' => 'stats',
            'stat1_suffix' => 'stats',
            'stat1_label' => 'stats',
            'stat2_value' => 'stats',
            'stat2_suffix' => 'stats',
            'stat2_label' => 'stats',
            'stat3_value' => 'stats',
            'stat3_suffix' => 'stats',
            'stat3_label' => 'stats',
        ];

        $data = $request->validate([
            'site_name' => ['required', 'string', 'max:150'],
            'site_tagline' => ['nullable', 'string', 'max:150'],
            'whatsapp_number' => ['required', 'string', 'max:20'],
            'whatsapp_display' => ['required', 'string', 'max:30'],
            'whatsapp_qr_link' => ['nullable', 'url', 'max:255'],
            'contact_email' => ['required', 'email', 'max:150'],
            'owner_alert_email' => ['required', 'email', 'max:150'],
            'booking_timezone' => ['required', 'string', 'max:60'],
            'hero_headline' => ['required', 'string', 'max:150'],
            'hero_subheadline' => ['required', 'string', 'max:500'],
            'stat1_value' => ['required', 'integer', 'min:0'],
            'stat1_suffix' => ['nullable', 'string', 'max:10'],
            'stat1_label' => ['required', 'string', 'max:60'],
            'stat2_value' => ['required', 'integer', 'min:0'],
            'stat2_suffix' => ['nullable', 'string', 'max:10'],
            'stat2_label' => ['required', 'string', 'max:60'],
            'stat3_value' => ['required', 'integer', 'min:0'],
            'stat3_suffix' => ['nullable', 'string', 'max:10'],
            'stat3_label' => ['required', 'string', 'max:60'],
        ]);

        foreach ($fields as $key => $group) {
            Setting::set($key, $data[$key] ?? '', $group);
        }

        return redirect()->route('admin.settings.edit')->with('status', 'Settings updated.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('admin.settings.edit')->with('status', 'Password updated.');
    }
}