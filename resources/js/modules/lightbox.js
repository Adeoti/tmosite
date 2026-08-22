export function initLightbox() {
    const lightbox = document.querySelector('[data-lightbox]');
    const triggers = document.querySelectorAll('[data-lightbox-trigger]');

    if (!lightbox || !triggers.length) {
        return;
    }

    const image = lightbox.querySelector('[data-lightbox-image]');
    const closeBtn = lightbox.querySelector('[data-lightbox-close]');

    const open = (src, alt) => {
        image.setAttribute('src', src);
        image.setAttribute('alt', alt || '');
        lightbox.classList.add('is-open');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    };

    const close = () => {
        lightbox.classList.remove('is-open');
        lightbox.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    };

    triggers.forEach((trigger) => {
        trigger.addEventListener('click', () => {
            const src = trigger.dataset.lightboxSrc;
            const alt = trigger.querySelector('img')?.getAttribute('alt') || '';
            open(src, alt);
        });
    });

    closeBtn.addEventListener('click', close);

    lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) {
            close();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            close();
        }
    });
}