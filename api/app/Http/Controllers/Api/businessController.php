<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\postdataModel;
use App\Helpers\Hutils;
use App\Http\Requests\deleteBusinessRequest;
use App\Http\Requests\registerBusinessRequest;
use Exception;
use GuzzleHttp\Client;

class businessController extends Controller
{

    /**
    *REGISTRA UM NOVO ESTABELECIOMENTO
    *@param Request
    *@return JsonResponse
    */
    public function register(registerBusinessRequest $request)
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
            $userPosts = postdataModel::where('UserID','=', Auth::user()->email)->get();
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
       
        try{
            $isBusinessFromUser = $this->validateBusinessId($request->business);

            if( $isBusinessFromUser ){
                if ($request->has('WhatsApp')){
                    $whatsAppLink = Hutils::createWhatsAppLink($request->WhatsApp);
                    $request->merge(['WhatsApp' => $whatsAppLink]);
                }
                postdataModel::updateData($request);
                return response()->json([
                    'message'=>'Estabelecimento atualizado com sucesso!',
                    'error'=>false
                ],200);
            }
            else if( !$isBusinessFromUser ){
                return response()->json([
                    'message'=>'Este estabelecimento não pertence ao usuário atualmente logado.',
                    'error'=>true
                ],403);    
            }
            else if (!$request->has('business') || $request->business == null){
                return response()->json([
                    'message'=>'Selecione ao menos um estabelecimento.',
                    'error'=>true
                ],412);
            }
            

        } catch(Exception $e){
            return response()->json([
                'message'=>'Erro ao atualizar post do usuário , tente novamente!.',
                'object'=>$e->getMessage(),
                'error'=>true
            ],404);
        }    
    }

    public function deleteBusiness(deleteBusinessRequest $request)
    {
        try{
            if( $request->id  && $this->validateBusinessId($request->id) ){
                postdataModel::deleteUserPost($request->id);
                return response()->json([
                    'message'=> 'Anuncio apagado com sucesso!',
                    'error' => false
                ]);
            }
            return response()->json([
                'message'=> 'Anuncio não pertence ao usuário logado!.',
                'error' => true
            ]);
            
        }catch (Exception $e){
            return response()->json([
                'message'=>'Erro ao deletar anuncio do usuário , tente novamente!.',
                'object'=>$e->getMessage(),
                'error'=>true
            ],404);
        }
    }

    /**
    * Checa se um anuncio pertence realmente ao usuário logado no momento.
    * @param integer $businessId
    * @return bool
    */
    public function validateBusinessId($businessId)
    {
        try{
            $business = postdataModel::where('ID' , '=' , $businessId)
            ->where('UserID','=',Auth::user()->email)
            ->get();
            
            if(empty($business[0])){
                return false;
            }
            return true;
        } catch (Exception $e){
            return response()->json([
                'message'=>'Erro ao deletar anuncio do usuário , tente novamente!.',
                'object'=>$e->getMessage(),
                'error'=>true
            ],404);
        }
    }

    public function searchForBusiness(Request $request)
    {
        // dd($request->all());
        $query = postdataModel::query();
        if( count( $request->all()) ){
            foreach($request->all() as $field => $value){
                $query->where($field, 'LIKE', $value);
            }
            try{
                $searchResult = $query->get();
            } catch(Exception $e){
                return response()->json([
                    'message'=> 'Erro ao buscar anuncios com os parametros passados.',
                    'object'=>$e->getMessage(),
                    'error'=>true
                ],404);
            }
            
            return response()->json([
                'message' => 'Resultados encontrados',
                'object' => $searchResult,
                'error' => false
            ],200);
        }
        return response()->json([
            'message' => 'Selecione ao menos um filtro para realizar a pesquisa.',
            'error' => true
        ],412);
    }

    /**
     * Consome a API do IBGE com Guzzle Http , trazendo todas as UFS do País.
     * @return JsonResponse
     */
    public function getListOfUfs()
    {
        $client = new Client();
        $url = "https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome";
        try{
            $response = $client->request('GET', $url);
        } catch(Exception $e){
            return response()->json([
                'message'=> 'Oops... Houve um erro ao buscar dados nessa api.',
                'object'=>$e->getMessage(),
                'error'=>true
            ],404);
        }
        
        $responseBody = json_decode($response->getBody());
        return response()->json([
            'message' => 'Resultados Encontrados.',
            'object' => $responseBody,
            'error' => false
        ]);
    }

    public function getMunicipiosByUf($ufCode)
    {
        $client = new Client();
        $url = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/".$ufCode."/municipios?orderBy=nome";

        try{
            $response = $client->request('GET', $url);
        } catch(Exception $e){
            return response()->json([
                'message'=> 'Oops... Houve um erro ao buscar dados nessa api.',
                'object'=>$e->getMessage(),
                'error'=>true
            ],404);
        }

        $responseBody = json_decode($response->getBody());
        return response()->json([
            'message' => 'Resultados Encontrados.',
            'object' => $responseBody,
            'error' => false
        ]);
    }

    public function getBusinessCounter()
    {
        $businessCounter = postdataModel::getPostsCounter();
        if($businessCounter > 0){
            return response()->json([
                'message' => 'Anuncios encontrados!',
                'error' => false,
                'object' => $businessCounter,
            ],200);
        }
        return response()->json([
            'message' => 'Não foram encontrados Anuncios!',
            'error' => false,
            'object' => null
        ],404);
    }
    
}
