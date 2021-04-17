<template>
    <div id="home">
        <nav class="navbar navbar-expand-xl fixed-top navbar-transparent">
            <router-link class="navbar-brand text-white text-uppercase font-weight-bold ml-5" to="/home">
                <img src="../assets/img/ac.png" alt="Apoie o Corpo" class="img-fluid w-25 h-25">
            </router-link>
            <button v-on:click="abrirNavBar()" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav col-md-6 ml-auto d-flex justify-content-space-evenly align-items-center">
                    <a class="un nav-link text-uppercase text-white font-weight-bold" v-on:click="scrollSmoothTo('home')">Home</a>
                    <a class="un nav-link text-uppercase text-white font-weight-bold" v-on:click="scrollSmoothTo('sobre')">Sobre</a>
                    <a class="un nav-link text-uppercase text-white font-weight-bold" v-on:click="scrollSmoothTo('servicos')">Serviços</a>
                    <a class="un nav-link text-uppercase text-white font-weight-bold" v-on:click="scrollSmoothTo('contato')">Contato</a>
                    <router-link class="un nav-link text-uppercase text-white font-weight-bold" to="/login">Login</router-link>
                    <router-link class="btn btn-blue text-white" to="/register">Cadastrar-se</router-link>
                </div>
            </div>
        </nav>
        <div id="mySidenav" class="sidenav">
            <a class="closebtn" v-on:click="fecharNavBar()">&times;</a>
            <a class="un nav-link text-uppercase text-white font-weight-bold" v-on:click="scrollSmoothTo('home')">Home</a>
            <a class="un nav-link text-uppercase text-white font-weight-bold" v-on:click="scrollSmoothTo('sobre')">Sobre</a>
            <a class="un nav-link text-uppercase text-white font-weight-bold" v-on:click="scrollSmoothTo('servicos')">Serviços</a>
            <a class="un nav-link text-uppercase text-white font-weight-bold" v-on:click="scrollSmoothTo('contato')">Contato</a>
            <router-link class="un nav-link text-uppercase text-white font-weight-bold" to="/login">Login</router-link>
            <router-link class="text-white text-uppercase font-weight-bold" to="/register">Cadastrar-se</router-link>
        </div>
        <!-- Home -->
        <div id="hero-image">
            <div class="hero-text">
                <h2 class="text-uppercase text-white font-weight-bold">Seja bem-vindo ao <br><span class="text-blue">apoie o corpo</span></h2>
                <p class="text-white">Entre em contato com todos os anunciantes cadastrados <br> e ajude a economia local</p>
                <!-- <form @submit.prevent>
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
                </form> -->
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
        fecharNavBar() {
            document.getElementById("mySidenav").style.width = "0";
        },
        abrirNavBar() {
            document.getElementById("mySidenav").style.width = "250px";
        },
        scrollSmoothTo(elementId) {
            var element = document.getElementById(elementId);
            element.scrollIntoView({ block: 'start',  behavior: 'smooth' });
            document.getElementById("mySidenav").style.width = "0";
        },
        sendFormulario() {
        
            let loader = this.$loading.show({
                container: this.fullPage ? null : this.$refs.formContainer,
                canCancel: false,
                onCancel: this.onCancel,
            })

            axios.post('/api/contact/help', 
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
<style scoped>

nav {
    z-index: 2;
}
/* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1000; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #111; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  /* font-size: 25px; */
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media (max-height: 1024px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

/* Aqui vai a transição dos links do navbar */
.un {
	display: inline-block;
	position: relative;
	padding-bottom: 3px;
  margin-right: 10px;
}
.un:last-child {
  margin-right: 0;
}

.un:after {
	content: '';
	display: block;
	margin: auto;
	height: 3px;
	width: 0px;
	background: transparent;
	transition: width .5s ease, background-color .5s ease;
}
.un:hover:after {
	width: 100%;
	background: #FFFFFF;
}
</style>
