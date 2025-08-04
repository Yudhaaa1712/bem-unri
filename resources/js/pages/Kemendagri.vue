<!-- resources/js/pages/Kemendagri.vue -->
<template>
  <div class="min-h-screen bg-gradient-to-br from-blue-50 to-white">
    <Header />
    
    <!-- Kementerian Header Section -->
    <section 
      class="relative min-h-screen lg:min-h-screen md:min-h-[50vh] flex items-center justify-center bg-cover bg-center bg-no-repeat"
      :style="{ backgroundImage: `url('/images/fotbarkbl.jpeg')` }"
    >
      <!-- Background Overlay with gradient that blends to next section -->
      <div class="absolute inset-0 bg-gradient-to-b from-white/70 via-white/60 to-transparent z-10"></div>
      
      <!-- Additional gradient overlay for smooth transition -->
      <div class="absolute bottom-0 left-0 right-0 h-64 bg-gradient-to-t from-white via-white/80 to-transparent z-15"></div>
      
      <!-- Content -->
      <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
        <div class="text-center">
          <!-- Main Title with staggered animation -->
          <h1 
            class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent transform transition-all duration-1000 ease-out"
            :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'"
            :style="{ transitionDelay: '400ms' }"
          >
            Kementrian<span class="bg-gradient-to-r from-[#eb7118] to-[#ffe500] bg-clip-text text-transparent"> Dalam Negeri</span>
          </h1>

          <!-- Description with delayed animation -->
          <p 
            class="text-lg md:text-xl lg:text-2xl text-gray-700 max-w-4xl mx-auto leading-relaxed mb-12 transform transition-all duration-1000 ease-out"
            :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'"
            :style="{ transitionDelay: '500ms' }"
          >
            Kementerian Dalam Negeri bertugas mengelola urusan internal organisasi BEM UNRI, 
            pengembangan sumber daya manusia, koordinasi antar departemen, dan penguatan 
            kapasitas organisasi untuk mencapai visi misi Kabinet Biru Langit.
          </p>
        </div>
      </div>
    </section>

    <!-- Program Kerja Section with gradient background -->
    <section class="py-12 bg-gradient-to-b from-white via-gray-50/30 to-white relative">
      <!-- Top gradient blend -->
      <div class="absolute top-0 left-0 right-0 h-48 bg-gradient-to-b from-white/80 to-transparent"></div>
      
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
          <h2 class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent mb-4 pb-2 leading-tight">
            Program <span class="bg-gradient-to-r from-[#eb7118] to-[#ffe500] bg-clip-text text-transparent">Kerja</span>
          </h2>
        </div>

        <!-- Program Cards with Image Backgrounds -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="(program, index) in programs" :key="index" 
               class="program-card group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" 
               style="perspective: 1000px;">
            <div class="card-inner relative w-full h-80 transition-transform duration-700 group-hover:rotate-y-180" style="transform-style: preserve-3d;">
              <!-- Front Side -->
              <div class="card-face absolute w-full h-full bg-cover bg-center bg-no-repeat flex items-center justify-center text-white" 
                   style="backface-visibility: hidden;"
                   :style="{ backgroundImage: `url('${program.image}')` }">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-500/80 to-yellow-400/80"></div>
                <div class="text-center p-6 relative z-10">
                  <h3 class="text-xl font-bold drop-shadow-lg">{{ program.title }}</h3>
                  <p class="text-sm opacity-90 mt-2 drop-shadow-md">{{ program.subtitle }}</p>
                </div>
              </div>
              <!-- Back Side -->
              <div class="card-face absolute w-full h-full bg-gradient-to-r from-[#034caa] to-[#003375] p-6 flex items-center justify-center" 
                   style="backface-visibility: hidden; transform: rotateY(180deg);">
                <div class="text-center">
                  <h4 class="text-lg font-bold text-white mb-3">{{ program.title }}</h4>
                  <p class="text-white text-sm leading-relaxed mb-4">
                    {{ program.description }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Staff Photo Gallery Section with smooth transition -->
    <section class="py-20 bg-gradient-to-b from-white via-blue-50/20 to-white relative">
      <!-- Top blend -->
      <div class="absolute top-0 left-0 right-0 h-32 bg-gradient-to-b from-gray-50/30 to-transparent"></div>
      
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Swiper Container -->
        <div class="swiper-container staff-swiper overflow-hidden">
          <div class="swiper-wrapper">
            <div v-for="(member, index) in staffMembers" :key="index" class="swiper-slide">
              <div class="rounded-3xl shadow-lg overflow-hidden bg-white transform transition-all duration-300 hover:scale-105">
                <div class="aspect-square overflow-hidden">
                  <img 
                    v-if="member.image"
                    :src="member.image" 
                    :alt="member.name" 
                    class="w-full h-full object-cover"
                    loading="lazy"
                  />
                  <div v-else class="w-full h-full bg-gradient-to-br from-[#034caa] to-[#003375] flex items-center justify-center">
                    <span class="text-6xl text-white/80">👤</span>
                  </div>
                </div>
                <div class="p-6 text-center">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ member.name }}</h3>
                  <p class="text-gray-500 mb-3">{{ member.position }}</p>
                  <div class="flex justify-center space-x-2">
                    <a href="#" class="w-8 h-8 bg-gradient-to-r from-[#034caa] to-[#003375] rounded-lg flex items-center justify-center hover:scale-110 transition-transform">
                      <span class="text-white text-sm font-bold">In</span>
                    </a>
                  </div>
                </div>
              </div>
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
import Footer from '../components/Footer.vue'
import Swiper from 'swiper'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import 'swiper/css/autoplay'
import { Navigation, Pagination, Autoplay } from 'swiper/modules'

