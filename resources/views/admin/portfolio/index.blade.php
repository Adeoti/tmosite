@extends('layouts.admin')

@section('title', 'Portfolio')

@section('content')
    <div class="admin-page-header">
        <h2>Portfolio Items</h2>
        <div style="display:flex; gap:12px;">
            <a href="{{ route('admin.portfolio-categories.index') }}" class="btn btn-outline">Manage Categories</a>
            <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">New Portfolio Item</a>
        </div>
    </div>

    @if ($portfolios->isEmpty())
        <x-admin-empty-state message="No portfolio items yet. Create your first case study to show it on the public site." />
    @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($portfolios as $portfolio)
                    <tr>
                        <td>
                            @if ($portfolio->cover_image)
                                <img src="{{ asset('storage/' . $portfolio->cover_image) }}" alt="{{ $portfolio->title }}" class="admin-thumb">
                            @else
                                <div class="admin-thumb"></div>
                            @endif
                        </td>
                        <td>{{ $portfolio->title }}</td>
                        <td>{{ $portfolio->category->name }}</td>
                        <td>
                            <span class="admin-badge admin-badge--{{ $portfolio->status }}">{{ ucfirst($portfolio->status) }}</span>
                        </td>
                        <td>{{ $portfolio->is_featured ? 'Yes' : '—' }}</td>
                        <td>
                            <div class="admin-table-actions">
                                <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="btn btn-outline">Edit</a>
                                <form method="POST" action="{{ route('admin.portfolio.destroy', $portfolio) }}" onsubmit="return confirm('Delete this portfolio item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 24px;">
            {{ $portfolios->links() }}
        </div>
    @endif
@endsection