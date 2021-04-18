<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Models\userModel;
use Auth;
use Exception;
use App\Helpers\Hutils;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Mail\resetPassword;

class JWTAuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register','sendPasswordReset']]);
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
            ],422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json([
                'message'=>'Erro ao fazer login , Revise o e-mail e senha inseridos , e tente novamente!',
                'error'=>true
            ],401); // tratar a exception de erro de senha errada. Hutils::makeResponse('Erro ao fazer login , tente novamente! ',true), 401
        }
        // dd($token);
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


    public function sendPasswordReset(Request $request)
    {
        if( $this->isEmailRegistered($request->email) ){
            // Criar o token para utilizar uma vez.

        }
    }


    /**
     * Se o e-mail existir no banco retorna true.
     * @param Object
     * @return Boolean
     */
    public function isEmailRegistered($email)
    {
        $email = User::where('email',$email)->first('email');
        if($email){
           return true;
        }
        return false;
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
        $userName = userModel::getUserName();
        return response()->json([
            'message'=>'Login efetuado com sucesso!',
            'user'=> $userName->name,
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
