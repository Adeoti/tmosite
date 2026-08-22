<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeroSlideController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $heroSlides = HeroSlide::ordered()->get();

        return view('admin.hero-slides.index', compact('heroSlides'));
    }

    public function create(): View
    {
        return view('admin.hero-slides.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeUpload($request->file('image'), 'hero-slides');
        }

        HeroSlide::create($data);

        return redirect()->route('admin.hero-slides.index')->with('status', 'Hero slide created.');
    }

    public function edit(HeroSlide $heroSlide): View
    {
        return view('admin.hero-slides.edit', compact('heroSlide'));
    }

    public function update(Request $request, HeroSlide $heroSlide): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = $this->replaceUpload($heroSlide->image, $request->file('image'), 'hero-slides');
        }

        $heroSlide->update($data);

        return redirect()->route('admin.hero-slides.index')->with('status', 'Hero slide updated.');
    }

    public function destroy(HeroSlide $heroSlide): RedirectResponse
    {
        $this->deleteUpload($heroSlide->image);
        $heroSlide->delete();

        return redirect()->route('admin.hero-slides.index')->with('status', 'Hero slide deleted.');
    }

    protected function validated(Request $request): array
    {
        $data = $request->validate([
            'headline' => ['required', 'string', 'max:150'],
            'subheadline' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'max:6144'],
            'cta_label' => ['nullable', 'string', 'max:60'],
            'cta_url' => ['nullable', 'string', 'max:255'],
            'secondary_cta_label' => ['nullable', 'string', 'max:60'],
            'secondary_cta_url' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        unset($data['image']);

        return $data;
    }
}