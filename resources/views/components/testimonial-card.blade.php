@props(['testimonial'])

<div class="testimonial-card card" data-animate="up">
    <div class="testimonial-card__stars">
        @for ($i = 0; $i < $testimonial->rating; $i++)
            <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        @endfor
    </div>
    <p class="testimonial-card__content">&ldquo;{{ $testimonial->content }}&rdquo;</p>
    <div class="testimonial-card__author">
        <strong>{{ $testimonial->client_name }}</strong>
        <span>{{ $testimonial->client_role }}@if($testimonial->company), {{ $testimonial->company }}@endif</span>
    </div>
</div>