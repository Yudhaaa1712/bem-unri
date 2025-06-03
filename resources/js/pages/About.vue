
<template>
  <div class="min-h-screen bg-gradient-to-br from-biru-langit-50 to-white">
    <Header />
    
    <!-- Visi Misi Section -->
    <VisiMisi />
    
    <!-- Struktur Organisasi Section -->
    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-4xl lg:text-5xl font-bold text-biru-langit-700 mb-4">
            Struktur <span class="text-kuning-emas-600">Organisasi</span>
          </h2>
          <div class="h-1 w-32 bg-gradient-to-r from-biru-langit-500 to-kuning-emas-500 rounded-full mx-auto mb-6"></div>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Bagan organisasi BEM UNRI Kabinet Biru Langit 2025 dengan 130+ pengurus yang berkomitmen mengabdi untuk mahasiswa
          </p>
        </div>

        <!-- Organigram Container -->
        <div class="bg-gradient-to-br from-biru-langit-50 to-kuning-emas-50 p-8 rounded-3xl shadow-2xl border-4 border-white">
          <div class="bg-white rounded-2xl min-h-96 lg:min-h-[600px] flex items-center justify-center shadow-inner">
            <div class="text-center p-8">
              <div class="w-32 h-32 bg-gradient-to-br from-biru-langit-500 to-kuning-emas-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
              </div>
              <h3 class="text-3xl font-bold text-biru-langit-700 mb-4">Struktur Organisasi BEM UNRI</h3>
              <p class="text-lg text-gray-600 mb-6">130+ Pengurus Kabinet Biru Langit 2025</p>
              <div class="bg-kuning-emas-100 border-l-4 border-kuning-emas-500 p-4 rounded-lg">
                <p class="text-biru-langit-700 font-semibold">Placeholder untuk Organigram</p>
                <p class="text-sm text-gray-600 mt-2">Bagan organisasi akan ditampilkan di sini</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Info Box -->
        <div class="mt-8 grid md:grid-cols-3 gap-6">
          <div class="bg-biru-langit-500 text-white p-6 rounded-xl text-center">
            <div class="text-3xl font-bold mb-2">130+</div>
            <div class="text-biru-langit-100">Total Pengurus</div>
          </div>
          <div class="bg-kuning-emas-500 text-white p-6 rounded-xl text-center">
            <div class="text-3xl font-bold mb-2">15+</div>
            <div class="text-kuning-emas-100">Departemen & Divisi</div>
          </div>
          <div class="bg-green-500 text-white p-6 rounded-xl text-center">
            <div class="text-3xl font-bold mb-2">2025</div>
            <div class="text-green-100">Periode Kepengurusan</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Departemen Section -->
    <section class="py-20 bg-gradient-to-br from-biru-langit-50 to-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-4xl lg:text-5xl font-bold text-biru-langit-700 mb-4">
            Departemen & <span class="text-kuning-emas-600">Kementerian</span>
          </h2>
          <div class="h-1 w-32 bg-gradient-to-r from-biru-langit-500 to-kuning-emas-500 rounded-full mx-auto mb-6"></div>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Klik pada departemen untuk melihat detail program kerja dan anggota departemen
          </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Departemen Card 1 -->
          <div 
            class="department-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 cursor-pointer overflow-hidden"
            @click="goToDepartment('kemendagri')"
          >
            <div class="aspect-video bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 flex items-center justify-center relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-br from-biru-langit-500/20 to-kuning-emas-500/20 group-hover:from-biru-langit-500/30 group-hover:to-kuning-emas-500/30 transition-all duration-300"></div>
              <div class="text-center z-10">
                <div class="w-20 h-20 bg-biru-langit-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-biru-langit-600 transition-colors">
                  <span class="text-white text-3xl">🏛️</span>
                </div>
                <p class="text-biru-langit-600 font-semibold">Foto Departemen</p>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
                Kementerian Dalam Negeri
              </h3>
              <p class="text-gray-600 mb-4 leading-relaxed">
                Mengelola urusan internal organisasi, pengembangan SDM, dan koordinasi antar departemen
              </p>
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">15+ Anggota</span>
                <span class="text-biru-langit-600 font-semibold text-sm group-hover:text-kuning-emas-600 transition-colors">Lihat Detail →</span>
              </div>
            </div>
          </div>

          <!-- Departemen Card 2 -->
          <div 
            class="department-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 cursor-pointer overflow-hidden"
            @click="goToDepartment('kemlu')"
          >
            <div class="aspect-video bg-gradient-to-br from-kuning-emas-100 to-biru-langit-100 flex items-center justify-center relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-br from-kuning-emas-500/20 to-biru-langit-500/20 group-hover:from-kuning-emas-500/30 group-hover:to-biru-langit-500/30 transition-all duration-300"></div>
              <div class="text-center z-10">
                <div class="w-20 h-20 bg-kuning-emas-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-kuning-emas-600 transition-colors">
                  <span class="text-white text-3xl">🌍</span>
                </div>
                <p class="text-kuning-emas-600 font-semibold">Foto Departemen</p>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
                Kementerian Luar Negeri
              </h3>
              <p class="text-gray-600 mb-4 leading-relaxed">
                Menjalin hubungan eksternal, kerjasama antar universitas, dan program pertukaran mahasiswa
              </p>
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">12+ Anggota</span>
                <span class="text-biru-langit-600 font-semibold text-sm group-hover:text-kuning-emas-600 transition-colors">Lihat Detail →</span>
              </div>
            </div>
          </div>

          <!-- Departemen Card 3 -->
          <div 
            class="department-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 cursor-pointer overflow-hidden"
            @click="goToDepartment('sosmas')"
          >
            <div class="aspect-video bg-gradient-to-br from-green-100 to-biru-langit-100 flex items-center justify-center relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-br from-green-500/20 to-biru-langit-500/20 group-hover:from-green-500/30 group-hover:to-biru-langit-500/30 transition-all duration-300"></div>
              <div class="text-center z-10">
                <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-600 transition-colors">
                  <span class="text-white text-3xl">❤️</span>
                </div>
                <p class="text-green-600 font-semibold">Foto Departemen</p>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
                Sosial Masyarakat
              </h3>
              <p class="text-gray-600 mb-4 leading-relaxed">
                Program bakti sosial, pengabdian masyarakat, dan kegiatan kepedulian sosial
              </p>
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">18+ Anggota</span>
                <span class="text-biru-langit-600 font-semibold text-sm group-hover:text-kuning-emas-600 transition-colors">Lihat Detail →</span>
              </div>
            </div>
          </div>

          <!-- Departemen Card 4 -->
          <div 
            class="department-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 cursor-pointer overflow-hidden"
            @click="goToDepartment('kominfo')"
          >
            <div class="aspect-video bg-gradient-to-br from-purple-100 to-biru-langit-100 flex items-center justify-center relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-br from-purple-500/20 to-biru-langit-500/20 group-hover:from-purple-500/30 group-hover:to-biru-langit-500/30 transition-all duration-300"></div>
              <div class="text-center z-10">
                <div class="w-20 h-20 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-600 transition-colors">
                  <span class="text-white text-3xl">📢</span>
                </div>
                <p class="text-purple-600 font-semibold">Foto Departemen</p>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
                Komunikasi & Informasi
              </h3>
              <p class="text-gray-600 mb-4 leading-relaxed">
                Mengelola media sosial, publikasi, dokumentasi, dan penyebaran informasi BEM
              </p>
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">10+ Anggota</span>
                <span class="text-biru-langit-600 font-semibold text-sm group-hover:text-kuning-emas-600 transition-colors">Lihat Detail →</span>
              </div>
            </div>
          </div>

          <!-- Departemen Card 5 -->
          <div 
            class="department-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 cursor-pointer overflow-hidden"
            @click="goToDepartment('pendidikan')"
          >
            <div class="aspect-video bg-gradient-to-br from-indigo-100 to-kuning-emas-100 flex items-center justify-center relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/20 to-kuning-emas-500/20 group-hover:from-indigo-500/30 group-hover:to-kuning-emas-500/30 transition-all duration-300"></div>
              <div class="text-center z-10">
                <div class="w-20 h-20 bg-indigo-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-indigo-600 transition-colors">
                  <span class="text-white text-3xl">📚</span>
                </div>
                <p class="text-indigo-600 font-semibold">Foto Departemen</p>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
                Pendidikan & Akademik
              </h3>
              <p class="text-gray-600 mb-4 leading-relaxed">
                Program beasiswa, peningkatan prestasi akademik, dan pengembangan pendidikan
              </p>
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">14+ Anggota</span>
                <span class="text-biru-langit-600 font-semibold text-sm group-hover:text-kuning-emas-600 transition-colors">Lihat Detail →</span>
              </div>
            </div>
          </div>

          <!-- Departemen Card 6 -->
          <div 
            class="department-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 cursor-pointer overflow-hidden"
            @click="goToDepartment('kewirausahaan')"
          >
            <div class="aspect-video bg-gradient-to-br from-red-100 to-kuning-emas-100 flex items-center justify-center relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-br from-red-500/20 to-kuning-emas-500/20 group-hover:from-red-500/30 group-hover:to-kuning-emas-500/30 transition-all duration-300"></div>
              <div class="text-center z-10">
                <div class="w-20 h-20 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-red-600 transition-colors">
                  <span class="text-white text-3xl">💼</span>
                </div>
                <p class="text-red-600 font-semibold">Foto Departemen</p>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
                Kewirausahaan & Ekonomi
              </h3>
              <p class="text-gray-600 mb-4 leading-relaxed">
                Pembinaan jiwa entrepreneur, pelatihan bisnis, dan pengembangan ekonomi kreatif
              </p>
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">16+ Anggota</span>
                <span class="text-biru-langit-600 font-semibold text-sm group-hover:text-kuning-emas-600 transition-colors">Lihat Detail →</span>
              </div>
            </div>
          </div>

          <!-- Departemen Card 7 -->
          <div 
            class="department-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 cursor-pointer overflow-hidden"
            @click="goToDepartment('olahraga')"
          >
            <div class="aspect-video bg-gradient-to-br from-orange-100 to-biru-langit-100 flex items-center justify-center relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-br from-orange-500/20 to-biru-langit-500/20 group-hover:from-orange-500/30 group-hover:to-biru-langit-500/30 transition-all duration-300"></div>
              <div class="text-center z-10">
                <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-600 transition-colors">
                  <span class="text-white text-3xl">⚽</span>
                </div>
                <p class="text-orange-600 font-semibold">Foto Departemen</p>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
                Olahraga & Kesehatan
              </h3>
              <p class="text-gray-600 mb-4 leading-relaxed">
                Pembinaan olahraga mahasiswa, kompetisi, dan program kesehatan kampus
              </p>
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">20+ Anggota</span>
                <span class="text-biru-langit-600 font-semibold text-sm group-hover:text-kuning-emas-600 transition-colors">Lihat Detail →</span>
              </div>
            </div>
          </div>

          <!-- Departemen Card 8 -->
          <div 
            class="department-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 cursor-pointer overflow-hidden"
            @click="goToDepartment('seni-budaya')"
          >
            <div class="aspect-video bg-gradient-to-br from-pink-100 to-kuning-emas-100 flex items-center justify-center relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-br from-pink-500/20 to-kuning-emas-500/20 group-hover:from-pink-500/30 group-hover:to-kuning-emas-500/30 transition-all duration-300"></div>
              <div class="text-center z-10">
                <div class="w-20 h-20 bg-pink-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-pink-600 transition-colors">
                  <span class="text-white text-3xl">🎭</span>
                </div>
                <p class="text-pink-600 font-semibold">Foto Departemen</p>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
                Seni & Budaya
              </h3>
              <p class="text-gray-600 mb-4 leading-relaxed">
                Pengembangan seni, pelestarian budaya lokal, dan event kreatif mahasiswa
              </p>
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">12+ Anggota</span>
                <span class="text-biru-langit-600 font-semibold text-sm group-hover:text-kuning-emas-600 transition-colors">Lihat Detail →</span>
              </div>
            </div>
          </div>

          <!-- Departemen Card 9 -->
          <div 
            class="department-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 cursor-pointer overflow-hidden"
            @click="goToDepartment('litbang')"
          >
            <div class="aspect-video bg-gradient-to-br from-teal-100 to-biru-langit-100 flex items-center justify-center relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-br from-teal-500/20 to-biru-langit-500/20 group-hover:from-teal-500/30 group-hover:to-biru-langit-500/30 transition-all duration-300"></div>
              <div class="text-center z-10">
                <div class="w-20 h-20 bg-teal-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-teal-600 transition-colors">
                  <span class="text-white text-3xl">🔬</span>
                </div>
                <p class="text-teal-600 font-semibold">Foto Departemen</p>
              </div>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
                Litbang & Inovasi
              </h3>
              <p class="text-gray-600 mb-4 leading-relaxed">
                Penelitian, pengembangan inovasi, dan program riset mahasiswa
              </p>
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">8+ Anggota</span>
                <span class="text-biru-langit-600 font-semibold text-sm group-hover:text-kuning-emas-600 transition-colors">Lihat Detail →</span>
              </div>
            </div>
          </div>
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12">
          <button class="bg-biru-langit-500 hover:bg-biru-langit-600 text-white font-semibold px-8 py-4 text-lg rounded-lg transition-colors">
            Lihat Semua Departemen
          </button>
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
  methods: {
    goToDepartment(departmentId) {
  if (departmentId === 'kemendagri') {
    window.location.href = '/kemendagri';
  }
  // ... other departments
}
    }
  }
</script>