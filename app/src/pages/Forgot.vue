<template>
    <section id="login">
        <div class="container">
            <div class="row">
                <div id="middle-screen" class="col-12 col-md-6 col-lg-4 col-xl-2">
                    <form v-on:submit.prevent="login">
                        <div class="form-group text-center">
                            <h5 class="text-blue text-uppercase font-weight-bold">Apoie o corpo</h5>
                            <!-- <img id="brand" class="img-fluid" src=""
                            alt="Re-Planejar - Soluções Ambientais & Planejamento Urbano"> -->
                        </div>
                        <div class="form-group my-5">
                            <!-- <label for="exampleInputEmail1">E-mail</label> -->
                            <input v-model="email" type="email" class="form-control box-shadow" id="exampleInputEmail1" aria-describedby="emailHelp"
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