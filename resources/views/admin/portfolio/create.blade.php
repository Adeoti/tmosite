@extends('layouts.admin')

@section('title', 'New Portfolio Item')

@section('content')

<form method="POST" action="{{ route('admin.portfolio.store') }}" class="tmo-form" enctype="multipart/form-data">
    @csrf
    @include('admin.portfolio._form')

    <div class="admin-form-actions">
        <button type="submit" class="tmo-btn tmo-btn--gold">Create Portfolio Item</button>
        <a href="{{ route('admin.portfolio.index') }}" class="tmo-btn tmo-btn--outline-light">Cancel</a>
    </div>
</form>

@endsection