<template>
  <section class="py-20 bg-gradient-to-br from-biru-langit-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl lg:text-5xl font-bold text-biru-langit-700 mb-4">
          Visi & <span class="text-kuning-emas-600">Misi</span>
        </h2>
        <div class="h-1 w-32 bg-gradient-to-r from-biru-langit-500 to-kuning-emas-500 rounded-full mx-auto mb-6"></div>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Landasan fundamental yang mengarahkan setiap langkah BEM UNRI Kabinet Biru Langit
        </p>
      </div>

      <div class="grid lg:grid-cols-2 gap-12 items-start">
        <!-- Visi & Misi Content -->
        <div class="space-y-12">
          <!-- Visi -->
          <div class="space-y-6">
            <div class="flex items-center space-x-4">
              <div class="w-12 h-12 bg-gradient-to-br from-biru-langit-500 to-biru-langit-600 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
              </div>
              <h3 class="text-3xl font-bold text-biru-langit-700">VISI</h3>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-biru-langit-500">
              <p class="text-lg text-gray-700 leading-relaxed font-medium">
                "Menjadi organisasi mahasiswa yang mampu mengayomi, menginspirasi, dan memberdayakan 
                seluruh mahasiswa Universitas Riau untuk mencapai potensi terbaik dalam bidang akademik, 
                organisasi, dan kehidupan bermasyarakat dengan berlandaskan nilai-nilai keislaman, 
                kearifan lokal, dan semangat kebangsaan."
              </p>
            </div>
          </div>

          <!-- Misi -->
          <div class="space-y-6">
            <div class="flex items-center space-x-4">
              <div class="w-12 h-12 bg-gradient-to-br from-kuning-emas-500 to-kuning-emas-600 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <h3 class="text-3xl font-bold text-kuning-emas-600">MISI</h3>
            </div>

            <div class="space-y-4">
              <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-kuning-emas-500 hover:shadow-lg transition-shadow">
                <div class="flex items-start space-x-3">
                  <span class="flex-shrink-0 w-8 h-8 bg-kuning-emas-500 text-white rounded-full flex items-center justify-center font-bold text-sm">1</span>
                  <p class="text-gray-700 leading-relaxed">
                    Mengoptimalkan fungsi BEM sebagai wadah pengembangan soft skill dan hard skill mahasiswa melalui program-program yang inovatif dan berkelanjutan.
                  </p>
                </div>
              </div>

              <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-kuning-emas-500 hover:shadow-lg transition-shadow">
                <div class="flex items-start space-x-3">
                  <span class="flex-shrink-0 w-8 h-8 bg-kuning-emas-500 text-white rounded-full flex items-center justify-center font-bold text-sm">2</span>
                  <p class="text-gray-700 leading-relaxed">
                    Membangun sinergitas yang kuat antara mahasiswa, dosen, dan pihak universitas untuk menciptakan lingkungan akademik yang kondusif.
                  </p>
                </div>
              </div>

              <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-kuning-emas-500 hover:shadow-lg transition-shadow">
                <div class="flex items-start space-x-3">
                  <span class="flex-shrink-0 w-8 h-8 bg-kuning-emas-500 text-white rounded-full flex items-center justify-center font-bold text-sm">3</span>
                  <p class="text-gray-700 leading-relaxed">
                    Menjadi jembatan aspirasi mahasiswa dan mengadvokasi kepentingan mahasiswa kepada pihak universitas dan pemerintah.
                  </p>
                </div>
              </div>

              <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-kuning-emas-500 hover:shadow-lg transition-shadow">
                <div class="flex items-start space-x-3">
                  <span class="flex-shrink-0 w-8 h-8 bg-kuning-emas-500 text-white rounded-full flex items-center justify-center font-bold text-sm">4</span>
                  <p class="text-gray-700 leading-relaxed">
                    Mengembangkan program kerja yang berdampak positif bagi masyarakat dan menguatkan peran mahasiswa sebagai agent of change.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Placeholder for BEM UNRI Group Photo -->
        <div class="flex justify-center">
          <div class="relative">
            <div class="w-full max-w-lg h-96 bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 rounded-2xl shadow-2xl flex items-center justify-center border-4 border-white">
              <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-biru-langit-500 to-kuning-emas-500 rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                  </svg>
                </div>
                <p class="text-biru-langit-600 font-semibold text-lg">Foto Bersama</p>
                <p class="text-kuning-emas-600 font-semibold">BEM UNRI 2025</p>
                <p class="text-sm text-gray-500 mt-2">Kabinet Biru Langit</p>
              </div>
            </div>
            <!-- Decorative Elements -->
            <div class="absolute -top-6 -right-6 w-12 h-12 bg-kuning-emas-400 rounded-full opacity-20"></div>
            <div class="absolute -bottom-6 -left-6 w-8 h-8 bg-biru-langit-500 rounded-full opacity-30"></div>
            <div class="absolute top-4 -left-4 w-4 h-4 bg-kuning-emas-500 rounded-full"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'VisiMisi'
}
</script>