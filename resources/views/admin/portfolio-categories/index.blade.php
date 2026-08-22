@extends('layouts.admin')

@section('title', 'Portfolio Categories')

@section('content')
    <div class="admin-page-header">
        <h2>Portfolio Categories</h2>
        <div style="display:flex; gap:12px;">
            <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline">Back to Portfolio</a>
            <a href="{{ route('admin.portfolio-categories.create') }}" class="btn btn-primary">New Category</a>
        </div>
    </div>

    @if ($categories->isEmpty())
        <x-admin-empty-state message="No portfolio categories yet." />
    @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Items</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="admin-thumb">
                            @else
                                <div class="admin-thumb"></div>
                            @endif
                        </td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->portfolios_count }}</td>
                        <td>
                            <span class="admin-badge {{ $category->is_active ? 'admin-badge--published' : 'admin-badge--draft' }}">
                                {{ $category->is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td>
                            <div class="admin-table-actions">
                                <a href="{{ route('admin.portfolio-categories.edit', $category) }}" class="btn btn-outline">Edit</a>
                                <form method="POST" action="{{ route('admin.portfolio-categories.destroy', $category) }}" onsubmit="return confirm('Delete this category?');">
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
    @endif
@endsection