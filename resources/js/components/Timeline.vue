<!-- resources/js/components/Timeline.vue -->
<template>
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl lg:text-5xl font-bold text-biru-langit-700 mb-4">
          Timeline <span class="text-kuning-emas-600">Kegiatan</span>
        </h2>
        <div class="h-1 w-32 bg-gradient-to-r from-biru-langit-500 to-kuning-emas-500 rounded-full mx-auto mb-6"></div>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Jadwal kegiatan dan event terkini dari BEM UNRI Kabinet Biru Langit
        </p>
      </div>

      <div class="grid lg:grid-cols-2 gap-12">
        <!-- Google Calendar Integration -->
        <div class="space-y-6">
          <div class="bg-gradient-to-br from-biru-langit-50 to-white p-8 rounded-2xl shadow-lg border border-biru-langit-100">
            <div class="flex items-center space-x-4 mb-6">
              <div class="w-12 h-12 bg-gradient-to-br from-biru-langit-500 to-biru-langit-600 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
              </div>
              <h3 class="text-2xl font-bold text-biru-langit-700">Kalender Kegiatan</h3>
            </div>

            <!-- Calendar Placeholder -->
            <div class="bg-white p-6 rounded-xl border-2 border-dashed border-biru-langit-200 min-h-80 flex items-center justify-center">
              <div class="text-center">
                <div class="w-16 h-16 bg-biru-langit-100 rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-8 h-8 text-biru-langit-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                </div>
                <p class="text-biru-langit-600 font-semibold">Google Calendar Integration</p>
                <p class="text-sm text-gray-500 mt-2">Timeline kegiatan akan ditampilkan di sini</p>
              </div>
            </div>

            <div class="mt-6 flex justify-center">
              <button class="btn-primary">Lihat Kalender Lengkap</button>
            </div>
          </div>
        </div>

        <!-- Photo Gallery Cards -->
        <div class="space-y-6">
          <h3 class="text-2xl font-bold text-biru-langit-700 mb-6">Dokumentasi Kegiatan</h3>
          
          <div class="grid grid-cols-2 gap-4">
            <!-- Photo Card 1 -->
            <div class="card group cursor-pointer">
              <div class="aspect-square bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 flex items-center justify-center">
                <div class="text-center">
                  <div class="w-12 h-12 bg-biru-langit-500 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:bg-biru-langit-600 transition-colors">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                  </div>
                  <p class="text-xs text-biru-langit-600 font-medium">Event 1</p>
                </div>
              </div>
              <div class="p-3">
                <p class="text-sm font-semibold text-gray-700">Kegiatan Organisasi</p>
                <p class="text-xs text-gray-500">Placeholder foto</p>
              </div>
            </div>

            <!-- Photo Card 2 -->
            <div class="card group cursor-pointer">
              <div class="aspect-square bg-gradient-to-br from-kuning-emas-100 to-biru-langit-100 flex items-center justify-center">
                <div class="text-center">
                  <div class="w-12 h-12 bg-kuning-emas-500 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:bg-kuning-emas-600 transition-colors">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                  </div>
                  <p class="text-xs text-kuning-emas-600 font-medium">Event 2</p>
                </div>
              </div>
              <div class="p-3">
                <p class="text-sm font-semibold text-gray-700">Workshop Mahasiswa</p>
                <p class="text-xs text-gray-500">Placeholder foto</p>
              </div>
            </div>

            <!-- Photo Card 3 -->
            <div class="card group cursor-pointer">
              <div class="aspect-square bg-gradient-to-br from-biru-langit-100 to-kuning-emas-100 flex items-center justify-center">
                <div class="text-center">
                  <div class="w-12 h-12 bg-biru-langit-500 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:bg-biru-langit-600 transition-colors">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                  </div>
                  <p class="text-xs text-biru-langit-600 font-medium">Event 3</p>
                </div>
              </div>
              <div class="p-3">
                <p class="text-sm font-semibold text-gray-700">Seminar Nasional</p>
                <p class="text-xs text-gray-500">Placeholder foto</p>
              </div>
            </div>

            <!-- Photo Card 4 -->
            <div class="card group cursor-pointer">
              <div class="aspect-square bg-gradient-to-br from-kuning-emas-100 to-biru-langit-100 flex items-center justify-center">
                <div class="text-center">
                  <div class="w-12 h-12 bg-kuning-emas-500 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:bg-kuning-emas-600 transition-colors">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                  </div>
                  <p class="text-xs text-kuning-emas-600 font-medium">Event 4</p>
                </div>
              </div>
              <div class="p-3">
                <p class="text-sm font-semibold text-gray-700">Bakti Sosial</p>
                <p class="text-xs text-gray-500">Placeholder foto</p>
              </div>
            </div>
          </div>

          <div class="text-center mt-6">
            <button class="btn-secondary">Lihat Semua Dokumentasi</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Timeline'
}
</script>