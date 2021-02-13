<template>
  <div>    
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 text-center mx-auto">
        <form v-on:submit.prevent="editar">

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">Nome do estabelecimento</label>
              <input v-model="nome" type="text" class="form-control" required>
            </div>

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">Descrição</label>
              <input v-model="descricao" type="text" class="form-control" required>
            </div>

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">Contato</label>
              <input v-model="contato" type="tel" class="form-control" required>
            </div>

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">Instagram</label>
              <input v-model="instagram" type="url" class="form-control" required>
            </div>

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">Facebook</label>
              <input v-model="facebook" type="url" class="form-control" required>
            </div>

            <div class="form-group mt-5 mb-4 text-left">
              <label class="text-blue ml-2 font-weight-bold">WhatsApp</label>
              <input v-model="whatsapp" type="tel" class="form-control" required>
            </div>

          <button class="btn btn-blue text-uppercase text-white font-weight-bold w-75 mt-4 mb-3">Alterar serviço</button>
       
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
      business: [],
      nome: [],
      descricao: [],
      contato: [],
      instagram: [],
      facebook: [],
      whatsapp: []
    }
  }, 
  methods: {
    editar() {
      let loader = this.$loading.show({
        container: this.fullPage ? null : this.$refs.formContainer,
        canCancel: false,
        onCancel: this.onCancel,
      })
      axios.post('/api/business/update', {
        business: localStorage.getItem('ID'),
        nome: this.nome,
        descricao: this.descricao,
        contato: this.contato,
        instagram: this.instagram,
        facebook: this.facebook,
        whatsapp: this.whatsapp
      },
      { 
        headers: { 
          Authorization: 'Bearer ' + localStorage.getItem('access_token')
        } 
      }
      )
      .then((response) => {
        
        localStorage.removeItem('ID')

        setTimeout(() => {
          loader.hide(),
          this.$notify({
            message: 'Serviço editado com sucesso.',
            type: 'success'
          })
          this.$router.push({ path: '/servico' })
        },1000)   
      })
      .catch((error) => {
        console.dir(error)
        
        setTimeout(() => {
          loader.hide(),
          this.$notify({
            message: error.response.data.message,
            type: 'danger'
          })
        },1000)
      })
    },
  }
};
</script>

<style lang="scss" scoped>
@media (min-width: 1200px) {
    .col-xl-2 {
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 18.666667%;
    }
}
</style>