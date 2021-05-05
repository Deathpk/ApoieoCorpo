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
import Servico from "@/pages/Servico.vue";
import ServicoCadastro from "@/pages/ServicoCadastro.vue";
import ServicoEditar from "@/pages/ServicoEditar.vue";

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
      {
        path: "servico",
        name: "servico",
        component: Servico
      },
      {
        path: "servico/cadastro",
        name: "cadastro",
        component: ServicoCadastro
      },
      {
        path: "servico/editar",
        name: "editar",
        component: ServicoEditar
      },
    ],
    meta: {
      requiresAuth: true
    }
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
