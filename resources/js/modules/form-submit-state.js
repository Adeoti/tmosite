export function initFormSubmitState() {
    document.querySelectorAll('form.tmo-form').forEach((form) => {
        form.addEventListener('submit', () => {
            const button = form.querySelector('button[type="submit"]');

            if (!button || button.disabled) {
                return;
            }

            const loadingText = button.dataset.loadingText || 'Processing...';

            button.dataset.originalHtml = button.innerHTML;
            button.disabled = true;
            button.innerHTML = `<span class="btn-spinner"></span> ${loadingText}`;
        });
    });
}