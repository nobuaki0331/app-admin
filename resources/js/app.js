import Vue from 'vue'
import VueCompositionApi from '@vue/composition-api'
import store from './store'
import router from './router'
import Vuetify from 'vuetify'
import "vuetify/dist/vuetify.min.css"
import HeaderComponent from './components/Header'
import Main from './components/Main'

require('./bootstrap')
Vue.use(Vuetify)
Vue.use(VueCompositionApi)

const app = new Vue({
  el: '#app',
  store,
  router,
  vuetify: new Vuetify({
  }),
  components: {
    HeaderComponent,
    Main,
  }
})
