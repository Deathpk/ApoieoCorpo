<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoredoRegisterRequest extends FormRequest
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
            //Regras de Validação
            'nomeEstabelecimento'=>'required|min:1|max:50',
            'Descricao'=>'required|min:10|max:255',
            'Ramo'=>'required',
            'Estado'=>'required',
            'Cidade'=>'required|min:1|max:50',
            'Contato'=>'required|min:8|max:50',
        ];
    }

    public function messages()
    {
        return[
            //Exceções nomeEstabelecimento
            'nomeEstabeleciomento.required'=>'O campo Nome é obrigatório!',
            'nomeEstabeleciomento.min'=>'O campo Nome deve conter no minimo 1 caractere',
            'nomeEstabeleciomento.max'=>'O campo Nome deve conter no máximo 50 caracteres',

            //Exceções Descricao
            'Descricao.required'=>'O campo Descrição é obrigatório!',
            'Descricao.min'=>'O campo Descrição deve conter no mínimo 10 caracteres',
            'Descricao.max'=>'O campo Descrição deve conter no máximo 255 caracteres',

            //Exceções Ramo
            'Ramo.required'=>'A opção Ramo é obrigatório!',
            
            //Exceções Estado
            'Estado.required'=>'A opção Estado é obrigatório!',
            
            //Exceções Cidade
            'Cidade.required'=>'O campo Cidade é obrigatório!',
            'Cidade.min'=>'O campo Cidade deve conter no mínimo 1 Caractere',
            'Cidade.max'=>'O campo Cidade deve conter no máximo 50 Caracteres',

            //Exceções Contato
            'Contato.required'=>'O campo Contato é obrigatório!',
            'Contato.min'=>'O campo Contato deve conter no mínimo 8 Caracteres',
            'Contato.max'=>'O campo Contato deve conter no máximo 50 Caracteres',
        ];
    }
}
