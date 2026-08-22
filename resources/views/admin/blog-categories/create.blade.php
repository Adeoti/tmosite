@extends('layouts.admin')

@section('title', 'New Blog Category')

@section('content')
    <div class="admin-form-card">
        <form method="POST" action="{{ route('admin.blog-categories.store') }}" class="tmo-form">
            @csrf
            @include('admin.blog-categories._form')
            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Create Category</button>
                <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection