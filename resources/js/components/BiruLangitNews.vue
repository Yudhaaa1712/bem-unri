<template>
  <section class="py-8 sm:py-12 lg:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Section Header -->
      <div class="text-center mb-8 sm:mb-12">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-4">
          <span class="bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent">
            Biru Langit
          </span> 
          <span class="bg-gradient-to-r from-[#eb7118] to-[#ffe500] bg-clip-text text-transparent">
            News
          </span>
        </h2>
      </div>

      <!-- Loading State -->
      <div v-if="loading" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
        <NewsCardSkeleton v-for="n in 6" :key="n" />
      </div>

      <!-- News Grid -->
      <div v-else-if="displayedNews.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-8 sm:mb-12">
        <NewsCard
          v-for="news in displayedNews"
          :key="news.id"
          :news="news"
          @click="openNewsDetail(news)"
        />
      </div>

      <!-- Empty State -->
      <div v-else class="text-center py-12">
        <div class="w-16 h-16 sm:w-20 sm:h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg class="w-8 h-8 sm:w-10 sm:h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m0 0V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2h-2z"></path>
          </svg>
        </div>
        <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Belum Ada Berita</h3>
        <p class="text-gray-600 text-sm sm:text-base">Berita akan segera hadir</p>
      </div>

      <!-- View All Button - FIXED -->
      <div v-if="displayedNews.length > 0" class="text-center">
        <a
          :href="newsPageUrl"
          class="inline-flex items-center gap-2 bg-gradient-to-r from-[#034caa] to-[#003375] text-white px-6 sm:px-8 py-3 sm:py-4 rounded-xl font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300 text-sm sm:text-base"
        >
          <span>Lihat Semua Berita</span>
          <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
          </svg>
        </a>
      </div>
    </div>

    <!-- News Detail Modal -->
    <NewsDetailModal
      v-if="selectedNews"
      :news="selectedNews"
      @close="closeNewsDetail"
    />
  </section>
</template>

<script setup>
import { ref, onMounted, provide, computed } from 'vue'

// Props
const props = defineProps({
  maxItems: {
    type: Number,
    default: 6
  }
})

// Constants
const CATEGORIES = {
  kemensekab: { label: 'Kemensekab', class: 'bg-blue-100 text-blue-700' },
  kemenagrarialh: { label: 'Kemenagraria-LH', class: 'bg-green-100 text-green-700' },
  kemenrisma: { label: 'Kemenrisma', class: 'bg-purple-100 text-purple-700' },
  kemensospol: { label: 'Kemensospol', class: 'bg-red-100 text-red-700' },
  kemenhadkesma: { label: 'Kemenhadkesma', class: 'bg-yellow-100 text-yellow-700' },
  kemendaniv: { label: 'Kemendaniv', class: 'bg-indigo-100 text-indigo-700' },
  kemenPP: { label: 'KemenPP', class: 'bg-pink-100 text-pink-700' },
  kemenkesra: { label: 'Kemenkesra', class: 'bg-teal-100 text-teal-700' },
  kemenekraf: { label: 'Kemenekraf', class: 'bg-orange-100 text-orange-700' },
  kemenkominfo: { label: 'Kemenkominfo', class: 'bg-cyan-100 text-cyan-700' },
  kemenluniv: { label: 'Kemenluniv', class: 'bg-lime-100 text-lime-700' },
  kemensosmas: { label: 'Kemensosmas', class: 'bg-emerald-100 text-emerald-700' },
  kemenkeu: { label: 'Kemenkeu', class: 'bg-amber-100 text-amber-700' }
}

// Reactive data
const allNews = ref([])
const displayedNews = ref([])
const loading = ref(true)
const selectedNews = ref(null)

// Computed
const newsPageUrl = computed(() => {
  // Sesuaikan dengan route Laravel Anda
  return '/news'
})

// Methods
const loadNews = async () => {
  try {
    loading.value = true
    const response = await fetch('/api/news')
    const data = await response.json()
    allNews.value = data
    
    // Sort by date and take only the required number
    displayedNews.value = allNews.value
      .sort((a, b) => new Date(b.created_at) - new Date(a.created_at))
      .slice(0, props.maxItems)
  } catch (error) {
    console.error('Error loading news:', error)
    // Fallback to dummy data if API fails
    displayedNews.value = getDummyNews().slice(0, props.maxItems)
  } finally {
    loading.value = false
  }
}

