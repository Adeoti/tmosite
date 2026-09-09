@extends('layouts.admin')

@section('title', 'New Testimonial')

@section('content')

<form method="POST" action="{{ route('admin.testimonials.store') }}" class="tmo-form" enctype="multipart/form-data">
    @csrf
    @include('admin.testimonials._form')

    <div class="admin-form-actions">
        <button type="submit" class="tmo-btn tmo-btn--gold">Create Testimonial</button>
        <a href="{{ route('admin.testimonials.index') }}" class="tmo-btn tmo-btn--outline-light">Cancel</a>
    </div>
</form>

@endsection