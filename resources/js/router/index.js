import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import(/* webpackChunkName: "about" */ '../views/Home.vue')
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
  {
    path: '/devcom',
    name: 'Devcom',
    component: () => import('../views/Devcom.vue')
  },
  {
    path: '/olimpiade',
    name: 'Olimpiade',
    component: () => import('../views/Olimpiade.vue')
  },
  {
    path: '/blog',
    name: 'Blog',
    component: () => import('../views/Blog.vue')
  },
  {
    path: '/blog/:judul',
    name: 'BlogDetail',
    component: () => import('../views/BlogDetail.vue')
  },
  {
    path: '/esport',
    name: 'Esport',
    component: () => import('../views/EsportPage.vue')
  },
  {
    path: '/timer',
    name: 'Timer',
    component: () => import('../views/Timer.vue')
  },
  {
    path: '/createsoal',
    name: 'CreateSoal',
    component: () => import('../views/penyisihanolim/CreateSoal.vue')
  },
  {
    path: '/showsoal',
    name: 'ShowSoal',
    component: () => import('../views/penyisihanolim/ShowSoal.vue')
  },
  {
    path: '/gamenetwork',
    name: 'gamenetwork',
    component: () => import('../views/penyisihanolim/GameNetwork.vue')
  },
  {
    path: '/gamenetwork2',
    name: 'gamenetwork2',
    component: () => import('../views/penyisihanolim/GameNetwork2.vue')
  },
  {
    path: '/showsoal/:nodeid/:connecting',
    name: 'ShowSoal'+':nodeid',
    component: () => import('../views/penyisihanolim/ShowSoal.vue')
  },
  {
    path: '/mainmenu',
    name: 'MainMenu',
    component: () => import('../views/penyisihanolim/MainMenu.vue')
  },
  {
    path: '/gamestart',
    name: 'GameStart',
    component: () => import('../views/penyisihanolim/GameStart.vue')
  },
  {
    path: '/score/livescore',
    name: 'Livescore',
    component: () => import('../views/penyisihanolim/Livescore.vue')
  }


]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
  scrollBehavior (to, from, savedPosition) {
    return { x: 0, y: 0 };
  }
})

export default router
