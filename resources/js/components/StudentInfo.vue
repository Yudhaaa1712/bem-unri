<!-- resources/js/components/StudentInfo.vue (Updated) -->
<template>
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl lg:text-5xl font-bold text-biru-langit-700 mb-4">
          Student <span class="text-kuning-emas-600">Info</span>
        </h2>
        <div class="h-1 w-32 bg-gradient-to-r from-biru-langit-500 to-kuning-emas-500 rounded-full mx-auto mb-6"></div>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Informasi prestasi mahasiswa dan beasiswa terbaru untuk mendukung perjalanan akademik Anda
        </p>
      </div>

      <!-- Tab Navigation -->
      <div class="flex justify-center mb-12">
        <div class="bg-white p-2 rounded-full shadow-lg border border-gray-200">
          <div class="flex space-x-2">
            <button 
              @click="activeTab = 'prestasi'"
              :class="activeTab === 'prestasi' ? 'bg-biru-langit-500 text-white shadow-md' : 'text-biru-langit-600 hover:bg-biru-langit-50'"
              class="px-8 py-3 rounded-full font-semibold transition-all duration-300"
            >
              Prestasi Mahasiswa
            </button>
            <button 
              @click="activeTab = 'beasiswa'"
              :class="activeTab === 'beasiswa' ? 'bg-kuning-emas-500 text-white shadow-md' : 'text-kuning-emas-600 hover:bg-kuning-emas-50'"
              class="px-8 py-3 rounded-full font-semibold transition-all duration-300"
            >
              Info Beasiswa
            </button>
          </div>
        </div>
      </div>

      <!-- Content based on active tab -->
      <div v-if="activeTab === 'prestasi'" class="space-y-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Prestasi Card 1 -->
          <div class="card group cursor-pointer" @click="goToStudentInfo('prestasi')">
            <div class="aspect-video bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 flex items-center justify-center">
              <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-biru-langit-500 to-kuning-emas-500 rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                  </svg>
                </div>
                <p class="text-biru-langit-600 font-semibold">Foto Prestasi</p>
              </div>
            </div>
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">Juara 1</span>
                <span class="text-gray-500 text-sm">Maret 2025</span>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-biru-langit-600 transition-colors">
                Lomba Karya Tulis Ilmiah Nasional
              </h3>
              <p class="text-gray-600 text-sm mb-3">
                Ahmad Rizki - Teknik Informatika
              </p>
              <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                Meraih juara 1 dalam lomba karya tulis ilmiah tingkat nasional dengan tema "Inovasi Teknologi untuk Pembangunan Berkelanjutan"
              </p>
            </div>
          </div>

          <!-- Prestasi Card 2 -->
          <div class="card group cursor-pointer" @click="goToStudentInfo('prestasi')">
            <div class="aspect-video bg-gradient-to-br from-kuning-emas-100 to-biru-langit-100 flex items-center justify-center">
              <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-kuning-emas-500 to-biru-langit-500 rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                  </svg>
                </div>
                <p class="text-kuning-emas-600 font-semibold">Foto Prestasi</p>
              </div>
            </div>
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="px-3 py-1 bg-gray-100 text-gray-700 text-xs font-semibold rounded-full">Juara 2</span>
                <span class="text-gray-500 text-sm">Februari 2025</span>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-biru-langit-600 transition-colors">
                Kompetisi Business Plan Regional
              </h3>
              <p class="text-gray-600 text-sm mb-3">
                Sarah Wulandari - Manajemen
              </p>
              <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                Berhasil meraih juara 2 kompetisi business plan tingkat regional dengan ide bisnis inovatif di bidang agribisnis
              </p>
            </div>
          </div>

          <!-- Prestasi Card 3 -->
          <div class="card group cursor-pointer" @click="goToStudentInfo('prestasi')">
            <div class="aspect-video bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 flex items-center justify-center">
              <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-biru-langit-500 to-kuning-emas-500 rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                  </svg>
                </div>
                <p class="text-biru-langit-600 font-semibold">Foto Prestasi</p>
              </div>
            </div>
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-semibold rounded-full">Juara 3</span>
                <span class="text-gray-500 text-sm">Januari 2025</span>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-biru-langit-600 transition-colors">
                Olimpiade Matematika Nasional
              </h3>
              <p class="text-gray-600 text-sm mb-3">
                Devi Anggraini - Matematika
              </p>
              <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                Meraih medali perunggu dalam Olimpiade Matematika tingkat nasional yang diikuti lebih dari 500 peserta
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Beasiswa Content -->
      <div v-if="activeTab === 'beasiswa'" class="space-y-8">
        <div class="grid md:grid-cols-2 gap-8">
          <!-- Beasiswa Card 1 -->
          <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-biru-langit-500 hover:shadow-xl transition-shadow cursor-pointer" @click="goToStudentInfo('beasiswa')">
            <div class="flex items-start space-x-4">
              <div class="flex-shrink-0">
                <div class="w-16 h-16 bg-biru-langit-100 rounded-full flex items-center justify-center">
                  <svg class="w-8 h-8 text-biru-langit-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                  </svg>
                </div>
              </div>
              <div class="flex-1">
                <div class="flex items-center justify-between mb-3">
                  <h3 class="text-xl font-bold text-gray-800">Beasiswa Prestasi Akademik</h3>
                  <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Aktif</span>
                </div>
                <p class="text-gray-600 mb-4 leading-relaxed">
                  Beasiswa untuk mahasiswa berprestasi dengan IPK minimal 3.50. Mencakup biaya kuliah penuh dan tunjangan bulanan.
                </p>
                <div class="space-y-2 mb-4">
                  <div class="flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 mr-2 text-biru-langit-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Deadline: 30 Juni 2025
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 mr-2 text-biru-langit-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                    Nilai: Rp 10.000.000/semester
                  </div>
                </div>
                <button class="btn-primary text-sm">Lihat Detail</button>
              </div>
            </div>
          </div>

          <!-- Beasiswa Card 2 -->
          <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-kuning-emas-500 hover:shadow-xl transition-shadow cursor-pointer" @click="goToStudentInfo('beasiswa')">
            <div class="flex items-start space-x-4">
              <div class="flex-shrink-0">
                <div class="w-16 h-16 bg-kuning-emas-100 rounded-full flex items-center justify-center">
                  <svg class="w-8 h-8 text-kuning-emas-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                  </svg>
                </div>
              </div>
              <div class="flex-1">
                <div class="flex items-center justify-between mb-3">
                  <h3 class="text-xl font-bold text-gray-800">Beasiswa Bantuan Sosial</h3>
                  <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Aktif</span>
                </div>
                <p class="text-gray-600 mb-4 leading-relaxed">
                  Program bantuan untuk mahasiswa kurang mampu dengan prestasi akademik yang baik. Bantuan biaya hidup dan pendidikan.
                </p>
                <div class="space-y-2 mb-4">
                  <div class="flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 mr-2 text-kuning-emas-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Deadline: 15 Juli 2025
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 mr-2 text-kuning-emas-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                    Nilai: Rp 3.000.000/semester
                  </div>
                </div>
                <button class="btn-secondary text-sm">Lihat Detail</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-12">
        <a href="/student-info" class="btn-primary px-8 py-4 text-lg inline-block">
          {{ activeTab === 'prestasi' ? 'Lihat Semua Prestasi' : 'Lihat Semua Beasiswa' }}
        </a>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'StudentInfo',
  data() {
    return {
      activeTab: 'prestasi'
    }
  },
  methods: {
    goToStudentInfo(tab = null) {
      if (tab) {
        window.location.href = `/student-info?tab=${tab}`
      } else {
        window.location.href = '/student-info'
      }
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