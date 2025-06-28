@extends('layouts.app')

@section('title', 'Manage Shops')

@section('content')
<div class="py-4">
    <h2 class="fw-bold mb-4">Manage Shops</h2>

    <!-- Add New Shop Button -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ url('/admin/shop/create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Add New Shop
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white fw-bold">Registered Shops</div>
        <div class="card-body">
            @if(isset($shops) && count($shops))
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Shop Name</th>
                            <th>Owner</th>
                            <th>Location</th>
                            <th>Category</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shops as $shop)
                        <tr>
                            <td>{{ $shop->id }}</td>
                            <td>{{ $shop->shop_name }}</td>
                            <td>{{ $shop->admin->first_name }} {{ $shop->admin->last_name }}</td>
                            <td>{{ $shop->shop_address }}</td>
                            <td>{{ $shop->shop_category }}</td>
                            <td>{{ $shop->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-muted text-center">No shops registered yet.</div>
            @endif
        </div>
    </div>
</div>
@endsection