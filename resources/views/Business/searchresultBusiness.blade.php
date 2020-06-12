@extends ('layouts.app')
@section('title', 'Apoie o Corpo - Dashboard Result')

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
    
    <div class="container" id="navbar">
        <!-- NAVBAR -->
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{route('dash')}}">Apoie o Corpo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item"> 
                <a class="nav-link" href="{{route('dash')}}">Inicio <span class="sr-only">(current)</span></a>
                </li>
                
                  <li class="nav-item"> 
                    <a class="nav-link" href="{{ URL::previous() }}">Voltar <span class="sr-only">(current)</span></a>
                    </li>
             </ul>
            </div>
          </nav> 
    </div>

      <br> 
      <!-- SEARCH BAR --> 
    <form class="form-inline" action="{{route('SearchBusiness')}}" method="post">
      @csrf
      @method('PUT') 
      <select class="form-control mr-sm-2" id = "Estado" name="Estado" >
        <option selected>Selecione o Estado</option>
        <option value = "MG">Minas Gerais</option>
        <option value = "SP">São Paulo</option>
        <option value = "RJ">Rio de Janeiro</option>
        <option value = "GO">Goiás</option>
        <option value = "ES">Espírito Santo</option>
        <option value = "BA">Bahia</option>
        <option value = "PR">Paraná</option>
        <option value = "MS">Mato Grosso do Sul</option>
        <option value = "TO">Tocantins</option>
      </select>

        <select class="form-control mr-sm-2" id = "Ramo" name="Ramo">
            <option selected>Selecione o Ramo de Atuação</option>
            <option value="Culinaria">Culinária</option>
            <option value="Tecnologia">Tecnologia</option>
            <option value="Beleza">Beleza</option>
            <option value="Saude">Saúde</option>
            <option value="Bem estar">Bem estar</option>
            <option value="Vendas">Vendas</option>
            <option value="Vestuario">Vestuário</option>
            <option value="Manutencao">Manutenção</option>
            <option value="Professor">Professor</option>
            <option value="PersonalTrainer">PersonalTrainer</option>
            <option value="Loja de esportes">Loja de esportes</option>
            <option value="Grafica">Gráfica</option>
            <option value="Fotografia">Fotografia</option>
            <option value="DesignerGrafico">DesignerGráfico</option>
            <option value="Designer de Ambientes">Designer de Ambientes</option>
            <option value="Manutencao Veicular">Manutenção Veicular</option>
            <option value="Varejo">Varejo</option>
            <option value="Artesanato">Artesanato</option>
            <option value="Assessoria de eventos">Assessoria de eventos</option>
            <option value="Bomboniere">Bomboniere</option>
    </select>
        <input class="form-control mr-sm-2" type="text" placeholder="Cidade" aria-label="Cidade", name="Cidade">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
      </form>  
  </div>
    <br>
    <br>


      <!-- Content -->
      <div class="container-fluid" id="content">
      @foreach($SearchResult as $obj)
      <div class="card" style="width: 18rem;">
        <div class="card-body">
         
          <h6 class="card-subtitle mb-2 text-muted">{{$obj->Ramo}}</h6>
          <h5 class="card-title">{{$obj->Nome}}</h5>
        <p class="card-text">{{$obj->Descricao}}</p>
        <h6 class="card-subtitle mb-2 text-muted">Localidade: {{$obj->Cidade}}/{{$obj->Estado}}</h6>
        <h6 class="card-subtitle mb-2 text-muted">Contato: {{$obj->Contato}}</h6>
        @if($obj->Link != null)
        <a href="{{$obj->Link}}" class="btn btn-secondary btn-sm" role="button" aria-pressed="true">RedeSocial/WhatsApp</a>
        @endif
        
        </div>
        </div>
        @endforeach
        
    </div>
    <!-- endContent-->

   



@endsection

