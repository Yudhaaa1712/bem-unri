<!-- resources/js/pages/NewsPage.vue -->
<template>
  <div class="min-h-screen bg-gradient-to-br from-biru-langit-50 to-white">
    <Header />
    
    <!-- News Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-biru-langit-600 to-biru-langit-800 text-white overflow-hidden">
      <div class="absolute inset-0 bg-black/20"></div>
      
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
          <h1 class="text-5xl lg:text-7xl font-bold mb-6">
            <span class="text-kuning-emas-400">Biru Langit</span> News
          </h1>
          <div class="h-1 w-32 bg-gradient-to-r from-kuning-emas-400 to-kuning-emas-600 rounded-full mx-auto mb-8"></div>
          <p class="text-xl lg:text-2xl text-biru-langit-100 max-w-3xl mx-auto leading-relaxed">
            Portal berita dan informasi terkini dari BEM UNRI Kabinet Biru Langit. 
            Tetap update dengan kegiatan, program, dan pencapaian terbaru kami.
          </p>
        </div>
      </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-12 bg-white shadow-lg">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
          <!-- Search Bar -->
          <div class="flex-1 max-w-2xl">
            <div class="relative">
              <input
                v-model="searchQuery"
                type="text"
                placeholder="Cari berita..."
                class="w-full pl-12 pr-4 py-4 border-2 border-biru-langit-200 rounded-xl focus:border-biru-langit-500 focus:ring-2 focus:ring-biru-langit-200 transition-all duration-200 text-lg"
              >
              <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-6 h-6 text-biru-langit-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
          </div>

          <!-- Category Filter -->
          <div class="flex flex-wrap gap-3">
            <button 
              @click="activeFilter = 'all'"
              :class="activeFilter === 'all' ? 'btn-primary' : 'btn-secondary'"
              class="px-6 py-3 rounded-full font-semibold transition-all duration-300"
            >
              Semua Berita
            </button>
            <button 
              @click="activeFilter = 'kemendagri'"
              :class="activeFilter === 'kemendagri' ? 'btn-primary' : 'btn-secondary'"
              class="px-6 py-3 rounded-full font-semibold transition-all duration-300"
            >
              Kemendagri
            </button>
            <button 
              @click="activeFilter = 'kemlu'"
              :class="activeFilter === 'kemlu' ? 'btn-primary' : 'btn-secondary'"
              class="px-6 py-3 rounded-full font-semibold transition-all duration-300"
            >
              Kemlu
            </button>
            <button 
              @click="activeFilter = 'sosmas'"
              :class="activeFilter === 'sosmas' ? 'btn-primary' : 'btn-secondary'"
              class="px-6 py-3 rounded-full font-semibold transition-all duration-300"
            >
              Sosmas
            </button>
          </div>
        </div>

        <!-- Results Info -->
        <div class="mt-6 text-center lg:text-left">
          <p class="text-gray-600">
            <span class="font-semibold text-biru-langit-700">{{ filteredNews.length }}</span> 
            berita ditemukan
            <span v-if="searchQuery" class="ml-2">
              untuk "<span class="font-semibold text-kuning-emas-600">{{ searchQuery }}</span>"
            </span>
          </p>
        </div>
      </div>
    </section>

    <!-- News Grid Section -->
    <section class="py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- News Grid -->
        <div v-if="filteredNews.length > 0" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
          <div 
            v-for="news in paginatedNews" 
            :key="news.id"
            class="card group cursor-pointer"
            @click="openNewsDetail(news)"
          >
            <!-- News Image -->
            <div class="aspect-video bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 flex items-center justify-center">
              <div class="text-center">
                <div class="w-16 h-16 bg-biru-langit-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-biru-langit-600 transition-colors">
                  <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m0 0V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2h-2z"></path>
                  </svg>
                </div>
                <p class="text-biru-langit-600 font-semibold">Foto Berita</p>
              </div>
            </div>

            <!-- News Content -->
            <div class="p-6">
              <div class="flex items-center space-x-2 mb-3">
                <span 
                  :class="getCategoryClass(news.category)"
                  class="px-3 py-1 text-xs font-semibold rounded-full"
                >
                  {{ getCategoryName(news.category) }}
                </span>
                <span class="text-gray-500 text-sm">{{ formatDate(news.created_at) }}</span>
              </div>
              
              <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
                {{ news.title }}
              </h3>
              
              <p class="text-gray-600 mb-4 line-clamp-3">
                {{ news.excerpt }}
              </p>
              
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">{{ news.author }}</span>
                <span class="text-biru-langit-600 font-semibold text-sm hover:text-kuning-emas-600 transition-colors">
                  Baca Selengkapnya →
                </span>
              </div>
            </div>
          </div>
        </div>

        <!-- Empty State -->
        <div v-else class="text-center py-16">
          <div class="w-24 h-24 bg-biru-langit-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-biru-langit-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m0 0V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2h-2z"></path>
            </svg>
          </div>
          <h3 class="text-2xl font-bold text-gray-800 mb-4">Tidak Ada Berita Ditemukan</h3>
          <p class="text-gray-600 mb-6">
            Maaf, tidak ada berita yang sesuai dengan pencarian atau filter yang Anda pilih.
          </p>
          <button 
            @click="resetFilters"
            class="btn-primary px-6 py-3"
          >
            Reset Filter
          </button>
        </div>

        <!-- Pagination -->
        <div v-if="totalPages > 1" class="flex justify-center">
          <nav class="flex items-center space-x-2">
            <button
              @click="currentPage = currentPage - 1"
              :disabled="currentPage === 1"
              :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-biru-langit-600'"
              class="px-4 py-2 bg-biru-langit-500 text-white rounded-lg transition-colors"
            >
              ←
            </button>

            <button
              v-for="page in totalPages"
              :key="page"
              @click="currentPage = page"
              :class="page === currentPage ? 'bg-biru-langit-600 text-white' : 'bg-white text-biru-langit-600 hover:bg-biru-langit-50'"
              class="px-4 py-2 rounded-lg font-semibold transition-colors border border-biru-langit-200"
            >
              {{ page }}
            </button>

            <button
              @click="currentPage = currentPage + 1"
              :disabled="currentPage === totalPages"
              :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-biru-langit-600'"
              class="px-4 py-2 bg-biru-langit-500 text-white rounded-lg transition-colors"
            >
              →
            </button>
          </nav>
        </div>
      </div>
    </section>

    <!-- News Detail Modal -->
    <div v-if="selectedNews" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
      <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="sticky top-0 bg-white border-b border-gray-200 p-6 rounded-t-2xl">
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
              <span 
                :class="getCategoryClass(selectedNews.category)"
                class="px-3 py-1 text-xs font-semibold rounded-full"
              >
                {{ getCategoryName(selectedNews.category) }}
              </span>
              <span class="text-gray-500 text-sm">{{ formatDate(selectedNews.created_at) }}</span>
            </div>
            <button 
              @click="closeNewsDetail"
              class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center transition-colors"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
        </div>

        <!-- Modal Content -->
        <div class="p-6">
          <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ selectedNews.title }}</h1>
          
          <!-- News Image -->
          <div class="aspect-video bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 rounded-xl flex items-center justify-center mb-6">
            <div class="text-center">
              <div class="w-20 h-20 bg-biru-langit-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
              </div>
              <p class="text-biru-langit-600 font-semibold">Gambar Berita</p>
            </div>
          </div>

          <!-- News Meta -->
          <div class="flex items-center space-x-4 text-sm text-gray-600 mb-6 pb-6 border-b border-gray-200">
            <span>📝 {{ selectedNews.author }}</span>
            <span>👁️ {{ selectedNews.views || 0 }} views</span>
            <span>📅 {{ formatDate(selectedNews.created_at) }}</span>
          </div>

          <!-- News Content -->
          <div class="prose max-w-none">
            <div v-html="selectedNews.content || selectedNews.excerpt"></div>
          </div>

          <!-- Tags -->
          <div v-if="selectedNews.tags && selectedNews.tags.length > 0" class="mt-8 pt-6 border-t border-gray-200">
            <h4 class="text-sm font-semibold text-gray-700 mb-3">Tags:</h4>
            <div class="flex flex-wrap gap-2">
              <span 
                v-for="tag in selectedNews.tags" 
                :key="tag"
                class="px-3 py-1 bg-biru-langit-100 text-biru-langit-700 text-xs rounded-full"
              >
                #{{ tag }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <Footer />
  </div>
