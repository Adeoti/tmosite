export function initHeroCarousel() {
    const carousel = document.querySelector('[data-hero-carousel]');

    if (!carousel) {
        return;
    }

    const slides = Array.from(carousel.querySelectorAll('[data-hero-slide]'));
    const dots = Array.from(carousel.querySelectorAll('[data-hero-dot]'));
    const prevBtn = carousel.querySelector('[data-hero-prev]');
    const nextBtn = carousel.querySelector('[data-hero-next]');

    if (slides.length <= 1) {
        return;
    }

    let activeIndex = slides.findIndex((slide) => slide.classList.contains('is-active'));
    activeIndex = activeIndex === -1 ? 0 : activeIndex;

    const autoplayDelay = 6500;
    let autoplayTimer = null;

    const goTo = (index) => {
        const nextIndex = (index + slides.length) % slides.length;

        slides[activeIndex]?.classList.remove('is-active');
        dots[activeIndex]?.classList.remove('is-active');

        activeIndex = nextIndex;

        slides[activeIndex]?.classList.add('is-active');
        dots[activeIndex]?.classList.add('is-active');
    };

    const next = () => goTo(activeIndex + 1);
    const prev = () => goTo(activeIndex - 1);

    const startAutoplay = () => {
        stopAutoplay();
        autoplayTimer = window.setInterval(next, autoplayDelay);
    };

    const stopAutoplay = () => {
        if (autoplayTimer) {
            window.clearInterval(autoplayTimer);
            autoplayTimer = null;
        }
    };

    nextBtn?.addEventListener('click', () => {
        next();
        startAutoplay();
    });

    prevBtn?.addEventListener('click', () => {
        prev();
        startAutoplay();
    });

    dots.forEach((dot) => {
        dot.addEventListener('click', () => {
            goTo(Number(dot.dataset.heroIndex));
            startAutoplay();
        });
    });

    carousel.addEventListener('mouseenter', stopAutoplay);
    carousel.addEventListener('mouseleave', startAutoplay);
    carousel.addEventListener('focusin', stopAutoplay);
    carousel.addEventListener('focusout', startAutoplay);

    let touchStartX = 0;

    carousel.addEventListener('touchstart', (event) => {
        touchStartX = event.touches[0].clientX;
        stopAutoplay();
    }, { passive: true });

    carousel.addEventListener('touchend', (event) => {
        const deltaX = event.changedTouches[0].clientX - touchStartX;

        if (Math.abs(deltaX) > 40) {
            deltaX > 0 ? prev() : next();
        }

        startAutoplay();
    }, { passive: true });

    document.addEventListener('keydown', (event) => {
        const rect = carousel.getBoundingClientRect();
        const inView = rect.top < window.innerHeight && rect.bottom > 0;

        if (!inView) {
            return;
        }

        if (event.key === 'ArrowLeft') {
            prev();
            startAutoplay();
        } else if (event.key === 'ArrowRight') {
            next();
            startAutoplay();
        }
    });

    startAutoplay();
}