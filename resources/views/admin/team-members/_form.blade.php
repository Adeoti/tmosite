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

<div class="tmo-form__row">
    <div class="tmo-form__field">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $teamMember->name ?? '') }}" required>
    </div>
    <div class="tmo-form__field">
        <label for="role">Role</label>
        <input type="text" id="role" name="role" value="{{ old('role', $teamMember->role ?? '') }}" required>
    </div>
</div>

<div class="tmo-form__field">
    <label for="bio">Bio</label>
    <textarea id="bio" name="bio" rows="3">{{ old('bio', $teamMember->bio ?? '') }}</textarea>
</div>

<div class="tmo-form__field">
    <label for="photo">Photo</label>
    @if (!empty($teamMember->photo))
        <div class="admin-current-image">
            <img src="{{ asset('storage/' . $teamMember->photo) }}" alt="{{ $teamMember->name }}" style="border-radius: 50%;">
        </div>
    @endif
    <input type="file" id="photo" name="photo" accept="image/*">
</div>

<div class="tmo-form__row">
    <div class="tmo-form__field">
        <label for="linkedin_url">LinkedIn URL (optional)</label>
        <input type="url" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $teamMember->social_links['linkedin'] ?? '') }}">
    </div>
    <div class="tmo-form__field">
        <label for="twitter_url">X / Twitter URL (optional)</label>
        <input type="url" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $teamMember->social_links['twitter'] ?? '') }}">
    </div>
</div>

<div class="tmo-form__row">
    <div class="admin-checkbox-row" style="margin-top: 30px;">
        <input type="checkbox" id="is_active" name="is_active" value="1" @checked(old('is_active', $teamMember->is_active ?? true))>
        <label for="is_active">Visible on the About page</label>
    </div>
    <div class="tmo-form__field">
        <label for="sort_order">Sort Order</label>
        <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $teamMember->sort_order ?? 0) }}">
    </div>
</div>