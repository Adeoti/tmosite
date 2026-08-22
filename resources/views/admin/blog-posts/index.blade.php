@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('content')
    <div class="admin-page-header">
        <h2>Blog Posts</h2>
        <div style="display:flex; gap:12px;">
            <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-outline">Manage Categories</a>
            <a href="{{ route('admin.blog-posts.create') }}" class="btn btn-primary">New Post</a>
        </div>
    </div>

    @if ($posts->isEmpty())
        <x-admin-empty-state message="No blog posts yet. Publish your first article to populate the blog." />
    @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            @if ($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="admin-thumb">
                            @else
                                <div class="admin-thumb"></div>
                            @endif
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name ?? '—' }}</td>
                        <td>
                            <span class="admin-badge admin-badge--{{ $post->status }}">{{ ucfirst($post->status) }}</span>
                        </td>
                        <td>{{ optional($post->published_at)->format('M j, Y') ?? '—' }}</td>
                        <td>
                            <div class="admin-table-actions">
                                <a href="{{ route('admin.blog-posts.edit', $post) }}" class="btn btn-outline">Edit</a>
                                <form method="POST" action="{{ route('admin.blog-posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?');">
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
            {{ $posts->links() }}
        </div>
    @endif
@endsection