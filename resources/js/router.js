import Vue from 'vue'
import VueRouter from 'vue-router'
import Main from './components/Main'
import AccountIndex from './components/Account/Index'
import LogIndex from './components/Log/Index'

Vue.use(VueRouter)

const routes = [
  {
    path: '/home',
    name: 'main',
    component: Main,
  },
  {
    path: '/account',
    name: 'account',
    component: AccountIndex,
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
