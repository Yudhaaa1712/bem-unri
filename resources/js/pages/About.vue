<template>
  <div class="min-h-screen bg-white">
    <Header />
    
    <!-- Visi Misi Section -->
    <VisiMisi />
    
    <!-- Struktur Organisasi Section -->
    <section class="py-8 sm:py-12 lg:py-20 bg-white">
      <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8 sm:mb-12 lg:mb-16">
          <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent mb-4">
            Struktur <span class="bg-gradient-to-r from-[#eb7118] to-[#ffe500] bg-clip-text text-transparent">Organisasi</span>
          </h2>
        </div>

        <!-- Organigram Container -->
        <div 
          ref="organizationChart"
          class="bg-gradient-to-br from-blue-50 to-yellow-50 p-3 sm:p-4 md:p-6 lg:p-8 rounded-xl sm:rounded-2xl lg:rounded-3xl shadow-lg sm:shadow-xl lg:shadow-2xl border border-white sm:border-2 lg:border-4 transition-all duration-1000 ease-out"
          :class="isChartVisible ? 'scale-100 opacity-100' : 'scale-95 sm:scale-85 opacity-75'"
        >
          <div class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl overflow-hidden shadow-inner">
            <img 
              :src="organizationChartImage" 
              alt="Struktur Organisasi BEM UNRI" 
              class="w-full object-contain transition-all duration-1000 ease-out"
              :class="getChartImageClasses()"
              @error="handleImageError"
              loading="lazy"
            />
          </div>
        </div>    
      </div>
    </section>
    
    <!-- Departemen Section -->
    <section class="py-8 sm:py-12 lg:py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8 sm:mb-12 lg:mb-16">
          <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent mb-4">
            Kementrian <span class="bg-gradient-to-r from-[#eb7118] to-[#ffe500] bg-clip-text text-transparent">BEM UNRI</span>
          </h2>
        </div>

        <!-- Responsive Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-2 gap-4 sm:gap-6 lg:gap-8 max-w-6xl mx-auto">
          <div 
            v-for="department in departments"
            :key="department.id"
            class="group"
          >
            <!-- Foto dengan overlay - NON CLICKABLE -->
            <div class="relative overflow-hidden rounded-lg sm:rounded-xl shadow-md sm:shadow-lg transition-shadow duration-300 mb-4 sm:mb-6 pointer-events-none">
              <img 
                :src="department.image" 
                :alt="`Departemen ${department.name}`"
                class="w-full object-cover transition-transform duration-300"
                :class="getDepartmentImageClasses()"
                @error="handleDepartmentImageError($event, department.id)"
                loading="lazy"
              />
              
              <!-- Overlay with improved mobile visibility -->
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent sm:from-black/60 sm:via-transparent">
                <div class="absolute bottom-3 sm:bottom-6 lg:bottom-8 left-3 sm:left-6 lg:left-8 right-3 sm:right-6 lg:right-8">
                  <h3 class="text-white text-sm sm:text-xl md:text-2xl lg:text-3xl font-bold tracking-wide sm:tracking-wider">
                    Departemen
                  </h3>
                  <h4 class="text-yellow-400 text-lg sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-black leading-tight">
                    {{ department.name }}
                  </h4>
                </div>
              </div>
            </div>
            
            <!-- Button with improved mobile touch - CLICKABLE -->
            <div class="flex justify-center">
              <a 
                :href="department.url"
                class="bg-gradient-to-r from-[#034caa] to-[#003375] text-white px-6 py-2.5 sm:px-8 sm:py-3 lg:px-10 lg:py-4 rounded-full text-xs sm:text-sm lg:text-base font-semibold transition-all duration-200 shadow-md sm:shadow-lg hover:shadow-lg sm:hover:shadow-xl hover:scale-105 active:scale-95 min-h-[44px] touch-manipulation no-underline inline-block"
                :aria-label="`Baca lebih lanjut tentang Departemen ${department.name}`"
              >
                READ MORE
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <Footer />
  </div>
</template>

<script>
import Header from '../components/Header.vue'
import VisiMisi from '../components/VisiMisi.vue'
import Footer from '../components/Footer.vue'

