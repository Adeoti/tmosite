@extends('layouts.admin')

@section('title', 'Edit Team Member')

@section('content')
    <div class="admin-form-card">
        <form method="POST" action="{{ route('admin.team-members.update', $teamMember) }}" class="tmo-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.team-members._form')
            <div class="admin-form-actions">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.team-members.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection