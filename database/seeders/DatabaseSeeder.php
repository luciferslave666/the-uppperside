<?php
// File: database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Table;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Akun Admin dan Karyawan
        // Password default untuk semua adalah "password"
        User::factory()->create([
            'name' => 'Admin Kafe',
            'email' => 'admin@kafe.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Karyawan Kasir',
            'email' => 'kasir@kafe.com',
            'role' => 'karyawan',
            'password' => bcrypt('password'),
        ]);

        // 2. Buat Kategori (secara spesifik, bukan palsu)
        $makanan = Category::create(['name' => 'Makanan Berat', 'slug' => 'makanan-berat']);
        $minuman = Category::create(['name' => 'Minuman', 'slug' => 'minuman']);
        $snack = Category::create(['name' => 'Snack', 'slug' => 'snack']);

        // 3. Buat Meja (10 Meja + 1 Take Away)
        // 'sequence' sangat berguna untuk membuat data berurutan
        Table::factory()->count(10)->sequence(
            fn ($sequence) => ['name' => 'Meja ' . ($sequence->index + 1)],
        )->create();
        
        Table::factory()->create(['name' => 'Take Away']);

        // 4. Buat Produk untuk setiap kategori
        // Kita gunakan 'for()' untuk menghubungkan produk ke kategori
        
        // Buat 10 produk Makanan
        Product::factory(10)->for($makanan)->create();
        
        // Buat 15 produk Minuman
        Product::factory(15)->for($minuman)->create();
        
        // Buat 8 produk Snack
        Product::factory(8)->for($snack)->create();
    }
}