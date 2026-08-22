import { initScrollAnimations } from './modules/animations';
import { initNav } from './modules/nav';
import { initChatWidget } from './modules/chat-widget';
import { initCounters } from './modules/counters';
import { initLightbox } from './modules/lightbox';
import { initFormSubmitState } from './modules/form-submit-state';
import { initRichEditor } from './modules/rich-editor';
import { initHeroCarousel } from './modules/hero-carousel';

document.addEventListener('DOMContentLoaded', () => {
    initScrollAnimations();
    initNav();
    initChatWidget();
    initCounters();
    initLightbox();
    initFormSubmitState();
    initRichEditor();
    initHeroCarousel();
});