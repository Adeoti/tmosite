@extends('layouts.admin')

@section('title', 'New Portfolio Item')

@section('content')
    <div class="admin-form-card">
        <form method="POST" action="{{ route('admin.portfolio.store') }}" class="tmo-form" enctype="multipart/form-data">
            @csrf
            @include('admin.portfolio._form')
            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Create Portfolio Item</button>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection