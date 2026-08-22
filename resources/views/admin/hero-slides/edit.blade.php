@extends('layouts.admin')

@section('title', 'Edit Hero Slide')

@section('content')
    <div class="admin-form-card">
        <form method="POST" action="{{ route('admin.hero-slides.update', $heroSlide) }}" class="tmo-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.hero-slides._form')
            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection