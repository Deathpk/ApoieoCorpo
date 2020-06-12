@extends('layouts.app')
<style>
.container{
    margin: 16;
    border: 3.188;
    padding-top:24;
    padding-right:24;
    padding-bottom:24;
    padding-left:24;
}
</style>

@section('title', 'Apoie o Corpo - Atualizar Estabelecimento')

@section('content')
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
@if ($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@endif

<div class="container" id="formContainer">
    <form action="{{route('updateUserBusiness')}}" method="post">
        @csrf
        @method('PUT')
        <br>
            <div class="form-group">
              <label for="Estabelecimento">Escolha o Estabelecimento:</label>
              <select class="form-control"  name = "choseBusiness" id="choseBusiness">
              <option selected></option>
              @foreach($userPosts as $obj)
              <option value={{$obj->ID}}>{{$obj->Nome}}</option>
              @endforeach
              </select>
            </div>

            <br>
            <div class="form-group">
                <label for="nomeEstabelecimento">Nome do Estabelecimento</label>
                <input type="text" class="form-control" name="nomeEstabelecimento" id="nomeEstabelecimento" placeholder="Estabelecimento">
            </div>
    
                <div class="form-group">
                    <label for="Descricao">Descrição:</label>
                    <textarea class="form-control" rows="5" name = "Descricao" id="Descricao"></textarea>
                </div>

                <div class="form-group">
                    <label for="Contato">Numero de Contato:</label>
                    <input type="tel" class="form-control" name = "Contato" id="Contato" placeholder="EX: 3112345678">
                </div>
                
                <div class="form-group">
                  <label for="Link">Rede Social / Link para Contato</label>
                  <input type="text" class="form-control" name="Link" id="Link" placeholder="Rede Social , ou Link para contato ">
                </div>

            <button type="submit" class="btn btn-primary">Atualizar Dados</button>
    </form>

</div>

@endsection