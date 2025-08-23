<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Delete existing admin user (optional)
        User::where('email', 'admin@bem.unri.ac.id')->delete();
        User::where('username', 'admin')->delete();
        
        // Create admin user
        User::create([
            'name' => 'Admin BEM UNRI',
            'username' => 'admin',
            'email' => 'admin@bem.unri.ac.id',
            'password' => Hash::make('admin123'), // Ganti dengan password yang aman
            'role' => 'admin', // Jika ada kolom role
            'is_admin' => true, // Jika ada kolom is_admin
            'email_verified_at' => now(),
        ]);
        
        // Create super admin jika diperlukan
        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@bem.unri.ac.id', 
            'password' => Hash::make('superadmin123'),
            'role' => 'superadmin',
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);
    }
}