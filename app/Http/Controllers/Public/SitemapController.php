<?php


namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = Cache::remember('sitemap:urls', 3600, function () {
            $urls = collect();

            $urls->push(['url' => route('home'), 'lastmod' => now(), 'priority' => '1.0', 'changefreq' => 'weekly']);
            $urls->push(['url' => route('about'), 'lastmod' => now(), 'priority' => '0.7', 'changefreq' => 'monthly']);
            $urls->push(['url' => route('services'), 'lastmod' => now(), 'priority' => '0.8', 'changefreq' => 'monthly']);
            $urls->push(['url' => route('portfolio.index'), 'lastmod' => now(), 'priority' => '0.9', 'changefreq' => 'weekly']);
            $urls->push(['url' => route('passive-income'), 'lastmod' => now(), 'priority' => '0.8', 'changefreq' => 'monthly']);
            $urls->push(['url' => route('blog.index'), 'lastmod' => now(), 'priority' => '0.8', 'changefreq' => 'daily']);
            $urls->push(['url' => route('booking'), 'lastmod' => now(), 'priority' => '0.6', 'changefreq' => 'monthly']);
            $urls->push(['url' => route('contact'), 'lastmod' => now(), 'priority' => '0.6', 'changefreq' => 'monthly']);
            $urls->push(['url' => route('privacy'), 'lastmod' => now(), 'priority' => '0.3', 'changefreq' => 'yearly']);
            $urls->push(['url' => route('terms'), 'lastmod' => now(), 'priority' => '0.3', 'changefreq' => 'yearly']);

            PortfolioCategory::active()->get()->each(function (PortfolioCategory $category) use ($urls) {
                $urls->push([
                    'url' => route('portfolio.category', $category),
                    'lastmod' => $category->updated_at,
                    'priority' => '0.8',
                    'changefreq' => 'weekly',
                ]);
            });

            Portfolio::published()->with('category')->get()->each(function (Portfolio $portfolio) use ($urls) {
                $urls->push([
                    'url' => route('portfolio.show', [$portfolio->category, $portfolio]),
                    'lastmod' => $portfolio->updated_at,
                    'priority' => '0.7',
                    'changefreq' => 'monthly',
                ]);
            });

            BlogPost::published()->get()->each(function (BlogPost $post) use ($urls) {
                $urls->push([
                    'url' => route('blog.show', $post),
                    'lastmod' => $post->updated_at,
                    'priority' => '0.6',
                    'changefreq' => 'monthly',
                ]);
            });

            return $urls;
        });

        $xml = view('sitemap', compact('urls'))->render();

        return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}