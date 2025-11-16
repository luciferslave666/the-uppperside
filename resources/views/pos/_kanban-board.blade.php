            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- 1. KOLOM: MENUNGGU PEMBAYARAN (Pending) -->
                <div class="bg-gray-100 rounded-lg shadow-inner">
                    <h3 class="text-lg font-semibold p-4 bg-yellow-500 text-white rounded-t-lg">Menunggu Pembayaran (Kasir)</h3>
                    <div class="p-4 space-y-4">
                        @forelse ($pendingOrders as $order)
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="font-bold text-lg">#{{ $order->id }} - {{ $order->table->name }}</span>
                                    <span class="text-gray-600">{{ $order->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-sm text-gray-700">Oleh: {{ $order->customer_name }} ({{ $order->number_of_people }} org)</p>
                                
                                <!-- Daftar Item Pesanan -->
                                <ul class="text-sm list-disc list-inside my-2">
                                    @foreach ($order->orderItems as $item)
                                        <li>{{ $item->quantity }}x {{ $item->product->name }}</li>
                                    @endforeach
                                </ul>

                                <p class="font-semibold text-right text-lg mt-2">Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                                
                                <!-- Tombol Aksi untuk Kasir -->
                                <form action="{{ route('pos.order.updateStatus', $order) }}" method="POST" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="status" value="paid">
                                    <button type="submit" class="w-full py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-green-700">
                                        Sudah Dibayar (Kirim ke Dapur)
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm p-4 text-center">Tidak ada pesanan menunggu pembayaran.</p>
                        @endforelse
                    </div>
                </div>

                <!-- 2. KOLOM: SIAP DIBUAT (Paid) -->
                <div class="bg-gray-100 rounded-lg shadow-inner">
                    <h3 class="text-lg font-semibold p-4 bg-blue-600 text-white rounded-t-lg">Siap Dibuat (Dapur)</h3>
                    <div class="p-4 space-y-4">
                        @forelse ($paidOrders as $order)
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="font-bold text-lg">#{{ $order->id }} - {{ $order->table->name }}</span>
                                    <span class="text-gray-600">{{ $order->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-sm text-gray-700">Oleh: {{ $order->customer_name }}</p>
                                
                                <ul class="text-sm list-disc list-inside my-2">
                                    @foreach ($order->orderItems as $item)
                                        <li>{{ $item->quantity }}x {{ $item->product->name }}</li>
                                    @endforeach
                                </ul>

                                <!-- Tombol Aksi untuk Dapur -->
                                <form action="{{ route('pos.order.updateStatus', $order) }}" method="POST" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="status" value="processing">
                                    <button type="submit" class="w-full py-2 px-4 bg-yellow-600 text-white rounded-md shadow-md hover:bg-yellow-700">
                                        Mulai Proses Pesanan
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm p-4 text-center">Tidak ada pesanan untuk dibuat.</p>
                        @endforelse
                    </div>
                </div>

                <!-- 3. KOLOM: SEDANG DIPROSES (Processing) -->
                <div class="bg-gray-100 rounded-lg shadow-inner">
                    <h3 class="text-lg font-semibold p-4 bg-purple-600 text-white rounded-t-lg">Sedang Diproses</h3>
                    <div class="p-4 space-y-4">
                        @forelse ($processingOrders as $order)
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="font-bold text-lg">#{{ $order->id }} - {{ $order->table->name }}</span>
                                    <span class="text-gray-600">{{ $order->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-sm text-gray-700">Oleh: {{ $order->customer_name }}</p>
                                
                                <ul class="text-sm list-disc list-inside my-2">
                                    @foreach ($order->orderItems as $item)
                                        <li>{{ $item->quantity }}x {{ $item->product->name }}</li>
                                    @endforeach
                                </ul>

                                <!-- Tombol Aksi untuk Dapur/Pelayan -->
                                <form action="{{ route('pos.order.updateStatus', $order) }}" method="POST" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="status" value="completed">
                                    <button type="submit" class="w-full py-2 px-4 bg-gray-700 text-white rounded-md shadow-md hover:bg-gray-800">
                                        Pesanan Selesai (Completed)
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm p-4 text-center">Tidak ada pesanan yang sedang diproses.</p>
                        @endforelse
                    </div>
                </div>
                
            </div>