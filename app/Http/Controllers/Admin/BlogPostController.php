<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPostRequest;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogPostController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $posts = BlogPost::with('category')->orderByDesc('created_at')->paginate(12);

        return view('admin.blog-posts.index', compact('posts'));
    }

    public function create(): View
    {
        $categories = BlogCategory::orderBy('name')->get();

        return view('admin.blog-posts.create', compact('categories'));
    }

    public function store(StoreBlogPostRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['featured_image', 'og_image', 'tags']);

        $data['slug'] = BlogPost::generateUniqueSlug($request->input('slug') ?: $request->input('title'));
        $data['author_name'] = $data['author_name'] ?: auth()->user()->name;
        $data['user_id'] = auth()->id();
        $data['published_at'] = $data['published_at'] ?: ($data['status'] === 'published' ? now() : null);
        $data['is_home_featured'] = $request->boolean('is_home_featured');

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->storeUpload($request->file('featured_image'), 'blog/featured');
        }

        if ($request->hasFile('og_image')) {
            $data['og_image'] = $this->storeUpload($request->file('og_image'), 'blog/og');
        }

        $post = BlogPost::create($data);

        $post->tags()->sync($this->syncTagIds($request->input('tags')));

        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog post created.');
    }

    public function edit(BlogPost $blogPost): View
    {
        $categories = BlogCategory::orderBy('name')->get();
        $post = $blogPost->load('tags');

        return view('admin.blog-posts.edit', compact('post', 'categories'));
    }

    public function update(StoreBlogPostRequest $request, BlogPost $blogPost): RedirectResponse
    {
        $data = $request->safe()->except(['featured_image', 'og_image', 'tags']);

        $data['slug'] = $request->input('slug')
            ? BlogPost::generateUniqueSlug($request->input('slug'), $blogPost->id)
            : $blogPost->slug;
        $data['author_name'] = $data['author_name'] ?: $blogPost->author_name;
        $data['published_at'] = $data['published_at'] ?: ($data['status'] === 'published' ? ($blogPost->published_at ?: now()) : null);
        $data['is_home_featured'] = $request->boolean('is_home_featured');

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->replaceUpload($blogPost->featured_image, $request->file('featured_image'), 'blog/featured');
        }

        if ($request->hasFile('og_image')) {
            $data['og_image'] = $this->replaceUpload($blogPost->og_image, $request->file('og_image'), 'blog/og');
        }

        $blogPost->update($data);

        $blogPost->tags()->sync($this->syncTagIds($request->input('tags')));

        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog post updated.');
    }

    public function destroy(BlogPost $blogPost): RedirectResponse
    {
        $this->deleteUpload($blogPost->featured_image);
        $this->deleteUpload($blogPost->og_image);

        $blogPost->delete();

        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog post deleted.');
    }

    protected function syncTagIds(?string $tags): array
    {
        return collect($this->parseCommaList($tags))
            ->map(function (string $name) {
                $tag = BlogTag::firstOrCreate(
                    ['slug' => Str::slug($name)],
                    ['name' => $name]
                );

                return $tag->id;
            })
            ->all();
    }
}