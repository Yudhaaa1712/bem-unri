<!-- Footer.vue - Modern Minimalist Design -->
<template>
  <footer class="relative">
    <!-- Gradient Accent Line -->
    <div class="h-1 bg-gradient-to-r from-[#eb7118] to-[#ffe500]"></div>
    
    <!-- Main Footer -->
    <div class="bg-gradient-to-r from-[#034caa] to-[#003375]">
      <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Compact Footer Content -->
        <div class="py-6">
          <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            
            <!-- Brand -->
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-sm">BEM</span>
              </div>
              <div>
                <h3 class="font-bold text-white">
                  BEM UNRI
                </h3>
                <p class="text-xs font-medium bg-gradient-to-r from-[#eb7118] to-[#ffe500] bg-clip-text text-transparent">
                  Kabinet Biru Langit
                </p>
              </div>
            </div>

            <!-- Quick Links -->
            <nav class="flex flex-wrap justify-center gap-4 text-sm">
              <FooterLink 
                v-for="link in quickLinks" 
                :key="link.name"
                :href="link.href"
                :text="link.name"
              />
            </nav>

            <!-- Social Media -->
            <div class="flex items-center gap-2">
              <SocialLink 
                v-for="social in socialLinks"
                :key="social.name"
                :href="social.href"
                :icon="social.icon"
                :name="social.name"
                :color="social.color"
              />
            </div>
          </div>

          <!-- Copyright -->
          <div class="border-t border-white/20 mt-4 pt-4">
            <p class="text-center text-xs text-white/60">
              © {{ currentYear }} BEM UNRI. All rights reserved.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Back to Top Button -->
    <Transition name="fade">
      <button 
        v-if="showBackToTop"
        @click="scrollToTop"
        class="fixed bottom-6 right-6 w-12 h-12 bg-gradient-to-r from-[#034caa] to-[#003375] hover:from-[#eb7118] hover:to-[#ffe500] text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 z-50 group"
        aria-label="Back to top"
      >
        <ChevronUpIcon class="w-5 h-5 mx-auto transition-transform group-hover:scale-110" />
      </button>
    </Transition>
  </footer>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue'

// Reactive data
const showBackToTop = ref(false)

// Computed
const currentYear = computed(() => new Date().getFullYear())

// Data
const quickLinks = [
  { name: 'Home', href: '/' },
  { name: 'Biru Langit News', href: '/news' },
  { name: 'Prestasi', href: '/#prestasi' },
  { name: 'Beasiswa', href: '/#beasiswa' }
]

const contacts = [
  {
    type: 'email',
    icon: 'mail',
    text: 'bem@unri.ac.id',
    href: 'mailto:bem@unri.ac.id'
  }
]

const socialLinks = [
  { name: 'Instagram', href: '#', icon: 'instagram', color: '' },
  { name: 'YouTube', href: '#', icon: 'youtube', color: '' },
  { name: 'LinkedIn', href: '#', icon: 'linkedin', color: '' },
  { name: 'TikTok', href: '#', icon: 'tiktok', color: '' }
]

// Methods
const handleScroll = () => {
  showBackToTop.value = window.pageYOffset > 300
}

const scrollToTop = () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  })
}

// Lifecycle
onMounted(() => {
  window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
})
</script>

<!-- Child Components -->
<script>
// Footer Link Component
const FooterLink = {
  props: ['href', 'text'],
  template: `
    <a :href="href" class="text-sm text-white/70 hover:text-white transition-colors duration-200 block">
      {{ text }}
    </a>
  `
}

// Contact Item Component
const ContactItem = {
  props: ['icon', 'text', 'href'],
  template: `
    <a :href="href" class="flex items-center gap-2 text-sm text-gray-600 hover:text-gray-900 transition-colors duration-200 group">
      <component :is="iconComponent" class="w-4 h-4 text-gray-400 group-hover:text-gray-600 transition-colors" />
      <span>{{ text }}</span>
    </a>
  `,
  computed: {
    iconComponent() {
      return this.icon === 'phone' ? PhoneIcon : MailIcon
    }
  }
}

// Social Link Component
const SocialLink = {
  props: ['href', 'icon', 'name', 'color'],
  template: `
    <a 
      :href="href" 
      :class="['w-8 h-8 bg-white/20 backdrop-blur-sm border border-white/30 text-white rounded-lg flex items-center justify-center transition-all duration-200 hover:bg-white hover:text-gray-900', color]"
      :aria-label="name"
    >
      <component :is="iconComponent" class="w-3.5 h-3.5" />
    </a>
  `,
  computed: {
    iconComponent() {
      const icons = {
        twitter: TwitterIcon,
        youtube: YouTubeIcon,
        linkedin: LinkedInIcon,
        instagram: InstagramIcon,
        tiktok: TikTokIcon
      }
      return icons[this.icon]
    }
  }
}

// Icon Components
const ChevronUpIcon = {
  template: `
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
    </svg>
  `
}

const PhoneIcon = {
  template: `
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 0 1 2-2h3.28a1 1 0 0 1 .948.684l1.498 4.493a1 1 0 0 1-.502 1.21l-2.257 1.13a11.042 11.042 0 0 0 5.516 5.516l1.13-2.257a1 1 0 0 1 1.21-.502l4.493 1.498a1 1 0 0 1 .684.949V19a2 2 0 0 1-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
    </svg>
  `
}

const MailIcon = {
  template: `
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z"/>
    </svg>
  `
}

const TwitterIcon = {
  template: `
    <svg fill="currentColor" viewBox="0 0 24 24">
      <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
    </svg>
  `
}

const YouTubeIcon = {
  template: `
    <svg fill="currentColor" viewBox="0 0 24 24">
      <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
    </svg>
  `
}

const LinkedInIcon = {
  template: `
    <svg fill="currentColor" viewBox="0 0 24 24">
      <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
    </svg>
  `
}

const InstagramIcon = {
  template: `
    <svg fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
    </svg>
  `
}

const TikTokIcon = {
  template: `
    <svg fill="currentColor" viewBox="0 0 24 24">
      <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
    </svg>
  `
}

export default {
  components: {
    FooterLink,
    ContactItem,
    SocialLink,
    ChevronUpIcon,
    PhoneIcon,
    MailIcon,
    TwitterIcon,
    YouTubeIcon,
    LinkedInIcon,
    InstagramIcon,
    TikTokIcon
  }
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>