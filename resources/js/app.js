import { createApp } from 'vue'
import HomePage from './pages/Home.vue'
import AboutPage from './pages/About.vue'
import NewsPage from './pages/NewsPage.vue'
import StudentInfoPage from './pages/StudentInfoPage.vue'
import ContactPage from './pages/ContactPage.vue'
import KemensekabPage from './pages/Kemensekab.vue'
import KemenPPPage from './pages/KemenPP.vue'
import KemenagrarialhPage from './pages/Kemenagrarialh.vue'
import KemenkominfoPage from './pages/Kemenkominfo.vue'
import KemendanivPage from './pages/Kemendaniv.vue'
import KemenekrafPage from './pages/Kemenekraf.vue'
import KemenhadkesmaPage from './pages/Kemenhadkesma.vue'
import KemenkesraPage from './pages/Kemenkesra.vue'
import KemenkeuPage from './pages/Kemenkeu.vue'
import KemenlunivPage from './pages/Kemenluniv.vue'
import KemenrismaPage from './pages/Kemenrisma.vue'
import KemensosmasPage from './pages/Kemensosmas.vue'
import KemensospolPage from './pages/Kemensospol.vue'



import Timeline from './components/Timeline.vue';
import AdminEvents from './components/AdminEvents.vue';

const app = createApp({})
app.component('home-page', HomePage)
app.component('about-page', AboutPage)
app.component('news-page', NewsPage)
app.component('student-info-page', StudentInfoPage) 
app.component('contact-page', ContactPage)
app.component('Timeline', Timeline);
app.component('AdminEvents', AdminEvents);
app.component('kemensekab-page', KemensekabPage)
app.component('kemenpp-page', KemenPPPage)
app.component('kemenagrarialh-page', KemenagrarialhPage)
app.component('kemenkominfo-page', KemenkominfoPage)
app.component('kemendaniv-page', KemendanivPage)
app.component('kemenekraf-page', KemenekrafPage)
app.component('kemenhadkesma-page', KemenhadkesmaPage)
app.component('kemenkesra-page', KemenkesraPage)
app.component('kemenkeu-page', KemenkeuPage)
app.component('kemenluniv-page', KemenlunivPage)
app.component('kemenrisma-page', KemenrismaPage)
app.component('kemensosmas-page', KemensosmasPage)
app.component('kemensospol-page', KemensospolPage)
app.mount('#app')