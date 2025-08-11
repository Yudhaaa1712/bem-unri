@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')

@section('content')
<div id="admin-dashboard-app" v-cloak>
    <!-- Header -->
    <div class="bg-white shadow-sm border-b sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-6 xl:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center py-3 sm:py-0 sm:h-16 gap-2 sm:gap-0">
                <div class="flex items-center">
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Dashboard</h1>
                </div>
                <div class="text-xs sm:text-sm text-gray-500 bg-gray-50 px-2 py-1 rounded-md sm:bg-transparent sm:px-0 sm:py-0">
                    Selamat datang, {{ session('admin_user_name') }}!
                </div>
            </div>
        </div>
    </div>

    <!-- Loading State -->
    <div v-if="loading" class="flex justify-center items-center h-32 sm:h-64">
        <div class="flex flex-col items-center space-y-3">
            <div class="animate-spin rounded-full h-6 w-6 sm:h-8 sm:w-8 border-b-2 border-blue-600"></div>
            <p class="text-xs sm:text-sm text-gray-500">Memuat data...</p>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div v-else class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 py-4 sm:py-6 lg:py-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 mb-6 sm:mb-8">
            <!-- Total News -->
            <div class="bg-white overflow-hidden shadow-sm hover:shadow-md transition-shadow rounded-lg sm:rounded-xl">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 sm:w-8 sm:h-8 bg-blue-500 rounded-md flex items-center justify-center">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m0 0V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2h-2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-2 sm:ml-3 lg:ml-4 w-0 flex-1 min-w-0">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 truncate">Total Berita</dt>
                                <dd class="text-sm sm:text-lg lg:text-xl font-bold text-gray-900">@{{ formatNumber(stats.total || 0) }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Published News -->
            <div class="bg-white overflow-hidden shadow-sm hover:shadow-md transition-shadow rounded-lg sm:rounded-xl">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 sm:w-8 sm:h-8 bg-green-500 rounded-md flex items-center justify-center">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-2 sm:ml-3 lg:ml-4 w-0 flex-1 min-w-0">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 truncate">Dipublikasi</dt>
                                <dd class="text-sm sm:text-lg lg:text-xl font-bold text-gray-900">@{{ formatNumber(stats.published || 0) }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Draft News -->
            <div class="bg-white overflow-hidden shadow-sm hover:shadow-md transition-shadow rounded-lg sm:rounded-xl">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 sm:w-8 sm:h-8 bg-yellow-500 rounded-md flex items-center justify-center">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-2 sm:ml-3 lg:ml-4 w-0 flex-1 min-w-0">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 truncate">Draft</dt>
                                <dd class="text-sm sm:text-lg lg:text-xl font-bold text-gray-900">@{{ formatNumber(stats.draft || 0) }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Views -->
            <div class="bg-white overflow-hidden shadow-sm hover:shadow-md transition-shadow rounded-lg sm:rounded-xl">
                <div class="p-3 sm:p-4 lg:p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-6 h-6 sm:w-8 sm:h-8 bg-purple-500 rounded-md flex items-center justify-center">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-2 sm:ml-3 lg:ml-4 w-0 flex-1 min-w-0">
                            <dl>
                                <dt class="text-xs sm:text-sm font-medium text-gray-500 truncate">Views</dt>
                                <dd class="text-sm sm:text-lg lg:text-xl font-bold text-gray-900">@{{ formatNumber(stats.total_views || 0) }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Stats -->
        <div class="bg-white shadow-sm hover:shadow-md transition-shadow rounded-lg sm:rounded-xl mb-6 sm:mb-8">
            <div class="px-4 py-4 sm:px-6 sm:py-5 lg:p-6">
                <h3 class="text-base sm:text-lg leading-6 font-semibold text-gray-900 mb-3 sm:mb-4">Statistik per Kategori</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                    <div class="text-center p-3 sm:p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                        <div class="text-lg sm:text-2xl font-bold text-blue-600 mb-1">@{{ formatNumber(stats.by_category?.kemendagri || 0) }}</div>
                        <div class="text-xs sm:text-sm font-medium text-blue-800">Kemendagri</div>
                    </div>
                    <div class="text-center p-3 sm:p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                        <div class="text-lg sm:text-2xl font-bold text-green-600 mb-1">@{{ formatNumber(stats.by_category?.kemlu || 0) }}</div>
                        <div class="text-xs sm:text-sm font-medium text-green-800">Kemlu</div>
                    </div>
                    <div class="text-center p-3 sm:p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors">
                        <div class="text-lg sm:text-2xl font-bold text-purple-600 mb-1">@{{ formatNumber(stats.by_category?.sosmas || 0) }}</div>
                        <div class="text-xs sm:text-sm font-medium text-purple-800">Sosmas</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white shadow-sm hover:shadow-md transition-shadow rounded-lg sm:rounded-xl">
            <div class="px-4 py-4 sm:px-6 sm:py-5 lg:p-6">
                <h3 class="text-base sm:text-lg leading-6 font-semibold text-gray-900 mb-3 sm:mb-4">Quick Actions</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                    <!-- Add News -->
                    <a href="{{ route('admin.news.index') }}" 
                       class="group flex items-center p-3 sm:p-4 border border-gray-200 rounded-lg hover:bg-blue-50 hover:border-blue-300 transition-all duration-200 transform hover:scale-105">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-100 group-hover:bg-blue-200 rounded-lg flex items-center justify-center mr-3 sm:mr-4 transition-colors">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="text-sm sm:text-base font-medium text-gray-900 group-hover:text-blue-900 transition-colors">Tambah Berita</div>
                            <div class="text-xs sm:text-sm text-gray-500 group-hover:text-blue-700 transition-colors truncate">Buat berita baru</div>
                        </div>
                    </a>

                    <!-- Manage News -->
                    <a href="{{ route('admin.news.index') }}" 
                       class="group flex items-center p-3 sm:p-4 border border-gray-200 rounded-lg hover:bg-green-50 hover:border-green-300 transition-all duration-200 transform hover:scale-105">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-green-100 group-hover:bg-green-200 rounded-lg flex items-center justify-center mr-3 sm:mr-4 transition-colors">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="text-sm sm:text-base font-medium text-gray-900 group-hover:text-green-900 transition-colors">Kelola Berita</div>
                            <div class="text-xs sm:text-sm text-gray-500 group-hover:text-green-700 transition-colors truncate">Edit atau hapus berita</div>
                        </div>
                    </a>

                    <!-- View Website -->
                    <a href="{{ route('home') }}" target="_blank" 
                       class="group flex items-center p-3 sm:p-4 border border-gray-200 rounded-lg hover:bg-purple-50 hover:border-purple-300 transition-all duration-200 transform hover:scale-105 sm:col-span-2 lg:col-span-1">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-purple-100 group-hover:bg-purple-200 rounded-lg flex items-center justify-center mr-3 sm:mr-4 transition-colors">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2M7 7h10a2 2 0 012 2v6a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2z"></path>
                            </svg>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="text-sm sm:text-base font-medium text-gray-900 group-hover:text-purple-900 transition-colors">Lihat Website</div>
                            <div class="text-xs sm:text-sm text-gray-500 group-hover:text-purple-700 transition-colors truncate">Buka halaman publik</div>
                        </div>
                        <div class="ml-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-3 h-3 sm:w-4 sm:h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-4M14 6V4a2 2 0 00-2-2H8a2 2 0 00-2 2v2M7 7h10"></path>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Error State -->
        <div v-if="error" class="mt-6 bg-red-50 border border-red-200 rounded-lg p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.732 15.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Terjadi Kesalahan</h3>
                    <div class="mt-1 text-xs sm:text-sm text-red-700">
                        @{{ error }}
                    </div>
                    <div class="mt-2">
                        <button @click="loadStats" type="button" class="text-xs sm:text-sm bg-red-100 hover:bg-red-200 text-red-800 font-medium py-1 px-2 rounded transition-colors">
                            Coba Lagi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            loading: true,
            error: null,
            stats: {
                total: 0,
                published: 0,
                draft: 0,
                total_views: 0,
                by_category: {
                    kemendagri: 0,
                    kemlu: 0,
                    sosmas: 0
                }
            }
        }
    },
    methods: {
        async loadStats() {
            this.loading = true;
            this.error = null;
            
            try {
                const response = await fetch('/api/admin/news/stats', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                
                // Validate data structure
                if (data && typeof data === 'object') {
                    this.stats = {
                        total: data.total || 0,
                        published: data.published || 0,
                        draft: data.draft || 0,
                        total_views: data.total_views || 0,
                        by_category: {
                            kemendagri: data.by_category?.kemendagri || 0,
                            kemlu: data.by_category?.kemlu || 0,
                            sosmas: data.by_category?.sosmas || 0
                        }
                    };
                } else {
                    throw new Error('Invalid data format received');
                }
                
            } catch (error) {
                console.error('Error loading stats:', error);
                this.error = error.message || 'Gagal memuat statistik dashboard';
                
                // Fallback to demo data for development
                if (process.env.NODE_ENV === 'development') {
                    this.stats = {
                        total: 25,
                        published: 20,
                        draft: 5,
                        total_views: 1250,
                        by_category: {
                            kemendagri: 8,
                            kemlu: 7,
                            sosmas: 10
                        }
                    };
                    this.error = null;
                }
            } finally {
                this.loading = false;
            }
        },
        
        formatNumber(num) {
            if (num >= 1000000) {
                return (num / 1000000).toFixed(1) + 'M';
            } else if (num >= 1000) {
                return (num / 1000).toFixed(1) + 'K';
            }
            return num.toString();
        },
        
        refreshData() {
            this.loadStats();
        }
    },
    
    mounted() {
        this.loadStats();
        
        // Auto refresh every 5 minutes
        setInterval(() => {
            if (!this.loading) {
                this.loadStats();
            }
        }, 300000);
    }
}).mount('#admin-dashboard-app');
</script>
@endsection