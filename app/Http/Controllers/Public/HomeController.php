<?php


namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\HeroSlide;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $heroSlides = HeroSlide::active()->ordered()->get();

        $categories = PortfolioCategory::active()->ordered()->get();

        $featuredPortfolios = Portfolio::published()
            ->featured()
            ->with('category')
            ->ordered()
            ->take(6)
            ->get();

        $testimonials = Testimonial::featured()->ordered()->get();

        $latestPosts = BlogPost::published()
            ->homeFeatured()
            ->with('category')
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('home', compact('heroSlides', 'categories', 'featuredPortfolios', 'testimonials', 'latestPosts'));
    }
}