<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil semua pesanan milik user, hitung jumlah item tiap pesanan
        $orders = $user->orders()->withCount('items')->latest()->get();

        return view('orders.index', compact('orders'));
    }

    public function checkout()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart || $cart->cartItems->count() == 0) {
            return redirect()->back()->with('error', 'Keranjang Anda kosong!');
        }

        // Buat order
        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'MENUNGGU',
        ]);

        foreach ($cart->cartItems as $item) {
            // Cek stok
            if ($item->product->stock < $item->quantity) {
                return redirect()->back()->with('error', 'Stok tidak cukup untuk ' . $item->product->name);
            }

            // Kurangi stok
            $item->product->stock -= $item->quantity;
            $item->product->save();

            // Tambahkan ke order items
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);
        }

        // Kosongkan keranjang
        $cart->cartItems()->delete();

        return redirect()->route('dashboard.user')->with('success', 'Checkout berhasil!');
    }

    public function show(Order $order)
    {
        // Tanpa authorize(), gunakan pengecekan manual agar tidak error
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Load relasi items dan product
        $order->load('items.product');

        return view('orders.show', compact('order'));
    }
}
