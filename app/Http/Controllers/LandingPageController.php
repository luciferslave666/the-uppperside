<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;
class LandingPageController extends Controller
{
    /**
     * Menampilkan halaman landing page (homepage).
     */
    public function index(): View
    {
        // Ambil 6 produk terbaru yang tersedia untuk ditampilkan
        $featuredProducts = Product::where('is_available', true)
                                   ->latest()
                                   ->take(6)
                                   ->get();

        // Kirim data 'featuredProducts' ke view 'welcome'
        return view('welcome', [
            'featuredProducts' => $featuredProducts
        ]);
    }
}