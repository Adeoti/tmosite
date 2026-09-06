@if ($errors->any())
    <div class="form-alert form-alert--error">
        <p>Please fix the following:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="admin-form-card">
    <h3 style="margin-top: 0;">Content</h3>

    <div class="tmo-form__row">
        <div class="tmo-form__field">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required>
        </div>
        <div class="tmo-form__field">
            <label for="blog_category_id">Category</label>
            <select id="blog_category_id" name="blog_category_id">
                <option value="">No category</option>
                @foreach ($categories as $option)
                    <option value="{{ $option->id }}" @selected(old('blog_category_id', $post->blog_category_id ?? null) == $option->id)>{{ $option->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="tmo-form__field">
        <label for="slug">Slug (optional — auto-generated from title if left blank)</label>
        <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug ?? '') }}">
    </div>

    <div class="tmo-form__field">
        <label for="excerpt">Excerpt (shown on cards and used as a meta description fallback)</label>
        <textarea id="excerpt" name="excerpt" rows="2">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    </div>

    <div class="tmo-form__field">
        <label for="content-editor">Content</label>
        <div id="content-editor" class="admin-editor" data-rich-editor="content"></div>
        <textarea id="content" name="content" hidden>{{ old('content', $post->content ?? '') }}</textarea>
    </div>

    <div class="tmo-form__field">
        <label for="featured_image">Featured Image</label>
        @if (!empty($post->featured_image))
            <div class="admin-current-image">
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                <span style="font-size: 13px; color: var(--color-muted);">Current featured image. Upload a new file to replace it.</span>
            </div>
        @endif
        <input type="file" id="featured_image" name="featured_image" accept="image/*">
    </div>

    <div class="tmo-form__row">
        <div class="tmo-form__field">
            <label for="tags">Tags (comma separated)</label>
            <input type="text" id="tags" name="tags" value="{{ old('tags', isset($post) ? $post->tags->pluck('name')->implode(', ') : '') }}" placeholder="Shopify, Automation, Case Study">
        </div>
        <div class="tmo-form__field">
            <label for="author_name">Author Name (optional — defaults to your admin name)</label>
            <input type="text" id="author_name" name="author_name" value="{{ old('author_name', $post->author_name ?? '') }}">
        </div>
    </div>

    <div class="tmo-form__row">
        <div class="tmo-form__field">
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="draft" @selected(old('status', $post->status ?? 'draft') === 'draft')>Draft</option>
                <option value="published" @selected(old('status', $post->status ?? 'draft') === 'published')>Published</option>
            </select>
        </div>
        <div class="tmo-form__field">
            <label for="published_at">Published Date (optional — set to now automatically when you publish)</label>
            <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at', !empty($post->published_at) ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
        </div>
    </div>

    <div class="admin-checkbox-row">
        <input type="checkbox" id="is_home_featured" name="is_home_featured" value="1" @checked(old('is_home_featured', $post->is_home_featured ?? false))>
        <label for="is_home_featured">Show in the "From the Blog" section on the homepage</label>
    </div>
</div>

<div class="admin-form-card">
    <h3 style="margin-top: 0;">SEO</h3>

    <div class="tmo-form__field">
        <label for="meta_title">Meta Title (optional — defaults to the post title)</label>
        <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}">
    </div>

    <div class="tmo-form__field">
        <label for="meta_description">Meta Description (optional — defaults to the excerpt)</label>
        <textarea id="meta_description" name="meta_description" rows="2">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
    </div>

    <div class="tmo-form__row">
        <div class="tmo-form__field">
            <label for="canonical_url">Canonical URL (optional)</label>
            <input type="url" id="canonical_url" name="canonical_url" value="{{ old('canonical_url', $post->canonical_url ?? '') }}">
        </div>
        <div class="tmo-form__field">
            <label for="og_image">Social Share Image (optional — defaults to the featured image)</label>
            <input type="file" id="og_image" name="og_image" accept="image/*">
        </div>
    </div>
</div>