@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
    <div class="admin-page-header">
        <h2>Testimonials</h2>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">New Testimonial</a>
    </div>

    @if ($testimonials->isEmpty())
        <x-admin-empty-state message="No testimonials yet." />
    @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Company</th>
                    <th>Rating</th>
                    <th>Featured</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->client_name }}</td>
                        <td>{{ $testimonial->company ?: '—' }}</td>
                        <td>{{ $testimonial->rating }}/5</td>
                        <td>{{ $testimonial->is_featured ? 'Yes' : '—' }}</td>
                        <td>
                            <div class="admin-table-actions">
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-outline">Edit</a>
                                <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" onsubmit="return confirm('Delete this testimonial?');">
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
            {{ $testimonials->links() }}
        </div>
    @endif
@endsection