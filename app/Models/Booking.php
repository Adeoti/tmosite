<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'name',
        'email',
        'phone',
        'service_type',
        'preferred_date',
        'preferred_time',
        'timezone',
        'message',
        'status',
        'reminder_sent_at',
        'confirmed_at',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'reminder_sent_at' => 'datetime',
        'confirmed_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (Booking $booking) {
            if (blank($booking->reference)) {
                $booking->reference = 'TMO-' . strtoupper(Str::random(8));
            }
        });
    }

    public function scopeUpcoming($query)
    {
        return $query->where('preferred_date', '>=', now()->toDateString())
            ->where('status', '!=', 'cancelled');
    }

    public function scopeAwaitingReminder($query)
    {
        return $query->where('status', 'confirmed')
            ->whereNull('reminder_sent_at')
            ->where('preferred_date', '=', now()->addDay()->toDateString());
    }
}