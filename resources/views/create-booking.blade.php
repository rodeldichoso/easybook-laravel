@extends('layouts.app')

@section('title', 'New Booking')

@section('content')
<div class="py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Available Shops</h2>
        <select id="categoryFilter" class="form-select w-auto">
            <option value="All">All Services</option>
            <option value="Spa">Spa</option>
            <option value="Barber">Barber</option>
            <option value="Clinic">Clinic</option>
        </select>
    </div>

    <div class="row g-4" id="shopList">
        @php
        $shops = [
        ['title' => 'Bliss Spa', 'location' => 'Makati', 'category' => 'Spa', 'desc' => 'Massage & facials.', 'img' => 'https://images.unsplash.com/photo-1588776814546-ecbcbadb67c1?auto=format&fit=crop&w=600&q=80'],
        ['title' => 'Zen Retreat', 'location' => 'Taguig', 'category' => 'Spa', 'desc' => 'Deep tissue therapy.', 'img' => 'https://images.unsplash.com/photo-1603398938378-48ab8da4fc05?auto=format&fit=crop&w=600&q=80'],
        ['title' => 'Mario’s Barbershop', 'location' => 'QC', 'category' => 'Barber', 'desc' => 'Classic haircuts.', 'img' => 'https://images.unsplash.com/photo-1627384113740-dc0fa80b3e88?auto=format&fit=crop&w=600&q=80'],
        ['title' => 'Clipper Kings', 'location' => 'Pasig', 'category' => 'Barber', 'desc' => 'Trendy cuts and fades.', 'img' => 'https://images.unsplash.com/photo-1601331783541-32c8d4fe5cf6?auto=format&fit=crop&w=600&q=80'],
        ['title' => 'Dr. Reyes Clinic', 'location' => 'Manila', 'category' => 'Clinic', 'desc' => 'General check-ups.', 'img' => 'https://images.unsplash.com/photo-1588776814681-d107db2533c2?auto=format&fit=crop&w=600&q=80']
        ];
        @endphp

        @foreach ($shops as $shop)
        <div class="col-md-6 col-lg-4 shop-card" data-category="{{ $shop['category'] }}">
            <div class="card shadow-sm h-100">
                <img src="{{ $shop['img'] }}" class="card-img-top" alt="{{ $shop['title'] }}">
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-primary mb-2">{{ $shop['category'] }}</span>
                    <h5 class="card-title">{{ $shop['title'] }}</h5>
                    <p class="text-muted small">📍 {{ $shop['location'] }}</p>
                    <p class="small flex-grow-1">{{ $shop['desc'] }}</p>
                    <a href="{{ url('/create-booking/' . Str::slug($shop['title'])) }}" class="btn btn-outline-primary mt-2">
                        <i class="bi bi-calendar-plus me-1"></i> Book Now
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
    const filter = document.getElementById("categoryFilter");
    const shopCards = document.querySelectorAll(".shop-card");

    filter.addEventListener("change", () => {
        const selected = filter.value;

        shopCards.forEach(card => {
            const category = card.getAttribute("data-category");
            card.style.display = (selected === "All" || selected === category) ? "block" : "none";
        });
    });
</script>
@endpush