</template>

<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'

export default {
  name: 'NewsPage',
  components: {
    Header,
    Footer
  },
  data() {
    return {
      allNews: [],
      searchQuery: '',
      activeFilter: 'all',
      selectedNews: null,
      currentPage: 1,
      itemsPerPage: 9
    }
  },
  computed: {
    filteredNews() {
      let filtered = this.allNews

      // Filter by category
      if (this.activeFilter !== 'all') {
        filtered = filtered.filter(news => news.category === this.activeFilter)
      }

      // Filter by search query
      if (this.searchQuery) {
        const query = this.searchQuery.toLowerCase()
        filtered = filtered.filter(news => 
          news.title.toLowerCase().includes(query) ||
          news.excerpt.toLowerCase().includes(query) ||
          news.author.toLowerCase().includes(query)
        )
      }

      return filtered
    },
    paginatedNews() {
      const start = (this.currentPage - 1) * this.itemsPerPage
      const end = start + this.itemsPerPage
      return this.filteredNews.slice(start, end)
    },
    totalPages() {
      return Math.ceil(this.filteredNews.length / this.itemsPerPage)
    }
  },
  watch: {
    filteredNews() {
      // Reset to first page when filter changes
      this.currentPage = 1
    }
  },
  mounted() {
    this.loadNews()
  },
  methods: {
    async loadNews() {
      try {
        const response = await fetch('/api/news')
        this.allNews = await response.json()
      } catch (error) {
        console.error('Error loading news:', error)
        // Use dummy data as fallback
        this.allNews = this.getDummyNews()
      }
    },
    getDummyNews() {
      return [
        {
          id: 1,
          title: 'Workshop Pengembangan Organisasi Mahasiswa',
          excerpt: 'BEM UNRI mengadakan workshop pengembangan organisasi mahasiswa yang diikuti oleh seluruh pengurus organisasi di lingkungan Universitas Riau. Workshop ini bertujuan untuk meningkatkan kapasitas organisasi.',
          content: '<p>BEM UNRI dengan bangga mengumumkan pelaksanaan Workshop Pengembangan Organisasi Mahasiswa yang telah berlangsung dengan sukses pada tanggal 15 Maret 2025. Workshop ini diikuti oleh lebih dari 150 pengurus organisasi dari berbagai fakultas di Universitas Riau.</p><p>Acara yang berlangsung selama dua hari ini menghadirkan narasumber kompeten dalam bidang organisasi dan manajemen, termasuk Prof. Dr. Ahmad Suharto selaku Dekan Fakultas Ekonomi dan Dr. Sarah Wulandari, M.Si sebagai praktisi organisasi berpengalaman.</p>',
          category: 'kemendagri',
          author: 'Admin BEM',
          created_at: '2025-03-15',
          views: 245,
          tags: ['workshop', 'organisasi', 'pengembangan']
        },
        {
          id: 2,
          title: 'Kerjasama Internasional dengan Universitas Malaysia',
          excerpt: 'BEM UNRI menjalin kerjasama dengan organisasi mahasiswa dari Universitas Malaysia dalam program pertukaran budaya dan akademik yang akan dilaksanakan tahun ini.',
          content: '<p>Dalam upaya memperluas jaringan internasional dan meningkatkan kualitas pendidikan, BEM UNRI telah menandatangani Memorandum of Understanding (MoU) dengan Student Council Universitas Malaya, Malaysia.</p>',
          category: 'kemlu',
          author: 'Admin BEM',
          created_at: '2025-03-10',
          views: 189,
          tags: ['internasional', 'kerjasama', 'malaysia']
        },
        {
          id: 3,
          title: 'Bakti Sosial di Desa Sungai Pinang',
          excerpt: 'Kegiatan bakti sosial yang melibatkan 100 mahasiswa untuk membantu renovasi sekolah dan memberikan bantuan pendidikan kepada anak-anak desa.',
          content: '<p>BEM UNRI Kabinet Biru Langit kembali menggelar program bakti sosial di Desa Sungai Pinang, Kabupaten Kampar. Kegiatan yang berlangsung selama tiga hari ini melibatkan 100 mahasiswa dari berbagai fakultas.</p>',
          category: 'sosmas',
          author: 'Admin BEM',
          created_at: '2025-03-05',
          views: 156,
          tags: ['baksos', 'pendidikan', 'desa']
        },
        {
          id: 4,
          title: 'Seminar Nasional Teknologi dan Inovasi',
          excerpt: 'BEM UNRI menyelenggarakan seminar nasional dengan tema "Teknologi dan Inovasi untuk Masa Depan Indonesia" yang dihadiri oleh pakar teknologi terkemuka.',
          content: '<p>Seminar Nasional Teknologi dan Inovasi telah sukses diselenggarakan di Auditorium Utama Universitas Riau dengan menghadirkan pembicara dari berbagai kalangan akademisi dan praktisi.</p>',
          category: 'kemendagri',
          author: 'Admin BEM',
          created_at: '2025-02-28',
          views: 312,
          tags: ['seminar', 'teknologi', 'inovasi']
        },
        {
          id: 5,
          title: 'Program Beasiswa untuk Mahasiswa Berprestasi',
          excerpt: 'Peluncuran program beasiswa baru untuk mahasiswa berprestasi dengan total dana hibah mencapai 2 miliar rupiah dari berbagai sponsor.',
          content: '<p>BEM UNRI dengan bangga mengumumkan peluncuran program beasiswa baru yang ditujukan untuk mahasiswa berprestasi di Universitas Riau. Program ini merupakan hasil kerjasama dengan berbagai pihak sponsor.</p>',
          category: 'kemendagri',
          author: 'Admin BEM',
          created_at: '2025-02-25',
          views: 425,
          tags: ['beasiswa', 'prestasi', 'mahasiswa']
        },
        {
          id: 6,
          title: 'Festival Budaya Nusantara 2025',
          excerpt: 'Festival budaya tahunan yang menampilkan keragaman budaya Indonesia dengan partisipasi mahasiswa dari seluruh nusantara.',
          content: '<p>Festival Budaya Nusantara 2025 telah sukses digelar dengan meriah di Lapangan Utama Universitas Riau. Acara ini menampilkan berbagai pertunjukan budaya dari seluruh Indonesia.</p>',
          category: 'sosmas',
          author: 'Admin BEM',
          created_at: '2025-02-20',
          views: 298,
          tags: ['festival', 'budaya', 'nusantara']
        }
      ]
    },
    getCategoryName(category) {
      const categories = {
        'kemendagri': 'Kemendagri',
        'kemlu': 'Kemlu',
        'sosmas': 'Sosmas'
      }
      return categories[category] || 'Umum'
    },
    getCategoryClass(category) {
      const classes = {
        'kemendagri': 'bg-biru-langit-100 text-biru-langit-700',
        'kemlu': 'bg-kuning-emas-100 text-kuning-emas-700',
        'sosmas': 'bg-green-100 text-green-700'
      }
      return classes[category] || 'bg-gray-100 text-gray-700'
    },
    formatDate(date) {
      const options = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
      }
      return new Date(date).toLocaleDateString('id-ID', options)
    },
    openNewsDetail(news) {
      this.selectedNews = news
      document.body.style.overflow = 'hidden'
    },
    closeNewsDetail() {
      this.selectedNews = null
      document.body.style.overflow = 'auto'
    },
    resetFilters() {
      this.searchQuery = ''
      this.activeFilter = 'all'
      this.currentPage = 1
    }
  }
}
</script>