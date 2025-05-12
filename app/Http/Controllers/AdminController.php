<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;

class AdminController extends Controller
{
    // AdminController.php
public function dashboard()
{
    $totalOrders = Order::count();
    $totalUsers = User::where('role', 'USER')->count();
    $totalProducts = Product::count();
    $pendingOrders = Order::where('status', 'MENUNGGU')->count();

    return view('admin.dashboardadmin', compact(
        'totalOrders', 'totalUsers', 'totalProducts', 'pendingOrders'
    ));
}

}
