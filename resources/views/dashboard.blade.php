<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-900 dark:text-white">
                {{ __('Dashboard Admin') }}
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                {{ now()->format('l, d F Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Main Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Revenue Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/30 px-2 py-1 rounded-full">
                            +12%
                        </span>
                    </div>
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Pendapatan Hari Ini</h3>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">
                        Rp {{ number_format($revenueToday, 0, ',', '.') }}
                    </p>
                </div>

                <!-- Orders Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30 px-2 py-1 rounded-full">
                            {{ $ordersTodayCount }}
                        </span>
                    </div>
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Pesanan Hari Ini</h3>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ $ordersTodayCount }} <span class="text-base font-normal text-gray-500">pesanan</span>
                    </p>
                </div>

                <!-- Pending Orders Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold text-yellow-600 dark:text-yellow-400 bg-yellow-50 dark:bg-yellow-900/30 px-2 py-1 rounded-full">
                            Pending
                        </span>
                    </div>
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Menunggu Pembayaran</h3>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ $pendingOrdersCount }} <span class="text-base font-normal text-gray-500">pesanan</span>
                    </p>
                </div>

            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-5">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-lg">
                            <svg class="w-6 h-6 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Menu</h4>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalMenu ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-5">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-lg">
                            <svg class="w-6 h-6 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Meja</h4>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalTables ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-5">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-lg">
                            <svg class="w-6 h-6 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Karyawan</h4>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalStaff ?? 0 }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sales Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Grafik Penjualan Mingguan</h3>
                    <select class="text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-gray-900">
                        <option>7 Hari Terakhir</option>
                        <option>30 Hari Terakhir</option>
                        <option>Bulan Ini</option>
                    </select>
                </div>
                
                <!-- Chart Canvas -->
                <canvas id="salesChart" class="w-full" height="80"></canvas>
            </div>

            <!-- Top Selling Products -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Menu Terlaris</h3>
                    <span class="text-sm text-gray-600 dark:text-gray-400">Top 5 produk</span>
                </div>

                @if($topSellingProducts->isEmpty())
                    <div class="text-center py-8">
                        <svg class="w-16 h-16 text-gray-300 dark:text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <p class="text-gray-500 dark:text-gray-400">Belum ada data penjualan</p>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach ($topSellingProducts as $item)
                            <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center justify-center w-10 h-10 bg-gray-900 dark:bg-white text-white dark:text-gray-900 rounded-lg font-bold">
                                        {{ $loop->iteration }}
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 dark:text-white">{{ $item->product_name }}</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $item->total_sold }} terjual</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-bold text-gray-900 dark:text-white">
                                        {{ number_format(($item->total_sold / $topSellingProducts->sum('total_sold')) * 100, 1) }}%
                                    </p>
                                    <div class="w-24 bg-gray-200 dark:bg-gray-600 rounded-full h-2 mt-1">
                                        <div class="bg-gray-900 dark:bg-white h-2 rounded-full" 
                                             style="width: {{ ($item->total_sold / $topSellingProducts->max('total_sold')) * 100 }}%"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sample data - replace with actual data from controller
        const ctx = document.getElementById('salesChart').getContext('2d');
        
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: [1200000, 1900000, 1500000, 2200000, 1800000, 2500000, 2100000],
                    borderColor: '#111827',
                    backgroundColor: 'rgba(17, 24, 39, 0.1)',
                    borderWidth: 3,
                    tension: 0.4,
                    fill: true,
                    pointRadius: 5,
                    pointBackgroundColor: '#111827',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#111827',
                        padding: 12,
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#374151',
                        borderWidth: 1,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + (value / 1000000).toFixed(1) + 'jt';
                            },
                            color: '#6b7280'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#6b7280'
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>