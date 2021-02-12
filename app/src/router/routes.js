import DashboardLayout from "@/layout/dashboard/DashboardLayout.vue";
import Content from "@/layout/dashboard/Content.vue";
// GeneralViews
import NotFound from "@/pages/NotFoundPage.vue";

// Admin pages
import Dashboard from "@/pages/Dashboard.vue";

// Home page
import Home from "@/pages/Home.vue";
import Login from "@/pages/Login.vue";
import Register from "@/pages/Register.vue";
import Forgot from "@/pages/Forgot.vue";

const routes = [
  {
    path: "/",
    component: Content,
    redirect: "/home",
    children: [
      {
        path: "home",
        name: "home",
        component: Home
      },
      {
        path: "login",
        name: "login",
        component: Login
      },
      {
        path: "register",
        name: "register",
        component: Register
      },
      {
        path: "forgot",
        name: "forgot",
        component: Forgot
      },
    ]
  },
  {
    path: "/",
    component: DashboardLayout,
    redirect: "/dashboard",
    children: [
      {
        path: "dashboard",
        name: "dashboard",
        component: Dashboard
      },
    ]
  },
  { path: "*", component: NotFound }
];

/**
 * Asynchronously load view (Webpack Lazy loading compatible)
 * The specified component must be inside the Views folder
 * @param  {string} name  the filename (basename) of the view to load.
function view(name) {
   var res= require('../components/Dashboard/Views/' + name + '.vue');
   return res;
};**/

export default routes;
