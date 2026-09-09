<footer class="site-footer">

    <div class="container">

        <div class="site-footer__grid">

            {{-- BRAND --}}
            <div>

                <div class="site-footer__brand-title">

                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="{{ \App\Models\Setting::get('site_name') }}"
                    >

                    <strong>
                        TMO Ultimate Innovations Ltd.
                    </strong>

                </div>


                <p class="site-footer__intro">
                    {{ \App\Models\Setting::get('hero_subheadline') }}
                </p>


                <a
                    href="{{ $whatsappLink ?? '#' }}"
                    target="_blank"
                    rel="noopener"
                    class="btn btn-whatsapp"
                    style="width: fit-content;"
                >

                    <svg viewBox="0 0 24 24"
                         fill="currentColor"
                         width="16"
                         height="16"
                         aria-hidden="true">
                        <path d="M12.04 2c-5.46 0-9.9 4.44-9.9 9.9
                        0 1.75.46 3.45 1.32 4.95L2 22l5.28-1.38a9.9
                        9.9 0 0 0 4.76 1.21h.01c5.46 0 9.9-4.44
                        9.9-9.9 0-2.64-1.03-5.13-2.9-6.99A9.82
                        9.82 0 0 0 12.04 2Zm0 18.1a8.2 8.2 0
                        0 1-4.19-1.15l-.3-.18-3.13.82.84-3.05
                        -.2-.31a8.22 8.22 0 1 1 6.98 3.87Zm4.52
                        -6.15c-.25-.12-1.47-.72-1.7-.81-.23-.08-.4-.12
                        -.56.13-.17.25-.65.81-.79.97-.15.17-.29.19
                        -.54.06-.25-.12-1.04-.38-1.98-1.22-.73-.65
                        -1.23-1.46-1.37-1.7-.15-.25-.02-.39.11-.51
                        .11-.11.25-.29.37-.43.12-.15.16-.25.24-.42
                        .08-.17.04-.31-.02-.44-.06-.12-.56-1.35-.77
                        -1.85-.2-.48-.4-.42-.56-.42h-.48c-.17 0-.44.06
                        -.67.31-.23.25-.87.86-.87 2.09 0 1.23.9
                        2.42 1.02 2.59.12.17 1.77 2.7 4.28 3.79.6.26
                        1.06.41 1.43.53.6.19 1.14.16 1.57.1.48-.07
                        1.47-.6 1.68-1.19.2-.58.2-1.08.14-1.19
                        -.06-.11-.23-.17-.48-.29Z"/>
                    </svg>

                    <span>
                        {{ $whatsappDisplay ?? 'Chat on WhatsApp' }}
                    </span>

                </a>

            </div>


            {{-- COMPANY --}}
            <div>

                <h4>Company</h4>

                <a href="{{ route('about') }}">
                    About Us
                </a>

                <a href="{{ route('services') }}">
                    Services
                </a>

                <a href="{{ route('portfolio.index') }}">
                    Portfolio
                </a>

                <a href="{{ route('blog.index') }}">
                    Blog
                </a>

            </div>


            {{-- SOLUTIONS --}}
            <div>

                <h4>Solutions</h4>

                @foreach (\App\Models\PortfolioCategory::active()->ordered()->get() as $footerCategory)

                    <a href="{{ route('portfolio.category', $footerCategory) }}">
                        {{ $footerCategory->name }}
                    </a>

                @endforeach

                <a href="{{ route('passive-income') }}">
                    Passive Income
                </a>

            </div>


            {{-- CONTACT --}}
            <div>

                <h4>Contact</h4>

                <a
                    href="{{ $whatsappLink ?? '#' }}"
                    target="_blank"
                    rel="noopener"
                >
                    {{ $whatsappDisplay ?? '' }} (WhatsApp)
                </a>

                <a
                    href="mailto:{{ \App\Models\Setting::get('contact_email') }}"
                >
                    {{ \App\Models\Setting::get('contact_email') }}
                </a>

                <a href="{{ route('booking') }}">
                    Book a Consultation
                </a>

            </div>

        </div>


        <div class="site-footer__bottom">

            <span>
                &copy; {{ now()->year }}
                TMO Ultimate Innovations Ltd.
                All rights reserved.
            </span>


            <div class="site-footer__legal">

                <a href="{{ route('privacy') }}">
                    Privacy Policy
                </a>

                <a href="{{ route('terms') }}">
                    Terms of Service
                </a>

            </div>

        </div>

    </div>

</footer>