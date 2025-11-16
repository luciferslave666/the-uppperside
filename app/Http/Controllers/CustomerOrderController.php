<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Product; 
use App\Models\Category; 
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Cart;

class CustomerOrderController extends Controller
{
    /**
     * Menampilkan form awal pemesanan (nama, jumlah orang, meja).
     */
    public function showStartForm(): View
    {
        // 3. Ambil semua meja dari database
        // Kita urutkan berdasarkan nama agar "Meja 1" di atas "Meja 10"
        $tables = Table::orderBy('name')->get();

        // 4. Kirim data meja ke view
        return view('order.start', [
            'tables' => $tables
        ]);
    }
    public function handleStartForm(Request $request): RedirectResponse
    {
        // 1. Validasi data
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'number_of_people' => 'required|integer|min:1',
            'table_id' => 'required|exists:tables,id',
        ]);

        // 2. Simpan data ke session
        // Kita simpan dalam array 'order_details' agar rapi
        $request->session()->put('order_details', [
            'customer_name' => $validated['customer_name'],
            'number_of_people' => $validated['number_of_people'],
            'table_id' => $validated['table_id'],
        ]);

        // 3. Arahkan ke halaman menu
        return redirect()->route('order.menu');
    }

    /**
     * 3. BUAT FUNGSI INI (Menampilkan Halaman Menu)
     * Menampilkan semua produk/menu ke pelanggan.
     */
public function showMenu(): View
    {
        if (!session()->has('order_details')) {
            return redirect()->route('order.start');
        }

        // 2. TENTUKAN ID KERANJANG (DARI ID MEJA)
        $tableId = session('order_details.table_id');

        // 3. AMBIL DATA KERANJANG
        // Kita ambil semua item
        $cartItems = Cart::session($tableId)->getContent(); 
        // Kita ambil total kuantitas (jumlah semua item)
        $cartTotalQuantity = Cart::session($tableId)->getTotalQuantity();

        // Ambil data menu
        $categories = Category::with('products')->get();
        
        // 4. KIRIM DATA KERANJANG KE VIEW
        return view('order.menu', [
            'categories' => $categories,
            'cartTotalQuantity' => $cartTotalQuantity // <-- Kirim ini
            // 'cartItems' => $cartItems // (Kita akan pakai ini nanti)
        ]);
    }
}