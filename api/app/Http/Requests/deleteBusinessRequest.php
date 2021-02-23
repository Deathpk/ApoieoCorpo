<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class deleteBusinessRequest extends FormRequest
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
            'id'=> 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'id.required'=> 'O campo id não pode ser nulo.',
            'id.integer'=> 'O campo id deve ser do tipo numerico'
        ];
    }
}
