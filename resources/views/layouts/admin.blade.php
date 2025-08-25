<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel - BEM UNRI')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Vue.js 3 -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    
    <style>
        [v-cloak] { display: none !important; }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Admin Sidebar -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg border-r border-gray-200">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 bg-gradient-to-r from-blue-600 to-blue-700">
                <h1 class="text-xl font-bold text-white">Admin BEM UNRI</h1>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-8">
                <div class="px-4 space-y-2">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v5H8V5z"></path>
                        </svg>
                        Dashboard
                    </a>
                    
                    <a href="{{ route('admin.news.index') }}" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition-colors {{ request()->routeIs('admin.news.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m0 0V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2h-2z"></path>
                        </svg>
                        Kelola News
                    </a>
                    
                    <a href="{{ route('admin.student-info.index') }}" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition-colors {{ request()->routeIs('admin.student-info.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-1.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                        Kelola Student Info
                    </a>
                       
                    <a href="{{ route('admin.events.index') }}" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition-colors {{ request()->routeIs('admin.events.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m0 0V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2h-2z"></path>
                        </svg>
                        Kelola Events   
                    </a>
                </div>
                
                <!-- User Menu -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="px-4">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-sm">
                                    {{ substr(session('admin_user_name', 'A'), 0, 1) }}
                                </span>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-700">{{ session('admin_user_name', 'Admin') }}</p>
                                <p class="text-xs text-gray-500">{{ session('admin_username', 'admin') }}</p>
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <a href="{{ route('home') }}" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Lihat Website
                            </a>
                            
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 rounded-lg hover:bg-red-50 hover:text-red-700 transition-colors">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 ml-64">
            @yield('content')
        </div>
    </div>
    
    <!-- Toast Notification -->
    <div id="toast" class="fixed top-4 right-4 z-50 hidden">
        <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            <p id="toast-message"></p>
        </div>
    </div>
    
    <script>
        // Toast notification helper
        window.showToast = function(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            const toastDiv = toast.querySelector('div');
            
            toastMessage.textContent = message;
            
            // Set color based on type
            if (type === 'success') {
                toastDiv.className = 'bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg';
            } else if (type === 'error') {
                toastDiv.className = 'bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg';
            } else if (type === 'warning') {
                toastDiv.className = 'bg-yellow-500 text-white px-6 py-3 rounded-lg shadow-lg';
            }
            
            toast.classList.remove('hidden');
            
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        };

        // Logout confirmation
        document.getElementById('logout-form').addEventListener('submit', function(e) {
            if (!confirm('Yakin ingin logout?')) {
                e.preventDefault();
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>