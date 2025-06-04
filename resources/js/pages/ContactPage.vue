<template>
  <div class="min-h-screen bg-gray-50">
    <Header />
    
    <!-- Contact Hero Section -->
    <section class="py-16">
      <div class="max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
          Contact Us
        </h1>
        <p class="text-gray-600">
          Get in touch with us
        </p>
      </div>
    </section>

    <!-- Contact Content Section -->
    <section class="py-8 pb-16">
      <div class="max-w-4xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12">
          
          <!-- Contact Info -->
          <div class="bg-gradient-to-br from-gray-700 to-gray-900 rounded-lg p-8 text-white">
            <div>
              <h2 class="text-xl font-semibold text-white mb-6">
                Contact Information
              </h2>
              
              <div class="space-y-6">
                <!-- Phone -->
                <div>
                  <h3 class="font-medium text-white mb-1">Phone</h3>
                  <p class="text-gray-300 text-sm mb-1">Organization Relations</p>
                  <p class="text-yellow-400 font-semibold">081356618</p>
                </div>

                <div>
                  <h3 class="font-medium text-white mb-1">Business</h3>
                  <p class="text-gray-300 text-sm mb-1">Project & Media Partnership</p>
                  <p class="text-yellow-400 font-semibold">089567620335</p>
                </div>

                <!-- Email -->
                <div>
                  <h3 class="font-medium text-white mb-1">Email</h3>
                  <p class="text-gray-300 text-sm mb-1">General inquiries</p>
                  <p class="text-yellow-400 font-semibold">humas@bemfebui.com</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Contact Form -->
          <div class="bg-white rounded-lg p-8 shadow-sm border border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">
              Send Message
            </h2>
            
            <form @submit.prevent="submitForm" class="space-y-4">
              <!-- Name and Phone -->
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <input 
                    v-model="form.name"
                    type="text" 
                    placeholder="Name"
                    class="w-full px-3 py-2 bg-gray-100 border-0 rounded text-gray-700 placeholder-gray-500 focus:bg-white focus:ring-2 focus:ring-blue-500 transition-all"
                    required
                  >
                </div>
                <div>
                  <input 
                    v-model="form.phone"
                    type="tel" 
                    placeholder="Phone"
                    class="w-full px-3 py-2 bg-gray-100 border-0 rounded text-gray-700 placeholder-gray-500 focus:bg-white focus:ring-2 focus:ring-blue-500 transition-all"
                  >
                </div>
              </div>

              <!-- Email -->
              <div>
                <input 
                  v-model="form.email"
                  type="email" 
                  placeholder="Email"
                  class="w-full px-3 py-2 bg-gray-100 border-0 rounded text-gray-700 placeholder-gray-500 focus:bg-white focus:ring-2 focus:ring-blue-500 transition-all"
                  required
                >
              </div>

              <!-- Subject -->
              <div>
                <input 
                  v-model="form.subject"
                  type="text" 
                  placeholder="Subject"
                  class="w-full px-3 py-2 bg-gray-100 border-0 rounded text-gray-700 placeholder-gray-500 focus:bg-white focus:ring-2 focus:ring-blue-500 transition-all"
                  required
                >
              </div>

              <!-- Message -->
              <div>
                <textarea 
                  v-model="form.message"
                  rows="4" 
                  placeholder="Message"
                  class="w-full px-3 py-2 bg-gray-100 border-0 rounded text-gray-700 placeholder-gray-500 focus:bg-white focus:ring-2 focus:ring-blue-500 transition-all resize-none"
                  required
                ></textarea>
              </div>

              <!-- Submit Button -->
              <div>
                <button 
                  type="submit"
                  :disabled="isSubmitting"
                  class="w-full bg-gray-700 text-white py-2 px-4 rounded hover:bg-gray-800 transition-colors"
                  :class="isSubmitting ? 'opacity-50 cursor-not-allowed' : ''"
                >
                  {{ isSubmitting ? 'Sending...' : 'Send' }}
                </button>
              </div>
            </form>

            <!-- Messages -->
            <div v-if="showSuccess" class="mt-4 p-3 bg-green-50 border border-green-200 text-green-800 rounded text-sm">
              Message sent successfully!
            </div>

            <div v-if="showError" class="mt-4 p-3 bg-red-50 border border-red-200 text-red-800 rounded text-sm">
              Error sending message. Please try again.
            </div>
          </div>

        </div>
      </div>
    </section>

    <Footer />
  </div>
</template>

<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'

export default {
  name: 'ContactPage',
  components: {
    Header,
    Footer
  },
  data() {
    return {
      form: {
        name: '',
        phone: '',
        email: '',
        subject: '',
        message: ''
      },
      isSubmitting: false,
      showSuccess: false,
      showError: false
    }
  },
  methods: {
    async submitForm() {
      this.isSubmitting = true
      this.showSuccess = false
      this.showError = false

      try {
        await new Promise(resolve => setTimeout(resolve, 1500))
        
        this.form = {
          name: '',
          phone: '',
          email: '',
          subject: '',
          message: ''
        }
        
        this.showSuccess = true
        setTimeout(() => this.showSuccess = false, 3000)
        
      } catch (error) {
        this.showError = true
        setTimeout(() => this.showError = false, 3000)
      } finally {
        this.isSubmitting = false
      }
    }
  }
}
</script>