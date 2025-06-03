<!-- resources/js/components/ProgramKerja.vue -->
<template>
  <section class="py-20 bg-gradient-to-br from-blue-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl lg:text-5xl font-bold text-blue-700 mb-4">
          Program <span class="text-yellow-600">Kerja</span>
        </h2>
        <div class="h-1 w-32 bg-gradient-to-r from-blue-500 to-yellow-500 rounded-full mx-auto mb-6"></div>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Program kerja unggulan BEM UNRI Kabinet Biru Langit untuk kemajuan mahasiswa dan universitas
        </p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Program Kerja Card 1 -->
        <div class="program-card group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" style="perspective: 1000px;">
          <div class="card-inner relative w-full h-80 transition-transform duration-700 group-hover:rotate-y-180" style="transform-style: preserve-3d;">
            <!-- Front Side -->
            <div class="card-face absolute w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white" style="backface-visibility: hidden;">
              <div class="text-center p-6">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <span class="text-2xl">📚</span>
                </div>
                <h3 class="text-xl font-bold">Beasiswa & Prestasi</h3>
                <p class="text-sm opacity-90 mt-2">Program pemberdayaan akademik</p>
              </div>
            </div>
            <!-- Back Side -->
            <div class="card-face absolute w-full h-full bg-white p-6 flex items-center justify-center" style="backface-visibility: hidden; transform: rotateY(180deg);">
              <div class="text-center">
                <h4 class="text-lg font-bold text-blue-700 mb-3">Detail Program</h4>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                  Memfasilitasi informasi beasiswa, program peningkatan prestasi akademik, dan pendampingan mahasiswa berprestasi.
                </p>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Selengkapnya</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Program Kerja Card 2 -->
        <div class="program-card group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" style="perspective: 1000px;">
          <div class="card-inner relative w-full h-80 transition-transform duration-700 group-hover:rotate-y-180" style="transform-style: preserve-3d;">
            <!-- Front Side -->
            <div class="card-face absolute w-full h-full bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center text-white" style="backface-visibility: hidden;">
              <div class="text-center p-6">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <span class="text-2xl">👥</span>
                </div>
                <h3 class="text-xl font-bold">Pengembangan SDM</h3>
                <p class="text-sm opacity-90 mt-2">Pelatihan soft skill mahasiswa</p>
              </div>
            </div>
            <!-- Back Side -->
            <div class="card-face absolute w-full h-full bg-white p-6 flex items-center justify-center" style="backface-visibility: hidden; transform: rotateY(180deg);">
              <div class="text-center">
                <h4 class="text-lg font-bold text-yellow-600 mb-3">Detail Program</h4>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                  Workshop, seminar, dan pelatihan untuk mengembangkan kepemimpinan, komunikasi, dan keterampilan organisasi mahasiswa.
                </p>
                <button class="bg-yellow-500 hover:bg-yellow-600 text-blue-800 font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Selengkapnya</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Program Kerja Card 3 -->
        <div class="program-card group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" style="perspective: 1000px;">
          <div class="card-inner relative w-full h-80 transition-transform duration-700 group-hover:rotate-y-180" style="transform-style: preserve-3d;">
            <!-- Front Side -->
            <div class="card-face absolute w-full h-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center text-white" style="backface-visibility: hidden;">
              <div class="text-center p-6">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <span class="text-2xl">❤️</span>
                </div>
                <h3 class="text-xl font-bold">Bakti Sosial</h3>
                <p class="text-sm opacity-90 mt-2">Pengabdian kepada masyarakat</p>
              </div>
            </div>
            <!-- Back Side -->
            <div class="card-face absolute w-full h-full bg-white p-6 flex items-center justify-center" style="backface-visibility: hidden; transform: rotateY(180deg);">
              <div class="text-center">
                <h4 class="text-lg font-bold text-blue-700 mb-3">Detail Program</h4>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                  Kegiatan bakti sosial, pengabdian masyarakat, dan program kepedulian sosial untuk membangun karakter mahasiswa.
                </p>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Selengkapnya</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Program Kerja Card 4 -->
        <div class="program-card group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" style="perspective: 1000px;">
          <div class="card-inner relative w-full h-80 transition-transform duration-700 group-hover:rotate-y-180" style="transform-style: preserve-3d;">
            <!-- Front Side -->
            <div class="card-face absolute w-full h-full bg-gradient-to-br from-yellow-500 to-yellow-700 flex items-center justify-center text-white" style="backface-visibility: hidden;">
              <div class="text-center p-6">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <span class="text-2xl">💡</span>
                </div>
                <h3 class="text-xl font-bold">Inovasi Digital</h3>
                <p class="text-sm opacity-90 mt-2">Teknologi untuk mahasiswa</p>
              </div>
            </div>
            <!-- Back Side -->
            <div class="card-face absolute w-full h-full bg-white p-6 flex items-center justify-center" style="backface-visibility: hidden; transform: rotateY(180deg);">
              <div class="text-center">
                <h4 class="text-lg font-bold text-yellow-600 mb-3">Detail Program</h4>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                  Pengembangan aplikasi, digitalisasi layanan mahasiswa, dan pemanfaatan teknologi untuk kemudahan akademik.
                </p>
                <button class="bg-yellow-500 hover:bg-yellow-600 text-blue-800 font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Selengkapnya</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Program Kerja Card 5 -->
        <div class="program-card group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" style="perspective: 1000px;">
          <div class="card-inner relative w-full h-80 transition-transform duration-700 group-hover:rotate-y-180" style="transform-style: preserve-3d;">
            <!-- Front Side -->
            <div class="card-face absolute w-full h-full bg-gradient-to-br from-blue-500 to-yellow-500 flex items-center justify-center text-white" style="backface-visibility: hidden;">
              <div class="text-center p-6">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <span class="text-2xl">💼</span>
                </div>
                <h3 class="text-xl font-bold">Kewirausahaan</h3>
                <p class="text-sm opacity-90 mt-2">Pengembangan jiwa entrepreneur</p>
              </div>
            </div>
            <!-- Back Side -->
            <div class="card-face absolute w-full h-full bg-white p-6 flex items-center justify-center" style="backface-visibility: hidden; transform: rotateY(180deg);">
              <div class="text-center">
                <h4 class="text-lg font-bold text-blue-700 mb-3">Detail Program</h4>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                  Pelatihan bisnis, inkubator startup mahasiswa, dan program pendampingan untuk mengembangkan jiwa kewirausahaan.
                </p>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Selengkapnya</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Program Kerja Card 6 -->
        <div class="program-card group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" style="perspective: 1000px;">
          <div class="card-inner relative w-full h-80 transition-transform duration-700 group-hover:rotate-y-180" style="transform-style: preserve-3d;">
            <!-- Front Side -->
            <div class="card-face absolute w-full h-full bg-gradient-to-br from-yellow-600 to-blue-600 flex items-center justify-center text-white" style="backface-visibility: hidden;">
              <div class="text-center p-6">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <span class="text-2xl">⚡</span>
                </div>
                <h3 class="text-xl font-bold">Advokasi Mahasiswa</h3>
                <p class="text-sm opacity-90 mt-2">Penyalur aspirasi mahasiswa</p>
              </div>
            </div>
            <!-- Back Side -->
            <div class="card-face absolute w-full h-full bg-white p-6 flex items-center justify-center" style="backface-visibility: hidden; transform: rotateY(180deg);">
              <div class="text-center">
                <h4 class="text-lg font-bold text-yellow-600 mb-3">Detail Program</h4>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                  Menjadi jembatan antara mahasiswa dengan pihak universitas, menyuarakan aspirasi dan kepentingan mahasiswa.
                </p>
                <button class="bg-yellow-500 hover:bg-yellow-600 text-blue-800 font-semibold py-2 px-4 rounded-lg transition-colors text-sm">Selengkapnya</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-12">
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-8 py-4 text-lg rounded-lg transition-colors">Lihat Semua Program Kerja</button>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'ProgramKerja'
}
</script>