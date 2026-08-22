@extends('layouts.admin')

@section('title', 'Edit FAQ')

@section('content')
    <div class="admin-form-card">
        <form method="POST" action="{{ route('admin.faq-items.update', $faqItem) }}" class="tmo-form">
            @csrf
            @method('PUT')
            @include('admin.faq-items._form')
            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.faq-items.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection