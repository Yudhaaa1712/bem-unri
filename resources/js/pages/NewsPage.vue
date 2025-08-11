<template>
  <div class="min-h-screen bg-white">
    <Header />
    
    <!-- News Hero Section -->
   <section 
  class="relative min-h-[60vh] sm:min-h-[70vh] lg:min-50-screen flex items-center justify-center bg-cover bg-center bg-no-repeat"
  :style="{ backgroundImage: `url('/images/fotounri.jpg')` }"
>
  <!-- Overlay dengan gradient blend dari bawah -->
  <div class="absolute inset-0 bg-gradient-to-t from-white/80 via-white/70 to-white/10"></div>
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center">
      <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-bold mb-4 sm:mb-6">
        <span class="bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent">
          Biru Langit
        </span> 
        <span class="bg-gradient-to-r from-[#eb7118] to-[#ffe500] bg-clip-text text-transparent">
          News
        </span>
      </h1>
      <div class="h-1 w-24 sm:w-32 bg-gradient-to-r from-[#eb7118] to-[#ffe500] rounded-full mx-auto mb-6 sm:mb-8"></div>
      <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-black max-w-3xl mx-auto leading-relaxed px-4">
        Portal berita dan informasi terkini dari BEM UNRI Kabinet Biru Langit. 
        Tetap update dengan kegiatan, program, dan pencapaian terbaru kami.
      </p>
    </div>
  </div>
</section>
    <!-- Search and Filter Section -->
    <section class="py-8 sm:py-12 bg-white shadow-lg">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-6">
          <!-- Search Bar -->
          <div class="w-full max-w-2xl mx-auto lg:mx-0">
            <div class="relative">
              <input
                v-model="searchQuery"
                type="text"
                placeholder="Cari berita..."
                class="w-full pl-12 pr-4 py-3 sm:py-4 border-2 border-blue-200 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 text-base sm:text-lg"
              >
              <SearchIcon class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 sm:w-6 sm:h-6 text-blue-400" />
            </div>
          </div>

          <!-- Category Filter -->
          <div class="flex flex-wrap gap-2 sm:gap-3 justify-center lg:justify-start">
            <FilterButton
              v-for="filter in filters"
              :key="filter.value"
              :active="activeFilter === filter.value"
              @click="activeFilter = filter.value"
            >
              {{ filter.label }}
            </FilterButton>
          </div>
        </div>

        <!-- Results Info -->
        <div class="mt-6 text-center lg:text-left">
          <p class="text-sm sm:text-base text-gray-600">
            <span class="font-semibold text-blue-700">{{ filteredNews.length }}</span> 
            berita ditemukan
            <span v-if="searchQuery" class="ml-2">
              untuk "<span class="font-semibold text-orange-600">{{ searchQuery }}</span>"
            </span>
          </p>
        </div>
      </div>
    </section>

    <!-- News Grid Section -->
    <section class="py-8 sm:py-12 lg:py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- News Grid -->
        <div v-if="filteredNews.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-8 sm:mb-12">
          <NewsCard
            v-for="news in paginatedNews"
            :key="news.id"
            :news="news"
            @click="openNewsDetail(news)"
          />
        </div>

        <!-- Empty State -->
        <EmptyState v-else @reset-filters="resetFilters" />

        <!-- Pagination -->
        <PaginationNav
          v-if="totalPages > 1"
          v-model="currentPage"
          :total-pages="totalPages"
        />
      </div>
    </section>

    <!-- News Detail Modal -->
    <NewsDetailModal
      v-if="selectedNews"
      :news="selectedNews"
      @close="closeNewsDetail"
    />

    <Footer />
  </div>
</template>

<script setup>
import { ref, computed, onMounted, watch, provide } from 'vue'
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'

// Constants
const ITEMS_PER_PAGE = 9
const CATEGORIES = {
  kemendagri: { label: 'Kemendagri', class: 'bg-blue-100 text-blue-700' },
  kemlu: { label: 'Kemlu', class: 'bg-orange-100 text-orange-700' },
  sosmas: { label: 'Sosmas', class: 'bg-green-100 text-green-700' }
}
const filters = [
  { value: 'all', label: 'Semua Berita' },
  { value: 'kemendagri', label: 'Kemendagri' },
  { value: 'kemlu', label: 'Kemlu' },
  { value: 'sosmas', label: 'Sosmas' }
]

// Reactive data
const allNews = ref([])
const searchQuery = ref('')
const activeFilter = ref('all')
const selectedNews = ref(null)
const currentPage = ref(1)

// Computed properties
const filteredNews = computed(() => {
  let filtered = allNews.value

  if (activeFilter.value !== 'all') {
    filtered = filtered.filter(news => news.category === activeFilter.value)
  }

  if (searchQuery.value) {
    const query = searchQuery.value.toLowerCase()
    filtered = filtered.filter(news => 
      [news.title, news.excerpt, news.author].some(field => 
        field.toLowerCase().includes(query)
      )
    )
  }

  return filtered
})

const paginatedNews = computed(() => {
  const start = (currentPage.value - 1) * ITEMS_PER_PAGE
  return filteredNews.value.slice(start, start + ITEMS_PER_PAGE)
})

const totalPages = computed(() => 
  Math.ceil(filteredNews.value.length / ITEMS_PER_PAGE)
)

// Methods
const loadNews = async () => {
  try {
    const response = await fetch('/api/news')
    allNews.value = await response.json()
  } catch (error) {
    console.error('Error loading news:', error)
    allNews.value = getDummyNews()
  }
}

const getCategoryName = (category) => CATEGORIES[category]?.label || 'Umum'
const getCategoryClass = (category) => CATEGORIES[category]?.class || 'bg-gray-100 text-gray-700'

const formatDate = (date) => 
  new Date(date).toLocaleDateString('id-ID', { 
    year: 'numeric', 
    month: 'long', 
    day: 'numeric' 
  })

const openNewsDetail = (news) => {
  selectedNews.value = news
  document.body.style.overflow = 'hidden'
}

const closeNewsDetail = () => {
  selectedNews.value = null
  document.body.style.overflow = 'auto'
}

const resetFilters = () => {
  searchQuery.value = ''
  activeFilter.value = 'all'
  currentPage.value = 1
}

const getDummyNews = () => [
  {
    id: 1,
    title: 'Workshop Pengembangan Organisasi Mahasiswa',
    excerpt: 'BEM UNRI mengadakan workshop pengembangan organisasi mahasiswa yang diikuti oleh seluruh pengurus organisasi di lingkungan Universitas Riau.',
    content: '<p>BEM UNRI dengan bangga mengumumkan pelaksanaan Workshop Pengembangan Organisasi Mahasiswa yang telah berlangsung dengan sukses...</p>',
    category: 'kemendagri',
    author: 'Admin BEM',
    created_at: '2025-03-15',
    views: 245,
    tags: ['workshop', 'organisasi', 'pengembangan']
  },
  {
    id: 2,
    title: 'Kerjasama Internasional dengan Universitas Malaysia',
    excerpt: 'BEM UNRI menjalin kerjasama dengan organisasi mahasiswa dari Universitas Malaysia dalam program pertukaran budaya dan akademik.',
    content: '<p>Dalam upaya memperluas jaringan internasional dan meningkatkan kualitas pendidikan...</p>',
    category: 'kemlu',
    author: 'Admin BEM',
    created_at: '2025-03-10',
    views: 189,
    tags: ['internasional', 'kerjasama', 'malaysia']
  },
  {
    id: 3,
    title: 'Bakti Sosial di Desa Sungai Pinang',
    excerpt: 'Kegiatan bakti sosial yang melibatkan 100 mahasiswa untuk membantu renovasi sekolah dan memberikan bantuan pendidikan.',
    content: '<p>BEM UNRI Kabinet Biru Langit kembali menggelar program bakti sosial di Desa Sungai Pinang...</p>',
    category: 'sosmas',
    author: 'Admin BEM',
    created_at: '2025-03-05',
    views: 156,
    tags: ['baksos', 'pendidikan', 'desa']
  }
]

// Provide functions for child components
provide('getCategoryClass', getCategoryClass)
provide('getCategoryName', getCategoryName)
provide('formatDate', formatDate)

// Watchers
watch(filteredNews, () => {
  currentPage.value = 1
})

// Lifecycle
onMounted(loadNews)
</script>

<script>
// Component definitions
const SearchIcon = {
  template: `
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
    </svg>
  `
}

const FilterButton = {
  props: ['active'],
  emits: ['click'],
  template: `
    <button 
      @click="$emit('click')"
      :class="active ? 'bg-gradient-to-r from-[#034caa] to-[#003375] text-white' : 'bg-white text-blue-600 border border-blue-200 hover:bg-blue-50'"
      class="px-4 sm:px-6 py-2 sm:py-3 rounded-full font-semibold transition-all duration-300 text-sm sm:text-base whitespace-nowrap"
    >
      <slot />
    </button>
  `
}

const NewsCard = {
  props: ['news'],
  emits: ['click'],
  inject: ['getCategoryClass', 'getCategoryName', 'formatDate'],
  template: `
    <div 
      class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 group cursor-pointer overflow-hidden h-full flex flex-col"
      @click="$emit('click')"
    >
      <!-- News Image -->
      <div class="aspect-video bg-gradient-to-br from-blue-100 to-orange-100 flex items-center justify-center overflow-hidden">
        <!-- Jika ada gambar, tampilkan gambar -->
        <img 
          v-if="validImage"
          :src="getImageUrl(news.image)"
          :alt="news.title"
          class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
          @error="onImageError"
        >
        <!-- Jika tidak ada gambar, tampilkan placeholder -->
        <div v-else class="text-center p-4">
          <div class="w-12 h-12 sm:w-16 sm:h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4 group-hover:bg-blue-600 transition-colors">
            <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m0 0V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2h-2z"></path>
            </svg>
          </div>
          <p class="text-blue-600 font-semibold text-sm sm:text-base">Foto Berita</p>
        </div>
      </div>

      <!-- News Content -->
      <div class="p-4 sm:p-6 flex-1 flex flex-col">
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2 space-y-2 sm:space-y-0 mb-3">
          <span 
            :class="getCategoryClass(news.category)"
            class="px-3 py-1 text-xs font-semibold rounded-full w-fit"
          >
            {{ getCategoryName(news.category) }}
          </span>
          <span class="text-gray-500 text-xs sm:text-sm">{{ formatDate(news.created_at) }}</span>
        </div>
        
        <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">
          {{ news.title }}
        </h3>
        
        <p class="text-gray-600 mb-4 line-clamp-3 text-sm sm:text-base flex-1">
          {{ news.excerpt }}
        </p>
        
        <div class="flex items-center justify-between mt-auto">
          <span class="text-xs sm:text-sm text-gray-500 truncate">{{ news.author }}</span>
          <span class="text-blue-600 font-semibold text-xs sm:text-sm hover:text-orange-600 transition-colors whitespace-nowrap ml-2">
            Baca Selengkapnya →
          </span>
        </div>
      </div>
    </div>
  `,
  data() {
    return {
      imageError: false
    }
  },
  computed: {
    validImage() {
      return this.news.image && !this.imageError;
    }
  },
  methods: {
    getImageUrl(imagePath) {
      if (!imagePath) return '';
      return imagePath.startsWith('http') ? imagePath : `/storage/${imagePath}`;
    },
    onImageError(event) {
      console.warn('Gagal memuat gambar:', event.target.src);
      this.imageError = true;
    }
  }
}

const EmptyState = {
  emits: ['reset-filters'],
  template: `
    <div class="text-center py-12 sm:py-16">
      <div class="w-20 h-20 sm:w-24 sm:h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
        <svg class="w-10 h-10 sm:w-12 sm:h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m0 0V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2h-2z"></path>
        </svg>
      </div>
      <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Tidak Ada Berita Ditemukan</h3>
      <p class="text-gray-600 mb-6 text-sm sm:text-base px-4">
        Maaf, tidak ada berita yang sesuai dengan pencarian atau filter yang Anda pilih.
      </p>
      <button 
        @click="$emit('reset-filters')"
        class="bg-gradient-to-r from-[#034caa] to-[#003375] text-white px-6 py-3 rounded-lg hover:shadow-lg transition-all duration-300 text-sm sm:text-base"
      >
        Reset Filter
      </button>
    </div>
  `
}

const PaginationNav = {
  props: ['modelValue', 'totalPages'],
  emits: ['update:modelValue'],
  computed: {
    currentPage: {
      get() { return this.modelValue },
      set(value) { this.$emit('update:modelValue', value) }
    },
    visiblePages() {
      const total = this.totalPages;
      const current = this.currentPage;
      const delta = 2;
      
      if (total <= 7) {
        return Array.from({ length: total }, (_, i) => i + 1);
      }
      
      const range = [];
      const rangeWithDots = [];
      
      for (let i = Math.max(2, current - delta); i <= Math.min(total - 1, current + delta); i++) {
        range.push(i);
      }
      
      if (current - delta > 2) {
        rangeWithDots.push(1, '...');
      } else {
        rangeWithDots.push(1);
      }
      
      rangeWithDots.push(...range);
      
      if (current + delta < total - 1) {
        rangeWithDots.push('...', total);
      } else {
        rangeWithDots.push(total);
      }
      
      return rangeWithDots;
    }
  },
  template: `
    <div class="flex justify-center">
      <nav class="flex items-center space-x-1 sm:space-x-2">
        <button
          @click="currentPage = currentPage - 1"
          :disabled="currentPage === 1"
          :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-600'"
          class="px-3 py-2 sm:px-4 sm:py-2 bg-blue-500 text-white rounded-lg transition-colors text-sm sm:text-base"
        >
          ←
        </button>

        <template v-for="page in visiblePages" :key="page">
          <button
            v-if="page !== '...'"
            @click="currentPage = page"
            :class="page === currentPage ? 'bg-blue-600 text-white' : 'bg-white text-blue-600 hover:bg-blue-50'"
            class="px-3 py-2 sm:px-4 sm:py-2 rounded-lg font-semibold transition-colors border border-blue-200 text-sm sm:text-base min-w-[40px] sm:min-w-[44px]"
          >
            {{ page }}
          </button>
          <span v-else class="px-2 py-2 text-gray-400">...</span>
        </template>

        <button
          @click="currentPage = currentPage + 1"
          :disabled="currentPage === totalPages"
          :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-600'"
          class="px-3 py-2 sm:px-4 sm:py-2 bg-blue-500 text-white rounded-lg transition-colors text-sm sm:text-base"
        >
          →
        </button>
      </nav>
    </div>
  `
}

