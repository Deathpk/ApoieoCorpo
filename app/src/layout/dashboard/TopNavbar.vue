<template>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <img src="@/assets/img/ac.png" class="img-fluid ml-3" width="64" alt="">
      <button class="navbar-toggler navbar-burger mr-2"
              type="button"
              @click="toggleSidebar"
              :aria-expanded="$sidebar.showSidebar"
              aria-label="Toggle navigation">
        <span class="navbar-toggler-bar"></span>
        <span class="navbar-toggler-bar"></span>
        <span class="navbar-toggler-bar"></span>
      </button>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <drop-down class="nav-item"
                     title="Configurações"
                     title-classes="nav-link"
                     icon="ti-settings">
            <!-- <router-link :to="{ path: '/profile' }" class="dropdown-item">Perfil</router-link> -->
            <a class="dropdown-item" v-on:click="logout()">Sair</a>
          </drop-down>
        </ul>
      </div>
    </div></nav>
</template>
<script>
import axios from 'axios'

export default {
  computed: {
    routeName() {
      const { name } = this.$route;
      return this.capitalizeFirstLetter(name);
    }
  },
  mounted() {

    if (localStorage.getItem('access_token')) {
      this.bearer = localStorage.getItem('access_token')
    } else {
      this.$router.push({ name: 'login' });
    }

    setTimeout(function() {
      localStorage.removeItem('access_token')
      this.$router.push({ path: '/login' });
    }, 900000, this);

  },
  data() {
    return {
      activeNotifications: false,
      bearer: []
    };
  },
  methods: {
    capitalizeFirstLetter(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    },
    toggleNotificationDropDown() {
      this.activeNotifications = !this.activeNotifications;
    },
    closeDropDown() {
      this.activeNotifications = false;
    },
    toggleSidebar() {
      this.$sidebar.displaySidebar(!this.$sidebar.showSidebar);
    },
    hideSidebar() {
      this.$sidebar.displaySidebar(false);
    },
    logout() {      
      
      let loader = this.$loading.show({
        container: this.fullPage ? null : this.$refs.formContainer,
        canCancel: false,
        onCancel: this.onCancel,
      })
      
      localStorage.removeItem('access_token')

      setTimeout(() => {
        loader.hide(),
        this.$notify({
          message: 'Logout realizado com sucesso.',
          type: 'success'
        })
        this.$router.push({ path: '/login' })
      },1000)

    }
  }
};
</script>
<style>
</style>
