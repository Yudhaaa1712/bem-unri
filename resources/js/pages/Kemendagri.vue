<!-- resources/js/pages/Kemendagri.vue -->
<template>
  <div class="min-h-screen bg-gradient-to-br from-biru-langit-50 to-white">
    <Header />
    
    <!-- Kementerian Header Section -->
    <section class="py-20 bg-gradient-to-r from-biru-langit-500 to-biru-langit-700 text-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <!-- Breadcrumb -->
          <nav class="mb-8">
            <ol class="flex items-center justify-center space-x-2 text-biru-langit-100">
              <li><a href="/" class="hover:text-white transition-colors">Home</a></li>
              <li class="text-biru-langit-300">›</li>
              <li><a href="/about" class="hover:text-white transition-colors">About</a></li>
              <li class="text-biru-langit-300">›</li>
              <li class="text-white font-semibold">Kementerian Dalam Negeri</li>
            </ol>
          </nav>

          <!-- Department Logo -->
          <div class="w-32 h-32 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-8 backdrop-blur-sm">
            <span class="text-6xl">🏛️</span>
          </div>

          <!-- Department Name -->
          <h1 class="text-5xl lg:text-6xl font-bold mb-6 text-shadow-lg">
            Kementerian Dalam Negeri
          </h1>

          <!-- Department Description -->
          <p class="text-xl lg:text-2xl text-biru-langit-100 max-w-4xl mx-auto leading-relaxed mb-8">
            Kementerian Dalam Negeri bertugas mengelola urusan internal organisasi BEM UNRI, 
            pengembangan sumber daya manusia, koordinasi antar departemen, dan penguatan 
            kapasitas organisasi untuk mencapai visi misi Kabinet Biru Langit.
          </p>

          <!-- Stats -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-2xl mx-auto">
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
              <div class="text-3xl font-bold text-kuning-emas-400">15+</div>
              <div class="text-biru-langit-100">Anggota Aktif</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
              <div class="text-3xl font-bold text-kuning-emas-400">8</div>
              <div class="text-biru-langit-100">Program Kerja</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
              <div class="text-3xl font-bold text-kuning-emas-400">2025</div>
              <div class="text-biru-langit-100">Periode Aktif</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Program Kerja Section -->
    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-4xl lg:text-5xl font-bold text-biru-langit-700 mb-6">
            Program Kerja
          </h2>
          <div class="h-1 w-32 bg-gradient-to-r from-biru-langit-500 to-kuning-emas-500 rounded-full mx-auto mb-6"></div>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Program kerja unggulan Kementerian Dalam Negeri untuk pengembangan internal organisasi dan SDM
          </p>
        </div>

        <!-- Program Cards with Flip Animation -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Program Card 1 -->
          <div class="program-card group h-80 relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="card-inner absolute inset-0 w-full h-full transition-transform duration-700 group-hover:rotate-y-180">
              <!-- Front Side -->
              <div class="card-face card-front absolute inset-0 bg-gradient-to-br from-biru-langit-400 to-biru-langit-600 flex items-center justify-center text-white rounded-2xl">
                <div class="text-center p-6">
                  <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">👥</span>
                  </div>
                  <h3 class="text-xl font-bold">Pelatihan Kepemimpinan</h3>
                  <p class="text-sm opacity-90 mt-2">Pengembangan soft skill anggota</p>
                </div>
              </div>
              <!-- Back Side -->
              <div class="card-face card-back absolute inset-0 bg-white p-6 flex items-center justify-center rounded-2xl">
                <div class="text-center">
                  <h4 class="text-lg font-bold text-biru-langit-700 mb-3">Detail Program</h4>
                  <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    Program pelatihan kepemimpinan untuk meningkatkan kapasitas anggota BEM dalam mengelola organisasi dan memimpin tim.
                  </p>
                  <div class="text-xs text-gray-500 mb-3">Target: 50+ peserta</div>
                  <button class="bg-biru-langit-500 hover:bg-biru-langit-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Detail</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Program Card 2 -->
          <div class="program-card group h-80 relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="card-inner absolute inset-0 w-full h-full transition-transform duration-700 group-hover:rotate-y-180">
              <!-- Front Side -->
              <div class="card-face card-front absolute inset-0 bg-gradient-to-br from-kuning-emas-400 to-kuning-emas-600 flex items-center justify-center text-white rounded-2xl">
                <div class="text-center p-6">
                  <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">📋</span>
                  </div>
                  <h3 class="text-xl font-bold">Koordinasi Antar Divisi</h3>
                  <p class="text-sm opacity-90 mt-2">Sinkronisasi program kerja</p>
                </div>
              </div>
              <!-- Back Side -->
              <div class="card-face card-back absolute inset-0 bg-white p-6 flex items-center justify-center rounded-2xl">
                <div class="text-center">
                  <h4 class="text-lg font-bold text-kuning-emas-600 mb-3">Detail Program</h4>
                  <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    Memfasilitasi koordinasi dan sinkronisasi program kerja antar departemen untuk menciptakan sinergi yang optimal.
                  </p>
                  <div class="text-xs text-gray-500 mb-3">Frekuensi: Bulanan</div>
                  <button class="bg-kuning-emas-500 hover:bg-kuning-emas-600 text-biru-langit-800 font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Detail</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Program Card 3 -->
          <div class="program-card group h-80 relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="card-inner absolute inset-0 w-full h-full transition-transform duration-700 group-hover:rotate-y-180">
              <!-- Front Side -->
              <div class="card-face card-front absolute inset-0 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white rounded-2xl">
                <div class="text-center p-6">
                  <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">📚</span>
                  </div>
                  <h3 class="text-xl font-bold">Training & Development</h3>
                  <p class="text-sm opacity-90 mt-2">Peningkatan kompetensi</p>
                </div>
              </div>
              <!-- Back Side -->
              <div class="card-face card-back absolute inset-0 bg-white p-6 flex items-center justify-center rounded-2xl">
                <div class="text-center">
                  <h4 class="text-lg font-bold text-green-600 mb-3">Detail Program</h4>
                  <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    Program pelatihan berkelanjutan untuk meningkatkan kompetensi teknis dan manajerial anggota organisasi.
                  </p>
                  <div class="text-xs text-gray-500 mb-3">Durasi: 6 bulan</div>
                  <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Detail</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Program Card 4 -->
          <div class="program-card group h-80 relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="card-inner absolute inset-0 w-full h-full transition-transform duration-700 group-hover:rotate-y-180">
              <!-- Front Side -->
              <div class="card-face card-front absolute inset-0 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center text-white rounded-2xl">
                <div class="text-center p-6">
                  <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">⚡</span>
                  </div>
                  <h3 class="text-xl font-bold">Sistem Informasi Internal</h3>
                  <p class="text-sm opacity-90 mt-2">Digitalisasi administrasi</p>
                </div>
              </div>
              <!-- Back Side -->
              <div class="card-face card-back absolute inset-0 bg-white p-6 flex items-center justify-center rounded-2xl">
                <div class="text-center">
                  <h4 class="text-lg font-bold text-purple-600 mb-3">Detail Program</h4>
                  <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    Pengembangan sistem informasi untuk mempermudah administrasi internal dan monitoring kinerja organisasi.
                  </p>
                  <div class="text-xs text-gray-500 mb-3">Platform: Web & Mobile</div>
                  <button class="bg-purple-500 hover:bg-purple-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Detail</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Program Card 5 -->
          <div class="program-card group h-80 relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="card-inner absolute inset-0 w-full h-full transition-transform duration-700 group-hover:rotate-y-180">
              <!-- Front Side -->
              <div class="card-face card-front absolute inset-0 bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center text-white rounded-2xl">
                <div class="text-center p-6">
                  <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🎯</span>
                  </div>
                  <h3 class="text-xl font-bold">Evaluasi Kinerja</h3>
                  <p class="text-sm opacity-90 mt-2">Monitoring & assessment</p>
                </div>
              </div>
              <!-- Back Side -->
              <div class="card-face card-back absolute inset-0 bg-white p-6 flex items-center justify-center rounded-2xl">
                <div class="text-center">
                  <h4 class="text-lg font-bold text-indigo-600 mb-3">Detail Program</h4>
                  <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    Sistem evaluasi kinerja berkala untuk mengukur efektivitas program dan kinerja anggota organisasi.
                  </p>
                  <div class="text-xs text-gray-500 mb-3">Periode: Triwulan</div>
                  <button class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Detail</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Program Card 6 -->
          <div class="program-card group h-80 relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="card-inner absolute inset-0 w-full h-full transition-transform duration-700 group-hover:rotate-y-180">
              <!-- Front Side -->
              <div class="card-face card-front absolute inset-0 bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center text-white rounded-2xl">
                <div class="text-center p-6">
                  <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🤝</span>
                  </div>
                  <h3 class="text-xl font-bold">Team Building</h3>
                  <p class="text-sm opacity-90 mt-2">Penguatan solidaritas</p>
                </div>
              </div>
              <!-- Back Side -->
              <div class="card-face card-back absolute inset-0 bg-white p-6 flex items-center justify-center rounded-2xl">
                <div class="text-center">
                  <h4 class="text-lg font-bold text-red-600 mb-3">Detail Program</h4>
                  <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    Kegiatan team building untuk mempererat hubungan dan meningkatkan kerjasama antar anggota departemen.
                  </p>
                  <div class="text-xs text-gray-500 mb-3">Kegiatan: Outbound</div>
                  <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Detail</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Staff Photo Gallery Section - Vue Card Swipe Style -->
    <section class="py-20 bg-gradient-to-br from-biru-langit-50 to-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-4xl lg:text-5xl font-bold text-biru-langit-700 mb-6">
            Tim <span class="text-kuning-emas-600">Kementerian</span>
          </h2>
          <div class="h-1 w-32 bg-gradient-to-r from-biru-langit-500 to-kuning-emas-500 rounded-full mx-auto mb-6"></div>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Anggota pengurus Kementerian Dalam Negeri Kabinet Biru Langit 2025
          </p>
        </div>

        <!-- Vue Card Swipe Implementation -->
        <div class="card-swipe-container relative" ref="cardSwipeContainer">
          <div 
            class="card-swipe-wrapper"
            :style="{ transform: `translateX(${translateX}px)` }"
            @touchstart="onTouchStart"
            @touchmove="onTouchMove"
            @touchend="onTouchEnd"
            @mousedown="onMouseDown"
            @mousemove="onMouseMove"
            @mouseup="onMouseUp"
            @mouseleave="onMouseUp"
          >
            <!-- Staff Cards -->
            <div 
              v-for="(card, index) in infiniteCards" 
              :key="`card-${index}`"
              class="card-swipe-item"
              :class="{ 'is-active': index === activeIndex }"
            >
              <div class="rounded-3xl shadow-lg overflow-hidden bg-white">
                <div class="aspect-square overflow-hidden">
                  <img 
                    v-if="card.image"
                    :src="card.image" 
                    :alt="card.name" 
                    class="w-full h-full object-cover"
                    loading="lazy"
                  />
                  <div v-else class="w-full h-full bg-gray-100 flex items-center justify-center">
                    <span class="text-3xl text-gray-400">📷</span>
                  </div>
                </div>
                <div class="px-4 py-3 text-center backdrop-blur-sm">
                  <h3 class="text-base font-semibold text-slate-800 mb-1 italic">{{ card.name }}</h3>
                  <p class="text-gray-500 text-xs mb-2">{{ card.position }}</p>
                  <div class="flex justify-center">
                    <div class="w-5 h-5 bg-blue-600 rounded-sm flex items-center justify-center">
                      <span class="text-white text-xs font-bold">in</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Navigation Arrows -->
          <button 
            @click="prev"
            class="staff-nav-btn staff-nav-left absolute left-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:scale-110 z-10"
          >
            <svg class="w-6 h-6 text-biru-langit-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
          </button>

          <button 
            @click="next"
            class="staff-nav-btn staff-nav-right absolute right-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:scale-110 z-10"
          >
            <svg class="w-6 h-6 text-biru-langit-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </button>
        </div>
      </div>
    </section>

    <Footer />
  </div>
