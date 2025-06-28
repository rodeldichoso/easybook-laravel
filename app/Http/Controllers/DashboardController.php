<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalBookings = Booking::count();
        $totalShops = Shop::count(); // Example for counting shops
        // Add other stats as needed
        return view('dashboard', compact('totalUsers', 'totalBookings', 'totalShops'));
    }
}
