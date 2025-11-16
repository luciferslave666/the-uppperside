<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah User Baru') }}
        </h2>
    </x-slot>

    <!-- [Gambar form pendaftaran user yang rapi] -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- 
                      Form akan dikirim ke route 'admin.users.store'
                      yang akan ditangani oleh fungsi store() di controller
                    -->
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf <!-- Token Keamanan Wajib Laravel -->

                        <!-- 1. Nama -->
                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">Nama</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required autofocus>
                            @error('name')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- 2. Email -->
                        <div class="mt-4">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                            @error('email')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- 3. Role (Dropdown) -->
                        <div class="mt-4">
                            <label for="role" class="block font-medium text-sm text-gray-700">Role</label>
                            <select name="role" id="role" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="">Pilih Role</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin (Owner)</option>
                                <option value="karyawan" {{ old('role') == 'karyawan' ? 'selected' : '' }}>Karyawan (Kasir/Dapur)</option>
                            </select>
                            @error('role')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- 4. Password -->
                        <div class="mt-4">
                            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                            <input id="password" name="password" type="password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required autocomplete="new-password">
                            @error('password')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <!-- 5. Konfirmasi Password -->
                        <div class="mt-4">
                            <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Konfirmasi Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.users.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300">
                                Simpan User
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>