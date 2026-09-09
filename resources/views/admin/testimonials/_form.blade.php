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
    <h3 class="admin-form-card__title">Testimonial Details</h3>

    <div class="tmo-form__row">
        <div class="tmo-form__field">
            <label for="client_name">Client Name</label>
            <input type="text" id="client_name" name="client_name" value="{{ old('client_name', $testimonial->client_name ?? '') }}" required>
        </div>

        <div class="tmo-form__field">
            <label for="company">Company</label>
            <input type="text" id="company" name="company" value="{{ old('company', $testimonial->company ?? '') }}">
        </div>
    </div>

    <div class="tmo-form__field">
        <label for="client_role">Role</label>
        <input type="text" id="client_role" name="client_role" value="{{ old('client_role', $testimonial->client_role ?? '') }}">
    </div>

    <div class="tmo-form__field">
        <label for="content">Testimonial</label>
        <textarea id="content" name="content" rows="4" required>{{ old('content', $testimonial->content ?? '') }}</textarea>
    </div>

    <div class="tmo-form__field">
        <label for="avatar">Avatar (optional)</label>

        @if (!empty($testimonial->avatar))
            <div class="admin-current-image">
                <img src="{{ asset('storage/' . $testimonial->avatar) }}" alt="{{ $testimonial->client_name }}" class="is-round">
            </div>
        @endif

        <input type="file" id="avatar" name="avatar" accept="image/*">
    </div>

    <div class="tmo-form__row">
        <div class="tmo-form__field">
            <label for="rating">Rating</label>
            <select id="rating" name="rating" required>
                @for ($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" @selected(old('rating', $testimonial->rating ?? 5) == $i)>{{ $i }} star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
        </div>

        <div class="tmo-form__field">
            <label for="sort_order">Sort Order</label>
            <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">
        </div>
    </div>

    <div class="admin-checkbox-row">
        <input type="checkbox" id="is_featured" name="is_featured" value="1" @checked(old('is_featured', $testimonial->is_featured ?? false))>
        <label for="is_featured">Feature on the homepage</label>
    </div>
</div>