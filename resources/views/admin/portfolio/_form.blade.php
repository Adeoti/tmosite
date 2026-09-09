@if ($errors->any())
    <div class="tmo-form-alert tmo-form-alert--error">
        <p>Please fix the following:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="admin-form-card">
    <h3 class="admin-form-card__title">Details</h3>

    <div class="tmo-form__row">
        <div class="tmo-form__field">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $portfolio->title ?? '') }}" required>
        </div>

        <div class="tmo-form__field">
            <label for="portfolio_category_id">Category</label>
            <select id="portfolio_category_id" name="portfolio_category_id" required>
                @foreach ($categories as $option)
                    <option value="{{ $option->id }}" @selected(old('portfolio_category_id', $portfolio->portfolio_category_id ?? null) == $option->id)>{{ $option->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="tmo-form__field">
        <label for="slug">Slug (optional — auto-generated from title if left blank)</label>
        <input type="text" id="slug" name="slug" value="{{ old('slug', $portfolio->slug ?? '') }}">
    </div>

    <div class="tmo-form__row">
        <div class="tmo-form__field">
            <label for="client_name">Client Name</label>
            <input type="text" id="client_name" name="client_name" value="{{ old('client_name', $portfolio->client_name ?? '') }}">
        </div>

        <div class="tmo-form__field">
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="draft" @selected(old('status', $portfolio->status ?? 'draft') === 'draft')>Draft</option>
                <option value="published" @selected(old('status', $portfolio->status ?? 'draft') === 'published')>Published</option>
            </select>
        </div>
    </div>

    <div class="tmo-form__field">
        <label for="summary">Summary (shown on cards and as the meta description)</label>
        <textarea id="summary" name="summary" rows="2">{{ old('summary', $portfolio->summary ?? '') }}</textarea>
    </div>

    <div class="tmo-form__field">
        <label for="description">Full Description</label>
        <textarea id="description" name="description" rows="6">{{ old('description', $portfolio->description ?? '') }}</textarea>
    </div>
</div>

<div class="admin-form-card">
    <h3 class="admin-form-card__title">Media</h3>

    <div class="tmo-form__field">
        <label for="cover_image">Cover Image</label>

        @if (!empty($portfolio->cover_image))
            <div class="admin-current-image">
                <img src="{{ asset('storage/' . $portfolio->cover_image) }}" alt="{{ $portfolio->title }}">
                <span>Current cover image. Upload a new file to replace it.</span>
            </div>
        @endif

        <input type="file" id="cover_image" name="cover_image" accept="image/*">
    </div>

    @if (!empty($portfolio) && !empty($portfolio->gallery))

        <div class="tmo-form__field">
            <label>Current Gallery Images</label>

            <div class="admin-gallery-grid">

                @foreach ($portfolio->gallery as $image)

                    <figure>
                        <img src="{{ asset('storage/' . $image) }}" alt="Gallery image">
                        <figcaption>
                            <input type="checkbox" name="remove_gallery[]" value="{{ $image }}" id="remove-{{ $loop->index }}">
                            <label for="remove-{{ $loop->index }}">Remove</label>
                        </figcaption>
                    </figure>

                @endforeach

            </div>
        </div>

    @endif

    <div class="tmo-form__field">
        <label for="gallery">Add Gallery Images</label>
        <input type="file" id="gallery" name="gallery[]" accept="image/*" multiple>
        <p class="admin-field-hint">You can select multiple images at once. They'll be added to the gallery above.</p>
    </div>

    <div class="tmo-form__row">
        <div class="tmo-form__field">
            <label for="video_url">Video Embed URL (optional)</label>
            <input type="url" id="video_url" name="video_url" value="{{ old('video_url', $portfolio->video_url ?? '') }}" placeholder="https://www.youtube.com/embed/...">
        </div>

        <div class="tmo-form__field">
            <label for="project_url">Live Project URL (optional)</label>
            <input type="url" id="project_url" name="project_url" value="{{ old('project_url', $portfolio->project_url ?? '') }}">
        </div>
    </div>
</div>

<div class="admin-form-card">
    <h3 class="admin-form-card__title">Meta &amp; Results</h3>

    <div class="tmo-form__field">
        <label for="tags">Tags (comma separated)</label>
        <input type="text" id="tags" name="tags" value="{{ old('tags', !empty($portfolio->tags) ? implode(', ', $portfolio->tags) : '') }}" placeholder="Shopify, Fashion, Subscription">
    </div>

    <div class="tmo-form__field">
        <label for="results">Results (one per line, formatted as: Value | Label)</label>
        <textarea id="results" name="results" rows="4" placeholder="42% | Increase in conversion rate">{{ old('results', !empty($portfolio->results) ? collect($portfolio->results)->map(fn ($r) => trim($r['value'] ?? '') . ' | ' . trim($r['label'] ?? ''))->implode("\n") : '') }}</textarea>
    </div>

    <div class="tmo-form__row">
        <div class="admin-checkbox-row admin-checkbox-row--aligned">
            <input type="checkbox" id="is_featured" name="is_featured" value="1" @checked(old('is_featured', $portfolio->is_featured ?? false))>
            <label for="is_featured">Feature on the homepage and portfolio hub</label>
        </div>

        <div class="tmo-form__field">
            <label for="sort_order">Sort Order</label>
            <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $portfolio->sort_order ?? 0) }}">
        </div>
    </div>
</div>