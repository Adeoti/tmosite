<header class="site-nav">
    <div class="site-nav__inner">
        <a href="{{ route('home') }}" class="site-nav__brand">
            <img src="{{ asset('images/logo.png') }}" alt="{{ \App\Models\Setting::get('site_name') }}">
            <span>TMO Ultimate</span>
        </a>

        <nav class="site-nav__links" data-nav-links>
            <div class="site-nav__links-header">
                <a href="{{ route('home') }}" class="site-nav__brand">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ \App\Models\Setting::get('site_name') }}">
                    <span>TMO Ultimate</span>
                </a>
                <button type="button" class="site-nav__close" data-nav-close aria-label="Close menu">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'is-active' : '' }}">About</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'is-active' : '' }}">Services</a>
            <a href="{{ route('portfolio.index') }}" class="{{ request()->routeIs('portfolio.*') ? 'is-active' : '' }}">Portfolio</a>
            <a href="{{ route('passive-income') }}" class="{{ request()->routeIs('passive-income') ? 'is-active' : '' }}">Passive Income</a>
            <a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'is-active' : '' }}">Blog</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'is-active' : '' }}">Contact</a>
            <div class="site-nav__links-footer">
                <a href="{{ route('booking') }}" class="btn btn-primary" style="width: 100%;">Book a Call</a>
                <a href="{{ $whatsappLink ?? '#' }}" target="_blank" rel="noopener" class="btn btn-whatsapp" style="width: 100%;">Chat on WhatsApp</a>
            </div>
        </nav>

        <div class="site-nav__overlay" data-nav-overlay></div>

        <div class="site-nav__actions">
            <a href="{{ route('booking') }}" class="btn btn-primary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                Book a Call
            </a>
            <button type="button" class="site-nav__toggle" data-nav-toggle aria-label="Open menu" aria-expanded="false">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            </button>
        </div>
    </div>
</header>