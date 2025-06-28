@extends('layouts.guest')

@section('title', 'Welcome to EasyBook')

@section('content')
<!-- HERO -->
<section class="bg-primary text-white py-5 text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Book Services With Ease</h1>
        <p class="lead mb-4">Your one-stop hub for spas, barbers, and clinics near you.</p>
        <a href="{{ auth()->check() ? '/dashboard' : '/register' }}" class="btn btn-light btn-lg">
            {{ auth()->check() ? 'Go to Dashboard' : 'Get Started' }}
        </a>
    </div>
</section>

<!-- FEATURED SHOPS -->
@php
$shops = [
['title' => 'Bliss Spa', 'location' => 'Makati', 'desc' => 'Massage & facials.', 'img' => 'https://picsum.photos/seed/barber/400/300', 'url' => '/shop/bliss-spa', 'category' => 'Spa'],
['title' => 'Zen Spa', 'location' => 'Taguig', 'desc' => 'Deep tissue massage.', 'img' => 'https://picsum.photos/seed/barber/400/300', 'url' => '/shop/zen-spa', 'category' => 'Spa'],
['title' => 'Mario’s Barbershop', 'location' => 'QC', 'desc' => 'Classic cuts.', 'img' => 'https://picsum.photos/seed/barber/400/300', 'url' => '/shop/marios-barber', 'category' => 'Barber'],
['title' => 'Clipper Kings', 'location' => 'Pasig', 'desc' => 'Modern barbering.', 'img' => 'https://picsum.photos/seed/barber/400/300', 'url' => '/shop/clipper-kings', 'category' => 'Barber'],
['title' => 'Dr. Reyes Clinic', 'location' => 'Manila', 'desc' => 'General checkups.', 'img' => 'https://picsum.photos/seed/barber/400/300', 'url' => '/shop/reyes-clinic', 'category' => 'Clinic'],
['title' => 'CityMed', 'location' => 'Caloocan', 'desc' => 'Diagnostics and more.', 'img' => 'https://picsum.photos/seed/barber/400/300', 'url' => '/shop/citymed', 'category' => 'Clinic'],
];
@endphp

<section class="py-5 bg-white">
    <div class="container">
        <h2 class="fw-bold text-center mb-4">🏪 Featured Shops</h2>

        <div class="position-relative">
            <button class="btn btn-outline-primary position-absolute top-50 start-0 translate-middle-y" onclick="scrollCarousel('featured', -1)" style="z-index: 2;">
                <i class="bi bi-chevron-left fs-4"></i>
            </button>

            <div id="carousel-featured" class="d-flex gap-4 overflow-hidden px-4" style="scroll-behavior: smooth;">
                @foreach ($shops as $shop)
                <div class="card flex-shrink-0 shadow-sm" style="width: 18rem;">
                    <img src="{{ $shop['img'] }}" class="card-img-top" alt="{{ $shop['title'] }}">
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">{{ $shop['category'] }}</span>
                        <h5 class="card-title">{{ $shop['title'] }}</h5>
                        <p class="text-muted small mb-1">📍 {{ $shop['location'] }}</p>
                        <p class="small">{{ $shop['desc'] }}</p>
                        <a href="{{ $shop['url'] }}" class="btn btn-outline-primary w-100">View Shop</a>
                    </div>
                </div>
                @endforeach
            </div>

            <button class="btn btn-outline-primary position-absolute top-50 end-0 translate-middle-y" onclick="scrollCarousel('featured', 1)" style="z-index: 2;">
                <i class="bi bi-chevron-right fs-4"></i>
            </button>
        </div>
    </div>
</section>

<!-- HOW IT WORKS -->
<section class="bg-light py-5 text-center">
    <div class="container">
        <h2 class="fw-bold mb-5">How It Works</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <i class="bi bi-search fs-1 text-primary mb-3"></i>
                <h6 class="fw-semibold">Search</h6>
                <p class="text-muted">Browse services or filter by location/type.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-calendar-check fs-1 text-primary mb-3"></i>
                <h6 class="fw-semibold">Book</h6>
                <p class="text-muted">Pick a convenient date and confirm easily.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-check2-circle fs-1 text-primary mb-3"></i>
                <h6 class="fw-semibold">Enjoy</h6>
                <p class="text-muted">Show up and receive quality service.</p>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="bg-primary text-white py-5">
    <div class="container text-center">
        <h3 class="fw-bold mb-4">What Our Users Say</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="bg-white text-dark p-4 rounded shadow-sm h-100">
                    <p class="mb-3">“I was able to book a last-minute spa appointment without stress. Super easy!”</p>
                    <h6 class="fw-semibold mb-0">— Sarah G.</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white text-dark p-4 rounded shadow-sm h-100">
                    <p class="mb-3">“Booking my clinic visit only took two minutes. No phone calls, no waiting.”</p>
                    <h6 class="fw-semibold mb-0">— Mark L.</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white text-dark p-4 rounded shadow-sm h-100">
                    <p class="mb-3">“Clean interface and everything worked smoothly. Loved using EasyBook.”</p>
                    <h6 class="fw-semibold mb-0">— Jenna R.</h6>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function scrollCarousel(id, dir) {
        const el = document.getElementById("carousel-" + id);
        const card = el.querySelector('.card');
        if (!card) return;
        const offset = card.offsetWidth + 16;
        el.scrollLeft += dir * offset;
    }
</script>
@endpush