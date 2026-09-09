@extends('layouts.admin')

@section('title', 'New FAQ')

@section('content')

<form method="POST" action="{{ route('admin.faq-items.store') }}" class="tmo-form">
    @csrf
    @include('admin.faq-items._form')

    <div class="admin-form-actions">
        <button type="submit" class="tmo-btn tmo-btn--gold">Create FAQ</button>
        <a href="{{ route('admin.faq-items.index') }}" class="tmo-btn tmo-btn--outline-light">Cancel</a>
    </div>
</form>

@endsection