@extends('layouts.admin')

@section('title', 'Kelola News - Admin Panel')

@section('content')
<div id="admin-news-app" v-cloak>
    <!-- Header -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-gray-900">Admin News</h1>
                    <div class="ml-6 flex space-x-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            Total: @{{ stats.total }}
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            Published: @{{ stats.published }}
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                            Draft: @{{ stats.draft }}
                        </span>
                    </div>
                </div>
                <button @click="showCreateModal = true" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    Tambah Berita
                </button>
            </div>
        </div>
    </div>

    <!-- Loading State -->
    <div v-if="loading" class="flex justify-center items-center h-64">
        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
    </div>

    <!-- News List -->
    <div v-else class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="p-6">
                <h2 class="text-lg font-semibold mb-4">Daftar Berita</h2>
                
                <!-- Empty State -->
                <div v-if="news.length === 0" class="text-center py-8">
                    <p class="text-gray-500">Belum ada berita. Klik "Tambah Berita" untuk menambah berita pertama.</p>
                </div>

                <!-- News List -->
                <div v-else class="space-y-4">
                    <div v-for="item in news" :key="item.id" class="border rounded-lg p-4 hover:bg-gray-50">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900">@{{ item.title }}</h3>
                                <p class="text-gray-600 text-sm mt-1">@{{ item.excerpt }}</p>
                                <div class="flex items-center space-x-4 mt-2 text-xs text-gray-500">
                                    <span>Kategori: @{{ getCategoryName(item.category) }}</span>
                                    <span>Author: @{{ item.author }}</span>
                                    <span>Views: @{{ item.views || 0 }}</span>
                                    <span v-if="item.image" class="text-green-600">📷 Ada Gambar</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span :class="item.is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'" class="px-2 py-1 text-xs font-semibold rounded-full">
                                    @{{ item.is_published ? 'Published' : 'Draft' }}
                                </span>
                                <button @click="togglePublish(item)" :class="item.is_published ? 'text-yellow-600 hover:text-yellow-900' : 'text-green-600 hover:text-green-900'" class="text-sm transition-colors">
                                    @{{ item.is_published ? 'Unpublish' : 'Publish' }}
                                </button>
                                <button @click="deleteNews(item)" class="text-red-600 hover:text-red-900 text-sm transition-colors">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Berita -->
    <div v-if="showCreateModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-lg max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-900">Tambah Berita</h2>
                    <button @click="closeModal" class="text-gray-400 hover:text-gray-600">×</button>
                </div>
            </div>
            
            <form @submit.prevent="saveNews" class="p-6 space-y-6">
                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul *</label>
                    <input v-model="form.title" type="text" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan judul berita">
                </div>
                
                <!-- Ringkasan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ringkasan *</label>
                    <textarea v-model="form.excerpt" required rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan ringkasan berita" maxlength="500"></textarea>
                    <p class="text-sm text-gray-500 mt-1">@{{ form.excerpt.length }}/500 karakter</p>
                </div>
                
                <!-- Konten -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Konten *</label>
                    <textarea v-model="form.content" required rows="8" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan konten berita"></textarea>
                </div>
                
                <!-- Kategori dan Author -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                        <select v-model="form.category" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="kemendagri">Kemendagri</option>
                            <option value="kemlu">Kemlu</option>
                            <option value="sosmas">Sosmas</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Author *</label>
                        <input v-model="form.author" type="text" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Nama penulis">
                    </div>
                </div>
                
                <!-- Upload Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Berita</label>
                    <input @change="handleImageChange" type="file" accept="image/*" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF (Maks: 2MB)</p>
                    
                    <!-- Preview Gambar -->
                    <div v-if="imagePreview" class="mt-4">
                        <img :src="imagePreview" alt="Preview" class="w-32 h-32 object-cover rounded-lg border">
                        <button @click="removeImage" type="button" class="mt-2 text-red-600 text-sm hover:text-red-800">
                            Hapus Gambar
                        </button>
                    </div>
                </div>
                
                <!-- Tags -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                    <input v-model="form.tags" type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Pisahkan dengan koma">
                </div>
                
                <!-- Publishing Options -->
                <div class="flex items-center">
                    <input v-model="form.is_published" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 mr-2">
                    <label class="text-sm font-medium text-gray-700">Publish sekarang</label>
                </div>
                
                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t">
                    <button type="button" @click="closeModal" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Batal
                    </button>
                    <button type="submit" :disabled="saving" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 disabled:opacity-50 transition-colors">
                        @{{ saving ? 'Menyimpan...' : 'Simpan' }}
                    </button>
                </div>
            </form>
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
            news: [],
            loading: true,
            saving: false,
            showCreateModal: false,
            imagePreview: null,
            selectedFile: null,
            stats: {
                total: 0,
                published: 0,
                draft: 0
            },
            form: {
                title: '',
                excerpt: '',
                content: '',
                category: 'kemendagri',
                author: 'Admin BEM',
                tags: '',
                is_published: false
            }
        }
    },
    methods: {
        async loadNews() {
            this.loading = true;
            try {
                const response = await fetch('/api/admin/news');
                const data = await response.json();
                this.news = data.data || data;
            } catch (error) {
                console.error('Error loading news:', error);
            } finally {
                this.loading = false;
            }
        },
        
        async loadStats() {
            try {
                const response = await fetch('/api/admin/news/stats');
                const data = await response.json();
                this.stats = data;
            } catch (error) {
                console.error('Error loading stats:', error);
            }
        },
        
        getCategoryName(category) {
            const categories = {
                kemendagri: 'Kemendagri',
                kemlu: 'Kemlu', 
                sosmas: 'Sosmas'
            };
            return categories[category] || 'Umum';
        },
        
        handleImageChange(event) {
            const file = event.target.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    event.target.value = '';
                    return;
                }
                
                this.selectedFile = file;
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imagePreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        
        removeImage() {
            this.selectedFile = null;
            this.imagePreview = null;
            const fileInput = document.querySelector('input[type="file"]');
            if (fileInput) fileInput.value = '';
        },
        
        async togglePublish(item) {
            try {
                const response = await fetch(`/api/admin/news/${item.id}/toggle-publish`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                
                if (response.ok) {
                    await this.loadNews();
                    await this.loadStats();
                    window.showToast('Status berhasil diubah');
                }
            } catch (error) {
                console.error('Error toggling publish:', error);
            }
        },
        
        async deleteNews(item) {
            if (!confirm(`Yakin ingin menghapus berita "${item.title}"?`)) return;
            
            try {
                const response = await fetch(`/api/admin/news/${item.id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                
                if (response.ok) {
                    await this.loadNews();
                    await this.loadStats();
                    window.showToast('Berita berhasil dihapus');
                }
            } catch (error) {
                console.error('Error deleting news:', error);
            }
        },
        
        async saveNews() {
            this.saving = true;
            try {
                if (this.selectedFile) {
                    const formData = new FormData();
                    Object.keys(this.form).forEach(key => {
                        if (this.form[key] !== null && this.form[key] !== '') {
                            formData.append(key, this.form[key]);
                        }
                    });
                    formData.append('image', this.selectedFile);
                    
                    const response = await fetch('/api/admin/news', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: formData
                    });
                    
                    if (response.ok) {
                        this.closeModal();
                        await this.loadNews();
                        await this.loadStats();
                        window.showToast('Berita dengan gambar berhasil disimpan');
                    }
                } else {
                    const response = await fetch('/api/admin/news', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify(this.form)
                    });
                    
                    if (response.ok) {
                        this.closeModal();
                        await this.loadNews();
                        await this.loadStats();
                        window.showToast('Berita berhasil disimpan');
                    }
                }
            } catch (error) {
                console.error('Error saving news:', error);
                alert('Gagal menyimpan berita');
            } finally {
                this.saving = false;
            }
        },
        
        closeModal() {
            this.showCreateModal = false;
            this.form = {
                title: '',
                excerpt: '',
                content: '',
                category: 'kemendagri',
                author: 'Admin BEM',
                tags: '',
                is_published: false
            };
            this.removeImage();
        }
    },
    
    mounted() {
        this.loadNews();
        this.loadStats();
    }
}).mount('#admin-news-app');
</script>
@endsection