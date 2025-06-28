<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
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

        Shop::create($payload);

        return redirect()->route('admin.shops')->with('success', 'Shop created successfully.');
    }
}
