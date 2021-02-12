<template>
    <section id="register">
        <div class="container ass">
            <div class="row">
                <div class="form-group mt-4 ml-4">
                    <router-link class="btn btn-white text-blue display-4" to="/home"><i class="fa fa-arrow-left"></i>Voltar a página home</router-link>
                </div>
                <div id="middle-screen" class="col-12 col-md-6 col-lg-4 col-xl-2 text-center">
                    <form v-on:submit.prevent="register">
                        <div class="form-group text-center">
                            <h3 class="text-blue text-uppercase font-weight-bold">Seja bem-vindo</h3>
                        </div>
                        <div class="form-group mt-5 mb-4">
                            <input v-model="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="E-mail">
                        </div>
                        <div class="form-group my-4">
                            <input v-model="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                        </div>
                        <button class="btn btn-blue text-uppercase text-white font-weight-bold w-75 mt-4 mb-3">Entrar</button>
                    </form>
                    <router-link class="text-blue" to="/forgot">Esqueceu a sua senha?</router-link>
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
        email: [],
        password: []
    }
  },
  methods: {
    register() {
    axios.post('/api/auth/login', 
        {
            email: this.email,
            password: this.password
        })
        .then((res) => {
            console.log(res)
            this.$router.push({ path: '/login' })
        })
        .catch((err) => {
            console.log(err)
        })
    }
  }
}
</script>

<style scoped>
.ass {
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
</style>