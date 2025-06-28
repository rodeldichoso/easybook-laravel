@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="py-4">
    <h2 class="fw-bold mb-4">Welcome back, {{ auth()->user()->first_name ?? 'User' }} {{ auth()->user()->last_name }}!</h2>

    {{-- Admin Dashboard --}}
    @roles(['admin'])
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card text-white bg-dark shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text display-6">{{ $totalUsers ?? '—' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Bookings</h5>
                    <p class="card-text display-6">{{ $totalBookings ?? '—' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Registered Shops</h5>
                    <p class="card-text display-6">{{ $totalShops ?? '—' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white fw-bold">Recent Activity</div>
        <div class="card-body">
            <div class="text-muted text-center">Admin logs and analytics coming soon.</div>
        </div>
    </div>
    @endroles

    {{-- User Dashboard --}}
    @roles(['user'])
    <!-- Dashboard Summary Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Upcoming Bookings</h5>
                    <p class="card-text display-6">{{ $upcomingBookingsCount ?? '—' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Bookings</h5>
                    <p class="card-text display-6">{{ $totalUserBookings ?? '—' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Favorite Category</h5>
                    <p class="card-text display-6">{{ $favoriteCategory ?? '—' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Bookings Table -->
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-white fw-bold">
            Latest Bookings
        </div>
        <div class="card-body">
            @if(isset($recentBookings) && count($recentBookings))
            <ul class="list-group">
                @foreach($recentBookings as $booking)
                <li class="list-group-item">
                    {{ $booking->service_name }} – {{ $booking->date->format('M d, Y') }}
                </li>
                @endforeach
            </ul>
            @else
            <div class="text-muted text-center">No bookings yet. Start by creating one!</div>
            @endif
        </div>
    </div>

    <!-- Suggested Services -->
    <div class="card shadow-sm">
        <div class="card-header bg-white fw-bold">
            Recommended for You
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="border p-3 rounded text-center">
                        <i class="bi bi-house-heart fs-2 text-primary"></i>
                        <p class="mt-2 mb-0">Bliss Spa in Makati</p>
                        <small class="text-muted">Massage & facials</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border p-3 rounded text-center">
                        <i class="bi bi-scissors fs-2 text-success"></i>
                        <p class="mt-2 mb-0">Mario's Barbershop</p>
                        <small class="text-muted">Classic Cuts in QC</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border p-3 rounded text-center">
                        <i class="bi bi-hospital fs-2 text-danger"></i>
                        <p class="mt-2 mb-0">Dr. Reyes Clinic</p>
                        <small class="text-muted">Check-ups in Manila</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endroles
</div>
@endsection