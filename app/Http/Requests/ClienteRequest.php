<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
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
            'nome' => 'required|max:200',
            'cpf' => ['required','max:14','formato_cpf', Rule::unique('clientes')->ignore(request()->id)],
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome é obrigatório.',
            'nome.max' => 'O campo Nome deve ter no máximo 200 caracteres.',

            'nome.required' => 'O campo CPF é obrigatório.',

            'user_id.required' => 'O campo Usuário é obrigatório.',

            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.max' => 'O campo CPF deve possuir no máximo 14 dígitos.',
            'cpf.unique' => 'Já existe um Requerente com esse CPF! Verifique.',
            'cpf.formato_cpf' => 'O campo CPF deve estar no formato XXX.XXX.XXX-XX',
        ];
    }
}
