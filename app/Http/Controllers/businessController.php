<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredoRegisterRequest;
use App\Http\Requests\UpdateBusinessRequest;
use Auth;
use Illuminate\Http\Request;
use App\Models\postdataModel;

class businessController extends Controller
{   
    private $SearchResult = null;
    //Retorna view para cadastro de bussines 
    public function registerBusiness(){
        if (Auth::check()){
            return view('Business.registerBusiness');
            }
        else{
            return view('auth.login');
        }
    }

     //Registra um novo Estabelecimento no Dashboard.
     public function doRegister(StoredoRegisterRequest $request){
        $email = Auth::user()->email;
        postdataModel::insertData($request, $email); // Chama o metodo para inserção dos dados do post no banco.
        return redirect('/')->with('status','Estabelecimento Cadastrado com sucesso!');
    }

    //Retorna para página de atualização de cadastro , com todos posts do usuario atual.
    public function updateBusiness(){
        $userPosts = postdataModel::where('UserID' , '=', Auth::user()->email)->get();
        return view('Business.updateBusinessOptions', compact('userPosts'));
    }

    //Atualiza os dados no DB :)
    public function doUpdateBusiness(UpdateBusinessRequest $request){
        $updateBusiness = postdataModel::where('ID', '=', $request->choseBusiness)->update(['Nome'=>$request->nomeEstabelecimento, 'Descricao'=> $request->Descricao, 
        'Contato'=>$request->Contato, 'Link'=>$request->Link]);
        return redirect('/')->with('status','Dados Atualizados com sucesso!');
    }

    //SEARCHBAR
    public function searchBusiness(Request $request){
         $SearchResult = postdataModel::where([['Estado', '=', $request->Estado],['Ramo', '=',$request->Ramo]
          , ['Cidade', '=', $request->Cidade]])->get();

          return view('Business.searchresultBusiness', compact('SearchResult'));
        
    }

}
