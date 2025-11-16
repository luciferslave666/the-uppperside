<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Diterima! - KafeAnda</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif;
        }
        .checkmark-circle {
            animation: scaleIn 0.5s ease-out;
        }
        @keyframes scaleIn {
            0% { transform: scale(0); opacity: 0; }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); opacity: 1; }
        }
        .checkmark-path {
            stroke-dasharray: 100;
            stroke-dashoffset: 100;
            animation: drawCheck 0.8s ease-out 0.3s forwards;
        }
        @keyframes drawCheck {
            to { stroke-dashoffset: 0; }
        }
    </style>
</head>
<body class="bg-gray-50">

    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full">
            
            <!-- Success Icon -->
            <div class="text-center mb-8">
                <div class="checkmark-circle inline-block">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="45" fill="#10b981" opacity="0.1"/>
                        <circle cx="50" cy="50" r="40" fill="white" stroke="#10b981" stroke-width="3"/>
                        <path class="checkmark-path" d="M30 50 L45 65 L70 35" fill="none" stroke="#10b981" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

            <!-- Success Message -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-3">
                    Pesanan Berhasil!
                </h1>
                <p class="text-lg text-gray-600">
                    Terima kasih telah memesan di KafeAnda
                </p>
            </div>
            
            <!-- Order Details Card -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-8 mb-6">
                
                <!-- Order Number -->
                <div class="text-center mb-8 pb-8 border-b border-gray-200">
                    <p class="text-sm font-semibold text-gray-600 uppercase tracking-wider mb-3">Nomor Pesanan Anda</p>
                    <div class="inline-block px-8 py-4 bg-gray-900 rounded-lg">
                        <p class="text-4xl font-bold text-white">
                            #{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}
                        </p>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">Simpan nomor ini untuk referensi Anda</p>
                </div>

                <!-- Order Info Grid -->
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    
                    <!-- Total Price -->
                    <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-white rounded-lg border border-gray-200">
                                <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 font-medium mb-1">Total Tagihan</p>
                                <p class="text-2xl font-bold text-gray-900">
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Order Status -->
                    <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-white rounded-lg border border-gray-200">
                                <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 font-medium mb-1">Status Pesanan</p>
                                <div class="flex items-center space-x-2">
                                    <span class="inline-block w-2 h-2 bg-yellow-500 rounded-full"></span>
                                    <p class="text-lg font-semibold text-gray-900">Menunggu Konfirmasi</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Instructions -->
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-yellow-900 mb-3">Langkah Selanjutnya</h4>
                            <ul class="space-y-2 text-sm text-yellow-800">
                                <li class="flex items-start space-x-2">
                                    <span class="font-semibold">1.</span>
                                    <span>Tunjukkan <strong>nomor pesanan</strong> Anda di kasir</span>
                                </li>
                                <li class="flex items-start space-x-2">
                                    <span class="font-semibold">2.</span>
                                    <span>Lakukan <strong>pembayaran</strong> sesuai total tagihan</span>
                                </li>
                                <li class="flex items-start space-x-2">
                                    <span class="font-semibold">3.</span>
                                    <span>Tunggu pesanan Anda <strong>diantarkan ke meja</strong></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Thank You Message -->
            <div class="text-center">
                <p class="text-gray-900 font-medium mb-2">
                    Selamat menikmati!
                </p>
                <p class="text-gray-600 text-sm">
                    Tim KafeAnda siap melayani Anda dengan sepenuh hati
                </p>
            </div>

        </div>
    </div>

</body>
</html>