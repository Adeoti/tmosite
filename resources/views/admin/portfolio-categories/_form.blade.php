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

<div class="tmo-form__field">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" required>
</div>

<div class="tmo-form__field">
    <label for="slug">Slug (optional — auto-generated from name if left blank)</label>
    <input type="text" id="slug" name="slug" value="{{ old('slug', $category->slug ?? '') }}">
</div>

<div class="tmo-form__field">
    <label for="icon">Icon Name (optional, for internal reference)</label>
    <input type="text" id="icon" name="icon" value="{{ old('icon', $category->icon ?? '') }}" placeholder="e.g. shopping-bag">
</div>

<div class="tmo-form__field">
    <label for="image">Category Image</label>
    @if (!empty($category->image))
        <div class="admin-current-image">
            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
            <span style="font-size: 13px; color: var(--color-muted);">Current image. Upload a new file to replace it.</span>
        </div>
    @endif
    <input type="file" id="image" name="image" accept="image/*">
    <p class="admin-field-hint">Shown on the public Services page in place of the default icon. Recommended: a square or landscape photo, at least 600px wide.</p>
</div>

<div class="tmo-form__field">
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="3">{{ old('description', $category->description ?? '') }}</textarea>
</div>

<div class="tmo-form__field">
    <label for="sort_order">Sort Order</label>
    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $category->sort_order ?? 0) }}">
</div>

<div class="admin-checkbox-row">
    <input type="checkbox" id="is_active" name="is_active" value="1" @checked(old('is_active', $category->is_active ?? true))>
    <label for="is_active">Visible on the public site</label>
</div>