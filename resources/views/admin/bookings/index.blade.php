@extends('layouts.admin')

@section('title', 'Bookings')

@section('content')

<div class="admin-page-header">
    <h2>Bookings</h2>
</div>

<div class="admin-filter-tabs">
    <a href="{{ route('admin.bookings.index') }}" class="{{ $status ? '' : 'is-active' }}">All ({{ $counts['all'] }})</a>
    <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}" class="{{ $status === 'pending' ? 'is-active' : '' }}">Pending ({{ $counts['pending'] }})</a>
    <a href="{{ route('admin.bookings.index', ['status' => 'confirmed']) }}" class="{{ $status === 'confirmed' ? 'is-active' : '' }}">Confirmed ({{ $counts['confirmed'] }})</a>
    <a href="{{ route('admin.bookings.index', ['status' => 'cancelled']) }}" class="{{ $status === 'cancelled' ? 'is-active' : '' }}">Cancelled ({{ $counts['cancelled'] }})</a>
</div>

@if ($bookings->isEmpty())

    <x-admin-empty-state message="No bookings in this view yet." />

@else

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Client</th>
                    <th>Service</th>
                    <th>Date &amp; Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($bookings as $booking)

                    <tr>
                        <td>{{ $booking->reference }}</td>

                        <td>
                            {{ $booking->name }}
                            <small>{{ $booking->email }}</small>
                        </td>

                        <td>{{ $booking->service_type }}</td>

                        <td>{{ $booking->preferred_date->format('M j, Y') }} at {{ $booking->preferred_time }}</td>

                        <td>
                            <span class="admin-badge admin-badge--{{ $booking->status }}">{{ ucfirst($booking->status) }}</span>
                        </td>

                        <td>
                            <div class="admin-table-actions">

                                @if ($booking->status === 'pending')

                                    <form method="POST" action="{{ route('admin.bookings.confirm', $booking) }}">
                                        @csrf
                                        <button type="submit" class="tmo-btn tmo-btn--gold tmo-btn--sm">Confirm</button>
                                    </form>

                                    <form method="POST" action="{{ route('admin.bookings.cancel', $booking) }}">
                                        @csrf
                                        <button type="submit" class="tmo-btn tmo-btn--outline-light tmo-btn--sm">Cancel</button>
                                    </form>

                                @elseif ($booking->status === 'confirmed')

                                    <form method="POST" action="{{ route('admin.bookings.cancel', $booking) }}">
                                        @csrf
                                        <button type="submit" class="tmo-btn tmo-btn--outline-light tmo-btn--sm">Cancel</button>
                                    </form>

                                @else

                                    <span class="admin-table-actions__none">No actions</span>

                                @endif

                            </div>
                        </td>

                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>

    <div class="admin-pagination">
        {{ $bookings->links() }}
    </div>

@endif

@endsection