export default {
  name: 'KemendagriPage',
  components: {
    Header,
    Footer
  },
  data() {
    return {
      isVisible: false,
      
      programs: [
        {
          title: 'Pelatihan Kepemimpinan',
          subtitle: 'Pengembangan soft skill anggota',
          description: 'Program pelatihan kepemimpinan untuk meningkatkan kapasitas anggota BEM dalam mengelola organisasi dan memimpin tim.',
          image: '/images/sample5.jpeg'
        },
        {
          title: 'Koordinasi Antar Divisi',
          subtitle: 'Sinkronisasi program kerja',
          description: 'Memfasilitasi koordinasi dan sinkronisasi program kerja antar departemen untuk menciptakan sinergi yang optimal.',
          image: '/images/sample2.jpeg'
        },
        {
          title: 'Training & Development',
          subtitle: 'Peningkatan kompetensi',
          description: 'Program pelatihan berkelanjutan untuk meningkatkan kompetensi teknis dan manajerial anggota organisasi.',
          image: '/images/sample3.jpeg'
        },
        {
          title: 'Sistem Informasi Internal',
          subtitle: 'Digitalisasi administrasi',
          description: 'Pengembangan sistem informasi untuk mempermudah administrasi internal dan monitoring kinerja organisasi.',
          image: '/images/sample4.jpeg'
        },
        {
          title: 'Evaluasi Kinerja',
          subtitle: 'Monitoring & assessment',
          description: 'Sistem evaluasi kinerja berkala untuk mengukur efektivitas program dan kinerja anggota organisasi.',
          image: '/images/sample5.jpeg'
        },
        {
          title: 'Team Building',
          subtitle: 'Penguatan solidaritas',
          description: 'Kegiatan team building untuk mempererat hubungan dan meningkatkan kerjasama antar anggota departemen.',
          image: '/images/fotbarkbl.jpeg'
        }
      ],
      
      staffMembers: [
        { name: 'Altamis Rafie', position: 'Staff', image: '/images/sample2.jpeg' },
        { name: 'Christina Marsha', position: 'Staff', image: '/images/sample5.jpeg' },
        { name: 'Kalya Salsabila', position: 'Staff', image: '/images/sample2.jpeg' },
        { name: 'Nama Staff 4', position: 'Staff', image: '/images/sample3.jpeg' },
        { name: 'Nama Staff 5', position: 'Staff', image: '/images/sample4.jpeg' },
        { name: 'Nama Staff 6', position: 'Staff', image: '/images/sample5.jpeg' }
      ],
      
      swiper: null
    }
  },
  mounted() {
    setTimeout(() => {
      this.isVisible = true
    }, 100)
    
    this.initializeSwiper()
  },
  beforeUnmount() {
    if (this.swiper) {
      this.swiper.destroy()
    }
  },
  methods: {
    initializeSwiper() {
      this.$nextTick(() => {
        this.swiper = new Swiper('.staff-swiper', {
          modules: [Navigation, Pagination, Autoplay],
          slidesPerView: 1,
          spaceBetween: 20,
          loop: true,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
            bulletClass: 'swiper-pagination-bullet !bg-[#034caa]',
            bulletActiveClass: 'swiper-pagination-bullet-active !bg-gradient-to-r from-[#eb7118] to-[#ffe500]'
          },
          breakpoints: {
            640: {
              slidesPerView: 2,
              spaceBetween: 20,
            },
            768: {
              slidesPerView: 3,
              spaceBetween: 30,
            },
            1024: {
              slidesPerView: 4,
              spaceBetween: 40,
            },
          }
        })
      })
    }
  }
}
</script>

<style scoped>
@import 'swiper/css';
@import 'swiper/css/navigation';
@import 'swiper/css/pagination';

.transform {
  will-change: transform, opacity;
}

.bg-gradient-to-r:hover {
  transform: translateY(-1px);
  transition: transform 0.2s ease;
}

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

.staff-swiper {
  padding: 20px 0 60px;
}

.swiper-button-next,
.swiper-button-prev {
  width: 48px !important;
  height: 48px !important;
  background: rgba(255, 255, 255, 0.9) !important;
  border-radius: 50% !important;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
  background: white !important;
  transform: scale(1.1);
}

.swiper-button-next:after,
.swiper-button-prev:after {
  font-size: 20px !important;
  font-weight: bold;
}

:deep(.swiper-pagination-bullet) {
  width: 10px;
  height: 10px;
  background: #034caa;
  opacity: 0.5;
  transition: all 0.3s ease;
}

:deep(.swiper-pagination-bullet-active) {
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(to right, #eb7118, #ffe500) !important;
  opacity: 1;
}

/* Smooth section transitions */
section {
  position: relative;
}

section::before {
  content: '';
  position: absolute;
  top: -1px;
  left: 0;
  right: 0;
  height: 2px;
  background: linear-gradient(to right, transparent, rgba(255,255,255,0.5), transparent);
}

@media (max-width: 640px) {
  .swiper-button-next,
  .swiper-button-prev {
    display: none !important;
  }
}
</style>