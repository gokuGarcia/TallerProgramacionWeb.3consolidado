import { createRouter, createWebHashHistory } from 'vue-router'

import EditarComuna from '../components/comuna/EditarComuna.vue';
import NewComuna from '../components/comuna/NewComuna.vue';
import Comunas from '../views/Comunas.vue'
import home from '../views/HomeView.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: home
  },
  {
    path: '/comunas',
    name: 'comunas',
    component: Comunas
  },
  {
    path: '/editar-comuna/:id',
    name: 'EditarComuna',
    component: EditarComuna
  },
  {
   path: '/add-comuna/',
   name: 'NewComuna',
   component: NewComuna
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
