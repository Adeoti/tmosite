@extends('layouts.admin')

@section('title', 'Edit Portfolio Category')

@section('content')
    <div class="admin-form-card">
        <form method="POST" action="{{ route('admin.portfolio-categories.update', $category) }}" class="tmo-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.portfolio-categories._form')
            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.portfolio-categories.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection