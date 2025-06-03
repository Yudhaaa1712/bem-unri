<!-- resources/js/components/BiruLangitNews.vue (Updated) -->
<template>
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl lg:text-5xl font-bold text-biru-langit-700 mb-4">
          Biru Langit <span class="text-kuning-emas-600">News</span>
        </h2>
        <div class="h-1 w-32 bg-gradient-to-r from-biru-langit-500 to-kuning-emas-500 rounded-full mx-auto mb-6"></div>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Berita terkini dan informasi terbaru dari BEM UNRI Kabinet Biru Langit
        </p>
      </div>

      <!-- Filter Tabs -->
      <div class="flex flex-wrap justify-center gap-4 mb-12">
        <button 
          @click="activeFilter = 'all'"
          :class="activeFilter === 'all' ? 'btn-primary' : 'btn-secondary'"
          class="px-6 py-3 rounded-full font-semibold transition-all duration-300"
        >
          Semua Berita
        </button>
        <button 
          @click="activeFilter = 'kemendagri'"
          :class="activeFilter === 'kemendagri' ? 'btn-primary' : 'btn-secondary'"
          class="px-6 py-3 rounded-full font-semibold transition-all duration-300"
        >
          Kemendagri
        </button>
        <button 
          @click="activeFilter = 'kemlu'"
          :class="activeFilter === 'kemlu' ? 'btn-primary' : 'btn-secondary'"
          class="px-6 py-3 rounded-full font-semibold transition-all duration-300"
        >
          Kemlu
        </button>
        <button 
          @click="activeFilter = 'sosmas'"
          :class="activeFilter === 'sosmas' ? 'btn-primary' : 'btn-secondary'"
          class="px-6 py-3 rounded-full font-semibold transition-all duration-300"
        >
          Sosmas
        </button>
      </div>

      <!-- News Grid - Show only 3 latest news -->
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <!-- News Card 1 -->
        <article class="card group cursor-pointer" @click="goToNews">
          <div class="aspect-video bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 flex items-center justify-center">
            <div class="text-center">
              <div class="w-16 h-16 bg-biru-langit-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-biru-langit-600 transition-colors">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m0 0V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2h-2z"></path>
                </svg>
              </div>
              <p class="text-biru-langit-600 font-semibold">Foto Berita</p>
            </div>
          </div>
          <div class="p-6">
            <div class="flex items-center space-x-2 mb-3">
              <span class="px-3 py-1 bg-biru-langit-100 text-biru-langit-700 text-xs font-semibold rounded-full">Kemendagri</span>
              <span class="text-gray-500 text-sm">2 hari yang lalu</span>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
              Workshop Pengembangan Organisasi Mahasiswa
            </h3>
            <p class="text-gray-600 mb-4 line-clamp-3">
              BEM UNRI mengadakan workshop pengembangan organisasi mahasiswa yang diikuti oleh seluruh pengurus organisasi di lingkungan Universitas Riau...
            </p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-gray-500">Admin BEM</span>
              <span class="text-biru-langit-600 font-semibold text-sm hover:text-kuning-emas-600 transition-colors">Baca Selengkapnya →</span>
            </div>
          </div>
        </article>

        <!-- News Card 2 -->
        <article class="card group cursor-pointer" @click="goToNews">
          <div class="aspect-video bg-gradient-to-br from-kuning-emas-100 to-biru-langit-100 flex items-center justify-center">
            <div class="text-center">
              <div class="w-16 h-16 bg-kuning-emas-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-kuning-emas-600 transition-colors">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m0 0V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2h-2z"></path>
                </svg>
              </div>
              <p class="text-kuning-emas-600 font-semibold">Foto Berita</p>
            </div>
          </div>
          <div class="p-6">
            <div class="flex items-center space-x-2 mb-3">
              <span class="px-3 py-1 bg-kuning-emas-100 text-kuning-emas-700 text-xs font-semibold rounded-full">Kemlu</span>
              <span class="text-gray-500 text-sm">5 hari yang lalu</span>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
              Kerjasama Internasional dengan Universitas Malaysia
            </h3>
            <p class="text-gray-600 mb-4 line-clamp-3">
              BEM UNRI menjalin kerjasama dengan organisasi mahasiswa dari Universitas Malaysia dalam program pertukaran budaya dan akademik...
            </p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-gray-500">Admin BEM</span>
              <span class="text-biru-langit-600 font-semibold text-sm hover:text-kuning-emas-600 transition-colors">Baca Selengkapnya →</span>
            </div>
          </div>
        </article>

        <!-- News Card 3 -->
        <article class="card group cursor-pointer" @click="goToNews">
          <div class="aspect-video bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 flex items-center justify-center">
            <div class="text-center">
              <div class="w-16 h-16 bg-biru-langit-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-biru-langit-600 transition-colors">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m0 0V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2h-2z"></path>
                </svg>
              </div>
              <p class="text-biru-langit-600 font-semibold">Foto Berita</p>
            </div>
          </div>
          <div class="p-6">
            <div class="flex items-center space-x-2 mb-3">
              <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Sosmas</span>
              <span class="text-gray-500 text-sm">1 minggu yang lalu</span>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-biru-langit-600 transition-colors">
              Bakti Sosial di Desa Sungai Pinang
            </h3>
            <p class="text-gray-600 mb-4 line-clamp-3">
              Kegiatan bakti sosial yang melibatkan 100 mahasiswa untuk membantu renovasi sekolah dan memberikan bantuan pendidikan...
            </p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-gray-500">Admin BEM</span>
              <span class="text-biru-langit-600 font-semibold text-sm hover:text-kuning-emas-600 transition-colors">Baca Selengkapnya →</span>
            </div>
          </div>
        </article>
      </div>

      <!-- Call to Action -->
      <div class="text-center">
        <a href="/news" class="btn-primary px-8 py-4 text-lg inline-block">
          Lihat Semua Berita
        </a>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'BiruLangitNews',
  data() {
    return {
      activeFilter: 'all'
    }
  },
  methods: {
    goToNews() {
      window.location.href = '/news'
    }
  }
}
</script>