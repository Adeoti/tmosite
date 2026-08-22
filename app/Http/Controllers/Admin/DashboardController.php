<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BlogPost;
use App\Models\Portfolio;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'portfolios' => Portfolio::count(),
            'published_posts' => BlogPost::where('status', 'published')->count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'upcoming_bookings' => Booking::upcoming()->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}