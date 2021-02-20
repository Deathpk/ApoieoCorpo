<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class updateUserInformationRequest extends FormRequest
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
            'name' => 'nullable|between:3,100',
            'email'=> 'nullable|email|unique:users|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.between' => 'O campo Nom deve conter entre 3 e 100 caracteres.',
            
            'email.email' => 'O campo Email deve ser um e-mail valido.',
            'email.unique' => ' Já existe um e-mail cadastrado com esse endereço.',
            'email.max' => 'O campo Email deve conter no máximo 50 caracteres'
        ];
    }
}
