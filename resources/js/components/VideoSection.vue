<!-- resources/js/components/VideoSection.vue -->
<template>
  <section 
    ref="sectionRef"
    class="py-8 sm:py-12 lg:py-20 bg-white overflow-hidden"
  >
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
        
        <!-- Video Description - Mobile First -->
        <div 
          ref="textRef"
          class="lg:order-2 space-y-4 transform transition-all duration-3000 ease-out"
          :class="isVisible ? 'opacity-100' : 'opacity-0'"
        >
          <div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 leading-tight transform transition-all duration-3000 ease-out"
                :class="isVisible ? 'opacity-100' : 'opacity-0'"
            >
              <span class="bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent">
                Video Profil
              </span>
            </h2>
          </div>

          <div class="space-y-4">
            <p class="text-base text-gray-800 leading-relaxed text-justify transform transition-all duration-3000 ease-out"
               :class="isVisible ? 'opacity-100' : 'opacity-0'"
            >
              Saksikan perjalanan dan dedikasi BEM UNRI Kabinet Biru Langit dalam mengabdi kepada mahasiswa 
              Universitas Riau. Video profil ini menampilkan komitmen kami dalam mewujudkan perubahan positif.
            </p>
            
            <p class="text-sm text-gray-700 leading-relaxed text-justify transform transition-all duration-3000 ease-out"
               :class="isVisible ? 'opacity-100' : 'opacity-0'"
            >
              Dari program kerja inovatif hingga pencapaian yang membanggakan, temukan bagaimana kami 
              bekerja keras untuk menciptakan lingkungan kampus yang lebih baik bagi seluruh mahasiswa.
            </p>

            <!-- Discover More Button -->
            <div class="pt-4 transform transition-all duration-3000 ease-out"
                 :class="isVisible ? 'opacity-100 scale-100' : 'opacity-0 scale-95'"
            >
              <button 
                @click="handleCoverMore"
                class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-[#034caa] to-[#003375] text-white font-semibold rounded-lg hover:from-[#003375] hover:to-[#034caa] transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-[#034caa] focus:ring-opacity-50 group"
              >
                <span class="text-sm">Discover More</span>
                <svg class="ml-2 w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- YouTube Video Card -->
        <div 
          ref="videoRef"
          class="lg:order-1 transform transition-all duration-[3000ms] ease-out"
          :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-16 opacity-0'"
        >
          <div class="relative group">
            <!-- YouTube Embedded Video -->
            <div class="aspect-video rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
              <iframe 
                :src="youtubeEmbedURL"
                class="w-full h-full"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
                title="Video Profil BEM UNRI"
                loading="lazy"
              ></iframe>
            </div>
            
            <!-- Optional: Video overlay for better mobile interaction -->
            <div class="absolute inset-0 bg-transparent rounded-lg pointer-events-none group-hover:bg-black group-hover:bg-opacity-5 transition-all duration-300"></div>
          </div>
        </div>
        
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'

// Refs untuk animasi
const sectionRef = ref(null)
const videoRef = ref(null)
const textRef = ref(null)
const isVisible = ref(false)

// YouTube Video ID - ganti dengan ID video yang sesuai
const youtubeVideoID = ref('_LKCDs-ztyQ')

// Convert YouTube ID to embed URL
const youtubeEmbedURL = computed(() => {
  return `https://www.youtube.com/embed/${youtubeVideoID.value}?rel=0&modestbranding=1`
})

// Intersection Observer untuk mendeteksi kapan section masuk viewport
let observer = null

const initScrollAnimation = () => {
  if (!sectionRef.value) return

  observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // Delay singkat untuk efek yang terlihat
          setTimeout(() => {
            isVisible.value = true
          }, 150)
        }
      })
    },
    {
      threshold: 0.2, // Trigger ketika 20% dari section terlihat
      rootMargin: '-50px' // Offset untuk trigger yang natural
    }
  )

  observer.observe(sectionRef.value)
}

// Cleanup observer
const cleanupObserver = () => {
  if (observer) {
    observer.disconnect()
    observer = null
  }
}

// Function to set new video ID
const setYouTubeVideoID = (newVideoID) => {
  youtubeVideoID.value = newVideoID
}

// Function to handle Discover More button click
const handleCoverMore = () => {
  // Tambahkan logika sesuai kebutuhan, misalnya:
  // - Navigate ke halaman lain
  // - Show modal
  // - Scroll ke section tertentu
  // - Emit event ke parent component
  console.log('Discover More button clicked')
  
  // Contoh implementasi scroll ke section berikutnya
  const nextSection = document.querySelector('#next-section')
  if (nextSection) {
    nextSection.scrollIntoView({ behavior: 'smooth' })
  }
  
  // Contoh emit event (jika diperlukan):
  // emit('discoverMore')
}

// Lifecycle hooks
onMounted(() => {
  initScrollAnimation()
})

onUnmounted(() => {
  cleanupObserver()
})

// Expose functions for parent component if needed
defineExpose({
  setYouTubeVideoID
})
</script>

<script>
export default {
  name: 'VideoSection'
}
</script>

<style scoped>
/* Custom styles for better mobile experience */
@media (max-width: 640px) {
  .aspect-video {
    border-radius: 0.5rem;
  }
}

/* Improved focus states for accessibility */
button:focus-visible {
  outline: 2px solid #034caa;
  outline-offset: 2px;
}

/* Enhanced hover effects */
.group:hover .group-hover\:translate-x-1 {
  transform: translateX(0.25rem);
}

/* Smooth transitions for all interactive elements */
* {
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Custom easing untuk animasi masuk */
.ease-out {
  transition-timing-function: cubic-bezier(0.0, 0, 0.2, 1);
}

/* Custom gradient animation */
@keyframes gradient-x {
  0%, 100% {
    background-size: 200% 200%;
    background-position: left center;
  }
  50% {
    background-size: 200% 200%;
    background-position: right center;
  }
}

.bg-gradient-to-r:hover {
  animation: gradient-x 3s ease infinite;
}

/* Preload state untuk mencegah flash */
@media (prefers-reduced-motion: no-preference) {
  .transform {
    will-change: transform, opacity;
  }
}

/* Reduced motion support */
@media (prefers-reduced-motion: reduce) {
  .transform {
    transition-duration: 0.01ms !important;
    transition-delay: 0ms !important;
  }
}
</style>