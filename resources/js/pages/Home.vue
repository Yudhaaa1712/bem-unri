
<template>
  <div class="min-h-screen bg-gradient-to-br from-biru-langit-50 to-white">
    <Header />
    <HeroSection />
    <VideoSection />
    <VisiMisi />
    <Timeline />
    <ProgramKerja />
    <BiruLangitNews />
    <StudentInfo />
    <Footer />
  </div>
</template>

<script>
import Header from '../components/Header.vue'
import HeroSection from '../components/HeroSection.vue'
import VideoSection from '../components/VideoSection.vue'
import VisiMisi from '../components/VisiMisi.vue'
import Timeline from '../components/Timeline.vue'
import ProgramKerja from '../components/ProgramKerja.vue'
import BiruLangitNews from '../components/BiruLangitNews.vue'
import StudentInfo from '../components/StudentInfo.vue'
import Footer from '../components/Footer.vue'

export default {
  name: 'HomePage',
  components: {
    Header,
    HeroSection,
    VideoSection,
    VisiMisi,
    Timeline,
    ProgramKerja,
    BiruLangitNews,
    StudentInfo,
    Footer
  }
}
</script>