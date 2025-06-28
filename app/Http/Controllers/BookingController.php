<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function CreateBooking(Request $request)
    {
        $payload = $request->validate([
            'service_name' => 'required|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $payload['id'] = (string) Str::uuid();
        $payload['public_id'] = strtoupper(Str::random(12));
        $payload['user_id'] = Auth::id();

        Booking::create($payload);

        return response()->json([
            'message' => 'Booked Successfully'
        ], 201);
    }
}
