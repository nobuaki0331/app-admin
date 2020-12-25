import Vue from 'vue'
import router from './router'
import Vuetify from 'vuetify'
import "vuetify/dist/vuetify.min.css"
import HeaderComponent from './components/Header'
import Main from './components/Main'

Vue.use(Vuetify)

const app = new Vue({
  el: '#app',
  router,
  vuetify: new Vuetify({
  }),
  components: {
    HeaderComponent,
    Main,
  }
})
