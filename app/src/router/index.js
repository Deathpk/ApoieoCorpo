import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes";
Vue.use(VueRouter);

// configure router
const router = new VueRouter({
  routes, // short for routes: routes
  linkActiveClass: "active"
});

router.beforeEach((to, from, next) => {
  const authenticatedUser = localStorage.isRegister;
  const requiresAuth = to.matched.some(record => record.meta.requiresAuth);

  // Check for protected route
  if (requiresAuth && ! authenticatedUser) next('login')
  else next();
});

export default router;