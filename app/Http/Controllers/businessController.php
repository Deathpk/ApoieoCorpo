<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredoRegisterRequest;
use App\Http\Requests\UpdateBusinessRequest;
use Auth;
use Illuminate\Http\Request;
use App\Models\postdataModel;

class businessController extends Controller
{   
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
    public function doUpdateBusiness(UpdateBusinessRequest $request){ // Colocar custom Request depois...
        //dd($request->choseBusiness);
        $updateBusiness = postdataModel::where('ID', '=', $request->choseBusiness)->update(['Nome'=>$request->nomeEstabelecimento, 'Descricao'=> $request->Descricao, 
        'Contato'=>$request->Contato]);
        return redirect('/')->with('status','Dados Atualizados com sucesso!');
    }

}
