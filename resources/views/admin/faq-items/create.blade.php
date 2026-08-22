@extends('layouts.admin')

@section('title', 'New FAQ')

@section('content')
    <div class="admin-form-card">
        <form method="POST" action="{{ route('admin.faq-items.store') }}" class="tmo-form">
            @csrf
            @include('admin.faq-items._form')
            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Create FAQ</button>
                <a href="{{ route('admin.faq-items.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection