<?php

// php artisan make:seeder SettingSeeder

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'TMO Ultimate Innovations Ltd.', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Innovate | Empower | Elevate', 'group' => 'general'],
            ['key' => 'whatsapp_number', 'value' => '16043374212', 'group' => 'contact'],
            ['key' => 'whatsapp_display', 'value' => '+1 604 337 4212', 'group' => 'contact'],
            ['key' => 'whatsapp_qr_link', 'value' => 'https://wa.me/qr/2WJRCGPFYYEDH1', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'hello@tmoultimate.com', 'group' => 'contact'],
            ['key' => 'owner_alert_email', 'value' => 'hello@tmoultimate.com', 'group' => 'contact'],
            ['key' => 'booking_timezone', 'value' => 'America/Vancouver', 'group' => 'booking'],
            ['key' => 'hero_headline', 'value' => 'Build. Automate. Elevate your business.', 'group' => 'home'],
            ['key' => 'hero_subheadline', 'value' => 'TMO Ultimate Innovations designs Shopify stores, AI video, 3D animation and AI voice agents that grow revenue on autopilot.', 'group' => 'home'],
            ['key' => 'stat1_value', 'value' => '120', 'group' => 'stats'],
            ['key' => 'stat1_suffix', 'value' => '+', 'group' => 'stats'],
            ['key' => 'stat1_label', 'value' => 'Projects Delivered', 'group' => 'stats'],
            ['key' => 'stat2_value', 'value' => '98', 'group' => 'stats'],
            ['key' => 'stat2_suffix', 'value' => '%', 'group' => 'stats'],
            ['key' => 'stat2_label', 'value' => 'Client Satisfaction', 'group' => 'stats'],
            ['key' => 'stat3_value', 'value' => '4', 'group' => 'stats'],
            ['key' => 'stat3_suffix', 'value' => '', 'group' => 'stats'],
            ['key' => 'stat3_label', 'value' => 'Specialist Studios', 'group' => 'stats'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}