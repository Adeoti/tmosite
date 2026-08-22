export function initCounters() {
    const counters = document.querySelectorAll('[data-counter]');

    if (!counters.length) {
        return;
    }

    const animate = (el) => {
        const target = Number(el.dataset.counterTarget || 0);
        const suffix = el.dataset.counterSuffix || '';
        const duration = 1400;
        const start = performance.now();

        const step = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            const value = Math.round(target * eased);
            el.textContent = `${value}${suffix}`;

            if (progress < 1) {
                requestAnimationFrame(step);
            }
        };

        requestAnimationFrame(step);
    };

    if (!('IntersectionObserver' in window)) {
        counters.forEach(animate);
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animate(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.6 }
    );

    counters.forEach((el) => observer.observe(el));
}