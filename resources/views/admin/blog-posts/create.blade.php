@extends('layouts.admin')

@section('title', 'New Blog Post')

@section('content')

<form method="POST" action="{{ route('admin.blog-posts.store') }}" class="tmo-form" enctype="multipart/form-data">
    @csrf
    @include('admin.blog-posts._form')

    <div class="admin-form-actions">
        <button type="submit" class="tmo-btn tmo-btn--gold">Create Post</button>
        <a href="{{ route('admin.blog-posts.index') }}" class="tmo-btn tmo-btn--outline-light">Cancel</a>
    </div>
</form>

@endsection