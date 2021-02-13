<template>
  <div>    
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 text-center mx-auto">
        <form v-on:submit.prevent="cadastrar">

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">Ramo</label>
              <input v-model="Ramo" type="text" class="form-control" required>
            </div>

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">Nome do estabelecimento</label>
              <input v-model="nomeEstabelecimento" type="text" class="form-control" required>
            </div>

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">Descrição</label>
              <input v-model="Descricao" type="text" class="form-control" required>
            </div>

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">Estado</label>
              <input v-model="Estado" type="text" class="form-control" required>
            </div>

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">Cidade</label>
              <input v-model="Cidade" type="text" class="form-control" required>
            </div>

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">Contato</label>
              <input v-model="Contato" type="tel" class="form-control" required>
            </div>

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">Instagram</label>
              <input v-model="Instagram" type="url" class="form-control" required>
            </div>

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">Facebook</label>
              <input v-model="Facebook" type="url" class="form-control" required>
            </div>

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">WhatsApp</label>
              <input v-model="WhatsApp" type="tel" class="form-control" required>
            </div>

          <button class="btn btn-blue text-uppercase text-white font-weight-bold w-75 mt-4 mb-3">Cadastrar serviço</button>
       
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
        
      let loader = this.$loading.show({
        container: this.fullPage ? null : this.$refs.formContainer,
        canCancel: false,
        onCancel: this.onCancel,
      })

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
          console.dir(response)
          setTimeout(() => {
            loader.hide(),
            this.$notify({
                message: response.data.message,
                type: 'success'
            })
            this.$router.push({ path: '/servico' })
          },1000)  
      })
      .catch((error) => {
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
};
</script>