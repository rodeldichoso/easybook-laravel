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
            'service_name' => 'required|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'notes' => 'nullable|string',
            'shop_id' => 'required|exists:shops,id',
        ]);

        $payload['id'] = (string) Str::uuid();
        $payload['public_id'] = strtoupper(Str::random(12));
        $payload['user_id'] = Auth::id();

        Booking::create($payload);

        // Redirect back with a success message for normal form POST
        return redirect()->back()->with('success', 'Booked Successfully');
    }
}
