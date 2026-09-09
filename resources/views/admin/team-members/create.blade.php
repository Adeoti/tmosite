@extends('layouts.admin')

@section('title', 'New Team Member')

@section('content')

<form method="POST" action="{{ route('admin.team-members.store') }}" class="tmo-form" enctype="multipart/form-data">
    @csrf
    @include('admin.team-members._form')

    <div class="admin-form-actions">
        <button type="submit" class="tmo-btn tmo-btn--gold">Add Team Member</button>
        <a href="{{ route('admin.team-members.index') }}" class="tmo-btn tmo-btn--outline-light">Cancel</a>
    </div>
</form>

@endsection