<template>
  <header 
    :class="[
      'fixed top-0 left-0 w-full z-[1000] transition-all duration-300',
      'px-6 lg:px-12',
      isScrolled 
        ? 'py-2 lg:py-3 bg-black/10 backdrop-blur-lg shadow-lg' 
        : 'py-4 lg:py-4 bg-transparent border-b border-black/30'
    ]"
  >
    <div class="flex justify-between items-center w-full max-w-6xl mx-auto">
      <!-- Logo Section -->
      <div class="flex items-center">
        <a 
          href="/" 
          class="flex items-center gap-2 transition-transform duration-300 hover:scale-105"
        >
          <img 
            src="/images/logobem.png" 
            alt="BEM UNRI Logo"
            :class="[
              'transition-all duration-300 bg-transparent',
              isScrolled 
                ? 'h-10 lg:h-12' 
                : 'h-12 lg:h-16'
            ]"
          >
          <div class="flex flex-col leading-tight">
            <span 
              :class="[
               'font-black tracking-wide transition-all duration-300 bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent',
                isScrolled 
                  ? 'text-base lg:text-xl' 
                  : 'text-lg lg:text-2xl'
              ]"
            >
              BEM UNRI
            </span>
            <span 
              :class="[
                  'font-semibold tracking-wide transition-all duration-300 bg-gradient-to-r from-[#eb7118] to-[#ffe500] bg-clip-text text-transparent',
                isScrolled 
                  ? 'text-xs lg:text-sm' 
                  : 'text-sm lg:text-base'
              ]"
            > 
              Kabinet Biru Langit
            </span>
          </div>
        </a>
      </div>
      
      <!-- Desktop Navigation -->
      <nav class="hidden lg:block">
        <ul class="flex items-center space-x-8">
          <li v-for="item in navItems" :key="item.name" class="relative group">
            <a 
              v-if="!item.dropdown"
              :href="item.path" 
              class="nav-link"
            >
              {{ item.name }}
            </a>
            
            <!-- Dropdown Menu -->
            <div v-else class="relative">
              <a href="#" class="nav-link flex items-center gap-2">
                {{ item.name }}
                <span class="text-xs transition-transform duration-300 group-hover:rotate-180">▼</span>
              </a>
              
              <!-- Dropdown Content -->
              <div class="dropdown-menu">
                <template v-for="subItem in item.items" :key="subItem.name">
                  <a 
                    v-if="!subItem.submenu"
                    :href="subItem.path" 
                    class="dropdown-item"
                  >
                    {{ subItem.name }}
                  </a>
                  
                  <!-- Submenu -->
                  <div v-else class="relative group/sub">
                    <a href="#" class="dropdown-item flex items-center justify-between group/sub">
                      {{ subItem.name }}
                      <span class="text-xs transition-transform duration-300 group-hover/sub:rotate-90">▶</span>
                    </a>
                    <div class="submenu">
                      <a 
                        v-for="subSubItem in subItem.items" 
                        :key="subSubItem.name"
                        :href="subSubItem.path" 
                        class="dropdown-item"
                      >
                        {{ subSubItem.name }}
                      </a>
                    </div>
                  </div>
                </template>
              </div>
            </div>
          </li>
        </ul>
      </nav>
      
      <!-- Mobile Menu Button -->
      <button 
        @click="toggleMobileMenu"
        class="lg:hidden flex flex-col justify-around w-8 h-8 p-0 bg-transparent border-none cursor-pointer"
        :class="{ 'active': isMobileMenuOpen }"
      >
        <span 
          v-for="n in 3" 
          :key="n"
          class="hamburger-line"
          :class="{
            'rotate-45 translate-y-2': isMobileMenuOpen && n === 1,
            'opacity-0': isMobileMenuOpen && n === 2,
            '-rotate-45 -translate-y-2': isMobileMenuOpen && n === 3
          }"
        ></span>
      </button>
    </div>
    
    <!-- Mobile Navigation -->
    <div 
      :class="[
        'lg:hidden fixed left-0 right-0 z-[999] overflow-hidden transition-all duration-500',
        'bg-white/90 backdrop-blur-lg shadow-lg'
      ]"
      :style="{ 
        top: `${headerHeight}px`,
        maxHeight: isMobileMenuOpen ? `calc(100vh - ${headerHeight}px)` : '0',
        opacity: isMobileMenuOpen ? '1' : '0'
      }"
    >
      <div class="p-5 overflow-y-auto" :style="{ maxHeight: `calc(100vh - ${headerHeight}px - 40px)` }">
        <template v-for="item in navItems" :key="item.name">
          <a 
            v-if="!item.dropdown"
            :href="item.path" 
            @click="closeMobileMenu"
            class="mobile-nav-item"
          >
            {{ item.name }}
          </a>
          
          <!-- Mobile Dropdown -->
          <div v-else class="border-b border-black/10">
            <button 
              @click="toggleMobileDropdown"
              class="mobile-nav-item flex items-center justify-between w-full"
            >
              {{ item.name }}
              <span 
                class="text-sm transition-transform duration-300"
                :class="{ 'rotate-180': isMobileDropdownOpen }"
              >
                ▼
              </span>
            </button>
            
            <div 
              :class="[
                'overflow-hidden transition-all duration-300 bg-black/5',
                isMobileDropdownOpen ? 'max-h-80 py-3' : 'max-h-0'
              ]"
            >
              <template v-for="subItem in item.items" :key="subItem.name">
                <a 
                  v-if="!subItem.submenu"
                  :href="subItem.path" 
                  @click="closeMobileMenu"
                  class="mobile-nav-subitem"
                >
                  {{ subItem.name }}
                </a>
                
                <!-- Mobile Submenu -->
                <div v-else>
                  <button 
                    @click="toggleMobileSubdropdown"
                    class="mobile-nav-subitem flex items-center justify-between w-full"
                  >
                    {{ subItem.name }}
                    <span 
                      class="text-sm transition-transform duration-300"
                      :class="{ 'rotate-180': isMobileSubdropdownOpen }"
                    >
                      ▼
                    </span>
                  </button>
                  
                  <div 
                    :class="[
                      'overflow-hidden transition-all duration-300 bg-black/10',
                      isMobileSubdropdownOpen ? 'max-h-40' : 'max-h-0'
                    ]"
                  >
                    <a 
                      v-for="subSubItem in subItem.items" 
                      :key="subSubItem.name"
                      :href="subSubItem.path" 
                      @click="closeMobileMenu"
                      class="block py-3 px-10 text-black font-medium text-sm transition-all duration-300 border-b border-black/5 hover:text-yellow-500 hover:pl-12"
                    >
                      {{ subSubItem.name }}
                    </a>
                  </div>
                </div>
              </template>
            </div>
          </div>
        </template>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref, onMounted, onUnmounted, nextTick } from 'vue';

