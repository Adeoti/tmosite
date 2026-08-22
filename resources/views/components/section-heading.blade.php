@props(['eyebrow' => null, 'align' => 'left'])

<div class="section-heading section-heading--{{ $align }}" data-animate="up">
    @if ($eyebrow)
        <div class="eyebrow" style="{{ $align === 'center' ? 'justify-content: center;' : '' }}">{{ $eyebrow }}</div>
    @endif
    <h2>{{ $slot }}</h2>
    @isset($description)
        <p class="section-heading__description">{{ $description }}</p>
    @endisset
</div>