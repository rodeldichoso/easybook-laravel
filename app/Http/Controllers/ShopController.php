<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    function index()
    {
        $shops = Shop::with('admin')->get();
        return view('admin.manage-shops', compact('shops'));
    }

    public function CreateShop(Request $request)
    {

        if (Auth::user()->role === 'user') {
            abort(403, 'Unauthorized');
        }
        $payload = $request->validate([
            'shop_name' => 'required|string|min:2',
            'shop_address' => 'required|string|min:2',
            'shop_category' => 'required|string|max:100',

        ]);

        $payload['admin_id'] = Auth::id();

        $shop = Shop::create($payload);

        // Save services if provided
        if ($request->has('services')) {
            foreach ($request->input('services') as $service) {
                if (!empty($service['service_name'])) {
                    $shop->services()->create([
                        'service_name' => $service['service_name'],
                        'price' => $service['price'] ?? null,
                        'description' => $service['description'] ?? null,
                    ]);
                }
            }
        }

        // Log activity
        Activity::create([
            'admin_id' => Auth::id(),
            'description' => 'Created shop: ' . $shop->shop_name,
        ]);

        return redirect()->route('dashboard')->with('shop_created', 'Shop "' . $shop->shop_name . '" created successfully!');
    }

    public function showBookingForm()
    {
        $shops = Shop::all();
        return view('create-booking', compact('shops'));
    }
}
