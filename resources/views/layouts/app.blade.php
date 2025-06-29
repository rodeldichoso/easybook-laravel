<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'EasyBook Dashboard')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">EasyBook</a>

            <div class="dropdown ms-auto">
                <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle me-1"></i> Account
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="bi bi-person me-2"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="{{ url('/settings') }}"><i class="bi bi-gear me-2"></i> Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid py-4">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-lg-3 px-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="https://picsum.photos/seed/barber/64/64"
                        alt="Profile Picture"
                        class="rounded-circle border shadow-sm me-2"
                        width="64"
                        height="64">
                    <div>
                        <div class="fw-semibold">
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                        </div>
                        <div class="text-muted small text-capitalize">
                            {{ auth()->user()->role }}
                        </div>
                    </div>
                </div>

                <div class="list-group shadow-sm">
                    <a href="{{ url('/dashboard') }}" class="list-group-item list-group-item-action {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer me-2"></i> Dashboard
                    </a>

                    @roles(['admin'])
                    <a href="{{ url('/admin-panel') }}" class="list-group-item list-group-item-action {{ request()->is('admin-panel') ? 'active' : '' }}">
                        <i class="bi bi-shield-lock me-2"></i> Admin Panel
                    </a>
                    <a href="{{ url('/admin/shops') }}" class="list-group-item list-group-item-action {{ request()->is('admin/shops') ? 'active' : '' }}">
                        <i class="bi bi-scissors me-2"></i> Manage Shops
                    </a>
                    <a href="{{ url('/admin/users') }}" class="list-group-item list-group-item-action {{ request()->is('admin/users') ? 'active' : '' }}">
                        <i class="bi bi-people me-2"></i> Manage Users
                    </a>
                    <a href="{{ url('/admin/bookings') }}" class="list-group-item list-group-item-action {{ request()->is('admin/bookings') ? 'active' : '' }}">
                        <i class="bi bi-journal-check me-2"></i> All Bookings
                    </a>
                    @endroles

                    <a href="{{ url('/my-bookings') }}" class="list-group-item list-group-item-action {{ request()->is('my-bookings') ? 'active' : '' }}">
                        <i class="bi bi-calendar-check me-2"></i> My Bookings
                    </a>
                    <a href="{{ url('/create-booking') }}" class="list-group-item list-group-item-action {{ request()->is('create-booking') ? 'active' : '' }}">
                        <i class="bi bi-plus-circle me-2"></i> New Booking
                    </a>

                    <a href="{{ url('/profile') }}" class="list-group-item list-group-item-action {{ request()->is('profile') ? 'active' : '' }}">
                        <i class="bi bi-person me-2"></i> Profile
                    </a>
                    <a href="{{ url('/settings') }}" class="list-group-item list-group-item-action {{ request()->is('settings') ? 'active' : '' }}">
                        <i class="bi bi-gear me-2"></i> Settings
                    </a>
                </div>
            </div>


            <!-- Page Content -->
            <div class="col-lg-9 px-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-4 mt-auto">
        <div class="container">
            <small>© 2025 EasyBook. All rights reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>