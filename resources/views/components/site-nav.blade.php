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

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>

                </button>

            </div>


            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">
                Home
            </a>


            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'is-active' : '' }}">
                About
            </a>


            @php
                $navCategories = \App\Models\PortfolioCategory::active()->ordered()->get();
            @endphp


            {{-- =====================================================
                 SERVICES DROPDOWN
                 ===================================================== --}}

            <div class="site-nav__dropdown" data-nav-dropdown>

                <div class="site-nav__dropdown-trigger">

                    <a href="{{ route('services') }}"
                        class="{{ request()->routeIs('services') || request()->routeIs('portfolio.category') ? 'is-active' : '' }}"
                        data-nav-dropdown-trigger aria-haspopup="true" aria-expanded="false">

                        <span>Services</span>

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m6 9 6 6 6-6" />
                        </svg>

                    </a>

                </div>


                <div class="site-nav__dropdown-menu">

                    <div class="site-nav__dropdown-heading">
                        <span>OUR STUDIOS</span>
                        <p>Explore what we build</p>
                    </div>


                    <div class="site-nav__dropdown-grid">

                        @foreach ($navCategories as $category)
                            <a href="{{ route('portfolio.category', $category) }}"
                                class="site-nav__dropdown-item {{ request()->routeIs('portfolio.category') && request()->route('category')?->id === $category->id ? 'is-current' : '' }}">

                                <span class="site-nav__dropdown-icon">

                                    @switch($category->icon)
                                        @case('shopping-bag')
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M6 8h12l1 13H5L6 8Z" />
                                                <path d="M9 8a3 3 0 0 1 6 0" />
                                            </svg>
                                        @break

                                        @case('video')
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <rect x="3" y="5" width="14" height="14" rx="2" />
                                                <path d="m17 9 4-2v10l-4-2" />
                                            </svg>
                                        @break

                                        @case('box')
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z" />
                                                <path d="m4 7.5 8 4.5 8-4.5" />
                                                <path d="M12 12v9" />
                                            </svg>
                                        @break

                                        @case('mic')
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <rect x="9" y="3" width="6" height="11" rx="3" />
                                                <path d="M5 11a7 7 0 0 0 14 0" />
                                                <path d="M12 18v3" />
                                                <path d="M8 21h8" />
                                            </svg>
                                        @break

                                        @default
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <circle cx="12" cy="12" r="8" />
                                            </svg>
                                    @endswitch

                                </span>


                                <span class="site-nav__dropdown-copy">

                                    <strong>{{ $category->name }}</strong>

                                    <small>{{ $category->description }}</small>

                                </span>


                                <span class="site-nav__dropdown-arrow">

                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M5 12h14" />
                                        <path d="m13 6 6 6-6 6" />
                                    </svg>

                                </span>

                            </a>
                        @endforeach

                    </div>


                    <a href="{{ route('services') }}" class="site-nav__dropdown-footer">

                        <span>
                            <strong>Explore all services</strong>
                            <small>See how the studios work together</small>
                        </span>

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14" />
                            <path d="m13 6 6 6-6 6" />
                        </svg>

                    </a>

                </div>

            </div>


            {{-- =====================================================
                 PORTFOLIO DROPDOWN
                 ===================================================== --}}

            <div class="site-nav__dropdown" data-nav-dropdown>

                <div class="site-nav__dropdown-trigger">

                    <a href="{{ route('portfolio.index') }}"
                        class="{{ request()->routeIs('portfolio.*') ? 'is-active' : '' }}" data-nav-dropdown-trigger
                        aria-haspopup="true" aria-expanded="false">

                        <span>Portfolio</span>

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m6 9 6 6 6-6" />
                        </svg>

                    </a>

                </div>


                <div class="site-nav__dropdown-menu">

                    <div class="site-nav__dropdown-heading">
                        <span>SELECTED WORK</span>
                        <p>Browse by studio</p>
                    </div>


                    <div class="site-nav__dropdown-grid">

                        @foreach ($navCategories as $category)
                            <a href="{{ route('portfolio.category', $category) }}"
                                class="site-nav__dropdown-item {{ request()->routeIs('portfolio.category') && request()->route('category')?->id === $category->id ? 'is-current' : '' }}">

                                <span class="site-nav__dropdown-icon">

                                    @switch($category->icon)
                                        @case('shopping-bag')
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M6 8h12l1 13H5L6 8Z" />
                                                <path d="M9 8a3 3 0 0 1 6 0" />
                                            </svg>
                                        @break

                                        @case('video')
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <rect x="3" y="5" width="14" height="14" rx="2" />
                                                <path d="m17 9 4-2v10l-4-2" />
                                            </svg>
                                        @break

                                        @case('box')
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z" />
                                                <path d="m4 7.5 8 4.5 8-4.5" />
                                                <path d="M12 12v9" />
                                            </svg>
                                        @break

                                        @case('mic')
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <rect x="9" y="3" width="6" height="11" rx="3" />
                                                <path d="M5 11a7 7 0 0 0 14 0" />
                                                <path d="M12 18v3" />
                                                <path d="M8 21h8" />
                                            </svg>
                                        @break

                                        @default
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <circle cx="12" cy="12" r="8" />
                                            </svg>
                                    @endswitch

                                </span>


                                <span class="site-nav__dropdown-copy">

                                    <strong>{{ $category->name }}</strong>

                                    <small>
                                        {{ $category->portfolios()->published()->count() }}
                                        {{ $category->portfolios()->published()->count() === 1 ? 'case study' : 'case studies' }}
                                    </small>

                                </span>


                                <span class="site-nav__dropdown-arrow">

                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M5 12h14" />
                                        <path d="m13 6 6 6-6 6" />
                                    </svg>

                                </span>

                            </a>
                        @endforeach

                    </div>


                    <a href="{{ route('portfolio.index') }}" class="site-nav__dropdown-footer">

                        <span>
                            <strong>View all work</strong>
                            <small>Explore every project and case study</small>
                        </span>

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14" />
                            <path d="m13 6 6 6-6 6" />
                        </svg>

                    </a>

                </div>

            </div>


            <a href="{{ route('passive-income') }}"
                class="{{ request()->routeIs('passive-income') ? 'is-active' : '' }}">
                Passive Income
            </a>

            <a href="{{ route('annual-report') }}"
                class="{{ request()->routeIs('annual-report') ? 'is-active' : '' }}">
                Annual Report
            </a>


            <a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'is-active' : '' }}">
                Blog
            </a>


            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'is-active' : '' }}">
                Contact
            </a>


            <div class="site-nav__links-footer">

                <a href="{{ route('booking') }}" class="btn btn-primary">
                    Book a Call
                </a>


                <a href="{{ $whatsappLink ?? '#' }}" target="_blank" rel="noopener" class="btn btn-whatsapp">
                    Chat on WhatsApp
                </a>

            </div>

        </nav>


        <div class="site-nav__overlay" data-nav-overlay></div>


        <div class="site-nav__actions">

            <a href="{{ route('booking') }}" class="btn btn-primary">

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>

                Book a Call

            </a>


            <button type="button" class="site-nav__toggle" data-nav-toggle aria-label="Open menu"
                aria-expanded="false">

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="3" y1="6" x2="21" y2="6" />
                    <line x1="3" y1="12" x2="21" y2="12" />
                    <line x1="3" y1="18" x2="21" y2="18" />
                </svg>

            </button>

        </div>

    </div>

