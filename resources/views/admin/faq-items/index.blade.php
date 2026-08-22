@extends('layouts.admin')

@section('title', 'FAQs')

@section('content')
    <div class="admin-page-header">
        <h2>FAQs</h2>
        <a href="{{ route('admin.faq-items.create') }}" class="btn btn-primary">New FAQ</a>
    </div>

    @if ($faqItems->isEmpty())
        <x-admin-empty-state message="No FAQs yet." />
    @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faqItems as $faq)
                    <tr>
                        <td>{{ $faq->question }}</td>
                        <td>{{ ucfirst(str_replace('-', ' ', $faq->category)) }}</td>
                        <td>
                            <div class="admin-table-actions">
                                <a href="{{ route('admin.faq-items.edit', $faq) }}" class="btn btn-outline">Edit</a>
                                <form method="POST" action="{{ route('admin.faq-items.destroy', $faq) }}" onsubmit="return confirm('Delete this FAQ?');">
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
            {{ $faqItems->links() }}
        </div>
    @endif
@endsection