<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - KafeAnda</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">

    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            
            <!-- Logo & Welcome -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-900 rounded-xl mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                </div>
                
                <h1 class="text-4xl font-bold text-gray-900 mb-3">
                    Kafe<span class="text-gray-600">Anda</span>
                </h1>
                <p class="text-lg text-gray-900 font-medium mb-2">Selamat Datang!</p>
                <p class="text-gray-600">Silakan isi data Anda untuk memulai pesanan</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-8">
                <form class="space-y-6" action="{{ route('order.start.submit') }}" method="POST">
                    @csrf
                    
                    <!-- Name Input -->
                    <div>
                        <label for="customer_name" class="block text-sm font-semibold text-gray-900 mb-2">
                            Nama Anda
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input id="customer_name" 
                                   name="customer_name" 
                                   type="text" 
                                   required
                                   placeholder="Masukkan nama Anda"
                                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent placeholder-gray-400 font-medium">
                        </div>
                    </div>

                    <!-- Number of People -->
                    <div>
                        <label for="number_of_people" class="block text-sm font-semibold text-gray-900 mb-2">
                            Jumlah Orang
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <input id="number_of_people" 
                                   name="number_of_people" 
                                   type="number" 
                                   min="1" 
                                   value="1" 
                                   required
                                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent font-medium">
                        </div>
                    </div>

                    <!-- Table Selection -->
                    <div>
                        <label for="table_id" class="block text-sm font-semibold text-gray-900 mb-2">
                            Nomor Meja
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <select id="table_id" 
                                    name="table_id" 
                                    required
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent font-medium cursor-pointer appearance-none">
                                
                                <option value="" disabled selected class="text-gray-400">Pilih meja Anda</option>
                                
                                @foreach ($tables as $table)
                                    <option value="{{ $table->id }}" class="font-medium">{{ $table->name }}</option>
                                @endforeach
                            
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit"
                                class="w-full flex justify-center items-center space-x-2 py-3 px-6 bg-gray-900 text-white font-semibold rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition">
                            <span>Lihat Menu</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Info Cards -->
                <div class="grid grid-cols-3 gap-3 mt-8 pt-6 border-t border-gray-200">
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl mb-1">☕</div>
                        <p class="text-xs font-medium text-gray-600">Fresh Coffee</p>
                    </div>
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl mb-1">🍰</div>
                        <p class="text-xs font-medium text-gray-600">Delicious Food</p>
                    </div>
                    <div class="text-center p-3 bg-gray-50 rounded-lg">
                        <div class="text-2xl mb-1">⚡</div>
                        <p class="text-xs font-medium text-gray-600">Fast Service</p>
                    </div>
                </div>
            </div>

            <!-- Footer Note -->
            <div class="mt-8 text-center">
                <p class="text-gray-600 text-sm">
                    Nikmati pengalaman memesan yang mudah dan cepat
                </p>
            </div>

        </div>
    </div>

</body>
</html>