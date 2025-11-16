<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Upperside</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .font-display {
            font-family: 'Cinzel', serif;
        }
.hero-gradient {
    background: linear-gradient(
        to bottom right,
        rgba(180, 180, 180, 0.55),
        rgba(230, 180, 80, 0.55)
    );
}

        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class="bg-amber-50">

    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-sm fixed w-full z-50 shadow-sm">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="font-display text-3xl font-bold text-amber-900">The Upperside</h1>
            <div class="hidden md:flex space-x-8 items-center">
                <a href="#about" class="text-gray-700 hover:text-amber-700 transition">Tentang</a>
                <a href="#menu" class="text-gray-700 hover:text-amber-700 transition">Menu</a>
                <a href="#gallery" class="text-gray-700 hover:text-amber-700 transition">Galeri</a>
                <a href="#location" class="text-gray-700 hover:text-amber-700 transition">Lokasi</a>
                <a href="#contact" class="px-6 py-2.5 bg-amber-700 text-white rounded-full hover:bg-amber-800 transition font-semibold">
                    Order Sekarang
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
<header class="relative h-screen parallax" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">
        <div class="absolute inset-0 hero-gradient"></div>
        <div class="relative container mx-auto px-6 h-full flex items-center">
            <div class="text-slate max-w-2xl">
                <h2 class="font-display text-6xl md:text-7xl font-black mb-6 leading-tight">
                    Secangkir <br/>Cerita Hangat
                </h2>
                <p class="text-xl md:text-2xl mb-10 text-slate-800 font-light">
                    Temukan kenikmatan kopi pilihan dari berbagai penjuru nusantara, disajikan dengan cinta di setiap tegukan.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#menu" class="px-8 py-4 bg-amber-600 text-white font-semibold rounded-full hover:bg-amber-700 transition transform hover:scale-105 shadow-lg">
                        Lihat Menu
                    </a>
                    <a href="#location" class="px-8 py-4 bg-white/20 backdrop-blur-sm text-slate font-semibold rounded-full hover:bg-white/30 transition border-2 border-white">
                        Kunjungi Kami
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h3 class="font-display text-5xl font-bold text-amber-900 mb-6">Cerita Kami</h3>
                <div class="w-24 h-1 bg-amber-600 mx-auto mb-10"></div>
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    Berawal dari kecintaan terhadap kopi lokal Indonesia, The Upperside hadir untuk menghadirkan pengalaman minum kopi yang autentik dan berkesan. Setiap biji kopi yang kami pilih berasal dari petani lokal terbaik di seluruh nusantara.
                </p>
                <p class="text-lg text-gray-700 leading-relaxed">
                    Kami percaya bahwa secangkir kopi bukan hanya tentang rasa, tapi tentang cerita, perjalanan, dan kehangatan yang dibagikan bersama. Di sini, setiap tamu adalah bagian dari keluarga besar kami.
                </p>
            </div>
        </div>
    </section>

    <!-- Featured Menu Section -->
    <section id="menu" class="py-24 bg-amber-50">
        <div class="container mx-auto px-6">
            <h3 class="font-display text-5xl font-bold text-center text-amber-900 mb-4">Menu Favorit</h3>
            <p class="text-center text-gray-600 mb-16 text-lg">Pilihan terbaik yang paling disukai pelanggan kami</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                
                <!-- Menu Item 1 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                    <div class="h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=600&q=80')"></div>
                    <div class="p-6">
                        <h4 class="font-display text-2xl font-bold text-amber-900 mb-2">Espresso Gayo</h4>
                        <p class="text-gray-600 mb-4">Kopi Aceh dengan karakter bold dan earthy notes</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-amber-700">Rp 28.000</span>
                            <button class="px-4 py-2 bg-amber-600 text-white rounded-full hover:bg-amber-700 transition text-sm font-semibold">
                                Order
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 2 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                    <div class="h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=600&q=80')"></div>
                    <div class="p-6">
                        <h4 class="font-display text-2xl font-bold text-amber-900 mb-2">Cappuccino Toraja</h4>
                        <p class="text-gray-600 mb-4">Perpaduan sempurna kopi Toraja dengan milk foam lembut</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-amber-700">Rp 32.000</span>
                            <button class="px-4 py-2 bg-amber-600 text-white rounded-full hover:bg-amber-700 transition text-sm font-semibold">
                                Order
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 3 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                    <div class="h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1517487881594-2787fef5ebf7?w=600&q=80')"></div>
                    <div class="p-6">
                        <h4 class="font-display text-2xl font-bold text-amber-900 mb-2">Kopi Susu Bali</h4>
                        <p class="text-gray-600 mb-4">Kopi Kintamani dengan susu segar rasa manis alami</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-amber-700">Rp 25.000</span>
                            <button class="px-4 py-2 bg-amber-600 text-white rounded-full hover:bg-amber-700 transition text-sm font-semibold">
                                Order
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-12">
                <a href="#" class="inline-block px-8 py-4 border-2 border-amber-700 text-amber-700 font-semibold rounded-full hover:bg-amber-700 hover:text-white transition">
                    Lihat Menu Lengkap
                </a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <h3 class="font-display text-5xl font-bold text-center text-amber-900 mb-4">Suasana & Momen</h3>
            <p class="text-center text-gray-600 mb-16 text-lg">Nikmati kehangatan di setiap sudut</p>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
