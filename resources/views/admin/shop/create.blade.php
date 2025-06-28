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

                <div class="mb-3">
                    <label class="form-label">Services</label>
                    <div class="border rounded p-3 mb-2 bg-light">
                        <div class="row g-2 align-items-end mb-2">
                            <div class="col-md-5">
                                <input type="text" name="services[0][service_name]" class="form-control" placeholder="Service Name" required>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="services[0][price]" class="form-control" placeholder="Price" min="0" step="0.01">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="services[0][description]" class="form-control" placeholder="Description">
                            </div>
                        </div>
                        <div class="row g-2 align-items-end mb-2">
                            <div class="col-md-5">
                                <input type="text" name="services[1][service_name]" class="form-control" placeholder="Service Name">
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="services[1][price]" class="form-control" placeholder="Price" min="0" step="0.01">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="services[1][description]" class="form-control" placeholder="Description">
                            </div>
                        </div>
                        <div class="row g-2 align-items-end">
                            <div class="col-md-5">
                                <input type="text" name="services[2][service_name]" class="form-control" placeholder="Service Name">
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="services[2][price]" class="form-control" placeholder="Price" min="0" step="0.01">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="services[2][description]" class="form-control" placeholder="Description">
                            </div>
                        </div>
                        <div class="form-text mt-2">You can leave unused service fields blank.</div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create Shop</button>
                <a href="" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection