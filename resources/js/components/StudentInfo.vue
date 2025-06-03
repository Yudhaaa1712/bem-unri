<!-- resources/js/components/StudentInfo.vue -->
<template>
  <section class="py-20 bg-gradient-to-br from-blue-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl lg:text-5xl font-bold text-blue-700 mb-4">
          Student <span class="text-yellow-600">Info</span>
        </h2>
        <div class="h-1 w-32 bg-gradient-to-r from-blue-500 to-yellow-500 rounded-full mx-auto mb-6"></div>
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
              :class="activeTab === 'prestasi' ? 'bg-blue-500 text-white' : 'text-blue-600 hover:bg-blue-50'"
              class="px-8 py-3 rounded-full font-semibold transition-all duration-300"
            >
              Prestasi Mahasiswa
            </button>
            <button 
              @click="activeTab = 'beasiswa'"
              :class="activeTab === 'beasiswa' ? 'bg-yellow-500 text-white' : 'text-yellow-600 hover:bg-yellow-50'"
              class="px-8 py-3 rounded-full font-semibold transition-all duration-300"
            >
              Info Beasiswa
            </button>
          </div>
        </div>
      </div>

      <!-- Prestasi Content -->
      <div v-if="activeTab === 'prestasi'" class="space-y-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Prestasi Card 1 -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="aspect-video bg-gradient-to-br from-blue-100 to-yellow-100 flex items-center justify-center">
              <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                  <span class="text-white text-2xl">🏆</span>
                </div>
                <p class="text-blue-600 font-semibold">Foto Prestasi</p>
              </div>
            </div>
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">Juara 1</span>
                <span class="text-gray-500 text-sm">Maret 2025</span>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2">
                Lomba Karya Tulis Ilmiah Nasional
              </h3>
              <p class="text-gray-600 text-sm mb-3">
                Ahmad Rizki - Teknik Informatika
              </p>
              <p class="text-gray-600 text-sm leading-relaxed">
                Meraih juara 1 dalam lomba karya tulis ilmiah tingkat nasional dengan tema "Inovasi Teknologi untuk Pembangunan Berkelanjutan"
              </p>
            </div>
          </div>

          <!-- Prestasi Card 2 -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="aspect-video bg-gradient-to-br from-yellow-100 to-blue-100 flex items-center justify-center">
              <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                  <span class="text-white text-2xl">🥈</span>
                </div>
                <p class="text-yellow-600 font-semibold">Foto Prestasi</p>
              </div>
            </div>
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="px-3 py-1 bg-gray-100 text-gray-700 text-xs font-semibold rounded-full">Juara 2</span>
                <span class="text-gray-500 text-sm">Februari 2025</span>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2">
                Kompetisi Business Plan Regional
              </h3>
              <p class="text-gray-600 text-sm mb-3">
                Sarah Wulandari - Manajemen
              </p>
              <p class="text-gray-600 text-sm leading-relaxed">
                Berhasil meraih juara 2 kompetisi business plan tingkat regional dengan ide bisnis inovatif di bidang agribisnis
              </p>
            </div>
          </div>

          <!-- Prestasi Card 3 -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="aspect-video bg-gradient-to-br from-blue-100 to-yellow-100 flex items-center justify-center">
              <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                  <span class="text-white text-2xl">🥉</span>
                </div>
                <p class="text-blue-600 font-semibold">Foto Prestasi</p>
              </div>
            </div>
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-semibold rounded-full">Juara 3</span>
                <span class="text-gray-500 text-sm">Januari 2025</span>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2">
                Olimpiade Matematika Nasional
              </h3>
              <p class="text-gray-600 text-sm mb-3">
                Devi Anggraini - Matematika
              </p>
              <p class="text-gray-600 text-sm leading-relaxed">
                Meraih medali perunggu dalam Olimpiade Matematika tingkat nasional yang diikuti lebih dari 500 peserta
              </p>
            </div>
          </div>

          <!-- Prestasi Card 4 -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="aspect-video bg-gradient-to-br from-green-100 to-blue-100 flex items-center justify-center">
              <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                  <span class="text-white text-2xl">💻</span>
                </div>
                <p class="text-green-600 font-semibold">Foto Prestasi</p>
              </div>
            </div>
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">Juara 1</span>
                <span class="text-gray-500 text-sm">Januari 2025</span>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2">
                Hackathon Programming Contest
              </h3>
              <p class="text-gray-600 text-sm mb-3">
                Budi Santoso - Teknik Informatika
              </p>
              <p class="text-gray-600 text-sm leading-relaxed">
                Memenangkan hackathon programming contest dengan solusi aplikasi mobile untuk UMKM di Riau
              </p>
            </div>
          </div>

          <!-- Prestasi Card 5 -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="aspect-video bg-gradient-to-br from-purple-100 to-blue-100 flex items-center justify-center">
              <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                  <span class="text-white text-2xl">🎭</span>
                </div>
                <p class="text-purple-600 font-semibold">Foto Prestasi</p>
              </div>
            </div>
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="px-3 py-1 bg-gray-100 text-gray-700 text-xs font-semibold rounded-full">Juara 2</span>
                <span class="text-gray-500 text-sm">Desember 2024</span>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2">
                Festival Seni Budaya Melayu
              </h3>
              <p class="text-gray-600 text-sm mb-3">
                Siti Aminah - Sastra Indonesia
              </p>
              <p class="text-gray-600 text-sm leading-relaxed">
                Meraih juara 2 dalam lomba puisi dan storytelling dengan tema kearifan lokal Riau
              </p>
            </div>
          </div>

          <!-- Prestasi Card 6 -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="aspect-video bg-gradient-to-br from-red-100 to-yellow-100 flex items-center justify-center">
              <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                  <span class="text-white text-2xl">⚡</span>
                </div>
                <p class="text-red-600 font-semibold">Foto Prestasi</p>
              </div>
            </div>
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-semibold rounded-full">Juara 3</span>
                <span class="text-gray-500 text-sm">November 2024</span>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2">
                Kompetisi Inovasi Energi Terbarukan
              </h3>
              <p class="text-gray-600 text-sm mb-3">
                Tim Teknik Elektro
              </p>
              <p class="text-gray-600 text-sm leading-relaxed">
                Meraih juara 3 dengan inovasi panel surya portable untuk daerah terpencil di Riau
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Beasiswa Content -->
      <div v-if="activeTab === 'beasiswa'" class="space-y-8">
        <div class="grid md:grid-cols-2 gap-8">
          <!-- Beasiswa Card 1 -->
          <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-blue-500 hover:shadow-xl transition-shadow">
            <div class="flex items-start space-x-4">
              <div class="flex-shrink-0">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                  <span class="text-blue-600 text-2xl">💰</span>
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
                    <span class="text-blue-500 mr-2">📅</span>
                    Deadline: 30 Juni 2025
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-blue-500 mr-2">💵</span>
                    Nilai: Rp 10.000.000/semester
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-blue-500 mr-2">📋</span>
                    Syarat: IPK minimal 3.50, Surat rekomendasi
                  </div>
                </div>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Daftar Sekarang</button>
              </div>
            </div>
          </div>

          <!-- Beasiswa Card 2 -->
          <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-yellow-500 hover:shadow-xl transition-shadow">
            <div class="flex items-start space-x-4">
              <div class="flex-shrink-0">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center">
                  <span class="text-yellow-600 text-2xl">❤️</span>
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
                    <span class="text-yellow-500 mr-2">📅</span>
                    Deadline: 15 Juli 2025
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-yellow-500 mr-2">💵</span>
                    Nilai: Rp 3.000.000/semester
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-yellow-500 mr-2">📋</span>
                    Syarat: Surat keterangan tidak mampu, IPK minimal 3.00
                  </div>
                </div>
                <button class="bg-yellow-500 hover:bg-yellow-600 text-blue-800 font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Daftar Sekarang</button>
              </div>
            </div>
          </div>

          <!-- Beasiswa Card 3 -->
          <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-green-500 hover:shadow-xl transition-shadow">
            <div class="flex items-start space-x-4">
              <div class="flex-shrink-0">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                  <span class="text-green-600 text-2xl">🔬</span>
                </div>
              </div>
              <div class="flex-1">
                <div class="flex items-center justify-between mb-3">
                  <h3 class="text-xl font-bold text-gray-800">Beasiswa Penelitian</h3>
                  <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Aktif</span>
                </div>
                <p class="text-gray-600 mb-4 leading-relaxed">
                  Khusus untuk mahasiswa yang aktif dalam kegiatan penelitian dan publikasi ilmiah. Mendukung riset inovatif.
                </p>
                <div class="space-y-2 mb-4">
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-green-500 mr-2">📅</span>
                    Deadline: 31 Agustus 2025
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-green-500 mr-2">💵</span>
                    Nilai: Rp 15.000.000/tahun
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-green-500 mr-2">📋</span>
                    Syarat: Proposal penelitian, Publikasi ilmiah
                  </div>
                </div>
                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Daftar Sekarang</button>
              </div>
            </div>
          </div>

          <!-- Beasiswa Card 4 -->
          <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-purple-500 hover:shadow-xl transition-shadow">
            <div class="flex items-start space-x-4">
              <div class="flex-shrink-0">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                  <span class="text-purple-600 text-2xl">🏛️</span>
                </div>
              </div>
              <div class="flex-1">
                <div class="flex items-center justify-between mb-3">
                  <h3 class="text-xl font-bold text-gray-800">Beasiswa Organisasi</h3>
                  <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">Segera</span>
                </div>
                <p class="text-gray-600 mb-4 leading-relaxed">
                  Untuk mahasiswa yang aktif dalam organisasi kemahasiswaan dan memiliki kontribusi nyata bagi kampus.
                </p>
                <div class="space-y-2 mb-4">
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-purple-500 mr-2">📅</span>
                    Deadline: 15 September 2025
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-purple-500 mr-2">💵</span>
                    Nilai: Rp 5.000.000/semester
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-purple-500 mr-2">📋</span>
                    Syarat: Sertifikat keaktifan organisasi
                  </div>
                </div>
                <button class="bg-purple-500 hover:bg-purple-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Daftar Sekarang</button>
              </div>
            </div>
          </div>

          <!-- Beasiswa Card 5 -->
          <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-indigo-500 hover:shadow-xl transition-shadow">
            <div class="flex items-start space-x-4">
              <div class="flex-shrink-0">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center">
                  <span class="text-indigo-600 text-2xl">💼</span>
                </div>
              </div>
              <div class="flex-1">
                <div class="flex items-center justify-between mb-3">
                  <h3 class="text-xl font-bold text-gray-800">Beasiswa Kewirausahaan</h3>
                  <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">Segera</span>
                </div>
                <p class="text-gray-600 mb-4 leading-relaxed">
                  Program khusus untuk mahasiswa yang memiliki ide bisnis inovatif dan berpotensi dikembangkan.
                </p>
                <div class="space-y-2 mb-4">
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-indigo-500 mr-2">📅</span>
                    Deadline: 31 Oktober 2025
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-indigo-500 mr-2">💵</span>
                    Nilai: Rp 8.000.000/semester
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-indigo-500 mr-2">📋</span>
                    Syarat: Business plan, Prototype produk
                  </div>
                </div>
                <button class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Daftar Sekarang</button>
              </div>
            </div>
          </div>

          <!-- Beasiswa Card 6 -->
          <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-pink-500 hover:shadow-xl transition-shadow">
            <div class="flex items-start space-x-4">
              <div class="flex-shrink-0">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center">
                  <span class="text-pink-600 text-2xl">🌍</span>
                </div>
              </div>
              <div class="flex-1">
                <div class="flex items-center justify-between mb-3">
                  <h3 class="text-xl font-bold text-gray-800">Beasiswa Exchange Program</h3>
                  <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">Khusus</span>
                </div>
                <p class="text-gray-600 mb-4 leading-relaxed">
                  Program pertukaran mahasiswa ke universitas partner di luar negeri untuk memperluas wawasan global.
                </p>
                <div class="space-y-2 mb-4">
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-pink-500 mr-2">📅</span>
                    Deadline: 31 Desember 2025
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-pink-500 mr-2">💵</span>
                    Nilai: Full funding + living allowance
                  </div>
                  <div class="flex items-center text-sm text-gray-600">
                    <span class="text-pink-500 mr-2">📋</span>
                    Syarat: TOEFL 550+, IPK minimal 3.25
                  </div>
                </div>
                <button class="bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Daftar Sekarang</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-12">
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-8 py-4 text-lg rounded-lg transition-colors">
          {{ activeTab === 'prestasi' ? 'Lihat Semua Prestasi' : 'Lihat Semua Beasiswa' }}
        </button>
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
  }
}
</script>