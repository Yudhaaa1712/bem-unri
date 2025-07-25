<!-- resources/js/components/Timeline.vue -->
<template>
  <section class="py-5 bg-white relative overflow-hidden">
    <!-- Background decorative elements -->
    <div class="absolute top-10 left-10 w-16 h-16 bg-gradient-to-br from-[#ffe500] to-[#eb7118] opacity-20 rounded-full transform rotate-45"></div>
    <div class="absolute bottom-20 right-20 w-12 h-12 bg-[#034caa] opacity-30 rounded-full"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="text-center mb-16">
        <h2 class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent mb-4">
          Timeline <span class="bg-gradient-to-r from-[#eb7118] to-[#ffe500] bg-clip-text text-transparent">Kegiatan</span>
        </h2>
               <p class="text-xl text-black max-w-3xl mx-auto">
          Jadwal kegiatan dan event terkini dari BEM FEB UI
        </p>
      </div>

      <div class="grid lg:grid-cols-2 gap-12">
        <!-- Google Calendar Integration -->
        <div class="space-y-6">
          <div class="flex items-center space-x-4 mb-6">
            <div class="w-12 h-12 bg-gradient-to-br from-[#034caa] to-[#003375] rounded-full flex items-center justify-center">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
            </div>
            <h3 class="text-2xl font-bold bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent">Kalender Kegiatan</h3>
          </div>

          <!-- Calendar Display -->
          <div class="rounded-xl overflow-hidden shadow-lg">
            <iframe 
              :src="calendarLink"
              class="w-full h-96"
              frameborder="0"
              scrolling="no"
            ></iframe>
          </div>
        </div>

        <!-- Photo Gallery Cards -->
        <div class="space-y-6">
          <h3 class="text-2xl font-bold bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent mb-6">Dokumentasi Kegiatan</h3>
          
          <div class="grid grid-cols-4 gap-3">
            <!-- Photo Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden group cursor-pointer hover:shadow-lg transition-all duration-300 border border-gray-100">
              <div class="aspect-square bg-gradient-to-br from-[#034caa]/10 to-[#ffe500]/10 flex items-center justify-center relative overflow-hidden">
                <input 
                  type="file" 
                  @change="handleImageUpload($event, 0)"
                  accept="image/*"
                  class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                />
                <img :src="photos[0]" alt="Event 1" class="w-full h-full object-cover" />
              </div>
              <div class="p-2">
                <input 
                  v-model="photoTitles[0]" 
                  class="w-full text-xs font-semibold text-gray-700 border-none outline-none bg-transparent"
                />
                <textarea 
                  v-model="photoDescriptions[0]" 
                  class="w-full text-[10px] text-gray-500 border-none outline-none bg-transparent mt-1 resize-none h-8"
                ></textarea>
              </div>
            </div>

            <!-- Photo Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden group cursor-pointer hover:shadow-lg transition-all duration-300 border border-gray-100">
              <div class="aspect-square bg-gradient-to-br from-[#ffe500]/10 to-[#034caa]/10 flex items-center justify-center relative overflow-hidden">
                <input 
                  type="file" 
                  @change="handleImageUpload($event, 1)"
                  accept="image/*"
                  class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                />
                <img :src="photos[1]" alt="Event 2" class="w-full h-full object-cover" />
              </div>
              <div class="p-2">
                <input 
                  v-model="photoTitles[1]" 
                  class="w-full text-xs font-semibold text-gray-700 border-none outline-none bg-transparent"
                />
                <textarea 
                  v-model="photoDescriptions[1]" 
                  class="w-full text-[10px] text-gray-500 border-none outline-none bg-transparent mt-1 resize-none h-8"
                ></textarea>
              </div>
            </div>

            <!-- Photo Card 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden group cursor-pointer hover:shadow-lg transition-all duration-300 border border-gray-100">
              <div class="aspect-square bg-gradient-to-br from-[#034caa]/10 to-[#ffe500]/10 flex items-center justify-center relative overflow-hidden">
                <input 
                  type="file" 
                  @change="handleImageUpload($event, 2)"
                  accept="image/*"
                  class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                />
                <img :src="photos[2]" alt="Event 3" class="w-full h-full object-cover" />
              </div>
              <div class="p-2">
                <input 
                  v-model="photoTitles[2]" 
                  class="w-full text-xs font-semibold text-gray-700 border-none outline-none bg-transparent"
                />
                <textarea 
                  v-model="photoDescriptions[2]" 
                  class="w-full text-[10px] text-gray-500 border-none outline-none bg-transparent mt-1 resize-none h-8"
                ></textarea>
              </div>
            </div>

            <!-- Photo Card 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden group cursor-pointer hover:shadow-lg transition-all duration-300 border border-gray-100">
              <div class="aspect-square bg-gradient-to-br from-[#ffe500]/10 to-[#034caa]/10 flex items-center justify-center relative overflow-hidden">
                <input 
                  type="file" 
                  @change="handleImageUpload($event, 3)"
                  accept="image/*"
                  class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                />
                <img :src="photos[3]" alt="Event 4" class="w-full h-full object-cover" />
              </div>
              <div class="p-2">
                <input 
                  v-model="photoTitles[3]" 
                  class="w-full text-xs font-semibold text-gray-700 border-none outline-none bg-transparent"
                />
                <textarea 
                  v-model="photoDescriptions[3]" 
                  class="w-full text-[10px] text-gray-500 border-none outline-none bg-transparent mt-1 resize-none h-8"
                ></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'

const calendarLink = ref('https://calendar.google.com/calendar/embed?src=22fad45db7bc6dae55136f36455fbf868972a700b08ecefb10951986995c2d6cb%40group.calendar.google.com&ctz=Asia%2FJakarta')
const photos = ref([
  'https://via.placeholder.com/300x300/034caa/ffffff?text=Kegiatan+Organisasi',
  'https://via.placeholder.com/300x300/eb7118/ffffff?text=Workshop+Mahasiswa', 
  'https://via.placeholder.com/300x300/034caa/ffffff?text=Seminar+Nasional',
  'https://via.placeholder.com/300x300/ffe500/000000?text=Bakti+Sosial'
])
const photoTitles = ref(['Kegiatan Organisasi', 'Workshop Mahasiswa', 'Seminar Nasional', 'Bakti Sosial'])
const photoDescriptions = ref([
  'Kegiatan rutin pengembangan organisasi BEM FEB UI',
  'Workshop peningkatan skill mahasiswa FEB UI', 
  'Seminar nasional dengan pembicara terkemuka',
  'Program pengabdian masyarakat BEM FEB UI'
])

const updateCalendar = () => {
  if (calendarLink.value) {
    // Implement calendar integration logic here
    console.log('Calendar link updated:', calendarLink.value)
    alert('Kalender berhasil diupdate!')
  } else {
    alert('Silakan masukkan link Google Calendar terlebih dahulu')
  }
}

const handleImageUpload = (event, index) => {
  const file = event.target.files[0]
  if (file) {
    const reader = new FileReader()
    reader.onload = (e) => {
      photos.value[index] = e.target.result
    }
    reader.readAsDataURL(file)
  }
}
</script>

<script>
export default {
  name: 'Timeline'
}
</script>