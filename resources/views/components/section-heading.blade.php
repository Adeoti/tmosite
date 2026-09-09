@props(['eyebrow' => null, 'align' => 'left'])

<div class="tmo-page-section-head tmo-page-section-head--{{ $align }}">

    @if ($eyebrow)
        <span class="tmo-section-number">{{ $eyebrow }}</span>
    @endif

    <h2>{{ $slot }}</h2>

</div>