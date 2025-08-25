<template>
  <div class="min-h-screen bg-gradient-to-br from-biru-langit-50 to-white">
    <Header />
    
    <!-- Student Info Hero Section -->
    <section class="relative py-12 sm:py-16 lg:py-20 bg-gradient-to-br from-biru-langit-600 to-biru-langit-800 text-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-7xl font-bold mb-4 sm:mb-6">
            <span class="text-kuning-emas-400">Student</span> Info
          </h1>
          <div class="h-1 w-20 sm:w-32 bg-gradient-to-r from-kuning-emas-400 to-kuning-emas-600 rounded-full mx-auto mb-4 sm:mb-8"></div>
          <p class="text-base sm:text-lg lg:text-xl xl:text-2xl text-biru-langit-100 max-w-3xl mx-auto leading-relaxed px-4">
            Portal informasi prestasi mahasiswa dan program beasiswa dari BEM UNRI Kabinet Biru Langit. 
            Temukan pencapaian terbaru dan peluang beasiswa untuk mahasiswa UNRI.
          </p>
        </div>
      </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-6 sm:py-8 lg:py-12 bg-white shadow-lg">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 sm:gap-6">
          <!-- Search Bar -->
          <div class="w-full max-w-2xl mx-auto lg:mx-0">
            <div class="relative">
              <input
                v-model="searchQuery"
                type="text"
                :placeholder="getSearchPlaceholder(activeFilter)"
                class="w-full pl-10 sm:pl-12 pr-4 py-3 sm:py-4 border-2 border-biru-langit-200 rounded-xl focus:border-biru-langit-500 focus:ring-2 focus:ring-biru-langit-200 transition-all duration-200 text-sm sm:text-base lg:text-lg"
              >
              <svg class="absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 sm:w-6 sm:h-6 text-biru-langit-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
          </div>

          <!-- Category Filter -->
          <div class="flex flex-wrap gap-2 sm:gap-3">
            <button 
              @click="activeFilter = 'semua'"
              :class="activeFilter === 'semua' ? 'btn-primary' : 'btn-secondary'"
              class="px-3 sm:px-6 py-2 sm:py-3 rounded-full font-semibold transition-all duration-300 text-sm sm:text-base"
            >
              Semua
            </button>
            <button 
              @click="activeFilter = 'prestasi'"
              :class="activeFilter === 'prestasi' ? 'btn-primary' : 'btn-secondary'"
              class="px-3 sm:px-6 py-2 sm:py-3 rounded-full font-semibold transition-all duration-300 text-sm sm:text-base"
            >
              Prestasi
            </button>
            <button 
              @click="activeFilter = 'beasiswa'"
              :class="activeFilter === 'beasiswa' ? 'btn-primary' : 'btn-secondary'"
              class="px-3 sm:px-6 py-2 sm:py-3 rounded-full font-semibold transition-all duration-300 text-sm sm:text-base"
            >
              Beasiswa
            </button>
            <button 
              @click="activeFilter = 'informasi_akademik'"
              :class="activeFilter === 'informasi_akademik' ? 'btn-primary' : 'btn-secondary'"
              class="px-3 sm:px-6 py-2 sm:py-3 rounded-full font-semibold transition-all duration-300 text-sm sm:text-base"
            >
              Info Akademik
            </button>
            <button 
              @click="activeFilter = 'kegiatan_mahasiswa'"
              :class="activeFilter === 'kegiatan_mahasiswa' ? 'btn-primary' : 'btn-secondary'"
              class="px-3 sm:px-6 py-2 sm:py-3 rounded-full font-semibold transition-all duration-300 text-sm sm:text-base"
            >
              Kegiatan
            </button>
            <button 
              @click="activeFilter = 'pengumuman'"
              :class="activeFilter === 'pengumuman' ? 'btn-primary' : 'btn-secondary'"
              class="px-3 sm:px-6 py-2 sm:py-3 rounded-full font-semibold transition-all duration-300 text-sm sm:text-base"
            >
              Pengumuman
            </button>
          </div>
        </div>

        <!-- Results Info -->
        <div class="mt-6 text-center lg:text-left">
          <p class="text-gray-600 text-sm sm:text-base">
            <span class="font-semibold text-biru-langit-700">{{ filteredData.length }}</span> 
            {{ getFilterDisplayName(activeFilter) }} ditemukan
            <span v-if="searchQuery" class="ml-2">
              untuk "<span class="font-semibold text-kuning-emas-600">{{ searchQuery }}</span>"
            </span>
          </p>
        </div>
      </div>
    </section>

    <!-- Content Grid Section -->
    <section class="py-8 sm:py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Unified Grid for All Categories -->
        <div v-if="filteredData.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 mb-12">
          <div 
            v-for="item in paginatedData" 
            :key="item.id"
            class="card group cursor-pointer transform hover:scale-105 transition-all duration-300"
            @click="openDetailModal(item)"
          >
            <!-- Image Section -->
            <div class="aspect-video relative overflow-hidden">
              <img 
                v-if="item.image" 
                :src="item.image" 
                :alt="item.title"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                @error="handleImageError"
              />
              <div 
                v-else 
                :class="getCategoryBgClass(item.original_category)"
                class="w-full h-full flex items-center justify-center"
              >
                <div class="text-center">
                  <div 
                    :class="getCategoryIconClass(item.original_category)"
                    class="w-12 h-12 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mx-auto mb-2 sm:mb-4 group-hover:scale-110 transition-transform duration-300"
                  >
                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path v-if="item.original_category === 'beasiswa'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                      <path v-else-if="item.original_category === 'informasi_akademik'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                      <path v-else-if="item.original_category === 'kegiatan_mahasiswa'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                      <path v-else-if="item.original_category === 'pengumuman'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                      <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                  </div>
                  <p :class="getCategoryTextClass(item.original_category)" class="font-semibold text-xs sm:text-sm">
                    {{ getCategoryDisplayText(item.original_category) }}
                  </p>
                </div>
              </div>
            </div>

            <!-- Content Section -->
            <div class="p-4 sm:p-6">
              <div class="flex flex-wrap items-center gap-2 mb-3">
                <span 
                  :class="getCategoryClass(item.original_category)"
                  class="px-2 sm:px-3 py-1 text-xs font-semibold rounded-full"
                >
                  {{ item.category }}
                </span>
                <span class="text-gray-500 text-xs sm:text-sm">{{ formatDate(item.date) }}</span>
                <span v-if="item.views" class="text-gray-400 text-xs">{{ item.views }} views</span>
              </div>
              
              <h3 class="text-base sm:text-lg lg:text-xl font-bold text-gray-800 mb-2 sm:mb-3 group-hover:text-biru-langit-600 transition-colors line-clamp-2">
                {{ item.title }}
              </h3>
              
              <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base line-clamp-3">
                {{ item.description }}
              </p>
              
              <div class="flex items-center justify-between">
                <div class="flex flex-col">
                  <span class="text-xs sm:text-sm text-gray-500">{{ item.author }}</span>
                  <span v-if="item.type === 'beasiswa' && item.scholarship_amount" class="text-xs sm:text-sm text-kuning-emas-600 font-semibold">
                    {{ formatCurrency(item.scholarship_amount) }}
                  </span>
                </div>
                <span class="text-biru-langit-600 font-semibold text-xs sm:text-sm hover:text-kuning-emas-600 transition-colors">
                  Lihat Detail →
                </span>
              </div>
            </div>
          </div>
        </div>

        <!-- Empty State -->
        <div v-if="filteredData.length === 0" class="text-center py-16">
          <div class="w-24 h-24 bg-biru-langit-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-biru-langit-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path v-if="activeFilter === 'prestasi'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
              <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
            </svg>
          </div>
          <h3 class="text-2xl font-bold text-gray-800 mb-4">
            Tidak Ada {{ activeFilter === 'prestasi' ? 'Prestasi' : 'Beasiswa' }} Ditemukan
          </h3>
          <p class="text-gray-600 mb-6">
            Maaf, tidak ada {{ activeFilter === 'prestasi' ? 'prestasi' : 'beasiswa' }} yang sesuai dengan pencarian atau filter yang Anda pilih.
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
          <nav class="flex items-center space-x-1 sm:space-x-2">
            <button
              @click="currentPage = currentPage - 1"
              :disabled="currentPage === 1"
              :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-biru-langit-600'"
              class="px-2 sm:px-4 py-2 bg-biru-langit-500 text-white rounded-lg transition-colors text-sm sm:text-base"
            >
              ←
            </button>

            <template v-if="totalPages <= 7">
              <button
                v-for="page in totalPages"
                :key="page"
                @click="currentPage = page"
                :class="page === currentPage ? 'bg-biru-langit-600 text-white' : 'bg-white text-biru-langit-600 hover:bg-biru-langit-50'"
                class="px-2 sm:px-4 py-2 rounded-lg font-semibold transition-colors border border-biru-langit-200 text-sm sm:text-base"
              >
                {{ page }}
              </button>
            </template>
            
            <template v-else>
              <button
                @click="currentPage = 1"
                :class="1 === currentPage ? 'bg-biru-langit-600 text-white' : 'bg-white text-biru-langit-600 hover:bg-biru-langit-50'"
                class="px-2 sm:px-4 py-2 rounded-lg font-semibold transition-colors border border-biru-langit-200 text-sm sm:text-base"
              >
                1
              </button>
              <span v-if="currentPage > 3" class="px-2 text-gray-500">...</span>
              
              <button
                v-for="page in getPaginationRange()"
                :key="page"
                @click="currentPage = page"
                :class="page === currentPage ? 'bg-biru-langit-600 text-white' : 'bg-white text-biru-langit-600 hover:bg-biru-langit-50'"
                class="px-2 sm:px-4 py-2 rounded-lg font-semibold transition-colors border border-biru-langit-200 text-sm sm:text-base"
              >
                {{ page }}
              </button>
              
              <span v-if="currentPage < totalPages - 2" class="px-2 text-gray-500">...</span>
              <button
                v-if="totalPages > 1"
                @click="currentPage = totalPages"
                :class="totalPages === currentPage ? 'bg-biru-langit-600 text-white' : 'bg-white text-biru-langit-600 hover:bg-biru-langit-50'"
                class="px-2 sm:px-4 py-2 rounded-lg font-semibold transition-colors border border-biru-langit-200 text-sm sm:text-base"
              >
                {{ totalPages }}
              </button>
            </template>

            <button
              @click="currentPage = currentPage + 1"
              :disabled="currentPage === totalPages"
              :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-biru-langit-600'"
              class="px-2 sm:px-4 py-2 bg-biru-langit-500 text-white rounded-lg transition-colors text-sm sm:text-base"
            >
              →
            </button>
          </nav>
        </div>
      </div>
    </section>

    <!-- Detail Modal -->
    <div v-if="selectedItem" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
      <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="sticky top-0 bg-white border-b border-gray-200 p-6 rounded-t-2xl">
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
              <span 
                v-if="activeFilter === 'prestasi'"
                :class="getAchievementClass(selectedItem.achievement_level)"
                class="px-3 py-1 text-xs font-semibold rounded-full"
              >
                {{ selectedItem.achievement_level }}
              </span>
              <span 
                v-if="activeFilter === 'beasiswa'"
                :class="getStatusClass(selectedItem.status)"
                class="px-3 py-1 text-xs font-semibold rounded-full"
              >
                {{ getStatusText(selectedItem.status) }}
              </span>
              <span class="text-gray-500 text-sm">
                {{ formatDate(activeFilter === 'prestasi' ? selectedItem.date : selectedItem.deadline) }}
              </span>
            </div>
            <button 
              @click="closeDetailModal"
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
          <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ selectedItem.title }}</h1>
          
          <!-- Image -->
          <div class="aspect-video bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 rounded-xl flex items-center justify-center mb-6">
            <div class="text-center">
              <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4"
                   :class="activeFilter === 'prestasi' ? 'bg-biru-langit-500' : 'bg-kuning-emas-500'">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path v-if="activeFilter === 'prestasi'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                  <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                </svg>
              </div>
              <p :class="activeFilter === 'prestasi' ? 'text-biru-langit-600' : 'text-kuning-emas-600'" class="font-semibold">
                {{ activeFilter === 'prestasi' ? 'Dokumentasi Prestasi' : 'Info Beasiswa' }}
              </p>
            </div>
          </div>

          <!-- Content -->
          <div v-if="activeFilter === 'prestasi'" class="space-y-6">
            <!-- Meta Info -->
            <div class="flex items-center space-x-4 text-sm text-gray-600 mb-6 pb-6 border-b border-gray-200">
              <span>👤 {{ selectedItem.student_name }}</span>
              <span>🎓 {{ selectedItem.student_major }}</span>
              <span>📅 {{ formatDate(selectedItem.date) }}</span>
            </div>

            <!-- Description -->
            <div class="prose max-w-none">
              <p class="text-gray-600 leading-relaxed">{{ selectedItem.full_content || selectedItem.description }}</p>
            </div>
          </div>

          <div v-if="activeFilter === 'beasiswa'" class="space-y-6">
            <!-- Meta Info -->
            <div class="flex items-center space-x-4 text-sm text-gray-600 mb-6 pb-6 border-b border-gray-200">
              <span>💰 {{ formatCurrency(selectedItem.scholarship_amount) }}</span>
              <span>📅 Deadline: {{ formatDate(selectedItem.deadline) }}</span>
              <span>📊 {{ getStatusText(selectedItem.status) }}</span>
            </div>

            <!-- Description -->
            <div class="prose max-w-none">
              <p class="text-gray-600 leading-relaxed mb-6">{{ selectedItem.full_content || selectedItem.description }}</p>
              
              <h3 class="text-lg font-semibold text-gray-800 mb-3">Persyaratan:</h3>
              <p class="text-gray-600 leading-relaxed">{{ selectedItem.requirements }}</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-4 pt-6">
              <button 
                v-if="selectedItem.status === 'active'"
                class="btn-primary"
              >
                Daftar Sekarang
              </button>
              <button class="btn-secondary">
                Download Panduan
              </button>
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
  name: 'StudentInfoPage',
  components: {
    Header,
    Footer
  },
  data() {
    return {
      activeFilter: 'semua',
      searchQuery: '',
      selectedItem: null,
      currentPage: 1,
      itemsPerPage: 9,
      allData: [], // Store all student info data
      prestasi: [],
      beasiswa: [],
      informasi_akademik: [],
      kegiatan_mahasiswa: [],
      pengumuman: []
    }
  },
  computed: {
    currentData() {
      if (this.activeFilter === 'semua') {
        return this.allData
      }
      return this[this.activeFilter] || []
    },
    filteredData() {
      let filtered = this.currentData

      // Filter by search query
      if (this.searchQuery) {
        const query = this.searchQuery.toLowerCase()
        filtered = filtered.filter(item => {
          if (this.activeFilter === 'prestasi') {
            return item.title.toLowerCase().includes(query) ||
                   item.student_name.toLowerCase().includes(query) ||
                   item.student_major.toLowerCase().includes(query) ||
                   item.description.toLowerCase().includes(query)
          } else {
            return item.title.toLowerCase().includes(query) ||
                   item.description.toLowerCase().includes(query) ||
                   item.requirements.toLowerCase().includes(query)
          }
        })
      }

      return filtered
    },
    paginatedData() {
      const start = (this.currentPage - 1) * this.itemsPerPage
      const end = start + this.itemsPerPage
      return this.filteredData.slice(start, end)
    },
    totalPages() {
      return Math.ceil(this.filteredData.length / this.itemsPerPage)
    }
  },
  watch: {
    activeFilter() {
      this.currentPage = 1
    },
    filteredData() {
      this.currentPage = 1
    }
  },
  mounted() {
    this.loadData()
    this.checkUrlParams()
  },
  methods: {
    async loadData() {
      try {
        const response = await fetch('/api/student-info')
        const data = await response.json()
        
        console.log('Loaded student info data:', data)
        
        // Process all data with unified structure
        this.allData = data.map(item => this.mapItemToUnified(item))
        
        // Separate data by categories
        this.prestasi = this.allData.filter(item => item.original_category === 'prestasi')
        this.beasiswa = this.allData.filter(item => item.original_category === 'beasiswa')
        this.informasi_akademik = this.allData.filter(item => item.original_category === 'informasi_akademik')
        this.kegiatan_mahasiswa = this.allData.filter(item => item.original_category === 'kegiatan_mahasiswa')
        this.pengumuman = this.allData.filter(item => item.original_category === 'pengumuman')
        
        console.log('All categories loaded:', {
          semua: this.allData.length,
          prestasi: this.prestasi.length,
          beasiswa: this.beasiswa.length,
          informasi_akademik: this.informasi_akademik.length,
          kegiatan_mahasiswa: this.kegiatan_mahasiswa.length,
          pengumuman: this.pengumuman.length
        })
        
      } catch (error) {
        console.error('Error loading student info:', error)
        this.loadDummyData()
      }
    },
    checkUrlParams() {
      const urlParams = new URLSearchParams(window.location.search)
      const tab = urlParams.get('tab')
      if (tab === 'beasiswa') {
        this.activeFilter = 'beasiswa'
      }
    },
    loadDummyData() {
      this.prestasi = [
        {
          id: 1,
          title: 'Lomba Karya Tulis Ilmiah Nasional',
          student_name: 'Ahmad Rizki Pratama',
          student_major: 'Teknik Informatika',
          achievement_level: 'Juara 1',
          description: 'Meraih juara 1 dalam lomba karya tulis ilmiah tingkat nasional dengan tema "Inovasi Teknologi untuk Pembangunan Berkelanjutan". Penelitian yang dilakukan berfokus pada pengembangan sistem smart farming menggunakan IoT untuk meningkatkan produktivitas pertanian di daerah rural.',
          date: '2025-03-15',
          image: null,
          is_active: true
        },
        {
          id: 2,
          title: 'Kompetisi Business Plan Regional',
          student_name: 'Sarah Wulandari',
          student_major: 'Manajemen',
          achievement_level: 'Juara 2',
          description: 'Berhasil meraih juara 2 kompetisi business plan tingkat regional dengan ide bisnis inovatif di bidang agribisnis. Proposal bisnis yang diajukan adalah pengembangan aplikasi marketplace untuk petani lokal yang menghubungkan langsung dengan konsumen.',
          date: '2025-02-20',
          image: null,
          is_active: true
        },
        {
          id: 3,
          title: 'Olimpiade Matematika Nasional',
          student_name: 'Devi Anggraini',
          student_major: 'Matematika',
          achievement_level: 'Juara 3',
          description: 'Meraih medali perunggu dalam Olimpiade Matematika tingkat nasional yang diikuti lebih dari 500 peserta dari seluruh Indonesia. Kompetisi berlangsung selama 3 hari dengan berbagai soal tingkat tinggi di bidang aljabar, geometri, dan kalkulus.',
          date: '2025-01-10',
          image: null,
          is_active: true
        },
        {
          id: 4,
          title: 'Lomba Debat Bahasa Inggris',
          student_name: 'Muhammad Fajar',
          student_major: 'Hubungan Internasional',
          achievement_level: 'Juara 1',
          description: 'Meraih juara 1 dalam lomba debat bahasa Inggris tingkat universitas dengan tema "Climate Change and Global Politics". Tim debat berhasil mengalahkan 20 tim dari berbagai universitas terkemuka di Indonesia.',
          date: '2025-01-25',
          image: null,
          is_active: true
        },
        {
          id: 5,
          title: 'Kompetisi Programming ACM',
          student_name: 'Andi Setiawan',
          student_major: 'Teknik Informatika',
          achievement_level: 'Juara 2',
          description: 'Berhasil meraih peringkat 2 dalam kompetisi programming ACM ICPC tingkat regional. Tim berhasil menyelesaikan 8 dari 12 soal dalam waktu 5 jam dengan algoritma yang efisien dan optimal.',
          date: '2024-12-15',
          image: null,
          is_active: true
        },
        {
          id: 6,
          title: 'Lomba Fotografi Nasional',
          student_name: 'Putri Maharani',
          student_major: 'Seni Rupa',
          achievement_level: 'Juara 3',
          description: 'Meraih juara 3 dalam lomba fotografi nasional kategori landscape dengan karya "Keindahan Alam Riau". Foto dipilih dari lebih dari 1000 karya yang masuk dari seluruh Indonesia.',
          date: '2024-11-20',
          image: null,
          is_active: true
        },
        {
          id: 7,
          title: 'Kompetisi Startup Mahasiswa',
          student_name: 'Ricky Hamdani',
          student_major: 'Sistem Informasi',
          achievement_level: 'Juara 1',
          description: 'Memenangkan kompetisi startup mahasiswa tingkat nasional dengan aplikasi "EduConnect" yang membantu siswa di daerah terpencil mengakses pendidikan berkualitas melalui platform digital.',
          date: '2024-10-30',
          image: null,
          is_active: true
        },
        {
          id: 8,
          title: 'Lomba Desain UI/UX',
          student_name: 'Indira Sari',
          student_major: 'Desain Komunikasi Visual',
          achievement_level: 'Juara 2',
          description: 'Meraih juara 2 dalam lomba desain UI/UX untuk aplikasi mobile dengan tema "Sustainable Living". Desain yang dibuat fokus pada user experience yang intuitif dan ramah lingkungan.',
          date: '2024-09-15',
          image: null,
          is_active: true
        },
        {
          id: 9,
          title: 'Kompetisi Robotika',
          student_name: 'Bayu Pratama',
          student_major: 'Teknik Elektro',
          achievement_level: 'Juara 3',
          description: 'Berhasil meraih juara 3 dalam kompetisi robotika tingkat regional dengan robot yang mampu melakukan sorting otomatis berdasarkan warna dan bentuk objek menggunakan computer vision.',
          date: '2024-08-20',
          image: null,
          is_active: true
        }
      ]

      this.beasiswa = [
        {
          id: 1,
          title: 'Beasiswa Prestasi Akademik',
          description: 'Program beasiswa untuk mahasiswa berprestasi dengan IPK minimal 3.50. Beasiswa ini mencakup biaya kuliah penuh dan tunjangan bulanan untuk kebutuhan hidup sehari-hari. Program ini bertujuan untuk mendukung mahasiswa berprestasi agar dapat fokus pada studi dan pengembangan diri.',
          scholarship_amount: 10000000,
          deadline: '2025-06-30',
          requirements: 'IPK minimal 3.50, Surat rekomendasi dari dosen, Essay motivasi maksimal 1000 kata, Fotocopy transkrip nilai, Surat keterangan aktif kuliah, Sertifikat prestasi akademik',
          status: 'active',
          is_active: true
        },
        {
          id: 2,
          title: 'Beasiswa Bantuan Sosial',
          description: 'Program bantuan untuk mahasiswa kurang mampu dengan prestasi akademik yang baik. Beasiswa ini memberikan bantuan biaya hidup dan pendidikan untuk meringankan beban finansial keluarga. Prioritas diberikan kepada mahasiswa yang menunjukkan potensi akademik yang baik.',
          scholarship_amount: 3000000,
          deadline: '2025-07-15',
          requirements: 'Surat keterangan tidak mampu dari kelurahan, IPK minimal 3.00, Surat rekomendasi dari dosen wali, Slip gaji orang tua atau surat keterangan penghasilan, Surat pernyataan bermaterai',
          status: 'active',
          is_active: true
        },
        {
          id: 3,
          title: 'Beasiswa Penelitian',
          description: 'Khusus untuk mahasiswa yang aktif dalam kegiatan penelitian dan publikasi ilmiah. Program ini mendukung riset inovatif yang berkontribusi pada pengembangan ilmu pengetahuan dan teknologi. Penerima beasiswa akan mendapat bimbingan intensif dari dosen senior.',
          scholarship_amount: 15000000,
          deadline: '2025-08-31',
          requirements: 'Proposal penelitian yang detail, Minimal satu publikasi ilmiah, Surat rekomendasi dari dosen pembimbing, Portofolio penelitian sebelumnya, Rencana timeline penelitian',
          status: 'active',
          is_active: true
        },
        {
          id: 4,
          title: 'Beasiswa Organisasi',
          description: 'Untuk mahasiswa yang aktif dalam organisasi kemahasiswaan dan memiliki kontribusi nyata bagi kampus. Beasiswa ini menghargai dedikasi dalam kegiatan non-akademik yang mendukung pengembangan soft skills dan kepemimpinan mahasiswa.',
          scholarship_amount: 5000000,
          deadline: '2025-09-15',
          requirements: 'Sertifikat keaktifan organisasi minimal 2 tahun, Portfolio kegiatan dan pencapaian, Essay tentang kontribusi terhadap kampus, Surat rekomendasi dari pembina organisasi',
          status: 'coming_soon',
          is_active: true
        },
        {
          id: 5,
          title: 'Beasiswa Kewirausahaan',
          description: 'Program khusus untuk mahasiswa yang memiliki jiwa entrepreneurship dan rencana bisnis yang inovatif. Beasiswa ini mendukung pengembangan startup mahasiswa dengan mentoring dari praktisi bisnis berpengalaman.',
          scholarship_amount: 8000000,
          deadline: '2025-10-30',
          requirements: 'Business plan yang lengkap dan feasible, Prototype produk atau jasa, Pengalaman wirausaha sebelumnya, Mentor bisnis yang mendukung, Presentasi pitch bisnis',
          status: 'coming_soon',
          is_active: true
        },
        {
          id: 6,
          title: 'Beasiswa Internasional',
          description: 'Beasiswa untuk program pertukaran mahasiswa ke luar negeri. Program ini memberikan kesempatan belajar di universitas partner dengan fasilitas lengkap dan pengalaman internasional yang berharga untuk pengembangan karir.',
          scholarship_amount: 25000000,
          deadline: '2025-11-15',
          requirements: 'TOEFL/IELTS dengan skor minimal, IPK minimal 3.70, Surat rekomendasi dalam bahasa Inggris, Essay dalam bahasa Inggris, Pengalaman organisasi internasional',
          status: 'coming_soon',
          is_active: true
        },
        {
          id: 7,
          title: 'Beasiswa Teknologi',
          description: 'Program beasiswa khusus untuk mahasiswa bidang teknologi dan informatika yang menunjukkan kemampuan exceptional dalam programming, AI, atau cybersecurity. Beasiswa ini juga menyediakan akses ke bootcamp dan sertifikasi internasional.',
          scholarship_amount: 12000000,
          deadline: '2025-12-20',
          requirements: 'Portfolio project teknologi, Sertifikat kemampuan programming, Kontribusi open source project, Rekomendasi dari industri teknologi, Technical interview',
          status: 'coming_soon',
          is_active: true
        },
        {
          id: 8,
          title: 'Beasiswa Seni dan Budaya',
          description: 'Beasiswa untuk mahasiswa yang berprestasi di bidang seni dan budaya. Program ini mendukung pengembangan talenta seni tradisional maupun kontemporer dengan fasilitas workshop, pameran, dan pertunjukan.',
          scholarship_amount: 6000000,
          deadline: '2026-01-30',
          requirements: 'Portfolio karya seni, Sertifikat prestasi di bidang seni, Video performance atau dokumentasi karya, Rekomendasi dari seniman atau budayawan, Proposal pengembangan karya',
          status: 'coming_soon',
          is_active: true
        }
      ]
    },
    getAchievementClass(level) {
      const classes = {
        'Juara 1': 'bg-yellow-100 text-yellow-700',
        'Juara 2': 'bg-gray-100 text-gray-700', 
        'Juara 3': 'bg-orange-100 text-orange-700',
        'Finalis': 'bg-blue-100 text-blue-700',
        'Peserta Terbaik': 'bg-green-100 text-green-700'
      }
      return classes[level] || 'bg-gray-100 text-gray-700'
    },
    getStatusClass(status) {
      const classes = {
        'active': 'bg-green-100 text-green-700',
        'coming_soon': 'bg-yellow-100 text-yellow-700',
        'closed': 'bg-red-100 text-red-700'
      }
      return classes[status] || 'bg-gray-100 text-gray-700'
    },
    getStatusText(status) {
      const texts = {
        'active': 'Aktif',
        'coming_soon': 'Segera',
        'closed': 'Ditutup'
      }
      return texts[status] || 'Unknown'
    },
    formatDate(date) {
      const options = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
      }
      return new Date(date).toLocaleDateString('id-ID', options)
    },
    formatCurrency(amount) {
      return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
      }).format(amount)
    },
    openDetailModal(item) {
      this.selectedItem = item
      document.body.style.overflow = 'hidden'
    },
    closeDetailModal() {
      this.selectedItem = null
      document.body.style.overflow = 'auto'
    },
    resetFilters() {
      this.searchQuery = ''
      this.activeFilter = 'semua'
      this.currentPage = 1
    },
    
    // Helper methods for data extraction and mapping
    mapCategoryToAchievement(category) {
      const categoryMapping = {
        'prestasi': 'Prestasi',
        'informasi_akademik': 'Info Akademik',
        'kegiatan_mahasiswa': 'Kegiatan',
        'pengumuman': 'Pengumuman'
      }
      return categoryMapping[category] || 'Info'
    },
    
    extractMajorFromContent(content) {
      // Try to extract university major from content
      const majorPatterns = [
        /mahasiswa\s+([^,\.\n]+)/i,
        /jurusan\s+([^,\.\n]+)/i,
        /program\s+studi\s+([^,\.\n]+)/i,
        /fakultas\s+([^,\.\n]+)/i
      ]
      
      for (const pattern of majorPatterns) {
        const match = content.match(pattern)
        if (match && match[1]) {
          return match[1].trim()
        }
      }
      return null
    },
    
    extractAmountFromContent(content) {
      // Try to extract scholarship amount from content
      const amountPatterns = [
        /Rp\s*([\d.,]+)/i,
        /sebesar\s+Rp\s*([\d.,]+)/i,
        /bantuan\s+.*?Rp\s*([\d.,]+)/i,
        /([\d]+\.?[\d]*)\s*juta/i
      ]
      
      for (const pattern of amountPatterns) {
        const match = content.match(pattern)
        if (match && match[1]) {
          let amount = match[1].replace(/[,.]/g, '')
          if (pattern.source.includes('juta')) {
            amount = parseFloat(amount) * 1000000
          }
          return parseInt(amount) || 5000000
        }
      }
      return null
    },
    
    extractDeadlineFromContent(content) {
      // Try to extract deadline from content
      const datePatterns = [
        /deadline[:\s]+([\d]{1,2}[\s\-\/][\w]+[\s\-\/][\d]{4})/i,
        /batas[:\s]+([\d]{1,2}[\s\-\/][\w]+[\s\-\/][\d]{4})/i,
        /sampai[:\s]+([\d]{1,2}[\s\-\/][\w]+[\s\-\/][\d]{4})/i,
        /([\d]{1,2}[\s\-\/][\w]+[\s\-\/][\d]{4})/i
      ]
      
      for (const pattern of datePatterns) {
        const match = content.match(pattern)
        if (match && match[1]) {
          // Try to parse the date
          const dateStr = match[1].trim()
          const parsedDate = new Date(dateStr)
          if (!isNaN(parsedDate.getTime())) {
            return dateStr
          }
        }
      }
      return null
    },
    
    addDaysToDate(dateStr, days) {
      const date = new Date(dateStr)
      date.setDate(date.getDate() + days)
      return date.toISOString().split('T')[0] // Return YYYY-MM-DD format
    },
    
    truncateText(text, maxLength) {
      if (!text) return ''
      if (text.length <= maxLength) return text
      return text.substring(0, maxLength) + '...'
    },
    
    mapItemToUnified(item) {
      // Create a unified structure for all categories
      const baseItem = {
        id: item.id,
        title: item.title,
        description: this.truncateText(item.excerpt || item.content, 200),
        full_content: item.content,
        author: item.author,
        category: this.mapCategoryToAchievement(item.category),
        original_category: item.category,
        date: item.created_at,
        image: item.image ? `/storage/${item.image}` : null, // Fix image path
        is_active: item.is_published,
        tags: item.tags || [],
        views: item.views || 0
      }
      
      // Add category-specific fields
      if (item.category === 'beasiswa') {
        return {
          ...baseItem,
          scholarship_amount: this.extractAmountFromContent(item.content) || 5000000,
          deadline: this.extractDeadlineFromContent(item.content) || this.addDaysToDate(item.created_at, 90),
          requirements: item.excerpt || 'Silakan baca detail lengkap untuk persyaratan',
          status: item.is_published ? 'active' : 'coming_soon',
          type: 'beasiswa'
        }
      } else {
        return {
          ...baseItem,
          student_name: item.author,
          student_major: this.extractMajorFromContent(item.content) || 'UNRI',
          achievement_level: this.mapCategoryToAchievement(item.category),
          type: 'general'
        }
      }
    },
    
    // Helper methods for styling
    getFilterDisplayName(filter) {
      const names = {
        'semua': 'informasi',
        'prestasi': 'prestasi',
        'beasiswa': 'beasiswa',
        'informasi_akademik': 'informasi akademik',
        'kegiatan_mahasiswa': 'kegiatan',
        'pengumuman': 'pengumuman'
      }
      return names[filter] || 'item'
    },
    
    getCategoryBgClass(category) {
      const classes = {
        'prestasi': 'bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100',
        'beasiswa': 'bg-gradient-to-br from-kuning-emas-100 to-biru-langit-100',
        'informasi_akademik': 'bg-gradient-to-br from-blue-100 to-indigo-100',
        'kegiatan_mahasiswa': 'bg-gradient-to-br from-green-100 to-teal-100',
        'pengumuman': 'bg-gradient-to-br from-purple-100 to-pink-100'
      }
      return classes[category] || 'bg-gradient-to-br from-gray-100 to-gray-200'
    },
    
    getCategoryIconClass(category) {
      const classes = {
        'prestasi': 'bg-gradient-to-br from-biru-langit-500 to-kuning-emas-500',
        'beasiswa': 'bg-kuning-emas-500',
        'informasi_akademik': 'bg-blue-500',
        'kegiatan_mahasiswa': 'bg-green-500',
        'pengumuman': 'bg-purple-500'
      }
      return classes[category] || 'bg-gray-500'
    },
    
    getCategoryTextClass(category) {
      const classes = {
        'prestasi': 'text-biru-langit-600',
        'beasiswa': 'text-kuning-emas-600',
        'informasi_akademik': 'text-blue-600',
        'kegiatan_mahasiswa': 'text-green-600',
        'pengumuman': 'text-purple-600'
      }
      return classes[category] || 'text-gray-600'
    },
    
    getCategoryClass(category) {
      const classes = {
        'prestasi': 'bg-biru-langit-100 text-biru-langit-700',
        'beasiswa': 'bg-kuning-emas-100 text-kuning-emas-700',
        'informasi_akademik': 'bg-blue-100 text-blue-700',
        'kegiatan_mahasiswa': 'bg-green-100 text-green-700',
        'pengumuman': 'bg-purple-100 text-purple-700'
      }
      return classes[category] || 'bg-gray-100 text-gray-700'
    },
    
    getCategoryDisplayText(category) {
      const texts = {
        'prestasi': 'Prestasi',
        'beasiswa': 'Beasiswa',
        'informasi_akademik': 'Info Akademik',
        'kegiatan_mahasiswa': 'Kegiatan',
        'pengumuman': 'Pengumuman'
      }
      return texts[category] || 'Info'
    },
    
    handleImageError(event) {
      console.error('Image failed to load:', event.target.src)
      event.target.style.display = 'none'
    },
    
    getSearchPlaceholder(filter) {
      const placeholders = {
        'semua': 'Cari semua informasi...',
        'prestasi': 'Cari prestasi mahasiswa...',
        'beasiswa': 'Cari informasi beasiswa...',
        'informasi_akademik': 'Cari informasi akademik...',
        'kegiatan_mahasiswa': 'Cari kegiatan mahasiswa...',
        'pengumuman': 'Cari pengumuman...'
      }
      return placeholders[filter] || 'Cari informasi...'
    },
    
    getPaginationRange() {
      const start = Math.max(2, this.currentPage - 1)
      const end = Math.min(this.totalPages - 1, this.currentPage + 1)
      const range = []
      for (let i = start; i <= end; i++) {
        if (i > 1 && i < this.totalPages) {
          range.push(i)
        }
      }
      return range
    }
  }
}
</script>

<style scoped>
.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>