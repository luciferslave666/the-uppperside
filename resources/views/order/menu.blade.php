<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Menu - KafeAnda</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif;
        }
        .product-card {
            transition: all 0.2s ease;
        }
        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-2xl text-gray-900">
                    Kafe<span class="text-gray-600">Anda</span>
                </h1>
                
                <a href="{{ route('cart.index') }}" class="relative group">
                    <div class="p-2 bg-gray-100 group-hover:bg-gray-200 rounded-lg transition">
                        <svg class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4z" />
                        </svg>
                    </div>

                    @if($cartTotalQuantity > 0)
                    <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                        {{ $cartTotalQuantity }}
                    </span>
                    @endif
                </a>
            </div>
        </div>
    </header>

    <!-- Success Alert -->
    @if (session('success'))
        <div class="container mx-auto px-6 pt-6">
            <div class="bg-green-50 border border-green-200 text-green-800 p-4 rounded-lg flex items-start space-x-3" role="alert">
                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <p class="font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <main class="container mx-auto px-6 py-8">
        
        <!-- Customer Info Card -->
        <div class="mb-8 bg-white border border-gray-200 rounded-lg shadow-sm p-6">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-gray-100 rounded-lg">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="text-lg font-semibold text-gray-900">
                        Memesan untuk: <span class="text-gray-700">{{ session('order_details.customer_name') }}</span>
                    </h2>
                    <div class="flex flex-wrap gap-4 mt-2 text-sm text-gray-600">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                            <span>Meja: <strong>{{ App\Models\Table::find(session('order_details.table_id'))->name ?? 'N/A' }}</strong></span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <span>Jumlah Orang: <strong>{{ session('order_details.number_of_people') }}</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Title -->
        <div class="mb-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Menu Kami</h2>
            <p class="text-gray-600">Pilih menu favorit Anda dan nikmati kelezatannya</p>
        </div>

        <!-- Menu Categories -->
        @foreach ($categories as $category)
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 pb-3 border-b-2 border-gray-900">
                    {{ $category->name }}
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    @forelse ($category->products as $product)
                        @if ($product->is_available)
                            <div class="product-card bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                                
                                <!-- Product Image -->
                                <div class="relative h-48 overflow-hidden bg-gray-100">
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/400x300.png?text=Menu' }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-full object-cover">
                                    <div class="absolute top-3 right-3 bg-white px-3 py-1 rounded-full shadow-sm">
                                        <span class="text-xs font-semibold text-gray-700">{{ $category->name }}</span>
                                    </div>
                                </div>
                                
                                <!-- Product Info -->
                                <div class="p-5">
                                    <h4 class="text-lg font-semibold text-gray-900 mb-2">{{ $product->name }}</h4>
                                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                                        {{ $product->description ?: 'Menu spesial pilihan terbaik untuk Anda' }}
                                    </p>
                                    
                                    <!-- Price & Add Button -->
                                    <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                                        <div>
                                            <p class="text-xs text-gray-500 mb-1">Harga</p>
                                            <p class="text-xl font-bold text-gray-900">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </p>
                                        </div>

                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            
                                            <button type="submit" class="flex items-center space-x-2 px-4 py-2 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                </svg>
                                                <span>Tambah</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="col-span-3 text-center py-12">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p class="text-gray-500">Belum ada menu di kategori ini</p>
                        </div>
                    @endforelse
                </div>
            </div>
        @endforeach
    </main>

    <!-- Footer -->
    <footer class="mt-16 pb-8">
        <div class="container mx-auto px-6">
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="text-center md:text-left">
                        <h3 class="font-semibold text-lg text-gray-900 mb-1">Butuh Bantuan?</h3>
                        <p class="text-gray-600 text-sm">Hubungi pelayan kami untuk assistance</p>
                    </div>
                    <a href="{{ route('cart.index') }}" class="px-6 py-3 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition">
                        Lihat Keranjang
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>