const getDummyNews = () => {
  return [
    {
      id: 1,
      title: 'Peluncuran Program Biru Langit 2024',
      excerpt: 'BEM UNRI Kabinet Biru Langit meluncurkan program unggulan untuk mahasiswa UNRI tahun 2024.',
      content: 'Program unggulan ini mencakup berbagai kegiatan yang bertujuan untuk meningkatkan kualitas mahasiswa UNRI.',
      author: 'Admin BEM',
      category: 'kemensekab',
      image: null,
      views: 125,
      tags: ['program', 'bem', 'unri'],
      created_at: new Date().toISOString()
    },
    {
      id: 2,
      title: 'Workshop Kewirausahaan Mahasiswa',
      excerpt: 'Kemenekraf mengadakan workshop kewirausahaan untuk mahasiswa UNRI dengan pembicara dari praktisi bisnis.',
      content: 'Workshop ini bertujuan untuk meningkatkan jiwa entrepreneurship mahasiswa UNRI.',
      author: 'Kemenekraf',
      category: 'kemenekraf',
      image: null,
      views: 89,
      tags: ['workshop', 'entrepreneur', 'bisnis'],
      created_at: new Date(Date.now() - 24 * 60 * 60 * 1000).toISOString()
    },
    {
      id: 3,
      title: 'Program Bantuan Sosial Mahasiswa',
      excerpt: 'Kemenkesra meluncurkan program bantuan sosial untuk mahasiswa yang membutuhkan.',
      content: 'Program ini merupakan wujud kepedulian BEM UNRI terhadap kesejahteraan mahasiswa.',
      author: 'Kemenkesra',
      category: 'kemenkesra',
      image: null,
      views: 67,
      tags: ['bantuan', 'sosial', 'mahasiswa'],
      created_at: new Date(Date.now() - 2 * 24 * 60 * 60 * 1000).toISOString()
    }
  ]
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

// Provide functions for child components
provide('getCategoryClass', getCategoryClass)
provide('getCategoryName', getCategoryName)
provide('formatDate', formatDate)

// Lifecycle
onMounted(loadNews)
</script>

<script>
// Skeleton component for loading state
const NewsCardSkeleton = {
  template: `
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full animate-pulse">
      <div class="aspect-video bg-gray-200"></div>
      <div class="p-4 sm:p-6">
        <div class="flex items-center space-x-2 mb-3">
          <div class="h-5 w-20 bg-gray-200 rounded-full"></div>
          <div class="h-4 w-24 bg-gray-200 rounded"></div>
        </div>
        <div class="h-6 bg-gray-200 rounded mb-2"></div>
        <div class="h-6 bg-gray-200 rounded mb-3 w-3/4"></div>
        <div class="space-y-2 mb-4">
          <div class="h-4 bg-gray-200 rounded"></div>
          <div class="h-4 bg-gray-200 rounded"></div>
          <div class="h-4 bg-gray-200 rounded w-2/3"></div>
        </div>
        <div class="flex justify-between items-center">
          <div class="h-4 w-20 bg-gray-200 rounded"></div>
          <div class="h-4 w-24 bg-gray-200 rounded"></div>
        </div>
      </div>
    </div>
  `
}

// News Card Component
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
        <img 
          v-if="validImage"
          :src="getImageUrl(news.image)"
          :alt="news.title"
          class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
          @error="onImageError"
        >
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
      return this.news.image && !this.imageError
    }
  },
  methods: {
    getImageUrl(imagePath) {
      if (!imagePath) return ''
      return imagePath.startsWith('http') ? imagePath : `/storage/${imagePath}`
    },
    onImageError() {
      this.imageError = true
    }
  }
}

// News Detail Modal Component
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
            <img 
              v-if="news.image" 
              :src="getImageUrl(news.image)" 
              :alt="news.title"
              class="w-full h-full object-cover rounded-xl"
            >
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
      if (!imagePath) return ''
      return imagePath.startsWith('http') ? imagePath : `/storage/${imagePath}`
    }
  }
}

export default {
  name: 'HomeNewsSection',
  components: {
    NewsCard,
    NewsCardSkeleton,
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

@keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: .5;
  }
}

.animate-pulse {
  animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
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