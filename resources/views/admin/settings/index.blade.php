<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Kafe') }}
        </h2>
    </x-slot>

    <!-- [Gambar form pengaturan dengan input persentase] -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Pesan Sukses -->
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('admin.settings.update') }}">
                        @csrf <!-- Token Keamanan -->
                        
                        <h3 class="text-lg font-semibold mb-4">Pajak & Biaya Layanan</h3>
                        <p class="text-sm text-gray-600 mb-6">Masukkan angka persentase. Contoh: 11 (untuk 11%) atau 5.5 (untuk 5.5%).</p>

                        <!-- 1. Pajak (Tax) -->
                        <div>
                            <label for="tax_percent" class="block font-medium text-sm text-gray-700">Pajak Restoran (PB1)</label>
                            <div class="flex items-center mt-1">
                                <input id="tax_percent" name="tax_percent" type="number" step="0.01" 
                                       value="{{ old('tax_percent', $tax->value) }}" 
                                       class="block w-full max-w-xs rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                                <span class="ml-2 text-gray-500">%</span>
                            </div>
                            @error('tax_percent')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- 2. Biaya Layanan (Service) -->
                        <div class="mt-6">
                            <label for="service_percent" class="block font-medium text-sm text-gray-700">Biaya Layanan</label>
                            <div class="flex items-center mt-1">
                                <input id="service_percent" name="service_percent" type="number" step="0.01" 
                                       value="{{ old('service_percent', $service->value) }}" 
                                       class="block w-full max-w-xs rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                                <span class="ml-2 text-gray-500">%</span>
                            </div>
                            @error('service_percent')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        

                        <!-- Tombol Simpan -->
                        <div class="flex items-center justify-end mt-8 border-t border-gray-200 pt-6">
                            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300">
                                Simpan Pengaturan
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>