@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')
    <div class="admin-form-card">
        <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" class="tmo-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.testimonials._form')
            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection