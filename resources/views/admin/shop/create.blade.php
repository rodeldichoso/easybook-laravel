@extends('layouts.app')

@section('title', 'Add New Shop')

@section('content')
<div class="py-4">
    <h2 class="fw-bold mb-4">Add New Shop</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/admin/create-shop" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="shop_name" class="form-label">Shop Name</label>
                    <input type="text" name="shop_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="shop_address" class="form-label">Shop Address</label>
                    <input type="text" name="shop_address" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="shop_category" class="form-label">Shop Category</label>
                    <select name="shop_category" class="form-select" required>
                        <option value="">Select Category</option>
                        <option value="Spa">Spa</option>
                        <option value="Barbershop">Barbershop</option>
                        <option value="Clinic">Clinic</option>
                        <option value="Salon">Salon</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create Shop</button>
                <a href="" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection