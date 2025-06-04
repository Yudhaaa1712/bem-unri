<template>
  <div class="min-h-screen bg-gradient-to-br from-biru-langit-50 to-white">
    <Header />
    
    <!-- Student Info Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-biru-langit-600 to-biru-langit-800 text-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h1 class="text-5xl lg:text-7xl font-bold mb-6">
            <span class="text-kuning-emas-400">Student</span> Info
          </h1>
          <div class="h-1 w-32 bg-gradient-to-r from-kuning-emas-400 to-kuning-emas-600 rounded-full mx-auto mb-8"></div>
          <p class="text-xl lg:text-2xl text-biru-langit-100 max-w-3xl mx-auto leading-relaxed">
            Portal informasi prestasi mahasiswa dan program beasiswa dari BEM UNRI Kabinet Biru Langit. 
            Temukan pencapaian terbaru dan peluang beasiswa untuk mahasiswa UNRI.
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
                :placeholder="activeFilter === 'prestasi' ? 'Cari prestasi mahasiswa...' : 'Cari informasi beasiswa...'"
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
              @click="activeFilter = 'prestasi'"
              :class="activeFilter === 'prestasi' ? 'btn-primary' : 'btn-secondary'"
              class="px-6 py-3 rounded-full font-semibold transition-all duration-300"
            >
              Prestasi Mahasiswa
            </button>
            <button 
              @click="activeFilter = 'beasiswa'"
              :class="activeFilter === 'beasiswa' ? 'btn-primary' : 'btn-secondary'"
              class="px-6 py-3 rounded-full font-semibold transition-all duration-300"
            >
              Info Beasiswa
            </button>
          </div>
        </div>

        <!-- Results Info -->
        <div class="mt-6 text-center lg:text-left">
          <p class="text-gray-600">
            <span class="font-semibold text-biru-langit-700">{{ filteredData.length }}</span> 
            {{ activeFilter === 'prestasi' ? 'prestasi' : 'beasiswa' }} ditemukan
            <span v-if="searchQuery" class="ml-2">
              untuk "<span class="font-semibold text-kuning-emas-600">{{ searchQuery }}</span>"
            </span>
          </p>
        </div>
      </div>
    </section>

    <!-- Content Grid Section -->
    <section class="py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Prestasi Grid -->
        <div v-if="activeFilter === 'prestasi' && filteredData.length > 0" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
          <div 
            v-for="prestasi in paginatedData" 
            :key="prestasi.id"
            class="card group cursor-pointer"
            @click="openDetailModal(prestasi)"
          >
            <!-- Prestasi Image -->
            <div class="aspect-video bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 flex items-center justify-center">
              <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-biru-langit-500 to-kuning-emas-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-biru-langit-600 transition-colors">
                  <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                  </svg>
                </div>
                <p class="text-biru-langit-600 font-semibold">Foto Prestasi</p>
              </div>
            </div>

            <!-- Prestasi Content -->
            <div class="p-6">
              <div class="flex items-center space-x-2 mb-3">
                <span 
                  :class="getAchievementClass(prestasi.achievement_level)"
                  class="px-3 py-1 text-xs font-semibold rounded-full"
                >
                  {{ prestasi.achievement_level }}
                </span>
                <span class="text-gray-500 text-sm">{{ formatDate(prestasi.date) }}</span>
              </div>
              
              <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
                {{ prestasi.title }}
              </h3>
              
              <p class="text-gray-600 mb-4 line-clamp-3">
                {{ prestasi.student_name }} - {{ prestasi.student_major }}. {{ prestasi.description }}
              </p>
              
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">{{ prestasi.student_major }}</span>
                <span class="text-biru-langit-600 font-semibold text-sm hover:text-kuning-emas-600 transition-colors">
                  Lihat Detail →
                </span>
              </div>
            </div>
          </div>
        </div>

        <!-- Beasiswa Grid -->
        <div v-if="activeFilter === 'beasiswa' && filteredData.length > 0" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
          <div 
            v-for="beasiswa in paginatedData" 
            :key="beasiswa.id"
            class="card group cursor-pointer"
            @click="openDetailModal(beasiswa)"
          >
            <!-- Beasiswa Image -->
            <div class="aspect-video bg-gradient-to-br from-kuning-emas-100 to-biru-langit-100 flex items-center justify-center">
              <div class="text-center">
                <div class="w-16 h-16 bg-kuning-emas-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-kuning-emas-600 transition-colors">
                  <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                  </svg>
                </div>
                <p class="text-kuning-emas-600 font-semibold">Info Beasiswa</p>
              </div>
            </div>

            <!-- Beasiswa Content -->
            <div class="p-6">
              <div class="flex items-center space-x-2 mb-3">
                <span 
                  :class="getStatusClass(beasiswa.status)"
                  class="px-3 py-1 text-xs font-semibold rounded-full"
                >
                  {{ getStatusText(beasiswa.status) }}
                </span>
                <span class="text-gray-500 text-sm">{{ formatDate(beasiswa.deadline) }}</span>
              </div>
              
              <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
                {{ beasiswa.title }}
              </h3>
              
              <p class="text-gray-600 mb-4 line-clamp-3">
                {{ beasiswa.description }}
              </p>
              
              <div class="flex items-center justify-between">
                <span class="text-sm text-kuning-emas-600 font-semibold">{{ formatCurrency(beasiswa.scholarship_amount) }}</span>
                <span class="text-biru-langit-600 font-semibold text-sm hover:text-kuning-emas-600 transition-colors">
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
              <p class="text-gray-600 leading-relaxed">{{ selectedItem.description }}</p>
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
              <p class="text-gray-600 leading-relaxed mb-6">{{ selectedItem.description }}</p>
              
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
      activeFilter: 'prestasi',
      searchQuery: '',
      selectedItem: null,
      currentPage: 1,
      itemsPerPage: 9,
      prestasi: [],
      beasiswa: []
    }
  },
  computed: {
    currentData() {
      return this.activeFilter === 'prestasi' ? this.prestasi : this.beasiswa
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
        this.prestasi = data.prestasi || []
        this.beasiswa = data.beasiswa || []
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
      this.activeFilter = 'prestasi'
      this.currentPage = 1
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