const NewsDetailModal = {
  props: ['news'],
  emits: ['close'],
  inject: ['getCategoryClass', 'getCategoryName', 'formatDate'],
  template: `
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-2 sm:p-4">
      <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[95vh] sm:max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="sticky top-0 bg-white border-b border-gray-200 p-4 sm:p-6 rounded-t-2xl">
          <div class="flex items-start sm:items-center justify-between gap-4">
            <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-3 flex-1">
              <span 
                :class="getCategoryClass(news.category)"
                class="px-3 py-1 text-xs font-semibold rounded-full w-fit"
              >
                {{ getCategoryName(news.category) }}
              </span>
              <span class="text-gray-500 text-xs sm:text-sm">{{ formatDate(news.created_at) }}</span>
            </div>
            <button 
              @click="$emit('close')"
              class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center transition-colors flex-shrink-0"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
        </div>

        <!-- Modal Content -->
        <div class="p-4 sm:p-6">
          <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mb-4 sm:mb-6">{{ news.title }}</h1>
          
          <!-- News Image -->
          <div class="aspect-video bg-gradient-to-br from-blue-100 to-orange-100 rounded-xl flex items-center justify-center mb-4 sm:mb-6 overflow-hidden">
            <!-- Jika ada gambar, tampilkan gambar -->
            <img 
              v-if="news.image" 
              :src="getImageUrl(news.image)" 
              :alt="news.title"
              class="w-full h-full object-cover rounded-xl"
            >
            <!-- Jika tidak ada gambar, tampilkan placeholder -->
            <div v-else class="text-center p-4">
              <div class="w-16 h-16 sm:w-20 sm:h-20 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
              </div>
              <p class="text-blue-600 font-semibold">Gambar Berita</p>
            </div>
          </div>

          <!-- News Meta -->
          <div class="flex flex-wrap items-center gap-2 sm:gap-4 text-xs sm:text-sm text-gray-600 mb-4 sm:mb-6 pb-4 sm:pb-6 border-b border-gray-200">
            <span>📝 {{ news.author }}</span>
            <span>👁️ {{ news.views || 0 }} views</span>
            <span>📅 {{ formatDate(news.created_at) }}</span>
          </div>

          <!-- News Content -->
          <div class="prose prose-sm sm:prose max-w-none">
            <div v-html="news.content || news.excerpt"></div>
          </div>

          <!-- Tags -->
          <div v-if="news.tags && news.tags.length > 0" class="mt-6 sm:mt-8 pt-4 sm:pt-6 border-t border-gray-200">
            <h4 class="text-sm font-semibold text-gray-700 mb-3">Tags:</h4>
            <div class="flex flex-wrap gap-2">
              <span 
                v-for="tag in news.tags" 
                :key="tag"
                class="px-3 py-1 bg-blue-100 text-blue-700 text-xs rounded-full"
              >
                #{{ tag }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  `,
  methods: {
    getImageUrl(imagePath) {
      if (imagePath.startsWith('http')) {
        return imagePath;
      }
      return `/storage/${imagePath}`;
    }
  }
}

export default {
  name: 'NewsPage',
  components: {
    Header,
    Footer,
    SearchIcon,
    FilterButton,
    NewsCard,
    EmptyState,
    PaginationNav,
    NewsDetailModal
  }
}
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
  color: #1f2937;
  font-weight: 600;
}

.prose p {
  margin-bottom: 1rem;
  line-height: 1.6;
}

.prose ul, .prose ol {
  margin-bottom: 1rem;
  padding-left: 1.5rem;
}

.prose img {
  border-radius: 0.5rem;
  margin: 1rem 0;
}

@media (max-width: 640px) {
  .prose {
    font-size: 14px;
  }
  
  .prose h1 { font-size: 1.5rem; }
  .prose h2 { font-size: 1.25rem; }
  .prose h3 { font-size: 1.125rem; }
}
</style>