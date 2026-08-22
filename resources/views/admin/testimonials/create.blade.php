@extends('layouts.admin')

@section('title', 'New Testimonial')

@section('content')
    <div class="admin-form-card">
        <form method="POST" action="{{ route('admin.testimonials.store') }}" class="tmo-form" enctype="multipart/form-data">
            @csrf
            @include('admin.testimonials._form')
            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Create Testimonial</button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection