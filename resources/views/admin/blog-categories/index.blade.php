@extends('layouts.admin')

@section('title', 'Blog Categories')

@section('content')
    <div class="admin-page-header">
        <h2>Blog Categories</h2>
        <div style="display:flex; gap:12px;">
            <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-outline">Back to Posts</a>
            <a href="{{ route('admin.blog-categories.create') }}" class="btn btn-primary">New Category</a>
        </div>
    </div>

    @if ($categories->isEmpty())
        <x-admin-empty-state message="No blog categories yet." />
    @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Posts</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->posts_count }}</td>
                        <td>
                            <div class="admin-table-actions">
                                <a href="{{ route('admin.blog-categories.edit', $category) }}" class="btn btn-outline">Edit</a>
                                <form method="POST" action="{{ route('admin.blog-categories.destroy', $category) }}" onsubmit="return confirm('Delete this category?');">
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