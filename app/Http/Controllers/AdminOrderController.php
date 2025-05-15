<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminOrderController extends Controller
{
    /**
     * Menampilkan semua pesanan beserta user-nya untuk admin.
     */
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders', compact('orders'));
    }

    /**
     * Menampilkan detail dari satu pesanan tertentu.
     */
    public function show(Order $order)
    {
        $order->load('items.product', 'user');
        return view('admin.show', compact('order'));
    }

    /**
     * Mengubah status pesanan dan nomor resi jika diberikan.
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:MENUNGGU,DIPROSES,TERKIRIM',
            'tracking_number' => 'nullable|string|max:255',
        ]);

        $order->update([
            'status' => $request->status,
            'tracking_number' => $request->tracking_number,
        ]);

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Status pesanan diperbarui.');
    }
}
