@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('content')

<form method="POST" action="{{ route('admin.blog-posts.update', $post) }}" class="tmo-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.blog-posts._form')

    <div class="admin-form-actions">
        <button type="submit" class="tmo-btn tmo-btn--gold">Save Changes</button>
        <a href="{{ route('admin.blog-posts.index') }}" class="tmo-btn tmo-btn--outline-light">Cancel</a>
    </div>
</form>

@endsection