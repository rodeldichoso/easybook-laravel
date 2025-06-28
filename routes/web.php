<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;

//View routes
Route::middleware('guest')->group(function () {
    Route::get('/', fn() => view('homepage'));
    Route::get('/login', fn() => view('loginpage'))->name('login');
    Route::get('/register', fn() => view('registerpage'))->name('register');
});

Route::middleware('auth.home')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/create-booking', [ShopController::class, 'showBookingForm']);
    Route::get('/profile', fn() => view('profile'));
    Route::get('/settings', fn() => view('settings'));
});

//admin View
Route::middleware(['is.admin', 'auth.home'])->group(function () {
    Route::get('/admin-panel', fn() => view('admin.admin-panel'));
    Route::get('/admin/shops', [ShopController::class, 'index'])->name('admin.shops');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/bookings', [BookingController::class, 'index'])->name('admin.bookings');
    Route::get('/admin/shop/create', fn() => view('admin.shop.create'));
});


//endpoints route
Route::post('/create-user', [UserController::class, 'UserCreate']);
Route::post('/login-user', [UserController::class, 'UserLogin']);
Route::post('/logout-user', [UserController::class, 'UserLogout'])->name('logout');
Route::post('/create-book', [BookingController::class, 'CreateBooking'])->name('bookings.create');
Route::post('/admin/create-shop', [ShopController::class, 'CreateShop'])->middleware('is.admin')->name('create-shop');
