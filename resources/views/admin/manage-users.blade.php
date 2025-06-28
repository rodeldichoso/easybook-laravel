@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
<div class="py-4">
    <h2 class="fw-bold mb-4">Manage Users</h2>

    <!-- Filter Dropdown -->
    <form method="GET" class="mb-3 d-flex align-items-center" action="">
        <label for="role" class="me-2 mb-0 fw-semibold">Filter by Role:</label>
        <select name="role" id="role" class="form-select w-auto me-2">
            <option value="">All</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
    </form>

    <div class="card shadow-sm">
        <div class="card-header bg-white fw-bold">Registered Users</div>
        <div class="card-body">
            @if(isset($users) && count($users))
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Registered At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'secondary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-muted text-center">No users found.</div>
            @endif
        </div>
    </div>
</div>
@endsection