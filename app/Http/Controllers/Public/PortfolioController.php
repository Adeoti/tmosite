<?php


namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $categories = PortfolioCategory::active()
            ->ordered()
            ->withCount(['portfolios' => function ($query) {
                $query->published();
            }])
            ->get();

        $featuredPortfolios = Portfolio::published()
            ->featured()
            ->with('category')
            ->ordered()
            ->take(8)
            ->get();

        return view('public.portfolio.index', compact('categories', 'featuredPortfolios'));
    }

    public function category(PortfolioCategory $category): View
    {
        abort_unless($category->is_active, 404);

        $portfolios = $category->portfolios()
            ->published()
            ->ordered()
            ->paginate(9);

        $categories = PortfolioCategory::active()->ordered()->get();

        return view('public.portfolio.category', compact('category', 'portfolios', 'categories'));
    }

    public function show(PortfolioCategory $category, Portfolio $portfolio): View
    {
        abort_unless($portfolio->status === 'published', 404);
        abort_unless($portfolio->portfolio_category_id === $category->id, 404);

        $related = Portfolio::published()
            ->where('portfolio_category_id', $category->id)
            ->where('id', '!=', $portfolio->id)
            ->ordered()
            ->take(3)
            ->get();

        return view('public.portfolio.show', compact('category', 'portfolio', 'related'));
    }
}