@extends('layouts.admin')

@section('title', 'New Hero Slide')

@section('content')
    <div class="admin-form-card">
        <form method="POST" action="{{ route('admin.hero-slides.store') }}" class="tmo-form" enctype="multipart/form-data">
            @csrf
            @include('admin.hero-slides._form')
            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Create Slide</button>
                <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection