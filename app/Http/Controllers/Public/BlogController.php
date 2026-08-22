<?php


namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = BlogPost::published()
            ->with(['category', 'tags'])
            ->latest('published_at')
            ->paginate(9);

        return view('public.blog.index', compact('posts'));
    }

    public function show(BlogPost $post): View
    {
        abort_unless($post->status === 'published', 404);

        $post->increment('views_count');

        $related = BlogPost::published()
            ->where('blog_category_id', $post->blog_category_id)
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.blog.show', compact('post', 'related'));
    }

    public function feed(): Response
    {
        $posts = BlogPost::published()
            ->with('category')
            ->latest('published_at')
            ->take(30)
            ->get();

        $xml = view('public.blog.feed', compact('posts'))->render();

        return response($xml, 200)->header('Content-Type', 'application/rss+xml; charset=UTF-8');
    }
}