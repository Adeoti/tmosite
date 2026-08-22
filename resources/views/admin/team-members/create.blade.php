@extends('layouts.admin')

@section('title', 'New Team Member')

@section('content')
    <div class="admin-form-card">
        <form method="POST" action="{{ route('admin.team-members.store') }}" class="tmo-form" enctype="multipart/form-data">
            @csrf
            @include('admin.team-members._form')
            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Add Team Member</button>
                <a href="{{ route('admin.team-members.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection