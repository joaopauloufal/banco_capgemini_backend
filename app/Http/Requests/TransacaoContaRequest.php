<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransacaoContaRequest extends FormRequest
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
            'id' => 'required|exists:contas,id',
            'valor' => 'required|regex:/^\d{1,3}(?:\.\d{3})*?,\d{2}$/'
        ];
    }

    public function messages()
    {
        return [

            'id.required' => 'É obrigatório informar a Conta',
            'id.exists' => 'A conta informada não existe em nossos registros.',

            'valor.required' => 'É obrigatório informar o valor para o depósito.',
            'valor.regex' => 'O formato para o campo Valor deve estar no formato (0,00).',

        ];
    }
}