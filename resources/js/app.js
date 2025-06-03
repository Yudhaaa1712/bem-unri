import { createApp } from 'vue'
import HomePage from './pages/Home.vue'
import AboutPage from './pages/About.vue'
import NewsPage from './pages/NewsPage.vue'
import KemendagriPage from './pages/Kemendagri.vue'

const app = createApp({})
app.component('home-page', HomePage)
app.component('about-page', AboutPage)
app.component('news-page', NewsPage)
app.component('kemendagri-page', KemendagriPage)
app.mount('#app')