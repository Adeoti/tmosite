@props(['value', 'label', 'suffix' => ''])

<div class="stat-counter" data-animate="up">
    <strong data-counter data-counter-target="{{ $value }}" data-counter-suffix="{{ $suffix }}">124{{ $suffix }}</strong>
    <span>{{ $label }}</span>
</div>