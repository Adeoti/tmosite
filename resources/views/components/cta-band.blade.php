
@props(['title', 'subtitle' => null])

<section class="cta-band">
    <div class="container cta-band__inner" data-animate="zoom">
        <div>
            <h2>{{ $title }}</h2>
            @if ($subtitle)
                <p>{{ $subtitle }}</p>
            @endif
        </div>
        <div class="cta-band__actions">
            {{ $slot }}
        </div>
    </div>
</section>