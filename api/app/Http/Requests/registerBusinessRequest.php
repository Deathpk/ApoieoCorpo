<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class registerBusinessRequest extends FormRequest
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
            'Ramo' => 'required|string',
            'nomeEstabelecimento'=> 'required|string|max:40',
            'Descricao'=> 'required|string|min:15|max:150',
            'Estado'=> 'required|string',
            'Cidade'=> 'required|string',
            'Contato'=> 'required|numeric',
            'Instagram'=>'nullable',
            'Facebook'=> 'nullable',
            'WhatsApp'=> 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'Ramo.required' => 'O campo Ramo é obrigatório.',
            'Ramo.string' => 'O campo Ramo deve ser do tipo string.',

            'nomeEstabelecimento.required' => 'O campo Nome Estabeleciomento é obrigatório.',
            'nomeEstabelecimento.string' => 'O campo Nome Estabeleciomento deve ser do tipo string.',
            'nomeEstabelecimento.max' => 'O campo Nome Estabeleciomento deve conter no máximo 40 caracteres.',

            'Descricao.required' => 'O campo Descrição é obrigatório.',
            'Descricao.string' => 'O campo Descrição deve ser do tipo  string.',
            'Descricao.min' => 'O campo Descrição deve conter no mínimo 15 caracteres.',
            'Descricao.max' => 'O campo Descrição deve conter no máximo 150 caracteres.',

            'Estado.required' => 'O campo Estado é obrigatório.',
            'Estado.string' => 'O campo Estado deve ser do tipo string.',

            'Cidade.required' => 'O campo Cidade é obrigatório.',
            'Cidade.string' => 'O campo Cidade deve ser do tipo string.',

            'Contato.required' => 'O campo Contato é obrigatório.',
            'Contato.numeric' => 'O campo Contato deve ser do tipo numérico.'
        ];

    }
}
