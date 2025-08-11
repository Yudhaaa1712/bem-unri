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

      <!-- Loading state -->
      <div v-if="isLoading" class="text-center py-12">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-[#034caa] mx-auto mb-4"></div>
        <p class="text-gray-600">Memuat data...</p>
      </div>

      <div v-else class="grid lg:grid-cols-2 gap-12">
        <!-- Calendar Section -->
        <div class="space-y-6">
          <div class="flex items-center space-x-4 mb-6">
          </div>

          <!-- Calendar Display -->
          <div class="rounded-xl overflow-hidden shadow-lg bg-white">
            <!-- Calendar Header -->
            <div class="bg-gradient-to-r from-[#034caa] to-[#003375] p-4 flex justify-between items-center">
              <button @click="previousMonth" class="text-white hover:bg-white/10 p-2 rounded transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
              </button>
              
              <h4 class="text-white font-semibold text-lg">
                {{ formatMonth(currentDate) }}
              </h4>
              
              <button @click="nextMonth" class="text-white hover:bg-white/10 p-2 rounded transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
              </button>
            </div>

            <!-- Calendar Grid -->
            <div class="p-4">
              <!-- Day labels -->
              <div class="grid grid-cols-7 gap-1 mb-2">
                <div v-for="day in dayLabels" :key="day" 
                     class="text-center text-sm font-medium text-gray-500 p-2">
                  {{ day }}
                </div>
              </div>

              <!-- Calendar dates -->
              <div class="grid grid-cols-7 gap-1">
                <div v-for="date in calendarDates" :key="date.dateString"
                     @click="selectDate(date)"
                     :class="getDateClasses(date)"
                     class="cursor-pointer p-2 text-center text-sm rounded hover:bg-blue-50 transition-colors relative min-h-[40px] flex items-center justify-center">
                  {{ date.day }}
                  <div v-if="hasEvents(date)" class="absolute bottom-1 left-1/2 transform -translate-x-1/2 w-2 h-2 bg-[#eb7118] rounded-full"></div>
                </div>
              </div>
            </div>

            <!-- Selected date events -->
            <div v-if="selectedDateEvents.length > 0" class="border-t bg-gray-50 p-4">
              <h5 class="font-semibold text-gray-800 mb-3">
                Kegiatan {{ formatSelectedDate(selectedDate) }}
              </h5>
              <div class="space-y-3 max-h-60 overflow-y-auto">
                <div v-for="event in selectedDateEvents" :key="event.id"
                     class="bg-white p-3 rounded-lg border-l-4 border-[#034caa] shadow-sm">
                  <div class="font-medium text-gray-800">{{ event.title }}</div>
                  <div class="text-sm text-gray-600 mt-1 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ event.time }}
                  </div>
                  <div v-if="event.description" class="text-sm text-gray-500 mt-2">
                    {{ event.description }}
                  </div>
                  <div v-if="event.location" class="text-sm text-gray-500 mt-1 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    {{ event.location }}
                  </div>
                </div>
              </div>
            </div>

            <!-- No events message -->
            <div v-else-if="selectedDate" class="border-t bg-gray-50 p-4 text-center text-gray-500">
              Tidak ada kegiatan pada {{ formatSelectedDate(selectedDate) }}
            </div>
          </div>
        </div>

        <!-- Photo Gallery Cards -->
        <div class="space-y-6">
          <h3 class="text-2xl font-bold bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent mb-6">Dokumentasi Kegiatan</h3>
          
          <div v-if="photoGallery.length === 0" class="text-center py-12 text-gray-500">
            Belum ada foto yang ditambahkan
          </div>
          
          <div v-else class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div v-for="photo in photoGallery" :key="photo.id"
                 class="bg-white rounded-lg shadow-md overflow-hidden group cursor-pointer hover:shadow-lg transition-all duration-300 border border-gray-100">
              <div class="aspect-square bg-gradient-to-br from-[#034caa]/10 to-[#ffe500]/10 flex items-center justify-center relative overflow-hidden">
                <img :src="photo.image_url" :alt="photo.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
              </div>
              <div class="p-3">
                <h4 class="font-semibold text-gray-800 mb-1 text-sm">{{ photo.title }}</h4>
                <p class="text-xs text-gray-600 mb-2 line-clamp-2">{{ photo.description }}</p>
                <div class="flex items-center text-xs text-gray-500">
                  <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                  {{ formatPhotoDate(photo.created_at) }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'

// Calendar state
const currentDate = ref(new Date())
const selectedDate = ref(null)
const dayLabels = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab']

// Data state
const events = ref([])
const photoGallery = ref([])
const isLoading = ref(true)

// API methods
const fetchEvents = async () => {
  console.log('🔄 Fetching events from API...')
  
  try {
    const response = await fetch('/api/events', {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    
    console.log('📡 API Response status:', response.status)
    
    if (response.ok) {
      const data = await response.json()
      console.log('📋 API Response data:', data)
      
      if (data.success) {
        events.value = data.data || []
        console.log('✅ Events loaded:', events.value.length, 'events')
        console.log('📅 Events data:', events.value)
      } else {
        console.error('❌ API Error:', data.message)
        events.value = getDemoEvents() // Fallback ke demo data
        console.log('🔄 Using demo events instead')
      }
    } else {
      console.error('❌ HTTP Error:', response.status)
      events.value = getDemoEvents() // Fallback ke demo data
      console.log('🔄 Using demo events instead')
    }
  } catch (error) {
    console.error('❌ Error fetching events:', error)
    // Fallback ke demo events jika API gagal
    events.value = getDemoEvents()
    console.log('🔄 Using demo events instead')
  }
}

const getDemoEvents = () => {
  // Demo events sebagai fallback
  return [
    {
      id: 1,
      title: 'Rapat Pengurus Harian',
      description: 'Rapat rutin pengurus harian BEM FEB UI',
      event_date: '2025-08-10',
      time: '09:00 - 11:00',
      location: 'Ruang BEM FEB UI'
    },
    {
      id: 2,
      title: 'Workshop Digital Marketing',
      description: 'Pelatihan digital marketing untuk mahasiswa FEB UI',
      event_date: '2025-08-12',
      time: '13:00 - 16:00',
      location: 'Auditorium FEB UI'
    }
  ]
}

const fetchPhotos = async () => {
  try {
    const response = await fetch('/api/photos', {
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    
    if (response.ok) {
      const data = await response.json()
      if (data.success) {
        photoGallery.value = data.data || []
      } else {
        console.error('API Error:', data.message)
        photoGallery.value = getDemoPhotos() // Fallback ke demo data
      }
    } else {
      console.error('HTTP Error:', response.status)
      photoGallery.value = getDemoPhotos() // Fallback ke demo data
    }
  } catch (error) {
    console.error('Error fetching photos:', error)
    photoGallery.value = getDemoPhotos()
  }
}

const getDemoPhotos = () => {
  return [
    {
      id: 1,
      title: 'Rapat Pengurus Harian',
      description: 'Rapat koordinasi mingguan pengurus BEM FEB UI',
      image_url: 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=400&h=300&fit=crop',
      created_at: '2025-08-05'
    },
    {
      id: 2,
      title: 'Workshop Digital Marketing',
      description: 'Pelatihan digital marketing dengan mentor industri',
      image_url: 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=300&fit=crop',
      created_at: '2025-08-01'
    },
    {
      id: 3,
      title: 'Seminar Entrepreneurship',
      description: 'Seminar nasional dengan pembicara CEO startup',
      image_url: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=400&h=300&fit=crop',
      created_at: '2025-07-28'
    },
    {
      id: 4,
      title: 'Bakti Sosial',
      description: 'Program berbagi dengan masyarakat sekitar kampus',
      image_url: 'https://images.unsplash.com/photo-1593113598332-cd288d649433?w=400&h=300&fit=crop',
      created_at: '2025-07-20'
    }
  ]
}

const loadData = async () => {
  isLoading.value = true
  try {
    await Promise.all([fetchEvents(), fetchPhotos()])
  } finally {
    isLoading.value = false
  }
}

// Computed properties
const calendarDates = computed(() => {
  const dates = []
  const year = currentDate.value.getFullYear()
  const month = currentDate.value.getMonth()
  
  const firstDay = new Date(year, month, 1)
  const lastDay = new Date(year, month + 1, 0)
  const daysInMonth = lastDay.getDate()
  const startingDayOfWeek = firstDay.getDay()
  
  // Previous month's days
  const prevMonth = new Date(year, month - 1, 0)
  for (let i = startingDayOfWeek - 1; i >= 0; i--) {
    const day = prevMonth.getDate() - i
    dates.push({
      day,
      isCurrentMonth: false,
      isToday: false,
      dateString: `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`,
      date: new Date(year, month - 1, day)
    })
  }
  
  // Current month's days
  const today = new Date()
  for (let day = 1; day <= daysInMonth; day++) {
    const date = new Date(year, month, day)
    const isToday = date.toDateString() === today.toDateString()
    
    dates.push({
      day,
      isCurrentMonth: true,
      isToday,
      dateString: `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`,
      date
    })
  }
  
  // Next month's days
  const totalCells = 42
  const remainingCells = totalCells - dates.length
  for (let day = 1; day <= remainingCells; day++) {
    dates.push({
      day,
      isCurrentMonth: false,
      isToday: false,
      dateString: `${year}-${String(month + 2).padStart(2, '0')}-${String(day).padStart(2, '0')}`,
      date: new Date(year, month + 1, day)
    })
  }
  
  return dates
})

const selectedDateEvents = computed(() => {
  if (!selectedDate.value) return []
  
  const selectedDateStr = selectedDate.value.toISOString().split('T')[0]
  return events.value.filter(event => {
    // Convert event date yang mungkin berbeda format
    let eventDate = event.event_date
    
    // Jika event_date adalah object Date, convert ke string
    if (eventDate instanceof Date) {
      eventDate = eventDate.toISOString().split('T')[0]
    }
    
    // Jika event_date adalah string dengan format berbeda, normalize
    if (typeof eventDate === 'string') {
      const normalizedDate = new Date(eventDate).toISOString().split('T')[0]
      return normalizedDate === selectedDateStr
    }
    
    return eventDate === selectedDateStr
  })
})

// Methods
const previousMonth = () => {
  currentDate.value = new Date(currentDate.value.getFullYear(), currentDate.value.getMonth() - 1, 1)
}

const nextMonth = () => {
  currentDate.value = new Date(currentDate.value.getFullYear(), currentDate.value.getMonth() + 1, 1)
}

const selectDate = (dateObj) => {
  if (dateObj.isCurrentMonth) {
    selectedDate.value = dateObj.date
  }
}

const hasEvents = (dateObj) => {
  if (!dateObj.isCurrentMonth) return false
  
  const dateStr = dateObj.date.toISOString().split('T')[0]
  const hasEvent = events.value.some(event => {
    // Convert event date yang mungkin berbeda format
    let eventDate = event.event_date
    
    // Jika event_date adalah object Date, convert ke string
    if (eventDate instanceof Date) {
      eventDate = eventDate.toISOString().split('T')[0]
    }
    
    // Jika event_date adalah string dengan format berbeda, normalize
    if (typeof eventDate === 'string') {
      // Handle format 'YYYY-MM-DD' atau format lain
      const normalizedDate = new Date(eventDate).toISOString().split('T')[0]
      return normalizedDate === dateStr
    }
    
    return eventDate === dateStr
  })
  
  // Debug log untuk beberapa tanggal pertama saja
  if (dateObj.day <= 3) {
    console.log(`📅 Checking date ${dateStr}:`, hasEvent, 'Total events:', events.value.length)
    // Debug: tampilkan sample event dates
    if (events.value.length > 0) {
      console.log('Sample event dates:', events.value.slice(0, 3).map(e => ({
        title: e.title,
        event_date: e.event_date,
        type: typeof e.event_date
      })))
    }
  }
  
  return hasEvent
}

const getDateClasses = (dateObj) => {
  return {
    'text-gray-400': !dateObj.isCurrentMonth,
    'bg-[#034caa] text-white font-bold': dateObj.isToday && dateObj.isCurrentMonth,
    'bg-[#ffe500] text-black font-semibold': selectedDate.value && dateObj.date.toDateString() === selectedDate.value.toDateString() && !dateObj.isToday,
    'font-medium': dateObj.isCurrentMonth && !dateObj.isToday,
    'hover:bg-blue-100': dateObj.isCurrentMonth && !dateObj.isToday
  }
}

const formatMonth = (date) => {
  return date.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' })
}

const formatSelectedDate = (date) => {
  return date.toLocaleDateString('id-ID', { 
    weekday: 'long', 
    year: 'numeric', 
    month: 'long', 
    day: 'numeric' 
  })
}

const formatPhotoDate = (dateString) => {
  return new Date(dateString).toLocaleDateString('id-ID', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  })
}

// Initialize
onMounted(() => {
  loadData()
})
</script>

<script>
export default {
  name: 'Timeline'
}
</script>