
@php
    $tmoChatRouteName = request()->route()?->getName();
    $tmoChatContextLabel = null;

    if (in_array($tmoChatRouteName, ['portfolio.category', 'portfolio.show'], true)) {
        $tmoChatBoundCategory = request()->route('category');

        if ($tmoChatBoundCategory instanceof \App\Models\PortfolioCategory) {
            $tmoChatContextLabel = $tmoChatBoundCategory->name;
        }
    } elseif ($tmoChatRouteName === 'passive-income') {
        $tmoChatContextLabel = 'Passive Income';
    } elseif ($tmoChatRouteName === 'blog.show') {
        $tmoChatContextLabel = 'this article';
    }
@endphp

<div class="chat-widget" data-chat-widget>
    <div class="chat-widget__panel" data-chat-panel role="dialog" aria-label="Chat with TMO Ultimate">
        <div class="chat-widget__header">
            <strong>TMO Support</strong>
            <p>We usually reply within minutes on WhatsApp.</p>
            <button type="button" data-chat-close aria-label="Close chat" style="position:absolute; top:14px; right:14px; background:none; border:none; color:#fff; cursor:pointer;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <div class="chat-widget__body" data-chat-body>
            @if ($tmoChatContextLabel)
                <button type="button" class="chat-widget__quick chat-widget__quick--context" data-chat-quick="Hi, I'm looking at {{ $tmoChatContextLabel }} and I'd like to know more.">
                    Ask about {{ $tmoChatContextLabel }}
                </button>
            @endif
            <button type="button" class="chat-widget__quick" data-chat-quick="Hi, I'd like a quote for a Shopify store.">Get a Shopify quote</button>
            <button type="button" class="chat-widget__quick" data-chat-quick="Hi, I'm interested in AI video production.">AI video production</button>
            <button type="button" class="chat-widget__quick" data-chat-quick="Hi, I want to book a free consultation.">Book a free consultation</button>
            <button type="button" class="chat-widget__quick" data-chat-quick="Hi, I have a question about your passive income offer.">Passive income offer</button>
        </div>
        <div class="chat-widget__typing" data-chat-typing hidden>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="chat-widget__footer">
            <a href="{{ $whatsappLink ?? '#' }}" target="_blank" rel="noopener" class="btn btn-whatsapp" data-chat-whatsapp style="width: 100%;">
                <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M12.04 2c-5.46 0-9.9 4.44-9.9 9.9 0 1.75.46 3.45 1.32 4.95L2 22l5.28-1.38a9.9 9.9 0 0 0 4.76 1.21h.01c5.46 0 9.9-4.44 9.9-9.9 0-2.64-1.03-5.13-2.9-6.99A9.82 9.82 0 0 0 12.04 2Z"/></svg>
                Continue on WhatsApp
            </a>
        </div>
    </div>
    <button type="button" class="chat-widget__launcher" data-chat-launcher aria-label="Open chat">
        <span class="chat-widget__badge" data-chat-badge></span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
    </button>
</div>