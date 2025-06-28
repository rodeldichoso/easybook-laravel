<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//View routes
Route::middleware('guest')->group(function () {
    Route::get('/', fn() => view('homepage'));
    Route::get('/login', fn() => view('loginpage'))->name('login');
    Route::get('/register', fn() => view('registerpage'))->name('register');
});

Route::middleware('auth.home')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'));
    Route::get('/create-booking', fn() => view('create-booking'));
    Route::get('/profile', fn() => view('profile'));
    Route::get('/settings', fn() => view('settings'));
});

//admin View
Route::middleware(['is.admin', 'auth.home'])->group(function () {
    Route::get('/admin-panel', fn() => view('admin.admin-panel'));
    Route::get('/admin/shops', fn() => view('admin.manage-shops'))->name('admin.shops');
    Route::get('/admin/users', fn() => view('admin.manage-users'));
    Route::get('/admin/bookings', fn() => view('admin.all-bookings'));
    Route::get('/admin/shop/create', fn() => view('admin.shop.create'));
});


//endpoints route
Route::post('/create-user', [UserController::class, 'UserCreate']);
Route::post('/login-user', [UserController::class, 'UserLogin']);
Route::post('/logout-user', [UserController::class, 'UserLogout'])->name('logout');
Route::post('/create-book', [BookingController::class, 'CreateBooking'])->name('booking');
Route::post('/admin/create-shop', [ShopController::class, 'CreateShop'])->middleware('is.admin')->name('create-shop');
