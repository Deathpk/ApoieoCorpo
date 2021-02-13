<template>
  <div>    
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4 col-xl-2 text-center mx-auto">
        <form v-on:submit.prevent="cadastrar">

            <div class="form-group mt-5 mb-4">
              <input v-model="Ramo" type="text" class="form-control" placeholder="Ramo" required>
            </div>

            <div class="form-group mt-5 mb-4">
              <input v-model="nomeEstabelecimento" type="text" class="form-control" placeholder="Nome do estabelecimento" required>
            </div>

            <div class="form-group mt-5 mb-4">
              <input v-model="Descricao" type="text" class="form-control" placeholder="Descrição" required>
            </div>

            <div class="form-group mt-5 mb-4">
              <input v-model="Estado" type="text" class="form-control" placeholder="Estado" required>
            </div>

            <div class="form-group mt-5 mb-4">
              <input v-model="Cidade" type="text" class="form-control" placeholder="Cidade" required>
            </div>

            <div class="form-group mt-5 mb-4">
              <input v-model="Contato" type="text" class="form-control" placeholder="Contato" required>
            </div>

            <div class="form-group mt-5 mb-4">
              <input v-model="Instagram" type="text" class="form-control" placeholder="Instagram" required>
            </div>

            <div class="form-group mt-5 mb-4">
              <input v-model="Facebook" type="text" class="form-control" placeholder="Facebook" required>
            </div>

            <div class="form-group mt-5 mb-4">
              <input v-model="WhatsApp" type="text" class="form-control" placeholder="WhatsApp" required>
            </div>

          <button class="btn btn-blue text-uppercase text-white font-weight-bold w-75 mt-4 mb-3">Entrar</button>
       
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      Ramo: [],
      nomeEstabelecimento: [],
      Descricao: [],
      Estado: [],
      Cidade: [],
      Contato: [],
      Instagram: [],
      Facebook: [],
      WhatsApp: [],
    }
  },  
  methods: {
    cadastrar() {   
      axios.post('/api/business/doRegister', {
        Ramo: this.Ramo,
        nomeEstabelecimento: this.nomeEstabelecimento,
        Descricao: this.Descricao,
        Estado: this.Estado,
        Cidade: this.Cidade,
        Contato: this.Contato,
        Instagram: this.Instagram,
        Facebook: this.Facebook,
        WhatsApp: this.WhatsApp
      },
      {  
        headers: { 
          Authorization: 'Bearer ' + localStorage.getItem('access_token')
        } 
      }).then((response) => {
        this.$router.push({ path: '/servico' })
      })
      .catch((error) => {
        console.dir(error)
      })
    }
  }
};
</script>