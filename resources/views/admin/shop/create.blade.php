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
                    <div class="border rounded p-3 mb-2 bg-light" id="services-container">
                        <div class="row g-2 align-items-end mb-2 service-row">
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
                    </div>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="add-service-btn"><i class="bi bi-plus-circle"></i> Add Service</button>
                    <div class="form-text mt-2">You can add your shop services here.</div>
                </div>

                <button type="submit" class="btn btn-primary">Create Shop</button>
                <a href="" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let serviceCount = 1;
    const servicesContainer = document.getElementById('services-container');
    const addServiceBtn = document.getElementById('add-service-btn');

    addServiceBtn.addEventListener('click', function() {
        const row = document.createElement('div');
        row.className = 'row g-2 align-items-end mb-2 service-row';
        row.innerHTML = `
        <div class="col-md-5">
            <input type="text" name="services[${serviceCount}][service_name]" class="form-control" placeholder="Service Name" required>
        </div>
        <div class="col-md-3">
            <input type="number" name="services[${serviceCount}][price]" class="form-control" placeholder="Price" min="0" step="0.01">
        </div>
        <div class="col-md-4 d-flex">
            <input type="text" name="services[${serviceCount}][description]" class="form-control me-2" placeholder="Description">
            <button type="button" class="btn btn-outline-danger btn-sm remove-service-btn"><i class="bi bi-x"></i></button>
        </div>
    `;
        servicesContainer.appendChild(row);
        serviceCount++;
    });

    servicesContainer.addEventListener('click', function(e) {
        if (e.target.closest('.remove-service-btn')) {
            e.target.closest('.service-row').remove();
        }
    });
</script>
@endpush