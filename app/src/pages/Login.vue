<template>
    <section id="register">
        <div class="container dash">
            <div class="row">
                <div class="form-group mt-4 ml-4">
                    <router-link class="btn btn-white text-blue display-4" to="/home"><i class="fa fa-arrow-left"></i>Voltar</router-link>
                </div>
                <div id="middle-screen" class="col-12 col-md-6 col-lg-4 col-xl-2 text-center">
                    <form v-on:submit.prevent="login">
                        <div class="form-group text-center">
                            <h3 class="text-blue text-uppercase font-weight-bold">Seja bem-vindo</h3>
                        </div>
                        <div class="form-group mt-5 mb-4 text-left">
                            <label class="text-blue ml-2 font-weight-bold">E-mail</label>
                            <input v-model="email" type="email" class="form-control" required>
                        </div>
                        <div class="form-group mb-4 text-left">
                            <label class="text-blue ml-2 font-weight-bold">Senha</label>
                            <input v-model="password" type="password" class="form-control" required>
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
        password: [],
        isRegister: ''
    }
  },
  methods: {
    login() {
        
        let loader = this.$loading.show({
            container: this.fullPage ? null : this.$refs.formContainer,
            canCancel: false,
            onCancel: this.onCancel,
        })

        axios.post('/api/auth/login', 
        {
            email: this.email,
            password: this.password
        })
        .then((response) => {            
            localStorage.setItem('access_token', response.data.access_token)
            localStorage.setItem('user_name', response.data.user)
            localStorage.setItem('isRegister', true)
            setTimeout(() => {
                loader.hide(),
                this.$notify({
                    message: 'Usuário autenticado com sucesso.',
                    type: 'success'
                })
                this.$router.push({ path: '/dashboard' })
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