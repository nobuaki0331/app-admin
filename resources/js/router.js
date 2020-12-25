import Vue from 'vue'
import VueRouter from 'vue-router'
import Main from './components/Main'
import LogIndex from './components/Log/Index'

Vue.use(VueRouter)

const routes = [
  {
    path: '/home',
    name: 'main',
    component: Main,
  },
  {
    path: '/log',
    name: 'log',
    component: LogIndex,
  },
]

const router = new VueRouter({
  routes,
  mode: 'history'
})

export default router
