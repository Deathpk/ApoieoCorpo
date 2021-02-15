<template>
    <div id="home">
        <nav class="navbar navbar-expand-sm fixed-top navbar-transparent">
            <router-link class="navbar-brand text-white text-uppercase font-weight-bold ml-5" to="/home">Apoie o corpo</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav col-md-6 ml-auto d-flex justify-content-space-evenly align-items-center">
                    <a class="nav-item nav-link text-uppercase text-white font-weight-bold" v-on:click="scrollSmoothTo('home')">Home</a>
                    <a class="nav-item nav-link text-uppercase text-white font-weight-bold" v-on:click="scrollSmoothTo('sobre')">Sobre</a>
                    <a class="nav-item nav-link text-uppercase text-white font-weight-bold" v-on:click="scrollSmoothTo('servicos')">Serviços</a>
                    <a class="nav-item nav-link text-uppercase text-white font-weight-bold" v-on:click="scrollSmoothTo('contato')">Contato</a>
                    <router-link class="text-white text-uppercase font-weight-bold" to="/login">Login</router-link>
                    <router-link class="btn btn-blue text-white" to="/register">Cadastrar-se</router-link>
                </div>
            </div>
        </nav>
        <!-- Home -->
        <div id="hero-image">
            <div class="hero-text">
                <h2 class="text-uppercase text-white font-weight-bold">Seja bem-vindo ao <br><span class="text-blue">apoie o corpo</span></h2>
                <p class="text-white">Entre em contato com todos os anunciantes cadastrados <br> e ajude a economia local</p>
                <form @submit.prevent>
                  <div class="row">
                      <div class="col-md-12 d-block d-xl-flex justify-content-center align-items-center border-grey">
                        <div class="col-12 col-xl-3 my-2">
                          <fg-input type="text" placeholder="Pesquisar">
                          </fg-input>
                        </div>
                        <div class="col-12 col-xl-3 my-2">
                          <fg-input type="email" placeholder="Localização">
                          </fg-input>
                        </div>
                        <div class="col-12 col-xl-3 my-2">
                            <select class="custom-select text-blue" name="categorias" id="categorias">
                                <option selected>Categorias</option>
                            </select>
                        </div>
                        <div class="col-12 col-xl-3 my-2">
                            <p-button class="btn-blue w-100" type="info"
                                        round
                                        @click.native.prevent="updateProfile">
                                Pesquisar
                            </p-button>
                        </div>
                      </div>
                  </div>
                </form>
            </div>
        </div>
        <!-- Sobre -->
        <section id="sobre">
            <div class="container">
                <div class="row my-5">
                    <div class="col-md-12 d-block d-md-flex justify-content-center align-items-center">
                        <div class="col-md-6 text-left">
                            <h3 class="text-blue font-weight-bold">Sobre nós</h3>
                            <p class="text-justify">
                                Diante do cénario que estamos vivendo, em meio a essa pandemia muitos irmãos que possuem um négocio próprio estão passando por dificuldades para manter seu empreendimento em atividade , e até mesmo arcar com suas responsabilidades financeiras.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <img class="img-fluid" src="../assets/img/home/undraw_Freelancer_re_irh4.png" alt="">                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Serviços -->
        <section class="position-relative" id="servicos">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="text-blue font-weight-bold">Serviços Ofertados</h2>
                        <p>Um dos diversos serviços ofertados por nossos <br> membros</p>    
                    </div>  

                    <div id="carousel-right" class="container">
                        <div class="row h-100">
                            <div class="col-md-12 justify-content-center align-items-center text-center">                    
                                <carousel :per-page="1" :page-change="1" :scrollPerPage="false" :speed="1000">
                                    <slide>
                                        <div class="card col-md-11 float-right mx-2">
                                            <img class="img-fluid" src="../assets/img/home/undraw_Freelancer_re_irh4.png" alt="Casa 1">
                                            <div class="card-body">
                                                <div class="text-left">
                                                    <p class="text-blue font-weight-bold">Lorem ipsum dolor</p>
                                                    <span class="border d-flex"></span>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <span class="d-flex">
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    </span>
                                                    <span class="border d-flex"></span>
                                                    <span class="d-flex justify-content-space-around align-items-center">
                                                        <p class="mt-3 text-blue">R$ 200</p>
                                                        <button class="btn btn-blue font-weight-bold text-white text-uppercase">Saiba Mais</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </slide>
                                    <slide>
                                        <div class="card col-md-11 float-right mx-2">
                                            <img class="img-fluid" src="../assets/img/home/undraw_Freelancer_re_irh4.png" alt="Casa 1">
                                            <div class="card-body">
                                                <div class="text-left">
                                                    <p class="text-blue font-weight-bold">Lorem ipsum dolor</p>
                                                    <span class="border d-flex"></span>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <span class="d-flex">
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    </span>
                                                    <span class="border d-flex"></span>
                                                    <span class="d-flex justify-content-space-around align-items-center">
                                                        <p class="mt-3 text-blue">R$ 200</p>
                                                        <button class="btn btn-blue font-weight-bold text-white text-uppercase">Saiba Mais</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </slide>
                                    <slide>
                                        <div class="card col-md-11 float-right mx-2">
                                            <img class="img-fluid" src="../assets/img/home/undraw_Freelancer_re_irh4.png" alt="Casa 1">
                                            <div class="card-body">
                                                <div class="text-left">
                                                    <p class="text-blue font-weight-bold">Lorem ipsum dolor</p>
                                                    <span class="border d-flex"></span>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <span class="d-flex">
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    </span>
                                                    <span class="border d-flex"></span>
                                                    <span class="d-flex justify-content-space-around align-items-center">
                                                        <p class="mt-3 text-blue">R$ 200</p>
                                                        <button class="btn btn-blue font-weight-bold text-white text-uppercase">Saiba Mais</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </slide>
                                    <slide>
                                        <div class="card col-md-11 float-right mx-2">
                                            <img class="img-fluid" src="../assets/img/home/undraw_Freelancer_re_irh4.png" alt="Casa 1">
                                            <div class="card-body">
                                                <div class="text-left">
                                                    <p class="text-blue font-weight-bold">Lorem ipsum dolor</p>
                                                    <span class="border d-flex"></span>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <span class="d-flex">
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    </span>
                                                    <span class="border d-flex"></span>
                                                    <span class="d-flex justify-content-space-around align-items-center">
                                                        <p class="mt-3 text-blue">R$ 200</p>
                                                        <button class="btn btn-blue font-weight-bold text-white text-uppercase">Saiba Mais</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </slide>
                                </carousel>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Informações -->
        <section id="hero-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 my-5 d-block d-lg-flex justify-content-center align-items-center">
                        <div class="col-lg-3 text-center">
                            <img src="../assets/img/home/icon_1.png" alt="">
                            <h2 class="text-blue font-weight-bold">1000</h2>
                            <h2 class="text-white font-weight-bold">Anúncios</h2>
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="../assets/img/home/icon_2.png" alt="">
                            <h2 class="text-blue font-weight-bold">1000</h2>
                            <h2 class="text-white font-weight-bold">Localizações</h2>
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="../assets/img/home/icon_3.png" alt="">
                            <h2 class="text-blue font-weight-bold">1000</h2>
                            <h2 class="text-white font-weight-bold">Membros</h2>
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="../assets/img/home/icon_4.png" alt="">
                            <h2 class="text-blue font-weight-bold">1000</h2>
                            <h2 class="text-white font-weight-bold">Impulsionados</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Produtos Impulsionados -->
        <section class="position-relative" id="servicos">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="text-blue font-weight-bold">Serviços Impulsionados</h2>
                        <p>Serviços impulsionados devido a sua causa e razão <br> social por aqueles cadastrados</p>    
                    </div>  

                    <div id="carousel-right" class="container">
                        <div class="row h-100">
                            <div class="col-md-12 justify-content-center align-items-center text-center">                    
                                <carousel :per-page="1" :page-change="1" :scrollPerPage="false" :speed="1000">
                                    <slide>
                                        <div class="card col-md-11 float-right mx-2">
                                            <img class="img-fluid" src="../assets/img/home/undraw_Freelancer_re_irh4.png" alt="Casa 1">
                                            <div class="card-body">
                                                <div class="text-left">
                                                    <p class="text-blue font-weight-bold">Lorem ipsum dolor</p>
                                                    <span class="border d-flex"></span>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <span class="d-flex">
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    </span>
                                                    <span class="border d-flex"></span>
                                                    <span class="d-flex justify-content-space-around align-items-center">
                                                        <p class="mt-3 text-blue">R$ 200</p>
                                                        <button class="btn btn-blue font-weight-bold text-white text-uppercase">Saiba Mais</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </slide>
                                    <slide>
                                        <div class="card col-md-11 float-right mx-2">
                                            <img class="img-fluid" src="../assets/img/home/undraw_Freelancer_re_irh4.png" alt="Casa 1">
                                            <div class="card-body">
                                                <div class="text-left">
                                                    <p class="text-blue font-weight-bold">Lorem ipsum dolor</p>
                                                    <span class="border d-flex"></span>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <span class="d-flex">
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    </span>
                                                    <span class="border d-flex"></span>
                                                    <span class="d-flex justify-content-space-around align-items-center">
                                                        <p class="mt-3 text-blue">R$ 200</p>
                                                        <button class="btn btn-blue font-weight-bold text-white text-uppercase">Saiba Mais</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </slide>
                                    <slide>
                                        <div class="card col-md-11 float-right mx-2">
                                            <img class="img-fluid" src="../assets/img/home/undraw_Freelancer_re_irh4.png" alt="Casa 1">
                                            <div class="card-body">
                                                <div class="text-left">
                                                    <p class="text-blue font-weight-bold">Lorem ipsum dolor</p>
                                                    <span class="border d-flex"></span>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <span class="d-flex">
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    </span>
                                                    <span class="border d-flex"></span>
                                                    <span class="d-flex justify-content-space-around align-items-center">
                                                        <p class="mt-3 text-blue">R$ 200</p>
                                                        <button class="btn btn-blue font-weight-bold text-white text-uppercase">Saiba Mais</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </slide>
                                    <slide>
                                        <div class="card col-md-11 float-right mx-2">
                                            <img class="img-fluid" src="../assets/img/home/undraw_Freelancer_re_irh4.png" alt="Casa 1">
                                            <div class="card-body">
                                                <div class="text-left">
                                                    <p class="text-blue font-weight-bold">Lorem ipsum dolor</p>
                                                    <span class="border d-flex"></span>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    <span class="d-flex">
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                        <p class="text-blue mt-3">Lorem ipsum dolor</p>
                                                    </span>
                                                    <span class="border d-flex"></span>
                                                    <span class="d-flex justify-content-space-around align-items-center">
                                                        <p class="mt-3 text-blue">R$ 200</p>
                                                        <button class="btn btn-blue font-weight-bold text-white text-uppercase">Saiba Mais</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </slide>
                                </carousel>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contato -->
        <section id="contato"> 
            <div class="container">
                <h1 class="text-center text-blue font-weight-bold">Contato</h1>
                <p class="text-center text-blue mb-5">Tem alguma dúvida? Entre em contato conosco para quais eventuais dúvidas</p>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 d-sm-flex justify-content-center align-items-end">
                        <div class="col-md-4 text-left">
                            <form v-on:submit.prevent="sendFormulario">
                                <div class="form-group mt-5 mb-4 text-left">
                                    <label class="text-blue ml-2 font-weight-bold">Nome</label>
                                    <input v-model="nome" type="text" class="form-control" required>
                                </div>
                                <div class="form-group mb-4 text-left">
                                    <label class="text-blue ml-2 font-weight-bold">E-mail</label>
                                    <input v-model="email" type="email" class="form-control" required>
                                </div>
                                <div class="form-group mb-4 text-left">
                                    <label class="text-blue ml-2 font-weight-bold">Digite aqui a sua mensagem</label>
                                    <textarea class="form-control" type="text" rows="3" name="message" v-model="mensagem" required></textarea>
                                </div>
                                <button class="btn btn-blue text-uppercase text-white font-weight-bold w-50 mb-5">Enviar</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <img class="img-fluid" src="../assets/img/home/Group 2.png" alt="Re-Planejar - Soluções Ambientais & Planejamento Urbano">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer -->
        <section id="footer">
            <footer class="page-footer font-small blue pt-4">
              <div class="col-md-12 d-block d-md-flex text-center text-md-left mb-4">
                <div class="col-md-6 mt-md-0 mt-3">
                    <h4 class="text-blue text-uppercase font-weight-bold">Apoie o corpo</h4>
                    <p class="text-white">Diante do cénario que estamos vivendo, em meio a essa pandemia muitos irmãos que possuem um négocio próprio estão passando por dificuldades para manter seu empreendimento em atividade , e até mesmo arcar com suas responsabilidades financeiras.</p>
                    <router-link class="btn btn-blue text-white" to="/register">Cadastrar-se</router-link>
                </div>
              </div>
              <div class="footer-copyright text-white text-center py-3 bg-dark">All copyrights reserved © 2020 - Apoie o Corpo</div>
            </footer>
        </section>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    data() {
        return {
            nome: [],
            email: [],
            mensagem: []
        } 
    },
    methods: {
        scrollSmoothTo(elementId) {
            var element = document.getElementById(elementId);
            element.scrollIntoView({ block: 'start',  behavior: 'smooth' });
        },
        sendFormulario() {
        
            let loader = this.$loading.show({
                container: this.fullPage ? null : this.$refs.formContainer,
                canCancel: false,
                onCancel: this.onCancel,
            })

            axios.post('/api/sendFormulario', 
            {
                nome: this.nome,
                email: this.email,
                mensagem: this.mensagem
            })
            .then((response) => {

                setTimeout(() => {
                    loader.hide(),
                    this.$notify({
                        message: 'Mensagem encaminhada com sucesso',
                        type: 'success'
                    })
                }, 1000)   

                this.nome = ''
                this.email = ''
                this.mensagem = ''
                
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
}
</script>
<style>
</style>
