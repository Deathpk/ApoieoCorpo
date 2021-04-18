<template>
    <section id="login">
        <div class="container dash">
            <div class="row">
                <div class="form-group mt-4 ml-4">
                    <router-link class="btn btn-white text-blue display-4" to="/login"><i class="fa fa-arrow-left"></i>Voltar</router-link>
                </div>
                <div id="middle-screen" class="col-12 col-md-6 col-lg-4 col-xl-2 text-center">
                    <form v-on:submit.prevent="login">
                        <div class="form-group text-center">
                            <h5 class="text-blue text-uppercase font-weight-bold">Apoie o corpo</h5>
                            <!-- <img id="brand" class="img-fluid" src=""
                            alt="Re-Planejar - Soluções Ambientais & Planejamento Urbano"> -->
                        </div>
                        <div class="form-group my-5">
                            <!-- <label for="exampleInputEmail1">E-mail</label> -->
                            <input v-model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="E-mail">
                        </div>
                        <div class="form-group d-block d-md-flex d-xl-block mt-5">
                            <div class="col-md-6 col-xl-12 mb-3">
                                <button class="btn btn-blue text-uppercase text-green font-weight-bold w-100">
                                    <router-link to="/register" class="text-uppercase text-white font-weight-bold">Enviar</router-link>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container image text-right">
            <img id="brand" class="img-fluid" src="../assets/img/faces/Group 2.png" alt="Apoie o Corpo">
        </div>
    </section>
</template>

<script>
import axios from 'axios'

export default {
  data() {
      return {
          email: '',
          password: ''
      }
  },
  methods: {
    login() {
        axios.post('/api/login', {
            email: this.email,
            password: this.password
        })
        .then((res) => {
            localStorage.setItem('usertoken', res.data.token)
            this.email = ''
            this.password = ''
            this.$router.push({ path: '/' })
            console.log(res)
        })
        .catch((err) => {
            console.log(err.response)
        })

        this.emitMethod()
    },
    emitMethod() {
        EventBus.$emit('logged-in', 'loggedin')
    }
  }
}
</script>
<style lang="scss" scoped>
.dash {
    position: absolute;
}

.image {
    position: absolute;
    right: 0px;
    bottom: 0px;
    padding-right: 0px;
    z-index: 1;
}

@media (min-width: 1200px) {
    .col-xl-2 {
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 18.666667%;
    }
}

@media (max-width: 1200px) {
    #brand {
        width: 200px;
    }
}

.container-fluid {
    height: 100vh;
    width: 100%;
    padding: 0;
    margin: 0;
}
</style>