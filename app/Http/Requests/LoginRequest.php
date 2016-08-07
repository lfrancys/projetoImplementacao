<?php

namespace estudo\Http\Requests;

use estudo\Http\Requests\Request;

class LoginRequest extends Request
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
        $rules['emailPessoa'] = 'required | email';
        $rules['senhaPessoa'] = 'required';

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'emailPessoa' => 'Email',
            'senhaPessoa' => 'Senha'
        ];

        return $attributes;
    }
}
