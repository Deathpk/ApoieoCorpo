<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBusinessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()){
            return true;
           }
           return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            //Regras de Validação
            'nomeEstabelecimento'=>'required|min:1|max:50',
            'Descricao'=>'required|min:10|max:255',
            'Contato'=>'required|min:8|max:50',
            'Link'=>'max:100',
        ];
    }

    public function messages(){
        return [
                 //Exceções nomeEstabelecimento
                 'nomeEstabeleciomento.required'=>'O campo Nome é obrigatório!',
                 'nomeEstabeleciomento.min'=>'O campo Nome deve conter no minimo 1 caractere',
                 'nomeEstabeleciomento.max'=>'O campo Nome deve conter no máximo 50 caracteres',

            //Exceções Descricao
            'Descricao.required'=>'O campo Descrição é obrigatório!',
            'Descricao.min'=>'O campo Descrição deve conter no mínimo 10 caracteres',
            'Descricao.max'=>'O campo Descrição deve conter no máximo 255 caracteres',

             //Exceções Contato
            'Contato.required'=>'O campo Contato é obrigatório!',
            'Contato.min'=>'O campo Contato deve conter no mínimo 8 Caracteres',
            'Contato.max'=>'O campo Contato deve conter no máximo 50 Caracteres',

            //Exceções Link
            'Link.max'=>'O campo Link para contato deve conter no máximo 100 Caracteres ',

        ];
    }
}