export default {
  name: 'AboutPage',
  components: {
    Header,
    VisiMisi,
    Footer
  },
  data() {
    return {
      organizationChartImage: '/images/rektorat2.jpg',
      isChartVisible: false,
      observer: null,
      screenSize: 'mobile',
      departments: [
        {
          id: 'keilmuan',
          name: 'KEILMUAN',
          image: '/images/fotbarkbl.jpeg',
          url: '/kemendagri'
        },
        {
          id: 'eld',
          name: 'ELD',
          image: '/images/fotbarkbl.jpeg',
          url: '/kemensosmas'
        },
        {
          id: 'pengmas',
          name: 'PENGMAS',
          image: '/images/fotbarkbl.jpeg',
          url: '/pengmas'
        },
        {
          id: 'kastrat',
          name: 'KASTRAT',
          image: '/images/fotbarkbl.jpeg',
          url: '/kastrat'
        }
      ]
    }
  },
  mounted() {
    this.initScrollObserver()
    this.detectScreenSize()
    this.addResizeListener()
  },
  beforeUnmount() {
    if (this.observer) {
      this.observer.disconnect()
    }
    window.removeEventListener('resize', this.detectScreenSize)
  },
  methods: {
    initScrollObserver() {
      const options = {
        root: null,
        rootMargin: '-10% 0px -10% 0px',
        threshold: [0.2, 0.5, 0.8]
      }

      this.observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          this.isChartVisible = entry.isIntersecting && entry.intersectionRatio >= 0.2
        })
      }, options)

      this.$nextTick(() => {
        if (this.$refs.organizationChart) {
          this.observer.observe(this.$refs.organizationChart)
        }
      })
    },
    
    detectScreenSize() {
      const width = window.innerWidth
      if (width < 640) {
        this.screenSize = 'mobile'
      } else if (width < 1024) {
        this.screenSize = 'tablet'
      } else {
        this.screenSize = 'desktop'
      }
    },
    
    addResizeListener() {
      window.addEventListener('resize', this.detectScreenSize)
    },
    
    getChartImageClasses() {
      if (!this.isChartVisible) {
        return 'h-16 sm:h-20 md:h-32 lg:h-56'
      }
      
      switch (this.screenSize) {
        case 'mobile':
          return 'h-48 sm:h-56'
        case 'tablet':
          return 'h-64 md:h-80'
        case 'desktop':
        default:
          return 'h-96 lg:h-screen xl:max-h-[800px]'
      }
    },
    
    getDepartmentImageClasses() {
      switch (this.screenSize) {
        case 'mobile':
          return 'h-48 xs:h-52 sm:h-64'
        case 'tablet':
          return 'h-64 md:h-72'
        case 'desktop':
        default:
          return 'h-80 lg:h-96 xl:h-[400px]'
      }
    },
    
    handleImageError(event) {
      console.error('Error loading organization chart image:', event.target.src)
      event.target.style.display = 'none'
      
      // Fallback: show text message
      const container = event.target.parentElement
      if (container) {
        container.innerHTML = `
          <div class="flex items-center justify-center h-64 bg-gray-100 text-gray-500">
            <p class="text-center px-4">Struktur organisasi sedang dimuat...</p>
          </div>
        `
      }
    },
    
    handleDepartmentImageError(event, departmentId) {
      console.warn(`Failed to load image for department: ${departmentId}`)
      event.target.src = '/images/placeholder-department.jpg'
      
      // If placeholder also fails, use a colored background
      event.target.onerror = () => {
        const container = event.target.parentElement
        if (container) {
          container.innerHTML = `
            <div class="flex items-center justify-center ${this.getDepartmentImageClasses()} bg-gradient-to-br from-blue-400 to-blue-600 text-white">
              <span class="text-xl font-bold">${departmentId.toUpperCase()}</span>
            </div>
          `
        }
      }
    }
  }
}
</script>

<style scoped>
/* Ensure smooth scrolling and touch optimization */
* {
  -webkit-tap-highlight-color: transparent;
}

/* Custom breakpoint for very small screens */
@media (max-width: 375px) {
  .text-2xl {
    font-size: 1.25rem;
  }
  
  .px-4 {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
  }
}

/* Improve focus visibility for accessibility */
[tabindex]:focus {
  outline: 2px solid #034caa;
  outline-offset: 2px;
}

/* Optimize images for different screen densities */
img {
  image-rendering: -webkit-optimize-contrast;
  image-rendering: optimize-contrast;
}

/* Ensure minimum touch target size (44px) */
.touch-manipulation {
  touch-action: manipulation;
}
</style>