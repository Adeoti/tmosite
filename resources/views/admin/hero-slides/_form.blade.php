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
    <label for="headline">Headline</label>
    <input type="text" id="headline" name="headline" value="{{ old('headline', $heroSlide->headline ?? '') }}" required>
</div>

<div class="tmo-form__field">
    <label for="subheadline">Subheadline</label>
    <textarea id="subheadline" name="subheadline" rows="2">{{ old('subheadline', $heroSlide->subheadline ?? '') }}</textarea>
</div>

<div class="tmo-form__field">
    <label for="image">Background Image (recommended 1920&times;1080 or larger, landscape)</label>
    @if (!empty($heroSlide->image))
        <div class="admin-current-image">
            <img src="{{ asset('storage/' . $heroSlide->image) }}" alt="{{ $heroSlide->headline }}">
            <span style="font-size: 13px; color: var(--color-muted);">Current image. Upload a new file to replace it.</span>
        </div>
    @endif
    <input type="file" id="image" name="image" accept="image/*">
    <p class="admin-field-hint">Leave blank to use a brand-colored gradient background instead of a photo.</p>
</div>

<div class="tmo-form__row">
    <div class="tmo-form__field">
        <label for="cta_label">Primary Button Label</label>
        <input type="text" id="cta_label" name="cta_label" value="{{ old('cta_label', $heroSlide->cta_label ?? '') }}" placeholder="Book a Free Consultation">
    </div>
    <div class="tmo-form__field">
        <label for="cta_url">Primary Button Link</label>
        <input type="text" id="cta_url" name="cta_url" value="{{ old('cta_url', $heroSlide->cta_url ?? '') }}" placeholder="/booking">
    </div>
</div>

<div class="tmo-form__row">
    <div class="tmo-form__field">
        <label for="secondary_cta_label">Secondary Button Label (optional)</label>
        <input type="text" id="secondary_cta_label" name="secondary_cta_label" value="{{ old('secondary_cta_label', $heroSlide->secondary_cta_label ?? '') }}" placeholder="View Portfolio">
    </div>
    <div class="tmo-form__field">
        <label for="secondary_cta_url">Secondary Button Link (optional)</label>
        <input type="text" id="secondary_cta_url" name="secondary_cta_url" value="{{ old('secondary_cta_url', $heroSlide->secondary_cta_url ?? '') }}" placeholder="/portfolio">
    </div>
</div>

<div class="tmo-form__row">
    <div class="tmo-form__field">
        <label for="sort_order">Sort Order (lower shows first)</label>
        <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $heroSlide->sort_order ?? 0) }}">
    </div>
    <div class="admin-checkbox-row" style="margin-top: 30px;">
        <input type="checkbox" id="is_active" name="is_active" value="1" @checked(old('is_active', $heroSlide->is_active ?? true))>
        <label for="is_active">Visible in the homepage carousel</label>
    </div>
</div>