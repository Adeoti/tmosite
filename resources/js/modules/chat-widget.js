export function initChatWidget() {
    const widget = document.querySelector('[data-chat-widget]');

    if (!widget) {
        return;
    }

    const launcher = widget.querySelector('[data-chat-launcher]');
    const panel = widget.querySelector('[data-chat-panel]');
    const closeBtn = widget.querySelector('[data-chat-close]');
    const body = widget.querySelector('[data-chat-body]');
    const typing = widget.querySelector('[data-chat-typing]');
    const badge = widget.querySelector('[data-chat-badge]');
    const quickButtons = widget.querySelectorAll('[data-chat-quick]');
    const waLink = widget.querySelector('[data-chat-whatsapp]');
    const baseHref = waLink ? waLink.getAttribute('href') : '';
    const seenKey = 'tmo_chat_seen';

    const markSeen = () => {
        if (badge) {
            badge.classList.remove('is-visible');
        }

        try {
            window.localStorage.setItem(seenKey, '1');
        } catch (error) {
            return;
        }
    };

    const hasBeenSeen = () => {
        try {
            return window.localStorage.getItem(seenKey) === '1';
        } catch (error) {
            return true;
        }
    };

    if (badge && !hasBeenSeen()) {
        badge.classList.add('is-visible');
    }

    const togglePanel = () => {
        panel.classList.toggle('is-open');

        if (panel.classList.contains('is-open')) {
            markSeen();
        }
    };

    launcher.addEventListener('click', togglePanel);

    if (closeBtn) {
        closeBtn.addEventListener('click', () => panel.classList.remove('is-open'));
    }

    quickButtons.forEach((button) => {
        button.addEventListener('click', () => {
            if (!waLink || !body || !typing) {
                return;
            }

            const message = button.dataset.chatQuick || '';

            body.style.display = 'none';
            typing.hidden = false;

            window.setTimeout(() => {
                const url = new URL(baseHref);
                url.searchParams.set('text', message);
                waLink.setAttribute('href', url.toString());
                waLink.click();

                typing.hidden = true;
                body.style.display = '';
            }, 900);
        });
    });

    document.addEventListener('click', (event) => {
        if (!widget.contains(event.target)) {
            panel.classList.remove('is-open');
        }
    });
}