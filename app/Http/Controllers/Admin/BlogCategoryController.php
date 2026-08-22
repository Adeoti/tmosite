<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogCategoryController extends Controller
{
    public function index(): View
    {
        $categories = BlogCategory::withCount('posts')->orderBy('name')->get();

        return view('admin.blog-categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.blog-categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'slug' => ['nullable', 'string', 'max:170'],
        ]);

        $data['slug'] = BlogCategory::generateUniqueSlug($data['slug'] ?: $data['name']);

        BlogCategory::create($data);

        return redirect()->route('admin.blog-categories.index')->with('status', 'Blog category created.');
    }

    public function edit(BlogCategory $blogCategory): View
    {
        return view('admin.blog-categories.edit', ['category' => $blogCategory]);
    }

    public function update(Request $request, BlogCategory $blogCategory): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'slug' => ['nullable', 'string', 'max:170'],
        ]);

        $data['slug'] = $request->input('slug')
            ? BlogCategory::generateUniqueSlug($request->input('slug'), $blogCategory->id)
            : $blogCategory->slug;

        $blogCategory->update($data);

        return redirect()->route('admin.blog-categories.index')->with('status', 'Blog category updated.');
    }

    public function destroy(BlogCategory $blogCategory): RedirectResponse
    {
        if ($blogCategory->posts()->exists()) {
            return back()->with('status', 'Move or delete the posts in this category first.');
        }

        $blogCategory->delete();

        return redirect()->route('admin.blog-categories.index')->with('status', 'Blog category deleted.');
    }
}