<?php

namespace App\Support;

use App\Models\Setting;

class WhatsApp
{
    public static function number(): string
    {
        return Setting::get('whatsapp_number', '16043374212');
    }

    public static function displayNumber(): string
    {
        return Setting::get('whatsapp_display', '+1 604 337 4212');
    }

    public static function qrLink(): string
    {
        return Setting::get('whatsapp_qr_link', 'https://wa.me/qr/2WJRCGPFYYEDH1');
    }

    public static function link(?string $message = null): string
    {
        $number = self::number();

        if (blank($message)) {
            return "https://wa.me/{$number}";
        }

        return "https://wa.me/{$number}?text=" . rawurlencode($message);
    }
}