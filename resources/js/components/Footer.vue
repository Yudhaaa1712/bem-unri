<!-- resources/js/components/Footer.vue (Super Minimalis) -->
<template>
  <footer class="bg-sky-300 border-t border-gray-200">
    <!-- Main Footer Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <div class="grid md:grid-cols-3 gap-8 items-start">
        <!-- Quick Links -->
        <div>
          <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="/" class="text-gray-600 hover:text-biru-langit-600 transition-colors">Home</a></li>
            <li><a href="/news" class="text-gray-600 hover:text-biru-langit-600 transition-colors">Biru Langit News</a></li>
            <li><a href="/#prestasi" class="text-gray-600 hover:text-biru-langit-600 transition-colors">Prestasi</a></li>
            <li><a href="/#beasiswa" class="text-gray-600 hover:text-biru-langit-600 transition-colors">Beasiswa</a></li>
          </ul>
        </div>

        <!-- Brand Center -->
        <div class="text-center">
          <div class="flex items-center justify-center space-x-3 mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-biru-langit-500 to-biru-langit-700 rounded-full flex items-center justify-center">
              <span class="text-white font-bold text-lg">BEM</span>
            </div>
            <div>
              <h3 class="text-xl font-bold text-biru-langit-700">BEM UNRI</h3>
              <p class="text-kuning-emas-600 text-sm font-semibold">Kabinet Biru Langit</p>
            </div>
          </div>
          
          <!-- Social Media -->
          <div class="flex justify-center space-x-3">
            <a href="#" class="w-10 h-10 bg-gray-700 hover:bg-biru-langit-600 text-white rounded-lg flex items-center justify-center transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
              </svg>
            </a>
            <a href="#" class="w-10 h-10 bg-red-600 hover:bg-red-700 text-white rounded-lg flex items-center justify-center transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
              </svg>
            </a>
            <a href="#" class="w-10 h-10 bg-blue-700 hover:bg-blue-800 text-white rounded-lg flex items-center justify-center transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
              </svg>
            </a>
            <a href="#" class="w-10 h-10 bg-pink-500 hover:bg-pink-600 text-white rounded-lg flex items-center justify-center transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12.036 6.5c-3.042 0-5.5 2.458-5.5 5.5s2.458 5.5 5.5 5.5 5.5-2.458 5.5-5.5-2.458-5.5-5.5-5.5zm0 9.077c-1.972 0-3.577-1.605-3.577-3.577s1.605-3.577 3.577-3.577 3.577 1.605 3.577 3.577-1.605 3.577-3.577 3.577z"/><circle cx="17.5" cy="6.5" r="1.5"/><path d="M12.036 0C8.756 0 8.333.014 7.052.072 5.775.131 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.936 3.35.63 4.14C.333 4.905.131 5.775.072 7.052.014 8.333 0 8.756 0 12.036s.014 3.703.072 4.984c.059 1.277.261 2.147.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558 1.281.058 1.704.072 4.984.072s3.703-.014 4.984-.072c1.277-.059 2.147-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.766.499-1.636.558-2.913.058-1.281.072-1.704.072-4.984s-.014-3.703-.072-4.984c-.059-1.277-.262-2.147-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.934 19.861.63c-.766-.297-1.636-.499-2.913-.558C15.667.014 15.244 0 12.036 0z"/>
              </svg>
            </a>
            <a href="#" class="w-10 h-10 bg-gray-600 hover:bg-gray-700 text-white rounded-lg flex items-center justify-center transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
              </svg>
            </a>
            <a href="#" class="w-10 h-10 bg-black hover:bg-gray-800 text-white rounded-lg flex items-center justify-center transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
              </svg>
            </a>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="text-right">
          <h3 class="text-lg font-semibold text-gray-800 mb-4">Contact Info</h3>
          <div class="space-y-2 text-sm text-gray-600">
            <div class="flex items-center justify-end space-x-2">
              <span>085881588276 (Partnership)</span>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
              </svg>
            </div>
            <div class="flex items-center justify-end space-x-2">
              <span>085771277093 (Organization & NGO)</span>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
              </svg>
            </div>
            <div class="flex items-center justify-end space-x-2">
              <span>bem@unri.ac.id</span>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Copyright -->
    <div class=" bg-sky-300">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <p class="text-center text-sm text-gray-600">
          Copyright © 2025 BEM UNRI - All rights reserved.
        </p>
      </div>
    </div>

    <!-- Back to Top Button -->
    <button 
      @click="scrollToTop"
      v-if="showBackToTop"
      class="fixed bottom-6 right-6 w-12 h-12 bg-gray-800 hover:bg-biru-langit-600 text-white rounded-lg shadow-lg transition-all duration-300 z-50"
    >
      <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
      </svg>
    </button>
  </footer>
</template>

<script>
export default {
  name: 'Footer',
  data() {
    return {
      showBackToTop: false
    }
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll)
  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll)
  },
  methods: {
    handleScroll() {
      this.showBackToTop = window.pageYOffset > 300
    },
    scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      })
    }
  }
}
</script>