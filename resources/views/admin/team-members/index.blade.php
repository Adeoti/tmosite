@extends('layouts.admin')

@section('title', 'Team Members')

@section('content')
    <div class="admin-page-header">
        <h2>Team Members</h2>
        <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">New Team Member</a>
    </div>

    @if ($teamMembers->isEmpty())
        <x-admin-empty-state message="No team members yet." />
    @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Visible</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teamMembers as $member)
                    <tr>
                        <td>
                            @if ($member->photo)
                                <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="admin-thumb" style="border-radius: 50%;">
                            @else
                                <div class="admin-thumb" style="border-radius: 50%;"></div>
                            @endif
                        </td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->role }}</td>
                        <td>{{ $member->is_active ? 'Yes' : '—' }}</td>
                        <td>
                            <div class="admin-table-actions">
                                <a href="{{ route('admin.team-members.edit', $member) }}" class="btn btn-outline">Edit</a>
                                <form method="POST" action="{{ route('admin.team-members.destroy', $member) }}" onsubmit="return confirm('Remove this team member?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 24px;">
            {{ $teamMembers->links() }}
        </div>
    @endif
@endsection