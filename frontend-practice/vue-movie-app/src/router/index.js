import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Favorites from '../views/Favorites.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/favorites', component: Favorites }
]

export const router = createRouter({
  history: createWebHistory(),
  routes
})