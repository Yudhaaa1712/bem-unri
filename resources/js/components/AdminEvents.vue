<!-- resources/js/components/AdminEvents.vue -->
<template>
  <div class="min-h-screen bg-gray-100 p-6">
    <!-- Header -->
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-gray-900">Admin Panel</h1>
      <p class="text-gray-600 mt-2">Kelola events dan foto gallery yang tampil di website</p>
    </div>

    <!-- Tab Navigation -->
    <div class="flex space-x-1 bg-white p-1 rounded-lg shadow mb-8">
      <button 
        @click="activeTab = 'events'"
        :class="activeTab === 'events' ? 'bg-[#034caa] text-white' : 'text-gray-500 hover:text-gray-700'"
        class="flex-1 py-2 px-4 rounded-md font-medium transition-all"
      >
        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        Kelola Events
      </button>
      <button 
        @click="activeTab = 'photos'"
        :class="activeTab === 'photos' ? 'bg-[#034caa] text-white' : 'text-gray-500 hover:text-gray-700'"
        class="flex-1 py-2 px-4 rounded-md font-medium transition-all"
      >
        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        Kelola Foto
      </button>
    </div>

    <!-- Alert Success/Error -->
    <div v-if="alert.show" :class="alert.type === 'success' ? 'bg-green-100 border-green-400 text-green-700' : 'bg-red-100 border-red-400 text-red-700'" 
         class="border px-4 py-3 rounded mb-6">
      {{ alert.message }}
    </div>

    <!-- Events Tab -->
    <div v-if="activeTab === 'events'" class="space-y-6">
      <!-- Add/Edit Event Form -->
      <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">
          {{ editingEvent ? 'Edit Event' : 'Tambah Event Baru' }}
        </h2>
        
        <form @submit.prevent="saveEvent" class="space-y-4">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Judul Event *</label>
              <input 
                v-model="eventForm.title" 
                type="text" 
                required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-[#034caa] focus:border-[#034caa]"
                placeholder="Masukkan judul event"
              />
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal *</label>
              <input 
                v-model="eventForm.event_date" 
                type="date" 
                required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-[#034caa] focus:border-[#034caa]"
              />
            </div>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea 
              v-model="eventForm.description" 
              rows="3"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-[#034caa] focus:border-[#034caa]"
              placeholder="Deskripsi event..."
            ></textarea>
          </div>
          
          <div>
            <label class="flex items-center">
              <input 
                v-model="eventForm.is_active" 
                type="checkbox"
                class="mr-2"
              />
              <span class="text-sm text-gray-700">Event aktif (tampil di timeline)</span>
            </label>
          </div>
          
          <div class="flex space-x-3">
            <button 
              type="submit" 
              :disabled="isSaving"
              class="bg-[#034caa] hover:bg-[#003375] text-white px-6 py-2 rounded-md font-medium transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
            >
              <span v-if="isSaving">Menyimpan...</span>
              <span v-else>{{ editingEvent ? 'Update Event' : 'Tambah Event' }}</span>
            </button>
            
            <button 
              v-if="editingEvent"
              @click="cancelEditEvent" 
              type="button"
              class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md font-medium transition-colors"
            >
              Batal
            </button>
          </div>
        </form>
      </div>

      <!-- Events List -->
      <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
          <h3 class="text-lg font-semibold text-gray-800">Daftar Events</h3>
          <span class="text-sm text-gray-500">Total: {{ events.length }} events</span>
        </div>
        
        <div v-if="isLoadingEvents" class="p-6 text-center">
          <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-[#034caa] mx-auto mb-4"></div>
          <p class="text-gray-600">Memuat data...</p>
        </div>
        
        <div v-else-if="events.length === 0" class="p-6 text-center text-gray-500">
          <p>Belum ada events yang ditambahkan</p>
        </div>
        
        <div v-else class="divide-y divide-gray-200">
          <div v-for="event in events" :key="event.id" class="p-6 hover:bg-gray-50 transition-colors">
            <div class="flex justify-between items-start">
              <div class="flex-1">
                <div class="flex items-center mb-2">
                  <h4 class="text-lg font-medium text-gray-900">{{ event.title }}</h4>
                  <span v-if="!event.is_active" class="ml-3 px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full">
                    Tidak Aktif
                  </span>
                  <span v-else class="ml-3 px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                    Aktif
                  </span>
                </div>
                
                <div class="space-y-1">
                  <p class="text-sm text-gray-600 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{ formatEventDate(event.event_date) }}
                  </p>
                  <p v-if="event.description" class="text-sm text-gray-600 mt-2">{{ event.description }}</p>
                </div>
              </div>
              
              <div class="flex space-x-2 ml-4">
                <button 
                  @click="editEvent(event)"
                  class="text-blue-600 hover:text-blue-800 p-2 rounded-full hover:bg-blue-50 transition-colors"
                  title="Edit Event"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                  </svg>
                </button>
                
                <button 
                  @click="deleteEvent(event)"
                  class="text-red-600 hover:text-red-800 p-2 rounded-full hover:bg-red-50 transition-colors"
                  title="Hapus Event"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Photos Tab -->
    <div v-if="activeTab === 'photos'" class="space-y-6">
      <!-- Add/Edit Photo Form -->
      <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">
          {{ editingPhoto ? 'Edit Foto' : 'Tambah Foto Baru' }}
        </h2>
        
        <form @submit.prevent="savePhoto" class="space-y-4">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Judul Foto *</label>
              <input 
                v-model="photoForm.title" 
                type="text" 
                required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-[#034caa] focus:border-[#034caa]"
                placeholder="Masukkan judul foto"
              />
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Upload Foto *</label>
              <input 
                ref="fileInput"
                type="file" 
                @change="handleFileSelect"
                accept="image/*"
                required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-[#034caa] focus:border-[#034caa]"
              />
              <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimal 2MB</p>
            </div>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea 
              v-model="photoForm.description" 
              rows="3"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-[#034caa] focus:border-[#034caa]"
              placeholder="Deskripsi foto..."
            ></textarea>
          </div>
          
          <!-- Photo Preview -->
          <div v-if="previewImage" class="border-2 border-dashed border-gray-300 rounded-lg p-4">
            <p class="text-sm text-gray-600 mb-2">Preview:</p>
            <img :src="previewImage" alt="Preview" class="w-32 h-32 object-cover rounded-lg" />
          </div>
          
          <div>
            <label class="flex items-center">
              <input 
                v-model="photoForm.is_active" 
                type="checkbox"
                class="mr-2"
              />
              <span class="text-sm text-gray-700">Foto aktif (tampil di gallery)</span>
            </label>
          </div>
          
          <div class="flex space-x-3">
            <button 
              type="submit" 
              :disabled="isSavingPhoto"
              class="bg-[#034caa] hover:bg-[#003375] text-white px-6 py-2 rounded-md font-medium transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
            >
              <span v-if="isSavingPhoto">Menyimpan...</span>
              <span v-else>{{ editingPhoto ? 'Update Foto' : 'Tambah Foto' }}</span>
            </button>
            
            <button 
              v-if="editingPhoto"
              @click="cancelEditPhoto" 
              type="button"
              class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md font-medium transition-colors"
            >
              Batal
            </button>
          </div>
        </form>
      </div>

      <!-- Photos Grid -->
      <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
          <h3 class="text-lg font-semibold text-gray-800">Gallery Foto</h3>
          <span class="text-sm text-gray-500">Total: {{ photos.length }} foto</span>
        </div>
        
        <div v-if="isLoadingPhotos" class="p-6 text-center">
          <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-[#034caa] mx-auto mb-4"></div>
          <p class="text-gray-600">Memuat foto...</p>
        </div>
        
        <div v-else-if="photos.length === 0" class="p-6 text-center text-gray-500">
          <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
          </svg>
          <p>Belum ada foto yang ditambahkan</p>
        </div>
        
        <div v-else class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-6">
          <div v-for="photo in photos" :key="photo.id" class="relative group">
            <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden">
              <img :src="photo.image_url" :alt="photo.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
              
              <!-- Overlay -->
              <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center">
                <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex space-x-2">
                  <button 
                    @click="editPhoto(photo)"
                    class="bg-white text-blue-600 p-2 rounded-full hover:bg-blue-50 transition-colors"
                    title="Edit Foto"
                  >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                  </button>
                  
                  <button 
                    @click="deletePhoto(photo)"
                    class="bg-white text-red-600 p-2 rounded-full hover:bg-red-50 transition-colors"
                    title="Hapus Foto"
                  >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                  </button>
                </div>
              </div>
              
              <!-- Status Badge -->
              <div class="absolute top-2 left-2">
                <span v-if="!photo.is_active" class="px-2 py-1 text-xs font-medium bg-gray-900 bg-opacity-75 text-white rounded-full">
                  Nonaktif
                </span>
                <span v-else class="px-2 py-1 text-xs font-medium bg-green-500 bg-opacity-75 text-white rounded-full">
                  Aktif
                </span>
              </div>
            </div>
            
            <!-- Photo Info -->
            <div class="mt-2">
              <h4 class="text-sm font-medium text-gray-900 truncate">{{ photo.title }}</h4>
              <p v-if="photo.description" class="text-xs text-gray-500 truncate">{{ photo.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

// State
const activeTab = ref('events')
const events = ref([])
const photos = ref([])
const isLoadingEvents = ref(true)
const isLoadingPhotos = ref(true)
const isSaving = ref(false)
const isSavingPhoto = ref(false)
const editingEvent = ref(null)
const editingPhoto = ref(null)
const selectedFile = ref(null)
const previewImage = ref('')
const fileInput = ref(null)

// Alert state
const alert = ref({
  show: false,
  type: 'success', // success or error
  message: ''
})

// Form data
const eventForm = ref({
  title: '',
  description: '',
  event_date: '',
  is_active: true
})

const photoForm = ref({
  title: '',
  description: '',
  is_active: true
})

// Methods
const showAlert = (type, message) => {
  alert.value = {
    show: true,
    type,
    message
  }
  
  // Auto hide after 5 seconds
  setTimeout(() => {
    alert.value.show = false
  }, 5000)
}

// Get CSRF token
const getCSRFToken = () => {
  return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
}

// Events Methods
const fetchEvents = async () => {
  isLoadingEvents.value = true
  try {
    const response = await fetch('/api/admin/events', {
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': getCSRFToken()
      }
    })
    
    if (response.ok) {
      const data = await response.json()
      if (data.success) {
        events.value = data.data || []
      } else {
        showAlert('error', 'Gagal memuat data events')
      }
    } else {
      showAlert('error', 'Gagal menghubungi server')
    }
  } catch (error) {
    console.error('Error fetching events:', error)
    showAlert('error', 'Terjadi kesalahan saat memuat data')
  } finally {
    isLoadingEvents.value = false
  }
}

const saveEvent = async () => {
  isSaving.value = true
  
  try {
    const url = editingEvent.value 
      ? `/api/admin/events/${editingEvent.value.id}` 
      : '/api/admin/events'
    
    const method = editingEvent.value ? 'PUT' : 'POST'
    
    const response = await fetch(url, {
      method,
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': getCSRFToken()
      },
      body: JSON.stringify(eventForm.value)
    })
    
    const data = await response.json()
    
    if (response.ok && data.success) {
      showAlert('success', data.message || 'Event berhasil disimpan')
      resetEventForm()
      fetchEvents() // Reload data
    } else {
      // Show detailed validation errors
      if (data.errors) {
        const errorMessages = Object.values(data.errors).flat().join(', ')
        showAlert('error', 'Validation error: ' + errorMessages)
      } else {
        showAlert('error', data.message || 'Gagal menyimpan event')
      }
    }
  } catch (error) {
    console.error('Error saving event:', error)
    showAlert('error', 'Terjadi kesalahan saat menyimpan')
  } finally {
    isSaving.value = false
  }
}

const editEvent = (event) => {
  editingEvent.value = event
  eventForm.value = {
    title: event.title,
    description: event.description || '',
    event_date: event.event_date,
    is_active: event.is_active
  }
  
  // Scroll ke form
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

const cancelEditEvent = () => {
  editingEvent.value = null
  resetEventForm()
}

const deleteEvent = async (event) => {
  if (!confirm(`Yakin ingin menghapus event "${event.title}"?`)) {
    return
  }
  
  try {
    const response = await fetch(`/api/admin/events/${event.id}`, {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': getCSRFToken()
      }
    })
    
    const data = await response.json()
    
    if (response.ok && data.success) {
      showAlert('success', 'Event berhasil dihapus')
      fetchEvents() // Reload data
    } else {
      showAlert('error', data.message || 'Gagal menghapus event')
    }
  } catch (error) {
    console.error('Error deleting event:', error)
    showAlert('error', 'Terjadi kesalahan saat menghapus')
  }
}

const resetEventForm = () => {
  eventForm.value = {
    title: '',
    description: '',
    event_date: '',
    is_active: true
  }
}

// Photos Methods
const fetchPhotos = async () => {
  isLoadingPhotos.value = true
  try {
    const response = await fetch('/api/admin/photos', {
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': getCSRFToken()
      }
    })
    
    if (response.ok) {
      const data = await response.json()
      if (data.success) {
        photos.value = data.data || []
      } else {
        showAlert('error', 'Gagal memuat data foto')
      }
    } else {
      showAlert('error', 'Gagal menghubungi server')
    }
  } catch (error) {
    console.error('Error fetching photos:', error)
    showAlert('error', 'Terjadi kesalahan saat memuat foto')
  } finally {
    isLoadingPhotos.value = false
  }
}

// File handling
const handleFileSelect = (event) => {
  const file = event.target.files[0]
  if (file) {
    selectedFile.value = file
    
    // Create preview
    const reader = new FileReader()
    reader.onload = (e) => {
      previewImage.value = e.target.result
    }
    reader.readAsDataURL(file)
  }
}

const savePhoto = async () => {
  isSavingPhoto.value = true
  
  try {
    // Create FormData for file upload
    const formData = new FormData()
    formData.append('title', photoForm.value.title)
    formData.append('description', photoForm.value.description || '')
    formData.append('is_active', photoForm.value.is_active ? '1' : '0')
    
    if (selectedFile.value) {
      formData.append('image', selectedFile.value)
    } else if (!editingPhoto.value) {
      showAlert('error', 'Silakan pilih file gambar')
      return
    }
    
    const url = editingPhoto.value 
      ? `/api/admin/photos/${editingPhoto.value.id}` 
      : '/api/admin/photos'
    
    const method = editingPhoto.value ? 'POST' : 'POST' // Laravel handles PUT via _method in FormData
    
    if (editingPhoto.value) {
      formData.append('_method', 'PUT')
    }
    
    const response = await fetch(url, {
      method,
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': getCSRFToken()
      },
      body: formData
    })
    
    const data = await response.json()
    
    if (response.ok && data.success) {
      showAlert('success', data.message || 'Foto berhasil disimpan')
      resetPhotoForm()
      fetchPhotos() // Reload data
    } else {
      // Show detailed validation errors
      if (data.errors) {
        const errorMessages = Object.values(data.errors).flat().join(', ')
        showAlert('error', 'Validation error: ' + errorMessages)
      } else {
        showAlert('error', data.message || 'Gagal menyimpan foto')
      }
    }
  } catch (error) {
    console.error('Error saving photo:', error)
    showAlert('error', 'Terjadi kesalahan saat menyimpan')
  } finally {
    isSavingPhoto.value = false
  }
}

const editPhoto = (photo) => {
  editingPhoto.value = photo
  photoForm.value = {
    title: photo.title,
    description: photo.description || '',
    is_active: photo.is_active
  }
  
  // Set preview to existing image
  previewImage.value = photo.image_url
  selectedFile.value = null
  
  // Switch to photos tab and scroll to form
  activeTab.value = 'photos'
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

const cancelEditPhoto = () => {
  editingPhoto.value = null
  resetPhotoForm()
}

const deletePhoto = async (photo) => {
  if (!confirm(`Yakin ingin menghapus foto "${photo.title}"?`)) {
    return
  }
  
  try {
    const response = await fetch(`/api/admin/photos/${photo.id}`, {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': getCSRFToken()
      }
    })
    
    const data = await response.json()
    
    if (response.ok && data.success) {
      showAlert('success', 'Foto berhasil dihapus')
      fetchPhotos() // Reload data
    } else {
      showAlert('error', data.message || 'Gagal menghapus foto')
    }
  } catch (error) {
    console.error('Error deleting photo:', error)
    showAlert('error', 'Terjadi kesalahan saat menghapus')
  }
}

const resetPhotoForm = () => {
  photoForm.value = {
    title: '',
    description: '',
    is_active: true
  }
  selectedFile.value = null
  previewImage.value = ''
  
  // Reset file input
  if (fileInput.value) {
    fileInput.value.value = ''
  }
}

// Utility Methods
const formatEventDate = (dateString) => {
  return new Date(dateString).toLocaleDateString('id-ID', {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  })
}

// Initialize
onMounted(() => {
  fetchEvents()
  fetchPhotos()
})
</script>