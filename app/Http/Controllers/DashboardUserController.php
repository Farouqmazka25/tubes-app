<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{   
   public function index()
{
    $products = Product::all();
    $user = Auth::user();

    $cart = Cart::where('user_id', $user->id)->first();
    $cartCount = $cart ? $cart->cartItems()->sum('quantity') : 0;

    return view('user.dashboarduser', compact('products', 'cartCount'));
}
}

