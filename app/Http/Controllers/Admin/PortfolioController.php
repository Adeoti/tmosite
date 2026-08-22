<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $portfolios = Portfolio::with('category')
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create(): View
    {
        $categories = PortfolioCategory::active()->ordered()->get();

        return view('admin.portfolio.create', compact('categories'));
    }

    public function store(StorePortfolioRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['cover_image', 'gallery', 'remove_gallery', 'tags', 'results', 'is_featured']);

        $data['slug'] = Portfolio::generateUniqueSlug($request->input('slug') ?: $request->input('title'));
        $data['is_featured'] = $request->boolean('is_featured');
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        $data['tags'] = $this->parseCommaList($request->input('tags'));
        $data['results'] = $this->parseResultLines($request->input('results'));

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->storeUpload($request->file('cover_image'), 'portfolio/covers');
        }

        $gallery = [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $this->storeUpload($file, 'portfolio/gallery');
            }
        }

        $data['gallery'] = $gallery;

        Portfolio::create($data);

        return redirect()->route('admin.portfolio.index')->with('status', 'Portfolio item created.');
    }

    public function edit(Portfolio $portfolio): View
    {
        $categories = PortfolioCategory::active()->ordered()->get();

        return view('admin.portfolio.edit', compact('portfolio', 'categories'));
    }

    public function update(StorePortfolioRequest $request, Portfolio $portfolio): RedirectResponse
    {
        $data = $request->safe()->except(['cover_image', 'gallery', 'remove_gallery', 'tags', 'results', 'is_featured']);

        $data['slug'] = $request->input('slug')
            ? Portfolio::generateUniqueSlug($request->input('slug'), $portfolio->id)
            : $portfolio->slug;
        $data['is_featured'] = $request->boolean('is_featured');
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        $data['tags'] = $this->parseCommaList($request->input('tags'));
        $data['results'] = $this->parseResultLines($request->input('results'));

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->replaceUpload($portfolio->cover_image, $request->file('cover_image'), 'portfolio/covers');
        }

        $removeList = $request->input('remove_gallery', []);

        foreach ($removeList as $path) {
            $this->deleteUpload($path);
        }

        $gallery = collect($portfolio->gallery ?? [])
            ->reject(fn ($path) => in_array($path, $removeList, true))
            ->values()
            ->all();

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $this->storeUpload($file, 'portfolio/gallery');
            }
        }

        $data['gallery'] = $gallery;

        $portfolio->update($data);

        return redirect()->route('admin.portfolio.index')->with('status', 'Portfolio item updated.');
    }

    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        $this->deleteUpload($portfolio->cover_image);

        foreach ($portfolio->gallery ?? [] as $path) {
            $this->deleteUpload($path);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('status', 'Portfolio item deleted.');
    }
}