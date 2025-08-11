<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Admin - BEM UNRI</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Vue.js 3 -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    
    <style>
        [v-cloak] { display: none !important; }
        
        /* Custom responsive utilities */
        @media (max-height: 640px) {
            .min-h-screen {
                min-height: 100vh;
                padding: 1rem 0;
            }
        }
        
        /* Smooth transitions for better UX */
        .transition-all {
            transition: all 0.3s ease;
        }
        
        /* Better focus states */
        .focus-visible\:ring-2:focus-visible {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">
    <div id="login-app" v-cloak class="w-full max-w-sm sm:max-w-md lg:max-w-lg xl:max-w-xl">
        <!-- Login Card -->
        <div class="bg-white rounded-xl shadow-2xl p-6 sm:p-8 lg:p-10 transition-all hover:shadow-3xl">
            <!-- Logo/Header -->
            <div class="text-center mb-6 sm:mb-8">
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Admin BEM UNRI</h1>
                <p class="text-sm sm:text-base text-gray-600">Silakan login untuk melanjutkan</p>
            </div>

            <!-- Alert -->
            <div v-if="alert.show" 
                 :class="alert.type === 'error' ? 'bg-red-50 border-red-200 text-red-700' : 'bg-green-50 border-green-200 text-green-700'" 
                 class="border rounded-lg p-3 sm:p-4 mb-4 sm:mb-6 transition-all">
                <p class="text-xs sm:text-sm">@{{ alert.message }}</p>
            </div>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg p-3 sm:p-4 mb-4 sm:mb-6">
                    <p class="text-xs sm:text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Login Form -->
            <form @submit.prevent="login" class="space-y-4 sm:space-y-6">
                <!-- Username/Email -->
                <div>
                    <label for="username" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">
                        Username atau Email
                    </label>
                    <input 
                        v-model="form.username"
                        type="text" 
                        id="username"
                        required
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors disabled:bg-gray-100 disabled:cursor-not-allowed"
                        placeholder="Masukkan username atau email"
                        :disabled="loading"
                        autocomplete="username"
                    >
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">
                        Password
                    </label>
                    <input 
                        v-model="form.password"
                        type="password" 
                        id="password"
                        required
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors disabled:bg-gray-100 disabled:cursor-not-allowed"
                        placeholder="Masukkan password"
                        :disabled="loading"
                        autocomplete="current-password"
                    >
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit"
                    :disabled="loading"
                    class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 disabled:cursor-not-allowed text-white font-medium py-2 sm:py-3 px-4 text-sm sm:text-base rounded-lg transition-all flex items-center justify-center focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform hover:scale-[1.02] active:scale-[0.98]"
                >
                    <span v-if="loading" class="animate-spin rounded-full h-4 w-4 border-b-2 border-white mr-2"></span>
                    @{{ loading ? 'Memproses...' : 'Login' }}
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-6 sm:mt-8 text-center">
                <p class="text-xs text-gray-500">
                    © 2024 BEM UNRI. Admin Panel.
                </p>
            </div>
        </div>
        
        <!-- Additional responsive info for very small screens -->
        <div class="mt-4 text-center sm:hidden">
            <p class="text-xs text-white/80">
                Untuk pengalaman terbaik, gunakan perangkat dengan layar yang lebih besar
            </p>
        </div>
    </div>

    <script>
        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    loading: false,
                    form: {
                        username: '',
                        password: ''
                    },
                    alert: {
                        show: false,
                        type: 'error',
                        message: ''
                    }
                }
            },
            methods: {
                showAlert(message, type = 'error') {
                    this.alert = {
                        show: true,
                        type: type,
                        message: message
                    };
                    
                    setTimeout(() => {
                        this.alert.show = false;
                    }, 5000);
                },

                async login() {
                    // Validate form before submission
                    if (!this.form.username.trim() || !this.form.password.trim()) {
                        this.showAlert('Username dan password harus diisi');
                        return;
                    }

                    this.loading = true;
                    this.alert.show = false;

                    try {
                        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
                        
                        if (!csrfToken) {
                            throw new Error('CSRF token tidak ditemukan');
                        }

                        console.log('Attempting login for:', this.form.username);

                        const response = await fetch('/admin/login', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify(this.form)
                        });

                        console.log('Response status:', response.status);

                        // Handle non-JSON responses
                        const contentType = response.headers.get('content-type');
                        if (!contentType?.includes('application/json')) {
                            const textResponse = await response.text();
                            console.error('Non-JSON response:', textResponse);
                            throw new Error('Server mengembalikan response yang tidak valid (bukan JSON)');
                        }

                        const data = await response.json();
                        console.log('Response data:', data);

                        if (data.success) {
                            this.showAlert(data.message, 'success');
                            console.log('Login berhasil, redirect ke:', data.redirect);
                            
                            setTimeout(() => {
                                window.location.href = data.redirect;
                            }, 1000);
                        } else {
                            this.showAlert(data.message || 'Login gagal');
                        }

                    } catch (error) {
                        console.error('Login error:', error);
                        let errorMessage = 'Terjadi kesalahan saat login';
                        
                        if (error.name === 'TypeError' && error.message.includes('fetch')) {
                            errorMessage = 'Tidak dapat terhubung ke server. Periksa koneksi internet Anda.';
                        } else if (error.message) {
                            errorMessage = error.message;
                        }
                        
                        this.showAlert(errorMessage);
                    } finally {
                        this.loading = false;
                    }
                },

                // Handle keyboard navigation
                handleKeyPress(event) {
                    if (event.key === 'Enter' && !this.loading) {
                        this.login();
                    }
                }
            },

            mounted() {
                // Focus to username input when page loads
                this.$nextTick(() => {
                    const usernameInput = document.getElementById('username');
                    if (usernameInput) {
                        usernameInput.focus();
                    }
                });
                
                // Debug: check CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
                console.log('CSRF Token available:', !!csrfToken);

                // Add keyboard event listener
                document.addEventListener('keydown', this.handleKeyPress);
            },

            beforeUnmount() {
                // Clean up event listener
                document.removeEventListener('keydown', this.handleKeyPress);
            }
        }).mount('#login-app');
    </script>
</body>
</html>