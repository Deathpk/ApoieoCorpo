<template>
  <div>    
    <div class="row">
      <div class="col-md-6 col-xl-3" v-for="servico in servicos" :key="servico.ID">
        <stats-card>
          <div class="icon-big text-center" :class="`icon-${statsCards.type}`" slot="header">
            <i :class="statsCards.icon"></i>
          </div>
          <div class="numbers" slot="content">
            <p>{{ servico.Estado }}, {{ servico.Cidade }}</p>
            <h5>{{ servico.Nome }}</h5>
            <p>{{ servico.Descricao }}</p>
          </div>
          <div class="stats" slot="footer">
            <!-- <span v-if="servico.sin_ativo == 'S'"> -->

              <span class="d-flex">
                <span>
                  <i :class="statsCards.ativado"></i> <span class="text-dark font-weight-bold">Ramo:</span> {{ servico.Ramo }} <br>
                  <i :class="statsCards.ativado"></i> <span class="text-dark font-weight-bold">E-mail:</span> {{ servico.Contato }} <br>
                  
                  <span class="d-flex">
                    <span v-if="!(servico.WhatsApp == null)">
                      <a :href="servico.WhatsApp" target="_blank" class="text-green">
                        <i class="fa fa-whatsapp"></i>
                      </a>
                    </span><br>                  

                    <span v-if="!(servico.Facebook == null)">
                      <span  v-if="!(servico.WhatsApp == null)" class="text-dark font-weight-bold">
                        <a :href="servico.Facebook" target="_blank" class="text-blue">
                          <i class="fa fa-facebook"></i>
                        </a>
                      </span>  
                    </span><br>                  

                    <span v-if="!(servico.Instagram == null)">
                      <span v-if="!(servico.WhatsApp == null)" class="text-dark font-weight-bold">
                        <a :href="servico.Instagram" target="_blank" class="text-purple">
                          <i class="fa fa-instagram"></i>
                        </a>
                      </span>
                    </span><br>
                  </span>

                </span>
              </span>
              <!-- Botões -->
              <button class="btn mr-1 mt-1" v-on:click="editar(servico.ID)">Editar <i class="fa fa-edit"></i></button>
              <!-- <button class="btn mr-1 mt-1" :to="{ path:'/editar', params: { id: servico.ID } }" title="Editar serviço"><i class="fa fa-edit"></i></button> -->
              <!-- <button class="btn mx-1" @click="desativar(servico.id)" title="Desativar serviço"><i class="fa fa-times-circle"></i></button>
              <button class="btn mx-1" disabled @click="ativar(servico.id)" title="Ativar serviço"><i class="fa fa-check-circle"></i></button>
              <button class="btn mx-1" @click="excluir(servico.id)" title="Excluir serviço"><i class="fa fa-trash-alt"></i></button> -->
            <!-- </span> -->
            
            <!-- <span v-if="servico.sin_ativo == 'N'"><i :class="statsCards.inativado"></i> <span class="text-dark font-weight-bold">Status:</span> Inativado <br> -->
              <!-- Atualização -->
              <!-- <i class="ti-timer mb-2"></i> <span class="text-dark font-weight-bold">Última atualização em:</span> {{servico.updated_at}} <br> -->
              <!-- Botões -->
              <!-- <button class="btn mr-1 mt-1" disabled :to="{ name:'serviço/alterar', params: { id: servico.id } }" title="Alterar serviço"><i class="far fa-edit"></i></button>
              <button class="btn mx-1" disabled @click="desativar(servico.id)" title="Desativar serviço"><i class="far fa-times-circle"></i></button>
              <button class="btn mx-1" @click="ativar(servico.id)" title="Ativar serviço"><i class="far fa-check-circle"></i></button>
              <button class="btn mx-1" @click="excluir(servico.id)" title="Excluir serviço"><i class="far fa-trash-alt"></i></button>            
            </span>  -->
          </div>
        </stats-card>
      </div>
    </div>
    <router-link class="btn btn-blue" to="/servico/cadastro">Adicionar novo</router-link>
  </div>
</template>
<script>
import axios from 'axios'
import { StatsCard } from "@/components/index"
import Chartist from 'chartist'
export default {
  components: {
    StatsCard
  },
  data() {
    return {
      user: '',
      servicos: [],
      statsCards: {
        icon: "ti-view-grid",
        ativado: "ti-check",
        inativado: "ti-na",
        atualizacao: "ti-timer"
      }
      ,
    };
  },  
  created() {
    this.pegar();
  },
  methods: {
    pegar () {   
      let loader = this.$loading.show({
        container: this.fullPage ? null : this.$refs.formContainer,
        canCancel: false,
        onCancel: this.onCancel,
      })

      axios.get('/api/user/posts')
      .then((response) => {

        this.servicos = response.data.object.data

        setTimeout(() => {
            loader.hide()
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
    },
  }
};
</script>