<div class="h-64 bg-cover bg-center rounded-lg shadow-md transform hover:scale-105 transition"
     style="background-image: url('{{ asset('images/momen1.jpg') }}');"></div>

<div class="h-64 bg-cover bg-center rounded-lg shadow-md transform hover:scale-105 transition"
     style="background-image: url('{{ asset('images/momen2.jpg') }}');"></div>

<div class="h-64 bg-cover bg-center rounded-lg shadow-md transform hover:scale-105 transition"
     style="background-image: url('{{ asset('images/momen3.jpg') }}');"></div>

<div class="h-64 bg-cover bg-center rounded-lg shadow-md transform hover:scale-105 transition"
     style="background-image: url('{{ asset('images/momen4.jpg') }}');"></div>

            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section id="location" class="py-24 bg-amber-50">
        <div class="container mx-auto px-6">
            <h3 class="font-display text-5xl font-bold text-center text-amber-900 mb-16">Kunjungi Kami</h3>
            
            <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <!-- Map -->
                <div class="rounded-2xl overflow-hidden shadow-lg h-96">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126755.225039052!2d107.3872386!3d-6.878528!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e5bf98c27365%3A0x36335362113170c8!2sThe%20Upperside!5e0!3m2!1sid!2sid!4v1763217423507!5m2!1sid!2sid"
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>

                <!-- Info -->
                <div class="flex flex-col justify-center">
                    <div class="mb-8">
                        <h4 class="font-display text-2xl font-bold text-amber-900 mb-3">📍 Alamat</h4>
                        <p class="text-gray-700 text-lg">
                            Rooftop<br/>
                            Cimahi Mall, Setiamanah<br/>
                            Jawa Barat
                        </p>
                    </div>

                    <div class="mb-8">
                        <h4 class="font-display text-2xl font-bold text-amber-900 mb-3">⏰ Jam Operasional</h4>
                        <p class="text-gray-700 text-lg">
                            Senin - Jumat: 15.00 - 22.00<br/>
                            Sabtu - Minggu: 15.00 - 23.00<br/>
                            <span class="text-amber-700 font-semibold">Buka Setiap Hari</span>
                        </p>
                    </div>

                    <a href="https://maps.app.goo.gl/Z7czqByy1pYHLMM38" target="_blank" class="inline-block px-8 py-4 bg-amber-700 text-white font-semibold rounded-full hover:bg-amber-800 transition text-center">
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-amber-900 text-white">
        <div class="container mx-auto px-6 text-center">
            <h3 class="font-display text-5xl font-bold mb-6">Hubungi Kami</h3>
            <p class="text-xl text-amber-100 mb-12 max-w-2xl mx-auto">
                Ada pertanyaan atau ingin reservasi? Jangan ragu untuk menghubungi kami!
            </p>

            <div class="flex flex-wrap justify-center gap-6 mb-12">
                <a href="https://wa.me/6281234567890" target="_blank" class="flex items-center gap-3 px-8 py-4 bg-green-600 rounded-full hover:bg-green-700 transition transform hover:scale-105 font-semibold">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    WhatsApp: 0812-3456-7890
                </a>

                <a href="tel:+622112345678" class="flex items-center gap-3 px-8 py-4 bg-amber-700 rounded-full hover:bg-amber-600 transition transform hover:scale-105 font-semibold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    (021) 1234-5678
                </a>
            </div>

            <div class="flex justify-center gap-8">
                <a href="https://www.instagram.com/_theupperside/" target="_blank" class="hover:scale-110 transition">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                <a href="https://tiktok.com" target="_blank" class="hover:scale-110 transition">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
                    </svg>
                </a>
                <a href="https://facebook.com" target="_blank" class="hover:scale-110 transition">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-amber-950 text-amber-200 py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="text-lg">&copy; 2025 The Upperside. Semua hak dilindungi.</p>
            <p class="text-sm mt-2">Dibuat dengan ❤️ dan ☕ untuk pecinta kopi Indonesia</p>
        </div>
    </footer>

</body>
</html>
    