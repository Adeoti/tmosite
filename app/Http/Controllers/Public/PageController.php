<?php


namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;
use App\Models\PortfolioCategory;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        $team = TeamMember::active()->ordered()->get();

        return view('public.about', compact('team'));
    }

    public function services(): View
    {
        $categories = PortfolioCategory::active()->ordered()->get();
        $faqs = FaqItem::where('category', 'services')->ordered()->get();

        return view('public.services', compact('categories', 'faqs'));
    }

    public function passiveIncome(): View
    {
        $faqs = FaqItem::where('category', 'passive-income')->ordered()->get();

        return view('public.passive-income', compact('faqs'));
    }

    public function booking(): View
    {
        return view('public.booking');
    }

    public function bookingThankYou(): View
    {
        return view('public.booking-thank-you');
    }

    public function contact(): View
    {
        return view('public.contact');
    }

    public function privacy(): View
    {
        return view('public.privacy');
    }

    public function terms(): View
    {
        return view('public.terms');
    }
}