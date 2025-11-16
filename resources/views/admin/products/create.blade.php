<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Produk Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                        @csrf 

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">Nama Produk</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required autofocus>
                            @error('name')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="image" class="block font-medium text-sm text-gray-700">Gambar Produk (Opsional)</label>
                            <input id="image" name="image" type="file" class="block mt-1 w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                hover:file:bg-indigo-100
                            ">
                            @error('image')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="category_id" class="block font-medium text-sm text-gray-700">Kategori</label>
                            <select name="category_id" id="category_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="price" class="block font-medium text-sm text-gray-700">Harga (Rp)</label>
                            <input id="price" name="price" type="number" min="0" value="{{ old('price') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                            @error('price')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi (Opsional)</label>
                            <textarea id="description" name="description" rows="3" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mt-4">
                            <label for="is_available" class="block font-medium text-sm text-gray-700">Status Ketersediaan</label>
                            <select name="is_available" id="is_available" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="1" {{ old('is_available', 1) == 1 ? 'selected' : '' }}>Tersedia</option>
                                <option value="0" {{ old('is_available') == 0 ? 'selected' : '' }}>Habis</option>
                            </select>
                            @error('is_available')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300">
                                Simpan Produk
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>