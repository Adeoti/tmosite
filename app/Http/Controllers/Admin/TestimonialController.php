<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $testimonials = Testimonial::ordered()->paginate(12);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $this->storeUpload($request->file('avatar'), 'testimonials');
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial created.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $this->replaceUpload($testimonial->avatar, $request->file('avatar'), 'testimonials');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $this->deleteUpload($testimonial->avatar);
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial deleted.');
    }

    protected function validated(Request $request): array
    {
        $data = $request->validate([
            'client_name' => ['required', 'string', 'max:150'],
            'client_role' => ['nullable', 'string', 'max:150'],
            'company' => ['nullable', 'string', 'max:150'],
            'content' => ['required', 'string', 'max:1000'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        $data['is_featured'] = $request->boolean('is_featured');
        unset($data['avatar']);

        return $data;
    }
}