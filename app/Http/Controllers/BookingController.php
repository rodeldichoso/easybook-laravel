<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'shop'])->get();
        return view('admin.all-bookings', compact('bookings'));
    }
    public function CreateBooking(Request $request)
    {
        $payload = $request->validate([
            'services' => 'required|array',
            'services.*' => 'required|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'notes' => 'nullable|string',
            'shop_id' => 'required|exists:shops,id',
        ]);

        $userId = Auth::id();
        $created = [];
        foreach ($payload['services'] as $serviceName) {
            $created[] = Booking::create([
                'id' => (string) Str::uuid(),
                'public_id' => strtoupper(Str::random(12)),
                'user_id' => $userId,
                'shop_id' => $payload['shop_id'],
                'service_name' => $serviceName,
                'appointment_date' => $payload['appointment_date'],
                'appointment_time' => $payload['appointment_time'],
                'notes' => $payload['notes'] ?? null,
            ]);
        }

        // Redirect back with a success message for normal form POST
        return redirect()->back()->with('success', 'Booked Successfully');
    }
}
