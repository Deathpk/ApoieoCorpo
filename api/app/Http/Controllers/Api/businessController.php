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
            ],422);//[Hutils::makeResponse('erro ao cadastrar estabelecimento,'.$e->getMessage(),true),422]
        }
        return response()->json([
            'message'=> 'Estabelecimento cadastrado com sucesso!',
            'error'=>false
        ],201); // [Hutils::makeResponse('Estabelecimento cadastrado com sucesso!',false),201]
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
        if($request->business != null){
            $whatsAppLink = "https://api.whatsapp.com/send?1=pt_BR&phone=55";

            postdataModel::where('ID','=',$request->business)->update([
                'Nome'=>$request->nome,
                'Descricao'=>$request->descricao,
                'Contato'=>$request->contato,
                'Instagram'=>$request->instagram,
                'Facebook'=>$request->facebook,
                'WhatsApp'=>$whatsAppLink.$request->whatsapp
            ]);

            return response()->json([
                'message'=>'Estabelecimento atualizado com sucesso!',
                'error'=>false
            ],200);
        }

        return response()->json([
            'message'=>'Selecione ao menos um estabelecimento.',
            'error'=>true
        ],412);
    }
    
}
