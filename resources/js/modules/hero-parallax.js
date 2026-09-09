export function initHeroParallax() {
    const hero = document.querySelector('.tmo-hero');
    const orbs = document.querySelectorAll('.tmo-hero__orb');

    if (!hero || !orbs.length) {
        return;
    }

    if (!window.matchMedia('(pointer: fine)').matches) {
        return;
    }

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    let rafId = null;
    let targetX = 0;
    let targetY = 0;

    const applyTransform = () => {
        orbs.forEach((orb, index) => {
            const depth = index + 1;
            orb.style.transform = `translate3d(${targetX * depth}px, ${targetY * depth}px, 0)`;
        });
        rafId = null;
    };

    hero.addEventListener('mousemove', (event) => {
        const rect = hero.getBoundingClientRect();
        const x = (event.clientX - rect.left) / rect.width - 0.5;
        const y = (event.clientY - rect.top) / rect.height - 0.5;

        targetX = x * 18;
        targetY = y * 18;

        if (!rafId) {
            rafId = requestAnimationFrame(applyTransform);
        }
    });

    hero.addEventListener('mouseleave', () => {
        targetX = 0;
        targetY = 0;

        if (!rafId) {
            rafId = requestAnimationFrame(applyTransform);
        }
    });
}