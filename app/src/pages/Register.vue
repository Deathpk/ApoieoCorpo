<template>
    <section id="register">
        <div class="container">
            <div class="row">
                <div id="middle-screen" class="col-12 col-md-6 col-lg-4 col-xl-2 text-center">
                    <form v-on:submit.prevent="register">
                        <div class="form-group text-center">
                            <h3 class="text-blue text-uppercase font-weight-bold">Seja bem-vindo</h3>
                        </div>
                        <div class="form-group mt-5 mb-4">
                            <input v-model="name" type="text" class="form-control" placeholder="Nome" required>
                        </div>
                        <div class="form-group my-4">
                            <input v-model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail" required>
                        </div>
                        <div class="form-group my-4">
                            <input v-model="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" required>
                        </div>
                        <button class="btn btn-blue text-uppercase text-white font-weight-bold w-75 mb-3">Cadastrar-se</button>
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

<style scoped>

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
</style>