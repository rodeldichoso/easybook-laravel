@extends('layouts.app')

@section('title', 'All Bookings')

@section('content')
<div class="py-4">
    <h2 class="fw-bold mb-4">All Bookings</h2>

    <div class="card shadow-sm">
        <div class="card-header bg-white fw-bold">Bookings Overview</div>
        <div class="card-body">
            @if(isset($bookings) && count($bookings))
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Booking ID</th>
                            <th>User</th>
                            <th>Service</th>
                            <th>Shop</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->public_id }}</td>
                            <td>{{ $booking->user->first_name }} {{ $booking->user->last_name }}</td>
                            <td>{{ $booking->shop->shop_category ?? '—' }}</td>
                            <td>{{ $booking->shop->shop_name ?? '—' }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->appointment_date)->format('M d, Y') }}</td>
                            <td>
                                <span class="badge bg-{{ $booking->status === 'completed' ? 'success' : ($booking->status === 'cancelled' ? 'danger' : 'secondary') }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary">View</button>
                                <button class="btn btn-sm btn-outline-danger">Cancel</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-muted text-center">No bookings found.</div>
            @endif
        </div>
    </div>
</div>
@endsection