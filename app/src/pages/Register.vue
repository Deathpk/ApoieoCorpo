<template>
    <section id="register">
        <div class="container">
            <div class="row">
                <div id="middle-screen" class="col-12 col-md-6 col-lg-4 col-xl-2">
                    <form v-on:submit.prevent="register">
                        <div class="form-group text-center">
                            <h5 class="text-blue text-uppercase font-weight-bold">Apoie o corpo</h5>
                            <!-- <img id="brand" class="img-fluid" src=""
                            alt="Re-Planejar - Soluções Ambientais & Planejamento Urbano"> -->
                        </div>
                        <div class="form-group my-5">
                            <!-- <label for="exampleInputEmail1">Nome</label> -->
                            <input v-model="name" type="text" class="form-control box-shadow" placeholder="Nome">
                        </div>
                        <div class="form-group my-5">
                            <!-- <label for="exampleInputEmail1">E-mail</label> -->
                            <input v-model="email" type="text" class="form-control box-shadow" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="E-mail">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group my-5">
                            <!-- <label for="exampleInputPassword1">Senha</label> -->
                            <input v-model="password" type="password" class="form-control box-shadow" id="exampleInputPassword1" placeholder="Senha">
                        </div>
                        <button class="btn btn-blue text-uppercase text-white font-weight-bold w-100">Cadastrar</button>
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
        name: '',
        email: '',
        password: ''
    }
  },
  methods: {
    register() {
    axios.post('/api/register', 
        {
            name: this.name,
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