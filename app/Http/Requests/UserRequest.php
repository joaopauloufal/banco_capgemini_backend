<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:120',
            'email' => 'required|unique:users,email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/',
            'password' => 'required_without:id|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome é obrigatório.',
            'name.max' => 'O campo Nome deve possuir no máximo 120 caracteres.',


            'email.required' => 'O campo E-mail é obrigatório.',
            'email.unique' => 'Esse endereço de E-mail já foi cadastrado! Verifique.',
            'email.regex' => 'O E-mail precisa estar no padrão (aaaa@aaa.com).',

            'password.required_without' => 'O campo Senha é obrigatório.',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
            'password.confirmed' => 'A senha e a confirmação não conferem. Verifique.'
        ];
    }
}
