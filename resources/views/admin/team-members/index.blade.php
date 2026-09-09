@extends('layouts.admin')

@section('title', 'Team Members')

@section('content')

<div class="admin-page-header">
    <h2>Team Members</h2>
    <a href="{{ route('admin.team-members.create') }}" class="tmo-btn tmo-btn--gold tmo-btn--sm">New Team Member</a>
</div>

@if ($teamMembers->isEmpty())

    <x-admin-empty-state message="No team members yet." />

@else

    <div class="admin-table-wrap">
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
                                <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="admin-thumb admin-thumb--round">
                            @else
                                <div class="admin-thumb admin-thumb--round"></div>
                            @endif

                        </td>

                        <td>{{ $member->name }}</td>
                        <td>{{ $member->role }}</td>
                        <td>{{ $member->is_active ? 'Yes' : '—' }}</td>

                        <td>
                            <div class="admin-table-actions">
                                <a href="{{ route('admin.team-members.edit', $member) }}" class="tmo-btn tmo-btn--outline-light tmo-btn--sm">Edit</a>

                                <form method="POST" action="{{ route('admin.team-members.destroy', $member) }}" onsubmit="return confirm('Remove this team member?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="tmo-btn tmo-btn--outline-light tmo-btn--sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>

    <div class="admin-pagination">
        {{ $teamMembers->links() }}
    </div>

@endif

@endsection