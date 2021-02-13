<template>
  <div class="wrapper">
    <side-bar>
      <template slot="links">
        <sidebar-link to="/dashboard" name="Dashboard" icon="ti-panel"/>
        <sidebar-link to="/servico" name="Servico" icon="ti-panel"/>
      </template>
      <mobile-menu>
        <ul class="navbar-nav ml-auto">
          <drop-down class="nav-item"
                     title="Configurações"
                     title-classes="nav-link"
                     icon="ti-settings">
            <router-link :to="{ path: '/profile' }" class="dropdown-item">Perfil</router-link>
            <a class="dropdown-item" v-on:click="logout()">Sair</a>
          </drop-down>
        </ul>
        <li class="divider"></li>
      </mobile-menu>
    </side-bar>
    <div class="main-panel">
      <top-navbar></top-navbar>

      <dashboard-content @click.native="toggleSidebar">

      </dashboard-content>

      <content-footer></content-footer>
    </div>
  </div>
</template>
<style lang="scss">
</style>
<script>
import TopNavbar from "./TopNavbar.vue";
import ContentFooter from "./ContentFooter.vue";
import DashboardContent from "./Content.vue";
import MobileMenu from "./MobileMenu";
import axios from 'axios'

export default {
  components: {
    TopNavbar,
    ContentFooter,
    DashboardContent,
    MobileMenu
  },
  methods: {
    toggleSidebar() {
      if (this.$sidebar.showSidebar) {
        this.$sidebar.displaySidebar(false);
      }
    },
    logout() {
        
      let loader = this.$loading.show({
          container: this.fullPage ? null : this.$refs.formContainer,
          canCancel: false,
          onCancel: this.onCancel,
      })

      axios.post('/api/auth/logout', {
        headers: {
          Authorization: 'Bearer ' + localStorage.getItem('access_token')
        }
      })
      .then((response) => {
        console.log(response)
        
        setTimeout(() => {
          loader.hide(),
          this.$notify({
              message: 'Usuário deslogado com sucesso.',
              type: 'success'
          })
          this.$router.push({ path: '/login' })
        },1000)  

      })
      .catch((error) => {
        console.log(error)
      });
    }
  }
};
</script>
