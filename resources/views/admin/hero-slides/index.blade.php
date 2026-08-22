@extends('layouts.admin')

@section('title', 'Hero Slides')

@section('content')
    <div class="admin-page-header">
        <h2>Hero Slides</h2>
        <a href="{{ route('admin.hero-slides.create') }}" class="btn btn-primary">New Slide</a>
    </div>

    <p style="color: var(--color-muted); font-size: 14px; margin-top: -12px; margin-bottom: 24px;">
        These appear as a rotating carousel at the very top of the homepage, in Sort Order. With one active slide the hero shows statically with no arrows or dots.
    </p>

    @if ($heroSlides->isEmpty())
        <x-admin-empty-state message="No hero slides yet. The homepage will show its default static hero until you add one." />
    @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Headline</th>
                    <th>Order</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($heroSlides as $slide)
                    <tr>
                        <td>
                            @if ($slide->image)
                                <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->headline }}" class="admin-thumb">
                            @else
                                <div class="admin-thumb"></div>
                            @endif
                        </td>
                        <td>{{ $slide->headline }}</td>
                        <td>{{ $slide->sort_order }}</td>
                        <td>
                            <span class="admin-badge {{ $slide->is_active ? 'admin-badge--published' : 'admin-badge--draft' }}">
                                {{ $slide->is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td>
                            <div class="admin-table-actions">
                                <a href="{{ route('admin.hero-slides.edit', $slide) }}" class="btn btn-outline">Edit</a>
                                <form method="POST" action="{{ route('admin.hero-slides.destroy', $slide) }}" onsubmit="return confirm('Delete this slide?');">
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