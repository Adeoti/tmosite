<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioCategoryController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $categories = PortfolioCategory::withCount('portfolios')->orderBy('sort_order')->get();

        return view('admin.portfolio-categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.portfolio-categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        $data['slug'] = PortfolioCategory::generateUniqueSlug($data['slug'] ?: $data['name']);

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeUpload($request->file('image'), 'portfolio-categories');
        }

        PortfolioCategory::create($data);

        return redirect()->route('admin.portfolio-categories.index')->with('status', 'Category created.');
    }

    public function edit(PortfolioCategory $portfolioCategory): View
    {
        return view('admin.portfolio-categories.edit', ['category' => $portfolioCategory]);
    }

    public function update(Request $request, PortfolioCategory $portfolioCategory): RedirectResponse
    {
        $data = $this->validated($request);

        $data['slug'] = $request->input('slug')
            ? PortfolioCategory::generateUniqueSlug($request->input('slug'), $portfolioCategory->id)
            : $portfolioCategory->slug;

        if ($request->hasFile('image')) {
            $data['image'] = $this->replaceUpload($portfolioCategory->image, $request->file('image'), 'portfolio-categories');
        }

        $portfolioCategory->update($data);

        return redirect()->route('admin.portfolio-categories.index')->with('status', 'Category updated.');
    }

    public function destroy(PortfolioCategory $portfolioCategory): RedirectResponse
    {
        if ($portfolioCategory->portfolios()->exists()) {
            return back()->with('status', 'Move or delete the portfolio items in this category first.');
        }

        $this->deleteUpload($portfolioCategory->image);
        $portfolioCategory->delete();

        return redirect()->route('admin.portfolio-categories.index')->with('status', 'Category deleted.');
    }

    protected function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'slug' => ['nullable', 'string', 'max:170'],
            'icon' => ['nullable', 'string', 'max:60'],
            'image' => ['nullable', 'image', 'max:4096'],
            'description' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        $data['is_active'] = $request->boolean('is_active');
        unset($data['image']);

        return $data;
    }
}