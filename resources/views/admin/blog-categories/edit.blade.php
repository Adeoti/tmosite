@extends('layouts.admin')

@section('title', 'Edit Blog Category')

@section('content')
    <div class="admin-form-card">
        <form method="POST" action="{{ route('admin.blog-categories.update', $category) }}" class="tmo-form">
            @csrf
            @method('PUT')
            @include('admin.blog-categories._form')
            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection