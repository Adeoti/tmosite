@extends('layouts.admin')

@section('title', 'FAQs')

@section('content')

<div class="admin-page-header">
    <h2>FAQs</h2>
    <a href="{{ route('admin.faq-items.create') }}" class="tmo-btn tmo-btn--gold tmo-btn--sm">New FAQ</a>
</div>

@if ($faqItems->isEmpty())

    <x-admin-empty-state message="No FAQs yet." />

@else

    <div class="admin-table-wrap">
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
                                <a href="{{ route('admin.faq-items.edit', $faq) }}" class="tmo-btn tmo-btn--outline-light tmo-btn--sm">Edit</a>

                                <form method="POST" action="{{ route('admin.faq-items.destroy', $faq) }}" onsubmit="return confirm('Delete this FAQ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="tmo-btn tmo-btn--outline-light tmo-btn--sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>

    <div class="admin-pagination">
        {{ $faqItems->links() }}
    </div>

@endif

@endsection