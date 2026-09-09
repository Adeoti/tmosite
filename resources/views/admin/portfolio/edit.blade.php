@extends('layouts.admin')

@section('title', 'Edit Portfolio Item')

@section('content')

<form method="POST" action="{{ route('admin.portfolio.update', $portfolio) }}" class="tmo-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.portfolio._form')

    <div class="admin-form-actions">
        <button type="submit" class="tmo-btn tmo-btn--gold">Save Changes</button>
        <a href="{{ route('admin.portfolio.index') }}" class="tmo-btn tmo-btn--outline-light">Cancel</a>
    </div>
</form>

@endsection