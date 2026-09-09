export function initPageLoader() {
    document.body.classList.add('tmo-page-loading');

    window.addEventListener('load', () => {
        const loader = document.getElementById('tmo-loader');

        window.setTimeout(() => {
            document.body.classList.remove('tmo-page-loading');

            if (loader) {
                loader.classList.add('is-hidden');
                window.setTimeout(() => loader.remove(), 700);
            }
        }, 300);
    });
}