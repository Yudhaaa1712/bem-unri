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
          <div class="program-card group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" style="perspective: 1000px;">
            <div class="card-inner relative w-full h-80 transition-transform duration-700 group-hover:rotate-y-180" style="transform-style: preserve-3d;">
              <!-- Front Side -->
              <div class="card-face absolute w-full h-full bg-gradient-to-br from-biru-langit-400 to-biru-langit-600 flex items-center justify-center text-white" style="backface-visibility: hidden;">
                <div class="text-center p-6">
                  <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">👥</span>
                  </div>
                  <h3 class="text-xl font-bold">Pelatihan Kepemimpinan</h3>
                  <p class="text-sm opacity-90 mt-2">Pengembangan soft skill anggota</p>
                </div>
              </div>
              <!-- Back Side -->
              <div class="card-face absolute w-full h-full bg-white p-6 flex items-center justify-center" style="backface-visibility: hidden; transform: rotateY(180deg);">
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
          <div class="program-card group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" style="perspective: 1000px;">
            <div class="card-inner relative w-full h-80 transition-transform duration-700 group-hover:rotate-y-180" style="transform-style: preserve-3d;">
              <!-- Front Side -->
              <div class="card-face absolute w-full h-full bg-gradient-to-br from-kuning-emas-400 to-kuning-emas-600 flex items-center justify-center text-white" style="backface-visibility: hidden;">
                <div class="text-center p-6">
                  <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">📋</span>
                  </div>
                  <h3 class="text-xl font-bold">Koordinasi Antar Divisi</h3>
                  <p class="text-sm opacity-90 mt-2">Sinkronisasi program kerja</p>
                </div>
              </div>
              <!-- Back Side -->
              <div class="card-face absolute w-full h-full bg-white p-6 flex items-center justify-center" style="backface-visibility: hidden; transform: rotateY(180deg);">
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
          <div class="program-card group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" style="perspective: 1000px;">
            <div class="card-inner relative w-full h-80 transition-transform duration-700 group-hover:rotate-y-180" style="transform-style: preserve-3d;">
              <!-- Front Side -->
              <div class="card-face absolute w-full h-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white" style="backface-visibility: hidden;">
                <div class="text-center p-6">
                  <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">📚</span>
                  </div>
                  <h3 class="text-xl font-bold">Training & Development</h3>
                  <p class="text-sm opacity-90 mt-2">Peningkatan kompetensi</p>
                </div>
              </div>
              <!-- Back Side -->
              <div class="card-face absolute w-full h-full bg-white p-6 flex items-center justify-center" style="backface-visibility: hidden; transform: rotateY(180deg);">
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
          <div class="program-card group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" style="perspective: 1000px;">
            <div class="card-inner relative w-full h-80 transition-transform duration-700 group-hover:rotate-y-180" style="transform-style: preserve-3d;">
              <!-- Front Side -->
              <div class="card-face absolute w-full h-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center text-white" style="backface-visibility: hidden;">
                <div class="text-center p-6">
                  <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">⚡</span>
                  </div>
                  <h3 class="text-xl font-bold">Sistem Informasi Internal</h3>
                  <p class="text-sm opacity-90 mt-2">Digitalisasi administrasi</p>
                </div>
              </div>
              <!-- Back Side -->
              <div class="card-face absolute w-full h-full bg-white p-6 flex items-center justify-center" style="backface-visibility: hidden; transform: rotateY(180deg);">
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
          <div class="program-card group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" style="perspective: 1000px;">
            <div class="card-inner relative w-full h-80 transition-transform duration-700 group-hover:rotate-y-180" style="transform-style: preserve-3d;">
              <!-- Front Side -->
              <div class="card-face absolute w-full h-full bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center text-white" style="backface-visibility: hidden;">
                <div class="text-center p-6">
                  <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🎯</span>
                  </div>
                  <h3 class="text-xl font-bold">Evaluasi Kinerja</h3>
                  <p class="text-sm opacity-90 mt-2">Monitoring & assessment</p>
                </div>
              </div>
              <!-- Back Side -->
              <div class="card-face absolute w-full h-full bg-white p-6 flex items-center justify-center" style="backface-visibility: hidden; transform: rotateY(180deg);">
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
          <div class="program-card group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" style="perspective: 1000px;">
            <div class="card-inner relative w-full h-80 transition-transform duration-700 group-hover:rotate-y-180" style="transform-style: preserve-3d;">
              <!-- Front Side -->
              <div class="card-face absolute w-full h-full bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center text-white" style="backface-visibility: hidden;">
                <div class="text-center p-6">
                  <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🤝</span>
                  </div>
                  <h3 class="text-xl font-bold">Team Building</h3>
                  <p class="text-sm opacity-90 mt-2">Penguatan solidaritas</p>
                </div>
              </div>
              <!-- Back Side -->
              <div class="card-face absolute w-full h-full bg-white p-6 flex items-center justify-center" style="backface-visibility: hidden; transform: rotateY(180deg);">
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

