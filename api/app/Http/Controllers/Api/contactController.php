<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\sendContactMessageRequest;
use App\Mail\contactMessage;
use Mail;

class contactController extends Controller
{

    public function sendContactMessage(sendContactMessageRequest $request)
    {
        $dadosRemetente = [
            'nome' => $request->nome,
            'email' => strtolower($request->email),
            'mensagem' => $request->mensagem
        ];
        //   return new \App\Mail\contactMessage($dadosRemetente);// Somente para debugar na view...
        Mail::send(new contactMessage($dadosRemetente));

        if(Mail::failures()){
            return response()->json([
                'message' => 'Oops! , erro ao enviar email',
                'error' => true
            ],400);
        }
        return response()->json([
            'message' => 'E-mail enviado com sucesso!',
            'error' => false
        ],200);
    }
    
}
