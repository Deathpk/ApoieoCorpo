<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class sendContactMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|min:2|max:161',
            'email' => 'required|email',
            'mensagem' => 'required|min:10|max:250'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome só aceita letras.',
            'nome.min' => 'O campo nome deve conter no minimo 2 caracteres.',
            'nome.max' => 'O campo mensagem deve conter no máximo 161 caracteres.',

            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Insira um endereço de e-mail válido.',

            'mensagem.required' => 'O campo mensagem é obrigatório.',
            'mensagem.min' => 'O campo mensagem deve conter no minimo 10 caracteres.',
            'mensagem.max' => 'O campo mensagem deve conter no máximo 250 caracteres.'
        ];
    }
}
