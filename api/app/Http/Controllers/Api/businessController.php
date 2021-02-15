<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\postdataModel;
use App\Helpers\Hutils;
use Exception;

class businessController extends Controller
{

    /**
    *REGISTRA UM NOVO ESTABELECIOMENTO
    *@param Request
    *@return JsonResponse
    */
    public function register(Request $request)
    {
        try{
            $request->merge(['email'=>Auth::user()->email]);
            postdataModel::insertData($request);
        
        }catch (Exception $e){
            return response()->json([
                'message'=> 'Erro ao cadastrar estabelecimento , tente novamente!',
                'object'=> $e->getMessage(),
                'error'=>true
            ],422);
        }
        return response()->json([
            'message'=> 'Estabelecimento cadastrado com sucesso!',
            'error'=>false
        ],201);
    }


    public function getAllUserPosts()
    {
        try{
            $userPosts = postdataModel::where('UserID','=',Auth::user()->email)->get();
            // pesquisar uma forma de não utilizar o indice de array
            if(empty($userPosts[0])){
                return response()->json([
                    'message'=>'Usuário não possui estabelecimentos cadastrados.',
                    'error'=>true,
                ],404);
            }

            return response()->json([
                'error'=>false,
                'userPosts'=>$userPosts
            ], 200);

        } catch(Exception $e){
            return response()->json([
                'message'=>'Erro ao buscar posts do usuário.',
                'object'=>$e->getMessage(),
                'error'=>true
            ],404);
        }
    }

    public function updateBusiness(Request $request)
    {
        $isBusinessFromUser = $this->validateBusinessId($request->business);
        if($request->business != null && $isBusinessFromUser != false){
            postdataModel::updateData($request);
            return response()->json([
                'message'=>'Estabelecimento atualizado com sucesso!',
                'error'=>false
            ],200);
        }
        else if($isBusinessFromUser == false){
            return response()->json([
                'message'=>'Este estabelecimento não pertence ao usuário atualmente logado.',
                'error'=>true
            ],403);    
        }
        return response()->json([
            'message'=>'Selecione ao menos um estabelecimento.',
            'error'=>true
        ],412);
    }

    public function validateBusinessId($businessId)
    {
        $business = postdataModel::where('ID' , '=' , $businessId)
        ->where('UserID','=',Auth::user()->email)
        ->get();
        
        if(empty($business[0])){
            return false;
        }
        return true;
    }
    
}