// Reactive State
const isScrolled = ref(false);
const isMobileMenuOpen = ref(false);
const isMobileDropdownOpen = ref(false);
const isMobileSubdropdownOpen = ref(false);
const headerHeight = ref(80);

// Navigation Data dengan path untuk routing
const navItems = [
  { 
    name: 'Home', 
    path: '/' 
  },
  { 
    name: 'About', 
    path: '/about' 
  },
  { 
    name: 'Biru Langit News', 
    path: '/news' 
  },
  { 
    name: 'Student Info', 
    path: '/student-info' 
  },
  {
    name: 'Database KBL',
    dropdown: true,
    items: [
      { 
        name: 'Biru Langit Research', 
        path: '/database/research' 
      },
      {
        name: 'Kajian',
        submenu: true,
        items: [
          { 
            name: 'Internal', 
            path: '/database/kajian/internal' 
          },
          { 
            name: 'External', 
            path: '/database/kajian/external' 
          }
        ]
      }
    ]
  },
  { 
    name: 'Contact', 
    path: '/contact' 
  }
];

// Calculate header height dynamically
const updateHeaderHeight = async () => {
  await nextTick();
  const header = document.querySelector('header');
  if (header) {
    headerHeight.value = header.offsetHeight;
  }
};

// Event Handlers
const handleScroll = () => {
  isScrolled.value = window.scrollY > 50;
  updateHeaderHeight();
};

