<!-- resources/js/components/HeroSection.vue -->
<template>
  <section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-gradient-to-br from-biru-langit-500/10 to-kuning-emas-500/10"></div>
    
    <!-- Floating Elements Animation -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-20 left-10 w-4 h-4 bg-biru-langit-300/30 rounded-full animate-float"></div>
      <div class="absolute top-40 right-20 w-6 h-6 bg-kuning-emas-300/30 rounded-full animate-float-delay-1"></div>
      <div class="absolute bottom-40 left-20 w-3 h-3 bg-biru-langit-400/40 rounded-full animate-float-delay-2"></div>
      <div class="absolute bottom-20 right-10 w-5 h-5 bg-kuning-emas-400/30 rounded-full animate-float"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
      <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
        <!-- Content -->
        <div class="text-center lg:text-left space-y-6 lg:space-y-8 animate-fade-in-up">
          <div class="space-y-4">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold leading-tight">
             <span class="bg-gradient-to-r from-blue-500 to-yellow-500 bg-clip-text text-transparent">Welcome to</span>
              <br>
              <span class="text-biru-langit-700 animate-slide-in-left">BEM UNRI</span>
              <br>
              <span class="text-kuning-emas-600 animate-slide-in-right">2025</span>
            </h1>
            <div class="h-1 w-24 sm:w-32 bg-gradient-to-r from-biru-langit-500 to-kuning-emas-500 mx-auto lg:mx-0 rounded-full animate-scale-in"></div>
          </div>
          
          <div class="space-y-6">
            <p class="text-lg sm:text-xl text-biru-langit-600 leading-relaxed max-w-2xl animate-fade-in-up-delay">
              Kabinet Biru Langit hadir untuk mewujudkan visi dan misi yang menginspirasi seluruh mahasiswa Universitas Riau. 
              Bersama kita bangun masa depan yang cerah dengan semangat kebersamaan dan inovasi.
            </p>
          </div>

          <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start animate-fade-in-up-delay-2">
            <button class="group relative overflow-hidden px-8 py-4 text-lg font-bold text-white bg-gradient-to-r from-biru-langit-500 to-biru-langit-600 rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 hover:from-biru-langit-600 hover:to-biru-langit-700">
              <span class="relative z-10 flex items-center justify-center">
                <span class="mr-2">✨</span>
                KABINET BIRU LANGIT
                <span class="ml-2">✨</span>
              </span>
              <div class="absolute inset-0 bg-gradient-to-r from-kuning-emas-400 to-kuning-emas-500 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
              <div class="absolute -inset-1 bg-gradient-to-r from-biru-langit-400 to-kuning-emas-400 rounded-full blur opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>
            </button>
          </div>
        </div>

        <!-- Image Section - Rectangular dengan jarak yang lebih jauh -->
        <div class="flex justify-center lg:justify-end lg:ml-34 xl:ml-34 animate-fade-in-right">
          <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg xl:max-w-xl">
            <div class="relative group">
              <!-- Background decorative elements -->
              <div class="absolute -inset-4 bg-gradient-to-br from-kuning-emas-400/20 via-kuning-emas-500/30 to-kuning-emas-600/20 rounded-2xl transform rotate-3 scale-105 opacity-80"></div>
              <div class="absolute -inset-2 bg-gradient-to-tl from-biru-langit-400/20 via-biru-langit-500/30 to-biru-langit-600/20 rounded-2xl transform -rotate-2 scale-102 opacity-70"></div>
              
              <!-- Main Image Container -->
              <div class="relative overflow-hidden rounded-2xl shadow-2xl transform group-hover:scale-105 transition-transform duration-500">
                <!-- Replace this div with actual image when available -->
                <img 
                  v-if="rektoratImage" 
                  :src="rektoratImage" 
                  alt="Rektorat UNRI" 
                  class="w-full h-full object-cover rounded-2xl"
                />
                <!-- Fallback placeholder -->
                <div v-else class="w-full h-80 sm:h-96 lg:h-[400px] xl:h-[450px] bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 flex items-center justify-center rounded-2xl border-4 border-white">
                  <div class="text-center">
                    <div class="w-20 sm:w-24 h-20 sm:h-24 bg-biru-langit-500 rounded-2xl flex items-center justify-center mx-auto mb-6 animate-pulse">
                      <svg class="w-10 sm:w-12 h-10 sm:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m0 0H7m2 0v-5a2 2 0 012-2h2a2 2 0 012 2v5"></path>
                      </svg>
                    </div>
                    <p class="text-biru-langit-600 font-semibold text-lg sm:text-xl">Rektorat UNRI</p>
                    <p class="text-sm sm:text-base text-gray-500 mt-3">Ganti dengan foto asli</p>
                  </div>
                </div>
                
                <!-- Overlay gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-biru-langit-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                
                <!-- Inner border -->
                <div class="absolute inset-2 border-2 border-white/30 rounded-xl"></div>
              </div>
              
              <!-- Decorative Elements - Repositioned for rectangular design -->
              <div class="absolute -top-4 -right-4 w-8 sm:w-10 h-8 sm:h-10 bg-kuning-emas-500 rounded-xl animate-bounce-slow shadow-lg"></div>
              <div class="absolute -bottom-4 -left-4 w-6 sm:w-8 h-6 sm:h-8 bg-biru-langit-500 rounded-xl animate-bounce-slow-delay shadow-lg"></div>
              <div class="absolute top-8 -left-6 w-4 h-4 bg-kuning-emas-400 rounded-lg animate-float"></div>
              <div class="absolute bottom-8 -right-6 w-6 h-6 bg-biru-langit-400 rounded-lg animate-float-delay-1"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'HeroSection',
  data() {
    return {
      // Option 1: Jika gambar di public/images/
      rektoratImage: '/images/rektoratunri.png',
    }
  }
}
</script>

