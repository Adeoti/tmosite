@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')

<form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" class="tmo-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.testimonials._form')

    <div class="admin-form-actions">
        <button type="submit" class="tmo-btn tmo-btn--gold">Save Changes</button>
        <a href="{{ route('admin.testimonials.index') }}" class="tmo-btn tmo-btn--outline-light">Cancel</a>
    </div>
</form>

@endsection