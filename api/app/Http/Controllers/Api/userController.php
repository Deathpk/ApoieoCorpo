<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\updateUserInformationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\userModel;
use App\Models\postdataModel;
use Exception;
use Validator;

class userController extends Controller
{
    public function updateUserInformation(updateUserInformationRequest $request)
    {
        try{

            $userId = userModel::getUserId();
            
            if($userId != null){
                $request->merge(['id'=> $userId]);
                userModel::updateUserInformation($request);
                return response()->json([
                    'message' => 'Dados atualizados com sucesso!',
                    'error' =>false
                ],200);
            }
            else{
                return response()->json([
                    'message' => 'Oops! , parece que ocorreu um erro inesperado , contacte a equipe de suporte.',
                    'error' =>true
                ],404);
            }
        } catch(Exception $e){
            return response()->json([
                'message'=>'Erro ao atualizar dados de usuário , tente novamente!',
                'object'=>$e->getMessage(),
                'error'=>true
            ],404);
        }  
    }

    public function deleteUser(Request $request)
    {
        try{

            if($request->id != null){
                postdataModel::deleteAllUserPosts(Auth::user()->email); 
                userModel::deleteUserAccount($request->id);
                Auth::logout();
                return response()->json([
                    'message'=> 'Conta deletada com sucesso!', // ao deletar o usuário , redireciona-lo para a home.
                    'error'=> false
                ]);
            }
            
        } catch (Exception $e){
            return response()->json([
                'message'=>'Erro ao deletar conta de usuário , tente novamente!',
                'object'=>$e->getMessage(),
                'error'=>true
            ],404);
        }

    }

    public function getUsersCounter()
    {
        $usersCounter = userModel::getUsersCounter();
        if($usersCounter > 0){
            return response()->json([
                'message' => 'Usuários encontrados!',
                'error' => false,
                'object' => $usersCounter
            ],200);
        }
        return response()->json([
            'message' => 'Não foram encontrados Usuários!',
            'error' => false,
            'object' => null
        ],404);
    }

}
