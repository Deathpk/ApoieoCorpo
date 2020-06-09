@extends ('layouts.app')
@section('title', 'Apoie o Corpo - Dashboard')

<style>
  body {
                background-color:aquamarine;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            #content {
  display: flex; /* or inline-flex */
  flex-wrap: wrap ;
  }

</style>

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    
  <div class="container" id="navbar">
    <!-- NAVBAR -->
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('dash')}}">Apoie o Corpo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            @if(!Auth::check())
            <li class="nav-item"> 
            <a class="nav-link" href="{{route('login')}}">Login <span class="sr-only">(current)</span></a>
            </li>
            @endif
            @if(Auth::check())
              <li class="nav-item"> 
                <a class="nav-link" href="{{route('logout')}}">Logout <span class="sr-only">(current)</span></a>
                </li>
            @endif
            <li class="nav-item">
            <a class="nav-link" href="{{route('businessReg')}}">Cadastrar Estabelecimento <span class="sr-only">(current)</span></a>
            </li>
            @if(Auth::check())
            <li class="nav-item">
            <a class="nav-link" href="{{route('getUserBusiness')}}">Atualizar Estabelecimento<span class="sr-only">(current)</span></a>
              </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="#">Iniciativa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sobre</a>
            </li>   
            <li class="nav-item">
            </li>
          </ul>
        </div>
      </nav> 
      <br> 
      <!-- SEARCH BAR --> 
      <form class="form-inline"> 
        <input class="form-control mr-sm-2" type="search" placeholder="Estabelecimento" aria-label="Search">
        <select class="form-control mr-sm-2" id = "Estado" name="Estado" >
          <option selected>Selecione o Estado</option>
          <option value = "Minas Gerais">Minas Gerais</option>
          <option value = "São Paulo">São Paulo</option>
          <option value = "Rio de Janeiro">Rio de Janeiro</option>
        </select>
        <input class="form-control mr-sm-2" type="text" placeholder="Cidade" aria-label="Cidade">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
       </div> <!-- VER DE ONDE DIABOS É ESSE DIV -->
      </form>  
  </div>
    <br>
    <br>

      <!-- Content -->

      <!-- aplicar um foreach com os posts dps -->
      
    <div class="container-fluid" id="content">
      @foreach($allBusiness as $obj)
      <div class="card" style="width: 18rem;">
        <div class="card-body">
         
          <h6 class="card-subtitle mb-2 text-muted">{{$obj->Ramo}}</h6>
          <h5 class="card-title">{{$obj->Nome}}</h5>
        <p class="card-text">{{$obj->Descricao}}</p>
        <h6 class="card-subtitle mb-2 text-muted">Cidade: {{$obj->Cidade}}</h6>
        <h6 class="card-subtitle mb-2 text-muted">Estado: {{$obj->Estado}}</h6>
        <h6 class="card-subtitle mb-2 text-muted">Contato: {{$obj->Contato}}</h6>
        
        </div>
        </div>
        @endforeach
        
    </div>
    <!-- endContent-->

   



@endsection