<style scoped>
/* Custom animations */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes fadeInRight {
  from {
    opacity: 0;
    transform: translateX(50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes scaleIn {
  from {
    opacity: 0;
    transform: scaleX(0);
  }
  to {
    opacity: 1;
    transform: scaleX(1);
  }
}

@keyframes float {
  0%, 100% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-20px);
  }
}

@keyframes gradient {
  0%, 100% {
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
  }
  50% {
    background: linear-gradient(45deg, #8b5cf6, #f59e0b);
  }
}

/* Animation classes */
.animate-fade-in-up {
  animation: fadeInUp 0.8s ease-out;
}

.animate-fade-in-up-delay {
  animation: fadeInUp 0.8s ease-out 0.2s both;
}

.animate-fade-in-up-delay-2 {
  animation: fadeInUp 0.8s ease-out 0.4s both;
}

.animate-slide-in-left {
  animation: slideInLeft 0.8s ease-out 0.3s both;
}

.animate-slide-in-right {
  animation: slideInRight 0.8s ease-out 0.5s both;
}

.animate-fade-in-right {
  animation: fadeInRight 1s ease-out 0.6s both;
}

.animate-scale-in {
  animation: scaleIn 0.6s ease-out 0.8s both;
}

.animate-float {
  animation: float 3s ease-in-out infinite;
}

.animate-float-delay-1 {
  animation: float 3s ease-in-out infinite 1s;
}

.animate-float-delay-2 {
  animation: float 3s ease-in-out infinite 2s;
}

.animate-bounce-slow {
  animation: bounce 2s infinite;
}

.animate-bounce-slow-delay {
  animation: bounce 2s infinite 1s;
}

.animate-spin-slow {
  animation: spin 20s linear infinite;
}

.animate-spin-reverse {
  animation: spin 15s linear infinite reverse;
}

.animate-gradient {
  background: linear-gradient(45deg, #3b82f6, #8b5cf6);
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: gradient 3s ease-in-out infinite;
}

.text-gradient {
  background: linear-gradient(45deg, #3b82f6, #8b5cf6);
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* Responsive improvements */
@media (max-width: 640px) {
  .animate-fade-in-up,
  .animate-fade-in-up-delay,
  .animate-fade-in-up-delay-2,
  .animate-slide-in-left,
  .animate-slide-in-right,
  .animate-fade-in-right {
    animation-duration: 0.6s;
  }
}
</style>