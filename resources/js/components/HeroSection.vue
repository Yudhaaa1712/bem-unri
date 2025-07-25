<template>
  <section 
    class="relative min-h-screen lg:min-h-screen md:min-h-[70vh] flex items-center justify-center bg-cover bg-center bg-no-repeat"
    :style="{ backgroundImage: `url(${heroContent.backgroundImage})` }"
  >
    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-white/90 z-10"></div>
    
    <!-- Content -->
    <div class="relative z-20 flex items-center justify-between max-w-6xl mx-auto px-5 py-10 w-full">
      <!-- Left Content - Text -->
      <div class="flex-1 max-w-2xl">
         <!-- Welcome Badge with animation -->
        <div 
          class="inline-block bg-gradient-to-r from-[#eb7118] to-[#ffe500] p-[2px] rounded-full transform transition-all duration-1000 ease-out"
          :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-4 opacity-0'"
        >
          <span class="bg-gradient-to-r from-[#034caa] to-[#003375] text-white px-4 py-2 rounded-full text-sm font-medium tracking-wide block">
            WELCOME TO
          </span>
        </div>
        
        <!-- Main Title with staggered animation -->
        <h1 
          class="text-3xl md:text-5xl font-bold mb-5 mt-4 bg-gradient-to-r from-[#034caa] to-[#003375] bg-clip-text text-transparent transform transition-all duration-1000 ease-out"
          :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'"
          :style="{ transitionDelay: '200ms' }"
        >
          BEM UNRI 2025
        </h1>
        
        <!-- Description with delayed animation -->
        <p 
          class="text-base md:text-xl text-black mb-8 leading-relaxed text-justify transform transition-all duration-1000 ease-out"
          :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'"
          :style="{ transitionDelay: '400ms' }"
        >
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi corporis vitae iusto autem dignissimos atque quae culpa aliquid. Nisi modi doloribus est quia suscipit velit eligendi cum atque labore quo obcaecati, at, deleniti adipisci esse non voluptas asperiores, delectus ut quibusdam illo porro corporis. Saepe hic explicabo iste possimus vero?
        </p>
      </div>
    </div>
  </section>
</template>

<script setup>
import { reactive, ref, onMounted } from 'vue';

// Hero content data (DRY principle)
const heroContent = reactive({
  title: 'BEM FEB UI 2025',
  description: 'BEM FEB UI is a student organization that runs an executive function in the Faculty of Economics and Business, Universitas Indonesia. We aim to be active, responsive, and constructive through various actions, devotions, and services.',
  backgroundImage: './images/rektorat2.jpg'
});

// Animation state
const isVisible = ref(false);

// Trigger animation on mount
onMounted(() => {
  // Small delay to ensure smooth animation start
  setTimeout(() => {
    isVisible.value = true;
  }, 100);
});

// Event handler
const handleButtonClick = () => {
  console.log('Join Us button clicked!');
  // Add your navigation or action logic here
};
</script>

<style scoped>
/* Additional smooth animations */
.transform {
  will-change: transform, opacity;
}

/* Subtle hover effects for interactive elements */
.bg-gradient-to-r:hover {
  transform: translateY(-1px);
  transition: transform 0.2s ease;
}
</style>