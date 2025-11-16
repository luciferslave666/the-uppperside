<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;
use Cart;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    /**
     * Menambahkan item ke keranjang (dengan support AJAX).
     */
    public function add(Request $request): JsonResponse|RedirectResponse
    {
        if (!session()->has('order_details')) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Silakan isi data pemesanan terlebih dahulu.',
                    'redirect' => route('order.start')
                ], 403);
            }
            return redirect()->route('order.start')
                ->with('error', 'Silakan isi data pemesanan terlebih dahulu.');
        }

        $product = Product::find($request->product_id);

        if (!$product) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Produk tidak ditemukan.'
                ], 404);
            }
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        $tableId = session('order_details.table_id');

        Cart::session($tableId)->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'image' => $product->image,
            ]
        ]);

        if ($request->ajax()) {
            // Hitung total items di cart
            $cartCount = Cart::session($tableId)->getContent()->count();
            $cartTotal = Cart::session($tableId)->getTotal();

            return response()->json([
                'success' => true,
                'message' => 'Item berhasil ditambahkan ke keranjang!',
                'cart_count' => $cartCount,
                'cart_total' => number_format($cartTotal, 0, ',', '.'),
                'product_name' => $product->name
            ]);
        }

        return redirect()->route('order.menu')->with('success', 'Item berhasil ditambahkan ke keranjang!');
    }



    /**
     * Menampilkan halaman keranjang belanja dengan perhitungan subtotal, service fee, tax, grand total.
     */
    public function showCart(): View|RedirectResponse
    {
        if (!session()->has('order_details')) {
            return redirect()->route('order.start');
        }

        $tableId = session('order_details.table_id');

        $cartItems = Cart::session($tableId)->getContent()->sortBy('name');

        // SUBTOTAL
        $subtotal = Cart::session($tableId)->getTotal();

        // Ambil persentase dari database
        $service_percent = (float) (Setting::where('key', 'service_percent')->first()->value ?? 0);
        $tax_percent = (float) (Setting::where('key', 'tax_percent')->first()->value ?? 0);

        // HITUNG SERVICE FEE
        $service_fee_amount = round(($subtotal * $service_percent) / 100);

        // Pajak dihitung setelah service fee ditambah
        $tax_base = $subtotal + $service_fee_amount;
        $tax_amount = round(($tax_base * $tax_percent) / 100);

        // GRAND TOTAL
        $grand_total = $tax_base + $tax_amount;

        return view('cart.index', [
            'cartItems' => $cartItems,

            'subtotal' => $subtotal,
            'service_fee_amount' => $service_fee_amount,
            'tax_amount' => $tax_amount,
            'grand_total' => $grand_total,

            'service_percent' => $service_percent,
            'tax_percent' => $tax_percent,
        ]);
    }



    /**
     * Update kuantitas item di keranjang.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $tableId = session('order_details.table_id');

        Cart::session($tableId)->update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ],
        ]);

        return redirect()->route('cart.index')
            ->with('success', 'Kuantitas berhasil diperbarui.');
    }



    /**
     * Hapus 1 item dari keranjang.
     */
    public function remove($id): RedirectResponse
    {
        $tableId = session('order_details.table_id');

        Cart::session($tableId)->remove($id);

        return redirect()->route('cart.index')
            ->with('success', 'Item berhasil dihapus dari keranjang.');
    }
}