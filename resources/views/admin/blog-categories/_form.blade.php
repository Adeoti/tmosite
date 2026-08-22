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