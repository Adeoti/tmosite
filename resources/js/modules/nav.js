export function initNav() {
    const toggle = document.querySelector('[data-nav-toggle]');
    const links = document.querySelector('[data-nav-links]');
    const overlay = document.querySelector('[data-nav-overlay]');
    const closeBtn = document.querySelector('[data-nav-close]');

    if (!toggle || !links) {
        return;
    }

    const openMenu = () => {
        links.classList.add('is-open');
        overlay?.classList.add('is-open');
        document.body.classList.add('tmo-nav-open');
        toggle.setAttribute('aria-expanded', 'true');
    };

    const closeMenu = () => {
        links.classList.remove('is-open');
        overlay?.classList.remove('is-open');
        document.body.classList.remove('tmo-nav-open');
        toggle.setAttribute('aria-expanded', 'false');
    };

    toggle.addEventListener('click', () => {
        if (links.classList.contains('is-open')) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    closeBtn?.addEventListener('click', closeMenu);
    overlay?.addEventListener('click', closeMenu);

    links.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeMenu();
        }
    });
}