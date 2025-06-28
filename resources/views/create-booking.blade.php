@extends('layouts.app')

@section('title', 'New Booking')

@section('content')
<div class="py-4">
    @if(session('success'))
    <!-- Success Modal -->
    <div class="modal fade show" id="successModal" tabindex="-1" aria-modal="true" style="display:block; background:rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body py-5">
                    <div class="mb-3">
                        <span class="display-1 text-success"><i class="bi bi-check-circle-fill"></i></span>
                    </div>
                    <h4 class="mb-2">Booking Successful!</h4>
                    <p class="mb-4">Your booking has been confirmed.</p>
                    <a href="{{ route('dashboard') }}" class="btn btn-success">Go to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "{{ route('dashboard') }}";
        }, 2000);
    </script>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Available Shops</h2>
        <select id="categoryFilter" class="form-select w-auto">
            <option value="All">All Categories</option>
            @php
            $categories = collect($shops)->pluck('shop_category')->unique()->sort();
            @endphp
            @foreach($categories as $category)
            <option value="{{ $category }}">{{ $category }}</option>
            @endforeach
        </select>
    </div>

    <div class="list-group" id="shopList">
        @foreach ($shops as $shop)
        <div class="list-group-item mb-3 p-0 shadow-sm shop-card d-flex flex-md-row flex-column align-items-stretch" data-category="{{ $shop->shop_category }}">
            <img src="{{ $shop->img ?? 'https://picsum.photos/seed/barber/180/180' }}" alt="{{ $shop->shop_name }}" class="object-fit-cover" style="width:180px; height:180px; border-radius:0.5rem 0 0 0.5rem; object-fit:cover;">
            <div class="flex-fill p-3 d-flex flex-column justify-content-between">
                <div>
                    <span class="badge bg-primary mb-2">{{ $shop->shop_category }}</span>
                    <h5 class="card-title">{{ $shop->shop_name }}</h5>
                    <p class="text-muted small">📍 {{ $shop->shop_address }}</p>
                </div>
                <form action="{{ route('bookings.create') }}" method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    <div class="mb-2">
                        <label for="service_name_{{ $shop->id }}" class="form-label">Service</label>
                        <select name="service_name" id="service_name_{{ $shop->id }}" class="form-select" required>
                            <option value="">Select a service</option>
                            @foreach($shop->services as $service)
                            <option value="{{ $service->service_name }}">{{ $service->service_name }} @if($service->price) - ${{ number_format($service->price, 2) }} @endif</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-3 col-12 mb-2 mb-md-0">
                            <input type="date" name="appointment_date" class="form-control" required>
                        </div>
                        <div class="col-md-3 col-12 mb-2 mb-md-0">
                            <input type="time" name="appointment_time" class="form-control" required>
                        </div>
                        <div class="col-md-4 col-12 mb-2 mb-md-0">
                            <input type="text" name="notes" class="form-control" placeholder="Notes">
                        </div>
                        <div class="col-md-2 col-12">
                            <button type="submit" class="btn btn-outline-primary w-100">
                                <i class="bi bi-calendar-plus me-1"></i> Book
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
    const filter = document.getElementById("categoryFilter");
    filter.addEventListener("change", () => {
        const selected = filter.value;
        document.querySelectorAll(".shop-card").forEach(card => {
            const category = card.getAttribute("data-category");
            if (selected === "All" || selected === category) {
                card.classList.remove("d-none");
                card.classList.add("d-flex");
            } else {
                card.classList.remove("d-flex");
                card.classList.add("d-none");
            }
        });
    });
</script>
@endpush