<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;

class DashboardAdminController extends Controller
{


public function index()
{
    $totalUsers = \App\Models\User::count();
    $totalOrders = Order::count();
    $totalProducts = \App\Models\Product::count();
    $pendingOrders = Order::where('status', 'MENUNGGU')->count();

    return view('admin.dashboardadmin', compact('totalUsers', 'totalOrders', 'totalProducts', 'pendingOrders'));
}

}
        