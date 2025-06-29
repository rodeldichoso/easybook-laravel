<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Booking;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // General stats for admin
        $totalUsers = User::count();
        $totalBookings = Booking::count();
        $totalShops = Shop::count();

        // User-specific stats (default values)
        $recentBookings = collect();
        $upcomingBookingsCount = 0;
        $totalUserBookings = 0;
        $favoriteCategory = null;

        // All-user stats (for user dashboard summary, if needed)
        $allUserUpcomingBookings = 0;
        $allUserTotalBookings = 0;

        // Admin activities for dashboard notification
        $activities = collect();

        if (Auth::check()) {
            $user = Auth::user();
            // Always calculate user stats for all roles
            $recentBookings = Booking::with('shop')
                ->where('user_id', $user->id)
                ->orderByDesc('appointment_date')
                ->take(5)
                ->get();

            $upcomingBookingsCount = Booking::where('user_id', $user->id)
                ->whereDate('appointment_date', '>=', now()->toDateString())
                ->count();

            $totalUserBookings = Booking::where('user_id', $user->id)->count();

            $favoriteCategory = Booking::where('user_id', $user->id)
                ->join('shops', 'bookings.shop_id', '=', 'shops.id')
                ->selectRaw('shops.shop_category, COUNT(*) as count')
                ->groupBy('shops.shop_category')
                ->orderByDesc('count')
                ->value('shops.shop_category');

            // All-user stats (for summary, if needed)
            $allUserUpcomingBookings = Booking::whereDate('appointment_date', '>=', now()->toDateString())->count();
            $allUserTotalBookings = Booking::count();

            // Admin activities for dashboard notification
            if ($user->role === 'admin') {
                $activities = Activity::with('admin')->latest()->take(5)->get();
            }
        }

        // Pass all stats to the dashboard view
        return view('dashboard', [
            'totalUsers' => $totalUsers, //total users for admin dashboard
            'totalBookings' => $totalBookings, //total bookings for admin dashboard
            'totalShops' => $totalShops, //total shops for admin dashboard
            'recentBookings' => $recentBookings, //recent bookings for user dashboard
            'upcomingBookingsCount' => $upcomingBookingsCount, //upcoming bookings count for user dashboard
            'totalUserBookings' => $totalUserBookings, //total user bookings for user dashboard
            'favoriteCategory' => $favoriteCategory, //favorite category for user dashboard
            'allUserUpcomingBookings' => $allUserUpcomingBookings, //all user upcoming bookings for user dashboard
            'allUserTotalBookings' => $allUserTotalBookings, //all user total bookings for admin dashboard
            'activities' => $activities, //recent activities for admin dashboard
        ]);
    }
}
