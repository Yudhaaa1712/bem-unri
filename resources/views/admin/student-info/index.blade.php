@extends('layouts.admin')

@section('title', 'Kelola Student Info - Admin Panel')

@section('content')
<div id="admin-student-info-app" v-cloak>
    <!-- Header -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-gray-900">Admin Student Info</h1>
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
                    Tambah Informasi Mahasiswa
                </button>
            </div>
        </div>
    </div>

    <!-- Loading State -->
    <div v-if="loading" class="flex justify-center items-center h-64">
        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
    </div>

    <!-- Student Info List -->
    <div v-else class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="p-6">
                <h2 class="text-lg font-semibold mb-4">Daftar Informasi Mahasiswa</h2>
                
                <!-- Empty State -->
                <div v-if="studentInfos.length === 0" class="text-center py-8">
                    <p class="text-gray-500">Belum ada informasi mahasiswa. Klik "Tambah Informasi Mahasiswa" untuk menambah informasi pertama.</p>
                </div>

                <!-- Student Info List -->
                <div v-else class="space-y-4">
                    <div v-for="item in studentInfos" :key="item.id" class="border rounded-lg p-4 hover:bg-gray-50">
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
                                <button @click="deleteStudentInfo(item)" class="text-red-600 hover:text-red-900 text-sm transition-colors">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Informasi Mahasiswa -->
    <div v-if="showCreateModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-lg max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-900">Tambah Informasi Mahasiswa</h2>
                    <button @click="closeModal" class="text-gray-400 hover:text-gray-600">×</button>
                </div>
            </div>
            
            <form @submit.prevent="saveStudentInfo" class="p-6 space-y-6">
                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul *</label>
                    <input v-model="form.title" type="text" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan judul informasi">
                </div>
                
                <!-- Ringkasan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ringkasan *</label>
                    <textarea v-model="form.excerpt" required rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan ringkasan informasi" maxlength="500"></textarea>
                    <p class="text-sm text-gray-500 mt-1">@{{ form.excerpt.length }}/500 karakter</p>
                </div>
                
                <!-- Konten -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Konten *</label>
                    <textarea v-model="form.content" required rows="8" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan konten informasi"></textarea>
                </div>
                
                <!-- Kategori dan Author -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                        <select v-model="form.category" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="" disabled>-- Pilih Kategori --</option>
                            <option value="prestasi">Prestasi</option>
                            <option value="beasiswa">Beasiswa</option>
                            <option value="informasi_akademik">Informasi Akademik</option>
                            <option value="kegiatan_mahasiswa">Kegiatan Mahasiswa</option>
                            <option value="pengumuman">Pengumuman</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Author *</label>
                        <input v-model="form.author" type="text" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Nama penulis">
                    </div>
                </div>
                
                <!-- Upload Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Informasi</label>
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
            studentInfos: [],
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
                category: 'prestasi',
                author: 'Admin BEM',
                tags: '',
                is_published: false
            }
        }
    },
    methods: {
        async loadStudentInfos() {
            this.loading = true;
            try {
                const response = await fetch('/api/admin/student-info');
                const data = await response.json();
                this.studentInfos = data.data || data;
            } catch (error) {
                console.error('Error loading student infos:', error);
            } finally {
                this.loading = false;
            }
        },
        
        async loadStats() {
            try {
                const response = await fetch('/api/admin/student-info/stats');
                const data = await response.json();
                this.stats = data;
            } catch (error) {
                console.error('Error loading stats:', error);
            }
        },
        
        getCategoryName(category) {
            const categories = {
                prestasi: 'Prestasi',
                beasiswa: 'Beasiswa',
                informasi_akademik: 'Informasi Akademik',
                kegiatan_mahasiswa: 'Kegiatan Mahasiswa',
                pengumuman: 'Pengumuman'
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
                const response = await fetch(`/api/admin/student-info/${item.id}/toggle-publish`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                
                if (response.ok) {
                    await this.loadStudentInfos();
                    await this.loadStats();
                    if (window.showToast) {
                        window.showToast('Status berhasil diubah');
                    }
                } else {
                    const errorData = await response.json();
                    console.error('Toggle publish error:', errorData);
                    alert('Gagal mengubah status: ' + (errorData.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error toggling publish:', error);
                alert('Gagal mengubah status informasi');
            }
        },
        
        async deleteStudentInfo(item) {
            if (!confirm(`Yakin ingin menghapus informasi "${item.title}"?`)) return;
            
            try {
                const response = await fetch(`/api/admin/student-info/${item.id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                
                if (response.ok) {
                    await this.loadStudentInfos();
                    await this.loadStats();
                    if (window.showToast) {
                        window.showToast('Informasi mahasiswa berhasil dihapus');
                    }
                } else {
                    const errorData = await response.json();
                    console.error('Delete error:', errorData);
                    alert('Gagal menghapus informasi: ' + (errorData.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error deleting student info:', error);
                alert('Gagal menghapus informasi mahasiswa');
            }
        },
        
        async saveStudentInfo() {
            this.saving = true;
            
            try {
                // Validasi client-side
                if (!this.form.title.trim()) {
                    alert('Judul harus diisi!');
                    return;
                }
                if (!this.form.excerpt.trim()) {
                    alert('Ringkasan harus diisi!');
                    return;
                }
                if (!this.form.content.trim()) {
                    alert('Konten harus diisi!');
                    return;
                }
                if (!this.form.category) {
                    alert('Kategori harus dipilih!');
                    return;
                }
                if (!this.form.author.trim()) {
                    alert('Author harus diisi!');
                    return;
                }

                const formData = new FormData();
                
                Object.keys(this.form).forEach(key => {
                    if (this.form[key] !== null && this.form[key] !== '') {
                        formData.append(key, this.form[key]);
                    }
                });
                
                if (this.selectedFile) {
                    formData.append('image', this.selectedFile);
                }
                
                const response = await fetch('/api/admin/student-info', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });
                
                console.log('Response status:', response.status);
                console.log('Response content-type:', response.headers.get('content-type'));
                
                if (response.ok) {
                    const result = await response.json();
                    console.log('Success response:', result);
                    
                    this.closeModal();
                    await this.loadStudentInfos();
                    await this.loadStats();
                    
                    if (window.showToast) {
                        window.showToast('Informasi mahasiswa berhasil disimpan');
                    } else {
                        alert('Informasi mahasiswa berhasil disimpan!');
                    }
                } else {
                    // Check if response is JSON or HTML
                    const contentType = response.headers.get('content-type');
                    let errorMessage = 'Gagal menyimpan informasi mahasiswa';
                    
                    if (contentType && contentType.includes('application/json')) {
                        try {
                            const errorData = await response.json();
                            console.error('Server error response:', errorData);
                            
                            if (errorData.errors) {
                                const firstError = Object.values(errorData.errors)[0];
                                if (Array.isArray(firstError)) {
                                    errorMessage += ': ' + firstError[0];
                                }
                            } else if (errorData.message) {
                                errorMessage += ': ' + errorData.message;
                            }
                        } catch (parseError) {
                            console.error('JSON parse error:', parseError);
                            errorMessage += ': Error parsing response';
                        }
                    } else {
                        // Response is HTML (likely error page)
                        const htmlText = await response.text();
                        console.error('Server returned HTML instead of JSON:', htmlText.substring(0, 200));
                        
                        if (response.status === 419) {
                            errorMessage = 'Session expired. Please refresh the page and try again.';
                        } else if (response.status === 401 || response.status === 403) {
                            errorMessage = 'Unauthorized. Please login again.';
                        } else if (response.status >= 500) {
                            errorMessage = 'Server error. Please try again later.';
                        } else {
                            errorMessage += ` (Status: ${response.status})`;
                        }
                    }
                    
                    alert(errorMessage);
                }
            } catch (error) {
                console.error('Network/JS Error:', error);
                alert('Gagal menyimpan informasi mahasiswa: ' + error.message);
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
                category: 'prestasi',
                author: 'Admin BEM',
                tags: '',
                is_published: false
            };
            this.removeImage();
        }
    },
    
    mounted() {
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (!csrfToken) {
            console.error('CSRF token not found! Make sure to add <meta name="csrf-token" content="{{ csrf_token() }}"> in your layout head.');
        } else {
            console.log('CSRF token found:', csrfToken.content.substring(0, 10) + '...');
        }
        
        this.loadStudentInfos();
        this.loadStats();
    }
}).mount('#admin-student-info-app');
</script>
@endsection