<template>
    <section id="register">
        <div class="container ass">
            <div class="row">
                <div class="form-group mt-4 ml-4">
                    <router-link class="btn btn-white text-blue display-4" to="/home">Apoie o Corpo</router-link>
                </div>
                <div id="middle-screen" class="col-12 col-md-6 col-lg-4 col-xl-2 text-center">
                    <form v-on:submit.prevent="register">
                        <div class="form-group text-center">
                            <h3 class="text-blue text-uppercase font-weight-bold">Seja bem-vindo</h3>
                        </div>
                        <div class="form-group mt-5 mb-4 text-left">
                            <label class="text-blue ml-2 font-weight-bold">Nome</label>
                            <input v-model="name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group mt-5 mb-4 text-left">
                            <label class="text-blue ml-2 font-weight-bold">E-mail</label>
                            <input v-model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group mt-5 mb-4 text-left">
                            <label class="text-blue ml-2 font-weight-bold">Senha</label>
                            <input v-model="password" type="password" class="form-control" id="exampleInputPassword1" required>
                        </div>
                        <button class="btn btn-blue text-uppercase text-white font-weight-bold w-75 mb-3">Cadastrar-se</button>
                    </form>
                    <router-link class="text-blue" to="/login">Você já possui cadastro? Clique aqui</router-link>
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
        name: [],
        email: [],
        password: []
    }
  },
  methods: {
    register() {
        
        let loader = this.$loading.show({
            container: this.fullPage ? null : this.$refs.formContainer,
            canCancel: false,
            onCancel: this.onCancel,
        })

        axios.post('/api/auth/register', 
        {
            name: this.name,
            email: this.email,
            password: this.password
        })
        .then((response) => {
            
            console.log(response)
        
            setTimeout(() => {
                loader.hide(),
                this.$notify({
                    message: 'Usuário cadastrado com sucesso.',
                    type: 'success'
                })
                this.$router.push({ path: '/login' })
            },1000)   
            
        })
        .catch((error) => {
            console.dir(error.response)

                setTimeout(() => {
                    loader.hide(),
                    this.$notify({
                        message: error.response.data.message,
                        type: 'danger'
                    })
                },1000)  
        })
    }
  }
}
</script>

<style lang="scss" scoped>
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