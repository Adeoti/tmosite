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
    <label for="question">Question</label>
    <input type="text" id="question" name="question" value="{{ old('question', $faqItem->question ?? '') }}" required>
</div>

<div class="tmo-form__field">
    <label for="answer">Answer</label>
    <textarea id="answer" name="answer" rows="4" required>{{ old('answer', $faqItem->answer ?? '') }}</textarea>
</div>

<div class="tmo-form__row">
    <div class="tmo-form__field">
        <label for="category">Shown On</label>
        <select id="category" name="category" required>
            <option value="services" @selected(old('category', $faqItem->category ?? 'services') === 'services')>Services Page</option>
            <option value="passive-income" @selected(old('category', $faqItem->category ?? 'services') === 'passive-income')>Passive Income Page</option>
            <option value="general" @selected(old('category', $faqItem->category ?? 'services') === 'general')>General</option>
        </select>
    </div>
    <div class="tmo-form__field">
        <label for="sort_order">Sort Order</label>
        <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $faqItem->sort_order ?? 0) }}">
    </div>
</div>