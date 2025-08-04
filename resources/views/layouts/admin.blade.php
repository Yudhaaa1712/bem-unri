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
                  
                    
                    <a href="{{ route('admin.news.index') }}" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition-colors {{ request()->routeIs('admin.news.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m0 0V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2h-2z"></path>
                        </svg>
                        Kelola News
                    </a>
                    
                   
                </div>
                
                <!-- User Menu -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="px-4">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-sm">A</span>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-700">Admin BEM</p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                        </div>
                        
                        <a href="{{ route('home') }}" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 rounded-lg hover:bg-red-50 hover:text-red-700 transition-colors">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Kembali ke Website
                        </a>
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
    </script>
    
    @yield('scripts')
</body>
</html>