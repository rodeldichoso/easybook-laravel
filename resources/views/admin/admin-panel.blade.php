@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
<div class="py-4">
    <h2 class="fw-bold mb-4">🛠️ Admin Control Panel</h2>
    <p class="text-muted mb-4">Manage users, shops, and bookings from here.</p>

    <div class="row g-4">
        <div class="col-md-4">
            <a href="{{ url('/admin/users') }}" class="text-decoration-none">
                <div class="card text-white bg-primary shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-people fs-1"></i>
                        <h5 class="mt-3">Manage Users</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ url('/admin/shops') }}" class="text-decoration-none">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-scissors fs-1"></i>
                        <h5 class="mt-3">Manage Shops</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ url('/admin/bookings') }}" class="text-decoration-none">
                <div class="card text-white bg-dark shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-journal-check fs-1"></i>
                        <h5 class="mt-3">All Bookings</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection