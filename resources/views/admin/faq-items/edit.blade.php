@extends('layouts.admin')

@section('title', 'Edit FAQ')

@section('content')

<form method="POST" action="{{ route('admin.faq-items.update', $faqItem) }}" class="tmo-form">
    @csrf
    @method('PUT')
    @include('admin.faq-items._form')

    <div class="admin-form-actions">
        <button type="submit" class="tmo-btn tmo-btn--gold">Save Changes</button>
        <a href="{{ route('admin.faq-items.index') }}" class="tmo-btn tmo-btn--outline-light">Cancel</a>
    </div>
</form>

@endsection