<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Menambahkan produk ke dalam keranjang.
     */
    public function add(Request $request, Product $product)
    {
        $user = Auth::user();

        // Dapatkan atau buat cart untuk user
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Cek apakah item sudah ada di keranjang
        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->quantity += 1;
            $item->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang.');
    }

    /**
     * Menampilkan isi keranjang pengguna.
     */
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart) {
            $items = [];
            $total = 0;
        } else {
            $items = $cart->cartItems()->with('product')->get();
            $total = $items->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });
        }

        return view('cart.index', compact('items', 'total'));
    }

    /**
     * Memperbarui jumlah item dalam keranjang.
     */
    public function update(Request $request, CartItem $item)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $item->update([
            'quantity' => $request->quantity,
        ]);

        return back()->with('success', 'Jumlah beli diperbarui.');
    }

    /**
     * Menghapus item dari keranjang.
     */
    public function destroy(CartItem $item)
    {
        $item->delete();

        return back()->with('success', 'Item dihapus dari keranjang.');
    }
}
