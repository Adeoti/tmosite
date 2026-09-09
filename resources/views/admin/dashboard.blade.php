@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="admin-stat-grid">

    <a href="{{ route('admin.portfolio.index') }}" class="admin-stat-card">
        <div class="admin-stat-card__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
        </div>
        <div>
            <span>Portfolio Items</span>
            <strong>{{ $stats['portfolios'] }}</strong>
        </div>
    </a>

    <a href="{{ route('admin.blog-posts.index') }}" class="admin-stat-card">
        <div class="admin-stat-card__icon admin-stat-card__icon--gold">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <div>
            <span>Published Posts</span>
            <strong>{{ $stats['published_posts'] }}</strong>
        </div>
    </a>

    <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}" class="admin-stat-card">
        <div class="admin-stat-card__icon admin-stat-card__icon--rose">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="9"/><polyline points="12 7 12 12 15 15"/></svg>
        </div>
        <div>
            <span>Pending Bookings</span>
            <strong>{{ $stats['pending_bookings'] }}</strong>
        </div>
    </a>

    <a href="{{ route('admin.bookings.index') }}" class="admin-stat-card">
        <div class="admin-stat-card__icon admin-stat-card__icon--green">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        </div>
        <div>
            <span>Upcoming Bookings</span>
            <strong>{{ $stats['upcoming_bookings'] }}</strong>
        </div>
    </a>

</div>

<div class="admin-quick-actions">
    <a href="{{ route('admin.portfolio.create') }}" class="tmo-btn tmo-btn--gold">New Portfolio Item</a>
    <a href="{{ route('admin.blog-posts.create') }}" class="tmo-btn tmo-btn--outline-light">New Blog Post</a>
    <a href="{{ route('admin.bookings.index') }}" class="tmo-btn tmo-btn--outline-light">Review Bookings</a>
</div>

@endsection