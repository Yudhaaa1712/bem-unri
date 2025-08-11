<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // Jika sudah login, redirect ke dashboard
        if (session('admin_user_id')) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'username' => 'required|string',
                'password' => 'required|string'
            ]);

            Log::info('Login attempt for username: ' . $validated['username']);

            // Cari user berdasarkan username atau email
            $admin = AdminUser::where(function($query) use ($validated) {
                $query->where('username', $validated['username'])
                      ->orWhere('email', $validated['username']);
            })->where('is_active', true)->first();

            // Debug log
            Log::info('Admin found: ' . ($admin ? 'Yes (ID: '.$admin->id.')' : 'No'));

            // Cek apakah user ditemukan
            if (!$admin) {
                Log::warning('Login failed: User not found');
                return response()->json([
                    'success' => false,
                    'message' => 'Username atau email tidak ditemukan'
                ], 422);
            }

            // Cek password
            if (!$admin->checkPassword($validated['password'])) {
                Log::warning('Login failed: Wrong password for user ID: ' . $admin->id);
                return response()->json([
                    'success' => false,
                    'message' => 'Password salah'
                ], 422);
            }

            // Update last login
            $admin->update(['last_login' => now()]);

            // Set session
            session([
                'admin_user_id' => $admin->id,
                'admin_user_name' => $admin->name,
                'admin_username' => $admin->username
            ]);

            Log::info('Login successful for user ID: ' . $admin->id);

            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'redirect' => route('admin.dashboard')
            ]);

        } catch (Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem: ' . $e->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        Log::info('Logout for user ID: ' . session('admin_user_id'));
        
        // Hapus session admin
        $request->session()->forget(['admin_user_id', 'admin_user_name', 'admin_username']);
        
        return redirect()->route('admin.login')->with('success', 'Logout berhasil');
    }
}