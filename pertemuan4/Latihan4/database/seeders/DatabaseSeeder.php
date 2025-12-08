<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat User Manual (Agar gampang Login)
        User::create([
            'name' => 'Admin Utama',
            'username' => 'admin', // Pastikan kolom username ada di migrasi, jika tidak hapus baris ini
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        // 2. Buat User Random sisanya
        User::factory(3)->create();

        // 3. Buat Kategori Manual (Agar Dropdown terisi)
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        // 4. Buat Post Dummy
        Post::factory(10)->create();
    }
}