</header>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        const dropdowns = document.querySelectorAll('[data-nav-dropdown]');
        const mobileBreakpoint = 960;

        if (!dropdowns.length) {
            return;
        }


        const isMobile = () => window.innerWidth <= mobileBreakpoint;


        const closeDropdown = (dropdown) => {

            dropdown.classList.remove('is-open');

            const trigger = dropdown.querySelector('[data-nav-dropdown-trigger]');

            if (trigger) {
                trigger.setAttribute('aria-expanded', 'false');
            }
        };


        const closeAllDropdowns = (except = null) => {

            dropdowns.forEach((dropdown) => {

                if (dropdown !== except) {
                    closeDropdown(dropdown);
                }

            });

        };


        dropdowns.forEach((dropdown) => {

            const trigger = dropdown.querySelector('[data-nav-dropdown-trigger]');

            if (!trigger) {
                return;
            }


            trigger.addEventListener('click', function(event) {

                if (!isMobile()) {
                    return;
                }


                /*
                 * CRITICAL:
                 *
                 * Stop this click from reaching the existing
                 * mobile-navigation click handler.
                 *
                 * Without this, the parent mobile menu can
                 * interpret Services/Portfolio as a normal
                 * navigation click and close itself.
                 */
                event.preventDefault();
                event.stopPropagation();


                const isOpen = dropdown.classList.contains('is-open');


                /*
                 * Close the other dropdown first.
                 */
                closeAllDropdowns(dropdown);


                /*
                 * Toggle this dropdown.
                 */
                if (isOpen) {

                    closeDropdown(dropdown);

                } else {

                    dropdown.classList.add('is-open');

                    trigger.setAttribute('aria-expanded', 'true');

                }

            });

        });


        /*
         * Close dropdowns when clicking outside a dropdown.
         *
         * We intentionally do NOT close the main mobile
         * navigation here.
         */
        document.addEventListener('click', function(event) {

            if (!isMobile()) {
                return;
            }


            if (!event.target.closest('[data-nav-dropdown]')) {
                closeAllDropdowns();
            }

        });


        /*
         * Reset dropdown state when moving back to desktop.
         */
        window.addEventListener('resize', function() {

            if (!isMobile()) {
                closeAllDropdowns();
            }

        });

    });
</script>
