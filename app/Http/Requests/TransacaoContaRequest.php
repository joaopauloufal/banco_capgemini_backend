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

            'valor.required' => 'É obrigatório informar o valor.',
            'valor.regex' => 'O formato para o campo Valor tem que estar no formato R$ 0,00 e ser maior do que zero.',
        ];
    }
}
