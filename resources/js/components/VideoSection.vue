<!-- resources/js/components/VideoSection.vue -->
<template>
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <!-- YouTube Video Card -->
        <div class="order-2 lg:order-1">
          <div class="relative group">
            <div class="card p-6">
              <div class="aspect-video bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 rounded-lg flex items-center justify-center cursor-pointer hover:from-biru-langit-200 hover:to-kuning-emas-200 transition-all duration-300">
                <div class="text-center">
                  <div class="w-20 h-20 bg-biru-langit-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-biru-langit-600 transition-colors">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M8 5v14l11-7z"/>
                    </svg>
                  </div>
                  <p class="text-biru-langit-600 font-semibold text-lg">Video Profil BEM UNRI</p>
                  <p class="text-sm text-gray-500 mt-2">Klik untuk menonton</p>
                </div>
              </div>
              <div class="mt-4 text-center">
                <h3 class="text-xl font-bold text-biru-langit-700 mb-2">Tonton Video Profil Kami</h3>
                <p class="text-gray-600">Pelajari lebih dalam tentang visi, misi, dan program kerja BEM UNRI Kabinet Biru Langit</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Video Description -->
        <div class="order-1 lg:order-2 space-y-6">
          <div>
            <h2 class="text-4xl font-bold text-biru-langit-700 mb-4">
              Video Profil 
              <span class="text-kuning-emas-600">BEM UNRI</span>
            </h2>
            <div class="h-1 w-32 bg-gradient-to-r from-biru-langit-500 to-kuning-emas-500 rounded-full mb-6"></div>
          </div>

          <div class="space-y-4">
            <p class="text-lg text-gray-700 leading-relaxed">
              Saksikan perjalanan dan dedikasi BEM UNRI Kabinet Biru Langit dalam mengabdi kepada mahasiswa 
              Universitas Riau. Video profil ini menampilkan komitmen kami dalam mewujudkan perubahan positif.
            </p>
            
            <p class="text-gray-600 leading-relaxed">
              Dari program kerja inovatif hingga pencapaian yang membanggakan, temukan bagaimana kami 
              bekerja keras untuk menciptakan lingkungan kampus yang lebih baik bagi seluruh mahasiswa.
            </p>
          </div>

          <div class="space-y-3">
            <div class="flex items-center space-x-3">
              <div class="w-2 h-2 bg-biru-langit-500 rounded-full"></div>
              <span class="text-gray-700">Visi dan Misi Kabinet</span>
            </div>
            <div class="flex items-center space-x-3">
              <div class="w-2 h-2 bg-kuning-emas-500 rounded-full"></div>
              <span class="text-gray-700">Program Kerja Unggulan</span>
            </div>
            <div class="flex items-center space-x-3">
              <div class="w-2 h-2 bg-biru-langit-500 rounded-full"></div>
              <span class="text-gray-700">Testimoni Mahasiswa</span>
            </div>
            <div class="flex items-center space-x-3">
              <div class="w-2 h-2 bg-kuning-emas-500 rounded-full"></div>
              <span class="text-gray-700">Pencapaian dan Prestasi</span>
            </div>
          </div>

          <button class="btn-primary mt-6">
            Selengkapnya
          </button>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'VideoSection'
}
</script>