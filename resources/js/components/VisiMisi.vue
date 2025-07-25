<!-- VisiMisi.vue -->
<template>
  <section 
    ref="sectionRef"
    class="py-14 md:py-20 bg-white relative overflow-hidden"
  >
    <!-- Background Elements -->
    <div class="absolute top-10 md:top-18 left-4 md:left-10 w-12 h-12 md:w-16 md:h-16 bg-gradient-to-br from-[#ffe500] to-[#eb7118] opacity-20 rounded-full transform rotate-45"></div>
    <div class="absolute top-20 md:top-32 right-8 md:right-20 w-6 h-6 md:w-8 md:h-8 bg-[#034caa] opacity-30 rounded-full"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-16 lg:gap-44 lg:items-stretch">
        
        <!-- Left Content -->
        <div class="flex flex-col justify-center space-y-4 md:space-y-6 lg:min-h-[500px]">
          <!-- Header -->
          <AnimatedDiv :is-visible="isVisible" class="space-y-4 md:space-y-10 mt-8">
            <p class="subtitle">{{ content.subtitle }}</p>
            <h2 class="section-title">{{ content.visionTitle }}</h2>
          </AnimatedDiv>

          <!-- Vision -->
          <AnimatedDiv :is-visible="isVisible">
            <p class="content-text">{{ content.vision }}</p>
          </AnimatedDiv>

          <!-- Mission Header -->
          <AnimatedDiv :is-visible="isVisible" class="pt-2 md:pt-4">
            <h2 class="section-title">{{ content.missionTitle }}</h2>
          </AnimatedDiv>

          <!-- Mission Items -->
          <div class="space-y-3 md:space-y-4">
            <AnimatedDiv 
              v-for="(mission, index) in content.missions" 
              :key="index"
              :is-visible="isVisible"
              class="flex items-start space-x-3"
            >
              <CheckIcon />
              <p class="content-text">{{ mission }}</p>
            </AnimatedDiv>
          </div>
        </div>

        <!-- Right Content -->
        <AnimatedDiv 
          :is-visible="isVisible" 
          class="relative mt-8 lg:mt-0 lg:min-h-[500px] flex items-center"
        >
          <div class="relative rounded-2xl overflow-hidden shadow-2xl w-full">
            <img 
              :src="content.image.src" 
              :alt="content.image.alt"
              class="w-full h-64 md:h-80 lg:h-[500px] object-cover"
              @error="handleImageError"
              v-show="!imageError"
            />
            
            <!-- Fallback -->
            <div 
              v-show="imageError" 
              class="absolute inset-0 bg-gradient-to-br from-[#034caa]/10 to-[#ffe500]/10 flex items-center justify-center"
            >
              <div class="text-center p-8">
                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-[#034caa] to-[#ffe500] rounded-full flex items-center justify-center">
                  <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                  </svg>
                </div>
                <p class="text-gray-500 text-sm">Image not available</p>
              </div>
            </div>
          </div>
        </AnimatedDiv>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, reactive, onMounted, onUnmounted } from 'vue'

// Content Configuration
const content = reactive({
  subtitle: "WHO WE ARE",
  visionTitle: "Our Vision",
  missionTitle: "Our Mission",
  vision: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum deserunt quis sed sint error ipsam minima libero illo praesentium culpa? Reiciendis aliquam veritatis commodi. Aspernatur nihil quidem qui labore delectus ipsum, fugit placeat? Inventore, repellat.",
  missions: [
    "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis magnam veritatis ducimus aliquam. Possimus dolore dolor, iure accusantium eveniet eum.",
    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint illum ullam nostrum inventore, eligendi numquam quidem molestias exercitationem et veritatis.",
    "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas rerum porro earum quo sequi doloribus, tenetur at perspiciatis recusandae iste?",
    "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo ipsam, fuga labore recusandae nihil omnis incidunt officiis natus aliquam velit."
  ],
  image: {
    src: "/images/fotbarkbl.jpeg",
    alt: "BEM UNRI 2025"
  }
})

// State
const sectionRef = ref(null)
const isVisible = ref(false)
const imageError = ref(false)
let observer = null

// Methods
const handleImageError = () => {
  imageError.value = true
}

const initScrollAnimation = () => {
  if (!sectionRef.value) return

  observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          setTimeout(() => {
            isVisible.value = true
          }, 150)
        }
      })
    },
    {
      threshold: 0.2,
      rootMargin: '-50px'
    }
  )

  observer.observe(sectionRef.value)
}

const cleanupObserver = () => {
  if (observer) {
    observer.disconnect()
    observer = null
  }
}

// Lifecycle
onMounted(initScrollAnimation)
onUnmounted(cleanupObserver)
</script>

<!-- Reusable Components -->
<script>
// Animated Div Component
const AnimatedDiv = {
  props: {
    isVisible: Boolean
  },
  template: `
    <div 
      class="transform transition-all duration-[2000ms] ease-out"
      :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-16 opacity-0'"
    >
      <slot />
    </div>
  `
}

// Check Icon Component
const CheckIcon = {
  template: `
    <div class="flex-shrink-0 w-5 h-5 md:w-6 md:h-6 bg-gradient-to-br from-[#eb7118] to-[#ffe500] rounded-full flex items-center justify-center mt-1 md:mt-0.5">
      <svg class="w-2.5 h-2.5 md:w-3 md:h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
      </svg>
    </div>
  `
}

export default {
  name: 'VisiMisi',
  components: {
    AnimatedDiv,
    CheckIcon
  }
}
</script>

<style scoped>
/* Utility Classes */
.subtitle {
  @apply bg-gradient-to-r from-[#eb7118] to-[#ffe500] bg-clip-text text-transparent font-semibold text-xs tracking-wider uppercase;
}

.section-title {
  @apply text-xl md:text-2xl font-bold bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent leading-tight;
}

.content-text {
  @apply text-black text-sm leading-relaxed;
}

/* Animation Performance */
@media (prefers-reduced-motion: no-preference) {
  .transform {
    will-change: transform, opacity;
  }
}

@media (prefers-reduced-motion: reduce) {
  .transform {
    transition-duration: 0.01ms !important;
    transition-delay: 0ms !important;
  }
}
</style>