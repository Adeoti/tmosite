@props(['eyebrow' => null, 'variant' => 'paper'])

<section class="tmo-page-hero tmo-page-hero--{{ $variant }}">

    <div class="tmo-page-hero__grid"></div>

    <div class="container tmo-page-hero__inner">

        @if ($eyebrow)
            <div class="tmo-kicker tmo-kicker--center">
                <span class="tmo-kicker__dot"></span>
                {{ $eyebrow }}
            </div>
        @endif

        {{ $slot }}

    </div>

</section>