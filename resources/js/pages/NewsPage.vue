<template>
  <div class="min-h-screen bg-white">
    <Header />
    
    <!-- News Hero Section -->
    <section 
      class="relative min-h-[60vh] sm:min-h-[70vh] lg:min-h-[50vh] flex items-center justify-center bg-cover bg-center bg-no-repeat"
      :style="{ backgroundImage: `url('/images/fotounri.jpg')` }"
    >
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
    <section class="py-8 sm:py-12 lg:py-16 bg-gradient-to-b from-white to-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- News Grid -->
        <div v-if="filteredNews.length > 0" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-8 mb-8 sm:mb-12">
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
  kemensekab: { label: 'Kemensekab', class: 'bg-blue-100 text-blue-700' },
  kemenagrarialh: { label: 'Kemenagraria-LH', class: 'bg-green-100 text-green-700' },
  kemenrisma: { label: 'Kemenrisma', class: 'bg-purple-100 text-purple-700' },
  kemensospol: { label: 'Kemensospol', class: 'bg-red-100 text-red-700' },
  kemenhadkesma: { label: 'Kemenhadkesma', class: 'bg-yellow-100 text-yellow-700' },
  kemendaniv: { label: 'Kemendaniv', class: 'bg-indigo-100 text-indigo-700' },
  kemenpp: { label: 'KemenPP', class: 'bg-pink-100 text-pink-700' }, 
  kemenkesra: { label: 'Kemenkesra', class: 'bg-teal-100 text-teal-700' },
  kemenekraf: { label: 'Kemenekraf', class: 'bg-orange-100 text-orange-700' },
  kemenkominfo: { label: 'Kemenkominfo', class: 'bg-cyan-100 text-cyan-700' },
  kemenluniv: { label: 'Kemenluniv', class: 'bg-lime-100 text-lime-700' },
  kemensosmas: { label: 'Kemensosmas', class: 'bg-emerald-100 text-emerald-700' },
  kemenkeu: { label: 'Kemenkeu', class: 'bg-amber-100 text-amber-700' }
}