const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value;
  document.body.style.overflow = isMobileMenuOpen.value ? 'hidden' : '';
  
  if (!isMobileMenuOpen.value) {
    isMobileDropdownOpen.value = false;
    isMobileSubdropdownOpen.value = false;
  }
};

const closeMobileMenu = () => {
  isMobileMenuOpen.value = false;
  document.body.style.overflow = '';
  isMobileDropdownOpen.value = false;
  isMobileSubdropdownOpen.value = false;
};

const toggleMobileDropdown = () => {
  isMobileDropdownOpen.value = !isMobileDropdownOpen.value;
  if (!isMobileDropdownOpen.value) {
    isMobileSubdropdownOpen.value = false;
  }
};

const toggleMobileSubdropdown = () => {
  isMobileSubdropdownOpen.value = !isMobileSubdropdownOpen.value;
};

// Handle window resize
const handleResize = () => {
  updateHeaderHeight();
  
  // Close mobile menu on desktop resize
  if (window.innerWidth >= 1024 && isMobileMenuOpen.value) {
    closeMobileMenu();
  }
};

// Lifecycle
onMounted(() => {
  window.addEventListener('scroll', handleScroll, { passive: true });
  window.addEventListener('resize', handleResize);
  updateHeaderHeight();
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
  window.removeEventListener('resize', handleResize);
  document.body.style.overflow = '';
});
</script>

<style scoped>
/* Custom CSS untuk komponen yang kompleks */
.nav-link {
  @apply font-semibold text-base tracking-wide relative pb-1 transition-colors duration-300 text-black hover:text-yellow-500;
}

.nav-link::after {
  @apply content-[''] absolute bottom-0 left-0 w-0 h-0.5 bg-yellow-500 transition-all duration-300;
}

.nav-link:hover::after {
  @apply w-full;
}

.dropdown-menu {
  @apply absolute top-full left-0 bg-white/95 backdrop-blur-lg rounded-lg py-3 shadow-xl border border-black/10 
         opacity-0 invisible translate-y-3 transition-all duration-300 z-[1001]
         group-hover:opacity-100 group-hover:visible group-hover:translate-y-0;
  min-width: 220px;
}

.dropdown-item {
  @apply flex items-center justify-between py-3 px-5 text-black font-medium text-sm transition-all duration-300
         hover:bg-yellow-500/10 hover:text-yellow-500;
}

.submenu {
  @apply absolute top-0 left-full bg-white/95 backdrop-blur-lg rounded-lg py-3 shadow-xl border border-black/10
         opacity-0 invisible translate-x-3 transition-all duration-300 z-[1002]
         group-hover/sub:opacity-100 group-hover/sub:visible group-hover/sub:translate-x-0;
  min-width: 160px;
}

.hamburger-line {
  @apply w-full h-0.5 bg-black rounded-sm transition-all duration-300 origin-center;
}

.mobile-nav-item {
  @apply flex items-center justify-between py-4 text-black font-semibold text-base border-b border-black/10 
         transition-all duration-300 bg-transparent cursor-pointer hover:text-yellow-500 hover:pl-3;
}

.mobile-nav-subitem {
  @apply flex items-center justify-between py-3 px-5 text-black font-medium text-sm transition-all duration-300 
         bg-transparent border-b border-black/5 cursor-pointer hover:text-yellow-500 hover:pl-8;
}
</style>