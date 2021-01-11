<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Exception;
use App\Helpers\Hutils;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTAuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
    * Register a User.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function register(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required|between:2,100',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|string|min:6',
        ]);
        if($validator->fails()){
            return response()->json([
                'message'=> 'Erro ao validar campos',
                'fields'=> $validator->errors(),
                'error'=> true
            ],401);
        }
        
     try{
        
            $user = User::create([
                'name'=>$request->name,
                'email'=>strtolower($request->email),
                'password'=>bcrypt($request->password)
            ]);

        } catch(Exception $e){
            return response()->json([
                'message'=> 'Erro ao criar usuário' .$e->getMessage(),
                'error'=>true
            ],401); // Hutils::makeResponse('Erro ao criar usuário'.$e->getMessage(),true,),401
        }

        return response()->json([
            'message' => 'Registrado com Sucesso!',
            'user' => $user->only('name','email')
        ], 201);
    }


    /**
    * Get a JWT via given credentials.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function login(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'=>'Erro ao validar campos',
                'fields'=> $validator->errors(),
                'error'=>true
            ],422);//Hutils::makeResponse('Erro ao validar campos',true,$validator->errors()), 422
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json([
                'message'=>'Erro ao fazer login , Revise o e-mail e senha inseridos , e tente novamente!',
                'error'=>true
            ],401); // tratar a exception de erro de senha errada. Hutils::makeResponse('Erro ao fazer login , tente novamente! ',true), 401
        }
        return $this->createNewToken($token);
    }

    /**
    * Log the user out (Invalidate the token).
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Deslogado com sucesso!']);
    }

    /**
    * Get the token array structure.
    *
    * @param  string $token
    *
    * @return \Illuminate\Http\JsonResponse
    */
    protected function createNewToken($token)
    {
        return response()->json([
            'message'=>'Login efetuado com sucesso!',
            'error'=>false,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    /**
    * Refresh a token.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

   
}