const filters = [
  { value: 'all', label: 'Semua Berita' },
  { value: 'kemensekab', label: 'Kemensekab' },
  { value: 'kemenagrarialh', label: 'Kemenagraria-LH' },
  { value: 'kemenrisma', label: 'Kemenrisma' },
  { value: 'kemensospol', label: 'Kemensospol' },
  { value: 'kemenhadkesma', label: 'Kemenhadkesma' },
  { value: 'kemendaniv', label: 'Kemendaniv' },
  { value: 'kemenpp', label: 'KemenPP' }, 
  { value: 'kemenkesra', label: 'Kemenkesra' },
  { value: 'kemenekraf', label: 'Kemenekraf' },
  { value: 'kemenkominfo', label: 'Kemenkominfo' },
  { value: 'kemenluniv', label: 'Kemenluniv' },
  { value: 'kemensosmas', label: 'Kemensosmas' },
  { value: 'kemenkeu', label: 'Kemenkeu' }
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
const formatDate = (date) => new Date(date).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' })

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

// Provide functions for child components
provide('getCategoryClass', getCategoryClass)
provide('getCategoryName', getCategoryName)
provide('formatDate', formatDate)

// Watchers
watch(filteredNews, () => { currentPage.value = 1 })

// Lifecycle
onMounted(loadNews)
</script>

<script>
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
    <article 
      class="group bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-500 cursor-pointer overflow-hidden h-full flex flex-col hover:-translate-y-2 border border-gray-100 hover:border-blue-200"
      @click="$emit('click')"
    >
      <!-- Image Container -->
      <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-blue-50 to-orange-50">
        <img 
          v-if="validImage"
          :src="getImageUrl(news.image)"
          :alt="news.title"
          class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
          @error="onImageError"
          loading="lazy"
        >
        <div v-else class="flex items-center justify-center h-full">
          <div class="text-center">
            <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-blue-600 transition-colors">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
            </div>
            <p class="text-sm font-medium text-gray-600">Gambar Berita</p>
          </div>
        </div>
        
        <!-- Category Badge -->
        <div class="absolute top-4 left-4">
          <span 
            :class="getCategoryClass(news.category)"
            class="px-3 py-1.5 text-xs font-bold rounded-full shadow-lg backdrop-blur-sm"
          >
            {{ getCategoryName(news.category) }}
          </span>
        </div>
      </div>

      <!-- Content -->
      <div class="p-6 flex-1 flex flex-col">
        <!-- Meta Info -->
        <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
          <div class="flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <time>{{ formatDate(news.created_at) }}</time>
          </div>
          <div class="flex items-center gap-1" v-if="news.views">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
            <span>{{ formatViews(news.views) }}</span>
          </div>
        </div>
        
        <!-- Title -->
        <h3 class="font-bold text-gray-900 text-lg leading-tight group-hover:text-blue-600 transition-colors duration-300 mb-3 line-clamp-2">
          {{ news.title }}
        </h3>
        
        <!-- Excerpt -->
        <p class="text-gray-600 text-sm leading-relaxed mb-4 flex-1 line-clamp-3">
          {{ news.excerpt }}
        </p>
        
        <!-- Footer -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
              <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <span class="text-sm text-gray-600 font-medium">{{ news.author }}</span>
          </div>
          
          <div class="flex items-center text-blue-600 group-hover:text-orange-500 transition-colors duration-300">
            <span class="text-sm font-semibold mr-2">Baca Selengkapnya</span>
            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </div>
        </div>
      </div>
    </article>
  `,
  data() {
    return { imageError: false }
  },
  computed: {
    validImage() { return this.news.image && !this.imageError }
  },
  methods: {
    getImageUrl(imagePath) {
      if (!imagePath) return ''
      return imagePath.startsWith('http') ? imagePath : `/storage/${imagePath}`
    },
    onImageError() { this.imageError = true },
    formatViews(views) {
      if (!views) return '0'
      if (views >= 1000000) return (views / 1000000).toFixed(1) + 'M'
      if (views >= 1000) return (views / 1000).toFixed(1) + 'K'
      return views.toString()
    }
  }
}

const EmptyState = {
  emits: ['reset-filters'],
  template: `
    <div class="text-center py-16">
      <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
        <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m0 0V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2h-2z"></path>
        </svg>
      </div>
      <h3 class="text-2xl font-bold text-gray-800 mb-4">Tidak Ada Berita Ditemukan</h3>
      <p class="text-gray-600 mb-8 max-w-md mx-auto">
        Maaf, tidak ada berita yang sesuai dengan pencarian atau filter yang Anda pilih.
      </p>
      <button 
        @click="$emit('reset-filters')"
        class="bg-gradient-to-r from-[#034caa] to-[#003375] text-white px-8 py-3 rounded-lg hover:shadow-lg transition-all duration-300"
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
      const total = this.totalPages
      const current = this.currentPage
      const delta = 2
      
      if (total <= 7) return Array.from({ length: total }, (_, i) => i + 1)
      
      const range = []
      for (let i = Math.max(2, current - delta); i <= Math.min(total - 1, current + delta); i++) {
        range.push(i)
      }
      
      const rangeWithDots = []
      if (current - delta > 2) {
        rangeWithDots.push(1, '...')
      } else {
        rangeWithDots.push(1)
      }
      
      rangeWithDots.push(...range)
      
      if (current + delta < total - 1) {
        rangeWithDots.push('...', total)
      } else {
        rangeWithDots.push(total)
      }
      
      return rangeWithDots
    }
  },
  template: `
    <div class="flex justify-center">
      <nav class="flex items-center space-x-2">
        <button
          @click="currentPage = currentPage - 1"
          :disabled="currentPage === 1"
          :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-600'"
          class="px-4 py-2 bg-blue-500 text-white rounded-lg transition-colors"
        >
          ←
        </button>

        <template v-for="page in visiblePages" :key="page">
          <button
            v-if="page !== '...'"
            @click="currentPage = page"
            :class="page === currentPage ? 'bg-blue-600 text-white' : 'bg-white text-blue-600 hover:bg-blue-50'"
            class="px-4 py-2 rounded-lg font-semibold transition-colors border border-blue-200 min-w-[44px]"
          >
            {{ page }}
          </button>
          <span v-else class="px-2 py-2 text-gray-400">...</span>
        </template>

        <button
          @click="currentPage = currentPage + 1"
          :disabled="currentPage === totalPages"
          :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-600'"
          class="px-4 py-2 bg-blue-500 text-white rounded-lg transition-colors"
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
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
      <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="sticky top-0 bg-white border-b border-gray-200 p-6 rounded-t-2xl">
          <div class="flex items-center justify-between gap-4">
            <div class="flex items-center space-x-3">
              <span :class="getCategoryClass(news.category)" class="px-3 py-1 text-xs font-semibold rounded-full">
                {{ getCategoryName(news.category) }}
              </span>
              <span class="text-gray-500 text-sm">{{ formatDate(news.created_at) }}</span>
            </div>
            <button @click="$emit('close')" class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
        </div>

        <!-- Modal Content -->
        <div class="p-6">
          <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ news.title }}</h1>
          
          <!-- News Image -->
          <div class="aspect-video bg-gradient-to-br from-blue-100 to-orange-100 rounded-xl flex items-center justify-center mb-6 overflow-hidden">
            <img v-if="news.image" :src="getImageUrl(news.image)" :alt="news.title" class="w-full h-full object-cover rounded-xl">
            <div v-else class="text-center p-4">
              <div class="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
              </div>
              <p class="text-blue-600 font-semibold">Gambar Berita</p>
            </div>
          </div>

          <!-- News Meta -->
          <div class="flex items-center gap-4 text-sm text-gray-600 mb-6 pb-6 border-b border-gray-200">
            <span>📝 {{ news.author }}</span>
            <span>👁️ {{ news.views || 0 }} views</span>
            <span>📅 {{ formatDate(news.created_at) }}</span>
          </div>

          <!-- News Content -->
          <div class="prose max-w-none">
            <div v-html="news.content || news.excerpt"></div>
          </div>

          <!-- Tags -->
          <div v-if="news.tags && news.tags.length > 0" class="mt-8 pt-6 border-t border-gray-200">
            <h4 class="text-sm font-semibold text-gray-700 mb-3">Tags:</h4>
            <div class="flex flex-wrap gap-2">
              <span v-for="tag in news.tags" :key="tag" class="px-3 py-1 bg-blue-100 text-blue-700 text-xs rounded-full">
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
      return imagePath.startsWith('http') ? imagePath : `/storage/${imagePath}`
    }
  }
}

export default {
  name: 'NewsPage',
  components: { Header, Footer, SearchIcon, FilterButton, NewsCard, EmptyState, PaginationNav, NewsDetailModal }
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

@supports (backdrop-filter: blur(4px)) {
  .backdrop-blur-sm {
    backdrop-filter: blur(4px);
  }
}

.prose {
  color: #374151;
  line-height: 1.7;
}

.prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
  color: #1f2937;
  font-weight: 600;
  margin-top: 1.5rem;
  margin-bottom: 0.75rem;
}

.prose p {
  margin-bottom: 1rem;
}

.prose ul, .prose ol {
  margin-bottom: 1rem;
  padding-left: 1.5rem;
}

.prose img {
  border-radius: 0.5rem;
  margin: 1.5rem 0;
  box-shadow: 0 10px 25px -10px rgba(0, 0, 0, 0.1);
}

@media (max-width: 640px) {
  .prose { font-size: 14px; }
  .prose h1 { font-size: 1.5rem; }
  .prose h2 { font-size: 1.25rem; }
  .prose h3 { font-size: 1.125rem; }
}
</style>