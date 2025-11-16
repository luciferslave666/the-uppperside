<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Menu - The Upperside</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }
        
        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }
        
        /* Product card hover effect */
        .product-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        @media (hover: hover) {
            .product-card:active {
                transform: scale(0.98);
            }
        }
        
        /* Sticky header shadow on scroll */
        .header-scrolled {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        /* Animasi untuk notifikasi */
        @keyframes slideInDown {
            from {
                transform: translateY(-100px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutUp {
            from {
                transform: translateY(0);
                opacity: 1;
            }
            to {
                transform: translateY(-100px);
                opacity: 0;
            }
        }
        
        @keyframes bounce {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }
        
        .ajax-notification {
            animation: slideInDown 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
        
        .cart-badge-bounce {
            animation: bounce 0.5s ease;
        }
        
        /* Floating cart button */
        .floating-cart {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 50;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }
        
        /* Category tabs */
        .category-nav {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .category-nav::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Compact Header untuk Mobile -->
    <header id="main-header" class="bg-white border-b border-gray-200 sticky top-0 z-40 transition-shadow">
        <div class="px-4 py-3">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="font-bold text-xl text-gray-900">
                        Kafe<span class="text-gray-600">Anda</span>
                    </h1>
                    <p class="text-xs text-gray-500 mt-0.5">
                        {{ App\Models\Table::find(session('order_details.table_id'))->name ?? 'Meja' }} • 
                        {{ session('order_details.number_of_people') }} orang
                    </p>
                </div>
                
                <!-- Cart Icon - Desktop Version (hidden on mobile karena ada floating button) -->
                <a href="{{ route('cart.index') }}" class="hidden sm:flex relative group">
                    <div class="p-2.5 bg-gray-900 text-white rounded-xl transition hover:bg-gray-800">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4z" />
                        </svg>
                    </div>
                    <span id="cart-badge-desktop" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center {{ $cartTotalQuantity > 0 ? '' : 'hidden' }}">
                        {{ $cartTotalQuantity }}
                    </span>
                </a>
            </div>
        </div>
        
        <!-- Category Navigation Tabs -->
        <div class="px-4 pb-2 overflow-x-auto category-nav">
            <div class="flex space-x-2">
                @foreach ($categories as $category)
                    <a href="#category-{{ $category->id }}" 
                       class="category-tab inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-full whitespace-nowrap hover:bg-gray-200 transition">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </header>

    <main class="pb-24">
        
        <!-- Customer Info Card - Compact -->
        <div class="px-4 pt-4 pb-2">
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 text-white rounded-2xl p-4 shadow-lg">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-white/10 rounded-lg backdrop-blur">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm opacity-90">Memesan untuk:</p>
                        <p class="font-semibold text-lg">{{ session('order_details.customer_name') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Categories -->
        <div class="px-4 pt-4">
            @foreach ($categories as $category)
                <div id="category-{{ $category->id }}" class="mb-8 scroll-mt-32">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                        <span class="bg-gray-900 w-1 h-6 rounded mr-3"></span>
                        {{ $category->name }}
                    </h3>
                    
                    <div class="space-y-3">
                        @forelse ($category->products as $product)
                            @if ($product->is_available)
                                <!-- Horizontal Card Layout untuk Mobile -->
                                <div class="product-card bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                                    <div class="flex">
                                        <!-- Product Image -->
                                        <div class="w-24 h-24 sm:w-28 sm:h-28 flex-shrink-0 bg-gray-100">
                                            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/200x200.png?text=Menu' }}" 
                                                 alt="{{ $product->name }}" 
                                                 class="w-full h-full object-cover">
                                        </div>
                                        
                                        <!-- Product Info -->
                                        <div class="flex-1 p-3 flex flex-col justify-between">
                                            <div>
                                                <h4 class="font-semibold text-gray-900 text-sm sm:text-base leading-tight mb-1">
                                                    {{ $product->name }}
                                                </h4>
                                                @if($product->description)
                                                    <p class="text-xs text-gray-500 line-clamp-1">
                                                        {{ $product->description }}
                                                    </p>
                                                @endif
                                            </div>
                                            
                                            <div class="flex items-center justify-between mt-2">
                                                <p class="font-bold text-gray-900 text-base sm:text-lg">
                                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </p>
                                                
                                                <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    
                                                    <button type="submit" class="add-to-cart-btn flex items-center space-x-1.5 px-3 py-1.5 sm:px-4 sm:py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-800 active:scale-95 transition">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                        </svg>
                                                        <span>Tambah</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="text-center py-12 bg-white rounded-xl">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                                <p class="text-gray-500 text-sm">Belum ada menu di kategori ini</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <!-- Floating Cart Button - Mobile Only -->
    <a href="{{ route('cart.index') }}" class="sm:hidden floating-cart">
        <div class="relative">
            <div class="bg-gray-900 text-white p-4 rounded-full shadow-2xl hover:bg-gray-800 transition">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4z" />
                </svg>
            </div>
            <span id="cart-badge-mobile" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full min-w-[20px] h-5 px-1.5 flex items-center justify-center {{ $cartTotalQuantity > 0 ? '' : 'hidden' }}">
                {{ $cartTotalQuantity }}
            </span>
        </div>
    </a>

    <!-- AJAX Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Header shadow on scroll
            const header = document.getElementById('main-header');
            let lastScroll = 0;
            
            window.addEventListener('scroll', () => {
                const currentScroll = window.pageYOffset;
                if (currentScroll > 10) {
                    header.classList.add('header-scrolled');
                } else {
                    header.classList.remove('header-scrolled');
                }
                lastScroll = currentScroll;
            });
            
            // Category tab active state
            const categoryTabs = document.querySelectorAll('.category-tab');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const categoryId = entry.target.id;
                        categoryTabs.forEach(tab => {
                            if (tab.getAttribute('href') === `#${categoryId}`) {
                                tab.classList.remove('bg-gray-100', 'text-gray-700');
                                tab.classList.add('bg-gray-900', 'text-white');
                            } else {
                                tab.classList.remove('bg-gray-900', 'text-white');
                                tab.classList.add('bg-gray-100', 'text-gray-700');
                            }
                        });
                    }
                });
            }, { threshold: 0.5, rootMargin: '-100px 0px -50% 0px' });
            
            document.querySelectorAll('[id^="category-"]').forEach(section => {
                observer.observe(section);
            });
            
            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            // Get all add to cart forms
            const addToCartForms = document.querySelectorAll('.add-to-cart-form');
            
            addToCartForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const submitButton = this.querySelector('.add-to-cart-btn');
                    const originalButtonHTML = submitButton.innerHTML;
                    
                    // Disable button dan tampilkan loading
                    submitButton.disabled = true;
                    submitButton.innerHTML = `
                        <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    `;
                    
                    // Kirim request AJAX
                    fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Tampilkan notifikasi sukses
                            showNotification(data.product_name + ' ditambahkan!', 'success');
                            
                            // Update cart badge
                            updateCartBadge(data.cart_count);
                            
                            // Hapus alert success jika ada
                            const successAlert = document.querySelector('[role="alert"]');
                            if (successAlert) {
                                successAlert.remove();
                            }
                        } else {
                            // Tampilkan notifikasi error
                            showNotification(data.message, 'error');
                            
                            // Redirect jika diperlukan
                            if (data.redirect) {
                                setTimeout(() => {
                                    window.location.href = data.redirect;
                                }, 1500);
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showNotification('Terjadi kesalahan. Silakan coba lagi.', 'error');
                    })
                    .finally(() => {
                        // Enable button kembali
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalButtonHTML;
                    });
                });
            });
        });
        
        // Fungsi untuk menampilkan notifikasi toast
        function showNotification(message, type = 'success') {
            // Hapus notifikasi sebelumnya jika ada
            const existingNotif = document.querySelector('.ajax-notification');
            if (existingNotif) {
                existingNotif.remove();
            }
            
            // Tentukan warna dan icon berdasarkan type
            const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
            const icon = type === 'success' 
                ? '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>'
                : '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>';
            
            // Buat elemen notifikasi
            const notification = document.createElement('div');
            notification.className = `ajax-notification fixed top-4 left-4 right-4 sm:left-auto sm:right-4 sm:max-w-sm z-[100] ${bgColor} text-white p-4 rounded-xl shadow-2xl`;
            
            notification.innerHTML = `
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                        ${icon}
                    </div>
                    <p class="flex-1 font-medium text-sm">${message}</p>
                    <button onclick="this.parentElement.parentElement.remove()" class="flex-shrink-0 text-white hover:opacity-70">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Auto hide setelah 3 detik
            setTimeout(() => {
                notification.style.animation = 'slideOutUp 0.3s ease-out';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }
        
        // Fungsi untuk update cart badge
        function updateCartBadge(count) {
            const cartBadgeMobile = document.getElementById('cart-badge-mobile');
            const cartBadgeDesktop = document.getElementById('cart-badge-desktop');
            
            [cartBadgeMobile, cartBadgeDesktop].forEach(badge => {
                if (badge) {
                    badge.textContent = count;
                    
                    if (count > 0) {
                        badge.classList.remove('hidden');
                        badge.classList.add('cart-badge-bounce');
                        setTimeout(() => {
                            badge.classList.remove('cart-badge-bounce');
                        }, 500);
                    } else {
                        badge.classList.add('hidden');
                    }
                }
            });
        }
    </script>

</body>
</html>