<!-- Staff Photo Gallery Section -->
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

    <!-- Staff Cards Slider -->
    <div class="relative overflow-hidden">
      <div 
        class="flex transition-transform duration-500 ease-in-out"
        :style="{ transform: `translateX(-${currentStaffSlide * (10 / staffPerView)}%)` }"
      >
        <!-- Staff Card 1 -->
        <div class="w-lg md:w-1/2 lg:w-1/3 flex-shrink-0 px-3">
          <div class="bg-white rounded-[2.5rem] shadow-lg overflow-hidden">
            <!-- Photo Container with exact background -->
              <div class="aspect-square bg-gray-200 rounded-[2rem] flex items-center justify-center overflow-hidden">
               <img 
                    src="/images/yudha.png" 
                    alt="Yudha  " 
                    class="w-full h-full object-cover"
                    loading="lazy"
                />
              </div>
          
            <!-- Staff Info -->
            <div class="px-6 py-4 text-center overflow-hidden   ">
              <h3 class="text-lg font-semibold text-slate-800 mb-1 italic">Altamis Rafie</h3>
              <p class="text-gray-500 text-sm mb-3">Staff</p>
              <div class="flex justify-center">
                <div class="w-6 h-6 bg-blue-600 rounded-sm flex items-center justify-center">
                  <span class="text-white text-xs font-bold">in</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Staff Card 2 -->
        <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-3">
          <div class="bg-white rounded-[2.5rem] shadow-lg overflow-hidden">
            <!-- Photo Container with exact background -->
            <div class="bg-gradient-to-br from-slate-600 via-slate-700 to-slate-800 p-6">
              <div class="aspect-square bg-gray-200 rounded-[2rem] flex items-center justify-center overflow-hidden">
                <span class="text-6xl text-gray-400">📷</span>
              </div>
            </div>
            <!-- Staff Info -->
            <div class="px-6 py-4 text-center bg-white">
              <h3 class="text-lg font-semibold text-slate-800 mb-1 italic">Christina Marsha</h3>
              <p class="text-gray-500 text-sm mb-3">Staff</p>
              <div class="flex justify-center">
                <div class="w-6 h-6 bg-blue-600 rounded-sm flex items-center justify-center">
                  <span class="text-white text-xs font-bold">in</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Staff Card 3 -->
        <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-3">
          <div class="bg-white rounded-[2.5rem] shadow-lg overflow-hidden">
            <!-- Photo Container with exact background -->
            <div class="bg-gradient-to-br from-slate-600 via-slate-700 to-slate-800 p-6">
              <div class="aspect-square bg-gray-200 rounded-[2rem] flex items-center justify-center overflow-hidden">
                <span class="text-6xl text-gray-400">📷</span>
              </div>
            </div>
            <!-- Staff Info -->
            <div class="px-6 py-4 text-center bg-white">
              <h3 class="text-lg font-semibold text-slate-800 mb-1 italic">Kalya Salsabila</h3>
              <p class="text-gray-500 text-sm mb-3">Staff</p>
              <div class="flex justify-center">
                <div class="w-6 h-6 bg-blue-600 rounded-sm flex items-center justify-center">
                  <span class="text-white text-xs font-bold">in</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Staff Card 4 -->
        <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-3">
          <div class="bg-white rounded-[2.5rem] shadow-lg overflow-hidden">
            <!-- Photo Container with exact background -->
            <div class="bg-gradient-to-br from-slate-600 via-slate-700 to-slate-800 p-6">
              <div class="aspect-square bg-gray-200 rounded-[2rem] flex items-center justify-center overflow-hidden">
                <span class="text-6xl text-gray-400">📷</span>
              </div>
            </div>
            <!-- Staff Info -->
            <div class="px-6 py-4 text-center bg-white">
              <h3 class="text-lg font-semibold text-slate-800 mb-1 italic">Nama Staff 4</h3>
              <p class="text-gray-500 text-sm mb-3">Staff</p>
              <div class="flex justify-center">
                <div class="w-6 h-6 bg-blue-600 rounded-sm flex items-center justify-center">
                  <span class="text-white text-xs font-bold">in</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Staff Card 5 -->
        <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-3">
          <div class="bg-white rounded-[2.5rem] shadow-lg overflow-hidden">
            <!-- Photo Container with exact background -->
            <div class="bg-gradient-to-br from-slate-600 via-slate-700 to-slate-800 p-6">
              <div class="aspect-square bg-gray-200 rounded-[2rem] flex items-center justify-center overflow-hidden">
                <span class="text-6xl text-gray-400">📷</span>
              </div>
            </div>
            <!-- Staff Info -->
            <div class="px-6 py-4 text-center bg-white">
              <h3 class="text-lg font-semibold text-slate-800 mb-1 italic">Nama Staff 5</h3>
              <p class="text-gray-500 text-sm mb-3">Staff</p>
              <div class="flex justify-center">
                <div class="w-6 h-6 bg-blue-600 rounded-sm flex items-center justify-center">
                  <span class="text-white text-xs font-bold">in</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Staff Card 6 -->
        <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-3">
          <div class="bg-white rounded-[2.5rem] shadow-lg overflow-hidden">
            <!-- Photo Container with exact background -->
            <div class="bg-gradient-to-br from-slate-600 via-slate-700 to-slate-800 p-6">
              <div class="aspect-square bg-gray-200 rounded-[2rem] flex items-center justify-center overflow-hidden">
                <span class="text-6xl text-gray-400">📷</span>
              </div>
            </div>
            <!-- Staff Info -->
            <div class="px-6 py-4 text-center bg-white">
              <h3 class="text-lg font-semibold text-slate-800 mb-1 italic">Nama Staff 6</h3>
              <p class="text-gray-500 text-sm mb-3">Staff</p>
              <div class="flex justify-center">
                <div class="w-6 h-6 bg-blue-600 rounded-sm flex items-center justify-center">
                  <span class="text-white text-xs font-bold">in</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Navigation Arrows -->
      <button 
        @click="prevStaffSlide"
        class="absolute left-0 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:scale-110 z-10"
      >
        <svg class="w-6 h-6 text-biru-langit-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
      </button>

      <button 
        @click="nextStaffSlide"
        class="absolute right-0 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:scale-110 z-10"
      >
        <svg class="w-6 h-6 text-biru-langit-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </button>
    </div>

    <!-- Slide Indicators -->
    <div class="flex justify-center mt-8 space-x-2">
      <button 
        v-for="(indicator, index) in totalStaffSlides" 
        :key="index"
        @click="goToStaffSlide(index)"
        :class="currentStaffSlide === index ? 'bg-kuning-emas-500' : 'bg-gray-300'"
        class="w-3 h-3 rounded-full transition-all duration-300 hover:bg-kuning-emas-400"
      ></button>
    </div>

    <!-- Slide Info -->
    <div class="text-center mt-4">
      <p class="text-gray-600">
        <span class="font-semibold text-biru-langit-600">{{ currentStaffSlide + 1 }}</span> 
        dari 
        <span class="font-semibold text-biru-langit-600">{{ totalStaffSlides }}</span> 
        halaman
      </p>
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
      // Gallery Slider Data
      currentSlide: 0,
      totalSlides: 5,
      autoSlideInterval: null,
      
      // Staff Photo Gallery Data
      currentStaffSlide: 0,
      totalStaffMembers: 6,
      staffPerView: 3, // Jumlah staff yang ditampilkan per slide
    }
  },
  computed: {
    totalStaffSlides() {
      return Math.ceil(this.totalStaffMembers / this.staffPerView);
    }
  },
  mounted() {
    this.startAutoSlide();
  },
  beforeUnmount() {
    this.stopAutoSlide();
  },
  methods: {
    // Gallery Slider Methods
    nextSlide() {
      this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
    },
    prevSlide() {
      this.currentSlide = this.currentSlide === 0 ? this.totalSlides - 1 : this.currentSlide - 1;
    },
    goToSlide(index) {
      this.currentSlide = index;
    },
    startAutoSlide() {
      this.autoSlideInterval = setInterval(() => {
        this.nextSlide();
      }, 4000); // Auto slide every 4 seconds
    },
    stopAutoSlide() {
      if (this.autoSlideInterval) {
        clearInterval(this.autoSlideInterval);
      }
    },
    
    // Staff Photo Gallery Methods
    nextStaffSlide() {
      this.currentStaffSlide = (this.currentStaffSlide + 1) % this.totalStaffSlides;
    },
    prevStaffSlide() {
      this.currentStaffSlide = this.currentStaffSlide === 0 ? this.totalStaffSlides - 1 : this.currentStaffSlide - 1;
    },
    goToStaffSlide(index) {
      this.currentStaffSlide = index;
    }
  }
}
</script>
<style scoped>
.text-shadow-lg {
  text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.transform-style-preserve-3d {
  transform-style: preserve-3d;
}

.backface-hidden {
  backface-visibility: hidden;
}

.rotate-y-180 {
  transform: rotateY(180deg);
}

.card-face {
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
</style>