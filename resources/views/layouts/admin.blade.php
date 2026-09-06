<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') &middot; TMO Ultimate</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <meta name="theme-color" content="#0B2545">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.snow.min.css" rel="stylesheet">
    <style>
        body { background: #F3F4F8; }
        .admin-shell { display: flex; min-height: 100vh; }
        .admin-sidebar { width: 272px; flex-shrink: 0; background: linear-gradient(190deg, var(--color-navy) 0%, var(--color-navy-dark) 100%); color: #fff; padding: 28px 18px; display: flex; flex-direction: column; position: sticky; top: 0; height: 100vh; }
        .admin-sidebar__brand { display: flex; align-items: center; gap: 12px; padding: 6px 10px 28px; }
        .admin-sidebar__brand img { height: 34px; width: auto; }
        .admin-sidebar__brand span { font-family: var(--font-heading); font-weight: 700; font-size: 15px; line-height: 1.2; }
        .admin-sidebar__brand small { display: block; font-size: 11px; font-weight: 400; color: rgba(255,255,255,0.55); letter-spacing: 0.04em; }
        .admin-sidebar nav { display: flex; flex-direction: column; gap: 2px; flex: 1; }
        .admin-sidebar a { display: flex; align-items: center; gap: 12px; color: rgba(255,255,255,0.68); padding: 11px 14px; border-radius: 10px; font-size: 13.5px; font-weight: 500; position: relative; transition: background-color 0.2s ease, color 0.2s ease; }
        .admin-sidebar a svg { width: 18px; height: 18px; flex-shrink: 0; opacity: 0.9; }
        .admin-sidebar a:hover { background: rgba(255,255,255,0.07); color: #fff; }
        .admin-sidebar a.is-active { background: rgba(255,255,255,0.12); color: #fff; }
        .admin-sidebar a.is-active::before { content: ''; position: absolute; left: -18px; top: 50%; transform: translateY(-50%); width: 4px; height: 22px; border-radius: 0 4px 4px 0; background: var(--color-gold); }
        .admin-sidebar__footer { padding-top: 16px; margin-top: 16px; border-top: 1px solid rgba(255,255,255,0.1); font-size: 11.5px; color: rgba(255,255,255,0.4); padding-left: 14px; }
        .admin-main { flex: 1; min-width: 0; }
        .admin-topbar { display: flex; justify-content: space-between; align-items: center; padding: 20px 36px; background: #fff; border-bottom: 1px solid var(--color-border); position: sticky; top: 0; z-index: 10; }
        .admin-topbar h1 { font-size: 19px; margin: 0; font-family: var(--font-heading); color: var(--color-navy); }
        .admin-topbar__right { display: flex; align-items: center; gap: 16px; }
        .admin-user-chip { display: flex; align-items: center; gap: 10px; }
        .admin-user-chip__avatar { width: 34px; height: 34px; border-radius: 50%; background: var(--color-gold); color: var(--color-navy-dark); font-family: var(--font-heading); font-weight: 700; font-size: 13px; display: flex; align-items: center; justify-content: center; }
        .admin-user-chip__name { font-size: 13px; font-weight: 600; color: var(--color-navy); }
        .admin-logout-btn { display: inline-flex; align-items: center; gap: 8px; padding: 9px 16px; border-radius: 999px; border: 1px solid var(--color-border); background: #fff; color: var(--color-navy); font-size: 13px; font-weight: 600; cursor: pointer; transition: border-color 0.2s ease, background 0.2s ease; }
        .admin-logout-btn:hover { border-color: var(--color-navy); background: #F5F6F9; }
        .admin-logout-btn svg { width: 15px; height: 15px; }
        .admin-content { padding: 36px; animation: tmo-admin-fade 0.4s ease; }
        @keyframes tmo-admin-fade { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
        .admin-stat-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
        .admin-stat-card { background: #fff; border-radius: var(--radius-md); padding: 24px; border: 1px solid var(--color-border); display: flex; align-items: flex-start; gap: 16px; transition: transform 0.25s ease, box-shadow 0.25s ease; }
        .admin-stat-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-card); }
        .admin-stat-card__icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background: rgba(11, 37, 69, 0.08); color: var(--color-navy); }
        .admin-stat-card__icon svg { width: 22px; height: 22px; }
        .admin-stat-card span { display: block; font-size: 12.5px; color: var(--color-muted); margin-bottom: 4px; }
        .admin-stat-card strong { font-family: var(--font-heading); font-size: 26px; color: var(--color-navy); }
        .admin-flash { background: #E7F6EC; color: #1B5E20; padding: 14px 20px; border-radius: var(--radius-sm); font-size: 14px; margin-bottom: 24px; display: flex; align-items: center; gap: 10px; }
        .admin-filter-tabs { display: flex; gap: 8px; margin-bottom: 24px; }
        .admin-filter-tabs a { display: inline-block; padding: 8px 16px; border-radius: 999px; border: 1px solid var(--color-border); font-size: 13px; color: var(--color-navy); background: #fff; transition: all 0.2s ease; }
        .admin-filter-tabs a.is-active { background: var(--color-navy); color: #fff; border-color: var(--color-navy); }
        .admin-table { width: 100%; border-collapse: collapse; background: #fff; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--color-border); box-shadow: var(--shadow-card); }
        .admin-table th, .admin-table td { padding: 15px 20px; text-align: left; font-size: 13.5px; border-bottom: 1px solid var(--color-border); vertical-align: middle; }
        .admin-table th { background: #FAFBFC; color: var(--color-muted); text-transform: uppercase; font-size: 10.5px; letter-spacing: 0.06em; font-weight: 700; }
        .admin-table tbody tr { transition: background-color 0.15s ease; }
        .admin-table tbody tr:hover { background: #FAFBFC; }
        .admin-table tr:last-child td { border-bottom: none; }
        .admin-badge { display: inline-block; padding: 4px 12px; border-radius: 999px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.02em; }
        .admin-badge--pending { background: #FEF3E2; color: #B54708; }
        .admin-badge--confirmed { background: #E7F6EC; color: #1B5E20; }
        .admin-badge--cancelled { background: #FDECEC; color: #B42318; }
        .admin-badge--published { background: #E7F6EC; color: #1B5E20; }
        .admin-badge--draft { background: #F2F4F7; color: #667085; }
        .admin-table-actions { display: flex; gap: 8px; }
        .admin-table-actions .btn { padding: 8px 16px; font-size: 12.5px; }
        .admin-page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 26px; }
        .admin-page-header h2 { margin: 0; font-size: 21px; font-family: var(--font-heading); color: var(--color-navy); }
        .admin-thumb { width: 46px; height: 46px; border-radius: 9px; object-fit: cover; background: #F5F6F9; }
        .admin-form-card { background: #fff; border: 1px solid var(--color-border); border-radius: var(--radius-md); padding: 32px; max-width: 780px; box-shadow: var(--shadow-card); }
        .admin-form-card + .admin-form-card { margin-top: 24px; }
        .admin-form-card h3 { font-family: var(--font-heading); color: var(--color-navy); font-size: 16px; }
        .admin-checkbox-row { display: flex; align-items: center; gap: 10px; margin-bottom: 16px; }
        .admin-checkbox-row input { width: auto; }
        .admin-checkbox-row label { margin: 0; }
        .admin-current-image { display: flex; align-items: center; gap: 14px; margin-bottom: 12px; }
        .admin-current-image img { width: 72px; height: 72px; object-fit: cover; border-radius: 10px; }
        .admin-gallery-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 16px; }
        .admin-gallery-grid figure { margin: 0; position: relative; }
        .admin-gallery-grid img { width: 100%; aspect-ratio: 1; object-fit: cover; border-radius: 8px; }
        .admin-gallery-grid figcaption { display: flex; align-items: center; gap: 6px; margin-top: 6px; font-size: 12px; color: var(--color-muted); }
        .admin-field-hint { font-size: 12px; color: var(--color-muted); margin-top: -10px; margin-bottom: 16px; }
        .admin-form-actions { display: flex; gap: 12px; margin-top: 8px; }
        .admin-empty-state { background: #fff; border: 1px dashed var(--color-border); border-radius: var(--radius-md); padding: 56px 32px; text-align: center; color: var(--color-muted); }
        .admin-empty-state svg { width: 40px; height: 40px; color: var(--color-border); margin-bottom: 12px; }
        .admin-editor { background: #fff; border-radius: 0 0 var(--radius-sm) var(--radius-sm); min-height: 340px; font-family: var(--font-body); }
        .admin-editor .ql-toolbar { border-radius: var(--radius-sm) var(--radius-sm) 0 0; border-color: var(--color-border); background: #FAFBFC; }
        .admin-editor .ql-container { border-color: var(--color-border); border-radius: 0 0 var(--radius-sm) var(--radius-sm); font-size: 15px; min-height: 300px; }
        @media (max-width: 1100px) {
            .admin-stat-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 900px) {
            .admin-shell { flex-direction: column; }
            .admin-sidebar { width: 100%; height: auto; position: relative; flex-direction: row; overflow-x: auto; padding: 14px; }
            .admin-sidebar__brand, .admin-sidebar__footer { display: none; }
            .admin-sidebar nav { flex-direction: row; }
            .admin-sidebar a { white-space: nowrap; }
            .admin-content { padding: 20px; }
            .admin-topbar { padding: 16px 20px; }
        }
    </style>
    @stack('head')
</head>
<body>
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <div class="admin-sidebar__brand">
                <img src="{{ asset('images/logo.png') }}" alt="TMO Ultimate">
                <span>TMO Admin<small>Control Panel</small></span>
            </div>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/><rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.hero-slides.index') }}" class="{{ request()->routeIs('admin.hero-slides.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="M21 15l-5-5L5 21"/></svg>
                    Hero Slides
                </a>
                <a href="{{ route('admin.bookings.index') }}" class="{{ request()->routeIs('admin.bookings.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Bookings
                </a>
                <a href="{{ route('admin.portfolio.index') }}" class="{{ request()->routeIs('admin.portfolio.*') || request()->routeIs('admin.portfolio-categories.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                    Portfolio
                </a>
                <a href="{{ route('admin.blog-posts.index') }}" class="{{ request()->routeIs('admin.blog-posts.*') || request()->routeIs('admin.blog-categories.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="8" y1="13" x2="16" y2="13"/><line x1="8" y1="17" x2="13" y2="17"/></svg>
                    Blog Posts
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    Testimonials
                </a>
                <a href="{{ route('admin.team-members.index') }}" class="{{ request()->routeIs('admin.team-members.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Team Members
                </a>
                <a href="{{ route('admin.faq-items.index') }}" class="{{ request()->routeIs('admin.faq-items.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M9.5 9a2.5 2.5 0 0 1 5 0c0 1.5-2 1.75-2 3.5"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    FAQs
                </a>
                <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    Settings
                </a>
            </nav>
            <div class="admin-sidebar__footer">TMO Ultimate Innovations Ltd.</div>
        </aside>
        <div class="admin-main">
            <header class="admin-topbar">
                <h1>@yield('title', 'Dashboard')</h1>
                <div class="admin-topbar__right">
                    <div class="admin-user-chip">
                        <div class="admin-user-chip__avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
                        <span class="admin-user-chip__name">{{ auth()->user()->name ?? 'Admin' }}</span>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="admin-logout-btn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                            Log out
                        </button>
                    </form>
                </div>
            </header>
            <div class="admin-content">
                @if (session('status'))
                    <div class="admin-flash">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        {{ session('status') }}
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.min.js"></script>
    @stack('scripts')
</body>
</html>