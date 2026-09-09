@props(['title', 'subtitle' => null])

<section class="tmo-page-cta">

    <div class="tmo-page-cta__grid"></div>

    <div class="container tmo-page-cta__inner">

        <h2>{{ $title }}</h2>

        @if ($subtitle)
            <p>{{ $subtitle }}</p>
        @endif

        <div class="tmo-page-cta__actions">
            {{ $slot }}
        </div>

    </div>

</section>