import Vue from 'vue'
import VueRouter from 'vue-router'
import Main from './components/Main'
import AccountIndex from './components/Account/Index'
import AccountForm from './components/Account/Form'
import LogIndex from './components/Log/Index'
import ContactIndex from './components/Contact/Index'
import ImageUpload from './components/Image/Upload'

Vue.use(VueRouter)

const routes = [
  {
    path: '/home',
    name: 'main',
    component: Main,
  },
  {
    path: '/',
    name: 'main',
    component: Main,
  },
  {
    path: '/account',
    name: 'account',
    component: AccountIndex,
  },
  {
    path: '/account/new',
    name: 'account-new',
    component: AccountForm,
    props: {
      isNew: true,
    },
  },
  {
    path: '/account/:id',
    name: 'account-edit',
    component: AccountForm,
  },
  {
    path: '/log',
    name: 'log',
    component: LogIndex,
  },
  {
    path: '/contact',
    name: 'contact',
    component: ContactIndex,
  },
  {
    path: '/image',
    name: 'image',
    component: ImageUpload,
  },
]

const router = new VueRouter({
  routes,
  mode: 'history'
})

export default router