</template>
<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'

export default {
  name: 'KemendagriPage',
  components: {
    Header,
    Footer
  },
  data() {
    return {
      // Staff data
      staffCards: [
        { 
          id: 1, 
          name: 'Altamis Rafie', 
          position: 'Staff', 
          image: '/images/yudha.png' 
        },
        { 
          id: 2, 
          name: 'Christina Marsha', 
          position: 'Staff', 
          image:'/images/Phourto-35.jpg' 
        },
        { 
          id: 3, 
          name: 'Kalya Salsabila', 
          position: 'Staff', 
          image:'/images/Phourto-36.jpg' 
        },
        { 
          id: 4, 
          name: 'Nama Staff 4', 
          position: 'Staff', 
          image: '/images/Phourto-37.jpg' 
        },
        { 
          id: 5, 
          name: 'Nama Staff 5', 
          position: 'Staff', 
          image: '/images/Phourto-38.jpg' 
        },
        { 
          id: 6, 
          name: 'Nama Staff 6', 
          position: 'Staff', 
          image:'/images/Phourto-39.jpg' 
        }
      ],

      // Card swipe properties
      translateX: 0,
      activeIndex: 0,
      cardWidth: 200,
      
      // Touch/Mouse handling
      isDragging: false,
      startX: 0,
      currentX: 0,
      startTranslateX: 0,
      
      // Auto swipe
      autoSwipeInterval: null,
      autoSwipeSpeed: 0.4, // Super lambat dari 2 ke 0.2
      
      // Infinite seamless loop
      resetPosition: 0
    }
  },
  computed: {
    infiniteCards() {
      // Create seamless infinite loop dengan 3 sets
      return [...this.staffCards, ...this.staffCards, ...this.staffCards];
    },
    
    totalCards() {
      return this.staffCards.length;
    },
    
    oneSetWidth() {
      return this.totalCards * this.cardWidth;
    }
  },
  mounted() {
    this.calculateCardWidth();
    // Start di posisi set tengah untuk seamless loop
    this.translateX = -this.oneSetWidth;
    this.resetPosition = -this.oneSetWidth;
    this.startAutoSwipe();
    window.addEventListener('resize', this.calculateCardWidth);
  },
  beforeUnmount() {
    this.stopAutoSwipe();
    window.removeEventListener('resize', this.calculateCardWidth);
  },
  methods: {
    // Auto swipe functionality
    startAutoSwipe() {
      this.autoSwipeInterval = setInterval(() => {
        if (!this.isDragging) {
          this.translateX -= this.autoSwipeSpeed;
          this.checkInfiniteLoop();
        }
      }, 50); // Diperlambat ke 50ms (~20fps)
    },
    
    stopAutoSwipe() {
      if (this.autoSwipeInterval) {
        clearInterval(this.autoSwipeInterval);
      }
    },
    
    // Infinite seamless loop logic
    checkInfiniteLoop() {
      // Kalau udah scroll terlalu jauh ke kanan (melewati set terakhir)
      if (this.translateX <= -(this.oneSetWidth * 2)) {
        // Reset ke posisi set tengah tanpa animasi
        this.translateX = -this.oneSetWidth;
      }
      // Kalau scroll terlalu jauh ke kiri (melewati set pertama)
      else if (this.translateX >= 0) {
        // Reset ke posisi set tengah tanpa animasi
        this.translateX = -this.oneSetWidth;
      }
    },
    
    // Touch events
    onTouchStart(event) {
      this.isDragging = true;
      this.startX = event.touches[0].clientX;
      this.startTranslateX = this.translateX;
      this.stopAutoSwipe();
    },
    
    onTouchMove(event) {
      if (!this.isDragging) return;
      
      event.preventDefault();
      this.currentX = event.touches[0].clientX;
      const deltaX = this.currentX - this.startX;
      this.translateX = this.startTranslateX + deltaX;
      this.checkInfiniteLoop();
    },
    
    onTouchEnd() {
      this.isDragging = false;
      this.pauseAutoScroll(); // Pause auto scroll setelah touch
    },
    
    // Mouse events
    onMouseDown(event) {
      this.isDragging = true;
      this.startX = event.clientX;
      this.startTranslateX = this.translateX;
      this.stopAutoSwipe();
      event.preventDefault();
    },
    
    onMouseMove(event) {
      if (!this.isDragging) return;
      
      event.preventDefault();
      this.currentX = event.clientX;
      const deltaX = this.currentX - this.startX;
      this.translateX = this.startTranslateX + deltaX;
      this.checkInfiniteLoop();
    },
    
    onMouseUp() {
      this.isDragging = false;
      this.pauseAutoScroll(); // Pause auto scroll setelah drag
    },
    
    // Responsive card width calculation
    calculateCardWidth() {
      const screenWidth = window.innerWidth;
      if (screenWidth >= 1280) {
        this.cardWidth = Math.min(280, screenWidth / 5);
      } else if (screenWidth >= 1024) {
        this.cardWidth = Math.min(320, screenWidth / 4);
      } else if (screenWidth >= 768) {
        this.cardWidth = Math.min(400, screenWidth / 2);
      } else {
        this.cardWidth = screenWidth - 32;
      }
    },
    
    // Public API methods (vue-card-swipe style)
    next() {
      this.translateX -= this.cardWidth;
      this.checkInfiniteLoop();
      // Pause auto scroll sebentar setelah manual navigation
      this.pauseAutoScroll();
    },
    
    prev() {
      this.translateX += this.cardWidth;
      this.checkInfiniteLoop();
      // Pause auto scroll sebentar setelah manual navigation
      this.pauseAutoScroll();
    },
    
    goTo(index) {
      // Navigate ke card di set tengah
      this.translateX = -this.oneSetWidth - (index * this.cardWidth);
      this.checkInfiniteLoop();
    },
    
    // Reset to center set smoothly
    resetToCenter() {
      this.translateX = -this.oneSetWidth;
    },

    // Pause auto scroll temporarily after manual interaction
    pauseAutoScroll() {
      this.stopAutoSwipe();
      setTimeout(() => {
        this.startAutoSwipe();
      }, 2000); // Resume setelah 2 detik
    }
  }
}
</script>

