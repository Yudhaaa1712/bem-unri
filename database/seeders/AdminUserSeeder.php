<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminUser::create([
            'name' => 'Admin BEM UNRI',
            'username' => 'admin',
            'email' => 'admin@bemunri.com',
            'password' => 'admin123', // Akan di-hash otomatis oleh mutator
            'is_active' => true
        ]);

        // Bisa tambah admin lain jika diperlukan
        AdminUser::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@bemunri.com', 
            'password' => 'superadmin123',
            'is_active' => true
        ]);
    }
}