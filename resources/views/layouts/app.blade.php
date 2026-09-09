<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', \App\Models\Setting::get('site_name', 'TMO Ultimate Innovations Ltd.'))</title>
    <meta name="description" content="@yield('meta_description', \App\Models\Setting::get('hero_subheadline'))">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <meta property="og:site_name" content="{{ \App\Models\Setting::get('site_name') }}">
    <meta property="og:title" content="@yield('title', \App\Models\Setting::get('site_name'))">
    <meta property="og:description" content="@yield('meta_description', \App\Models\Setting::get('hero_subheadline'))">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/logo.png'))">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', \App\Models\Setting::get('site_name'))">
    <meta name="twitter:description" content="@yield('meta_description', \App\Models\Setting::get('hero_subheadline'))">
    <meta name="twitter:image" content="@yield('og_image', asset('images/logo.png'))">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('favicon-48x48.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#0B2545">
    <link rel="alternate" type="application/rss+xml" title="{{ \App\Models\Setting::get('site_name') }} Blog"
        href="{{ route('blog.feed') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @php
        $tmoOrganizationSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => \App\Models\Setting::get('site_name'),
            'url' => url('/'),
            'logo' => asset('images/logo.png'),
            'description' => \App\Models\Setting::get('hero_subheadline'),
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+' . \App\Models\Setting::get('whatsapp_number'),
                'contactType' => 'customer service',
                'areaServed' => 'Worldwide',
                'availableLanguage' => ['English'],
            ],
        ];
    @endphp
    <x-structured-data :schema="$tmoOrganizationSchema" />

    @stack('structured-data')
    @stack('head')
</head>

<body class="@yield('body_class', 'tmo-nav-dark')">
    <x-page-loader />

    <x-site-nav />

    <main>
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <x-site-footer />
    <x-chat-widget />

    @stack('scripts')
</body>

</html>