<style scoped>
.text-shadow-lg {
  text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

/* Program card styles - FIXED */
.program-card {
  perspective: 1000px;
}

.card-inner {
  transform-style: preserve-3d;
}

.program-card:hover .card-inner {
  transform: rotateY(180deg);
}

.card-face {
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.card-back {
  transform: rotateY(180deg);
}

/* Vue Card Swipe Styles */
.card-swipe-container {
  overflow: hidden;
  position: relative;
  width: 100%;
  padding: 1rem 0;
}

.card-swipe-wrapper {
  display: flex;
  will-change: transform;
}

.card-swipe-item {
  flex-shrink: 0;
  width: 280px;
  padding: 0 0.5rem;
  transition: transform 0.6s ease, opacity 0.6s ease;
}

.card-swipe-item:hover {
  transform: translateY(-8px) scale(1.02);
  z-index: 10;
}

.card-swipe-item.is-active {
  transform: scale(0.3s);
  opacity: 0.3s;
}

/* Prevent text selection during drag */
.card-swipe-wrapper:active * {
  user-select: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  pointer-events: none;
}

/* Navigation Arrow Buttons */
.staff-nav-btn {
  backdrop-filter: blur(10px);
  border: none;
  transition: all 0.4s ease;
  opacity: 0.8;
}

.staff-nav-btn:hover {
  opacity: 1;
  transform: translateY(-50%) scale(1.1);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.staff-nav-btn:active {
  transform: translateY(-50%) scale(0.95);
}

.staff-nav-left {
  left: 1rem;
}

.staff-nav-right {
  right: 1rem;
}

/* Hide arrows on small screens */
@media (max-width: 640px) {
  .staff-nav-btn {
    display: none;
  }
}

@media (max-width: 1280px) {
  .card-swipe-item {
    width: 320px;
  }
}

@media (max-width: 1024px) {
  .card-swipe-item {
    width: 400px;
  }
}

@media (max-width: 768px) {
  .card-swipe-item {
    width: calc(100vw - 2rem);
  }
}
</style>