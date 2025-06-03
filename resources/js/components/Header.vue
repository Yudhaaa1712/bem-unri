<!-- resources/js/components/Header.vue -->
<template>
  <header :class="headerClasses" class="sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-20">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
          <div class="w-12 h-12 bg-gradient-to-br from-biru-langit-500 to-biru-langit-700 rounded-full flex items-center justify-center">
            <span class="text-white font-bold text-lg">BEM</span>
          </div>
          <div>
            <h1 class="text-xl font-bold text-biru-langit-700">BEM UNRI</h1>
            <p class="text-xs text-kuning-emas-600 font-semibold">Kabinet Biru Langit 2025</p>
          </div>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center space-x-8">
          <a href="/" class="text-biru-langit-700 hover:text-kuning-emas-600 font-semibold transition-colors">Home</a>
          <a href="/about" class="text-biru-langit-700 hover:text-kuning-emas-600 font-semibold transition-colors">About</a>
          
        <!-- Biru Langit News Link -->
<a href="/news" class="text-biru-langit-700 hover:text-kuning-emas-600 font-semibold transition-colors flex items-center">
  Biru Langit News
</a>


          <!-- Student Info Dropdown -->
          <div class="relative group">
            <button class="text-biru-langit-700 hover:text-kuning-emas-600 font-semibold transition-colors flex items-center">
              Student Info
              <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            <div class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
              <a href="#prestasi" class="block px-4 py-2 text-biru-langit-700 hover:bg-biru-langit-50 hover:text-kuning-emas-600">Prestasi</a>
              <a href="#beasiswa" class="block px-4 py-2 text-biru-langit-700 hover:bg-biru-langit-50 hover:text-kuning-emas-600">Beasiswa</a>
            </div>
          </div>

          <a href="#kontak" class="text-biru-langit-700 hover:text-kuning-emas-600 font-semibold transition-colors">Kontak</a>
        </nav>

        <!-- Mobile Menu Button -->
        <button @click="toggleMobileMenu" class="md:hidden p-2 rounded-lg text-biru-langit-700 hover:bg-biru-langit-50">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>

      <!-- Mobile Menu -->
      <div v-if="mobileMenuOpen" class="md:hidden border-t border-biru-langit-100 py-4">
        <div class="space-y-2">
          <a href="/" class="block px-4 py-2 text-biru-langit-700 hover:bg-biru-langit-50 rounded-lg">Home</a>
          <a href="/about" class="block px-4 py-2 text-biru-langit-700 hover:bg-biru-langit-50 rounded-lg">About</a>
          <a href="/news" class="block px-4 py-2 text-biru-langit-700 hover:bg-biru-langit-50 rounded-lg">Biru Langit News</a>
          <a href="/student-info" class="block px-4 py-2 text-biru-langit-700 hover:bg-biru-langit-50 rounded-lg">Student Info</a>
          <a href="/kontak" class="block px-4 py-2 text-biru-langit-700 hover:bg-biru-langit-50 rounded-lg">Kontak</a>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: 'Header',
  data() {
    return {
      mobileMenuOpen: false,
      isScrolled: false
    }
  },
  computed: {
    headerClasses() {
      return 'bg-transparent backdrop-blur-sm'
    }
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll)
  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll)
  },
  methods: {
    toggleMobileMenu() {
      this.mobileMenuOpen = !this.mobileMenuOpen
    },
    handleScroll() {
      this.isScrolled = window.scrollY > 50
    }
  }
}
</script>