export function initRichEditor() {
    const container = document.querySelector('[data-rich-editor]');

    if (!container || typeof Quill === 'undefined') {
        return;
    }

    const targetId = container.dataset.richEditor;
    const hiddenField = document.getElementById(targetId);

    if (!hiddenField) {
        return;
    }

    const quill = new Quill(container, {
        theme: 'snow',
        placeholder: 'Write your post...',
        modules: {
            toolbar: [
                [{ header: [2, 3, false] }],
                ['bold', 'italic', 'underline', 'link'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['blockquote', 'image'],
                ['clean'],
            ],
        },
    });

    quill.root.innerHTML = hiddenField.value;

    const form = container.closest('form');

    if (form) {
        form.addEventListener('submit', () => {
            hiddenField.value = quill.root.innerHTML;
        });
    }
}