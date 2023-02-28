import { createRouter, createWebHistory } from 'vue-router'
import {useAuth} from "@/stores/auth.js";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginView.vue')
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      meta: {
        auth: true
      },
      component: () => import('../views/DashboardView.vue')
    }
  ]
})
router.beforeEach(async (to, from, next) => {
  if (to.meta?.auth) {
    const auth = useAuth();
    if (auth.token && auth.user) {
     const isAutenticated = await auth.checkToken();
      if (isAutenticated) {
        next()
      } else {
        next({
          name: 'login'
        })
      }
    } else {
      next({
        name: 'login'
      })
    }
  } else {
    next()
  }
})

export default router
