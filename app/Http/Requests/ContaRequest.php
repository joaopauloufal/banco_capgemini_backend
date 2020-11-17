<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContaRequest extends FormRequest
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
            'cliente_id' => 'required',
            'agencia_id' => 'required',
            'numero' => ['required','max:120',Rule::unique('contas')->where(function ($query) {
                return $query->where('tipo', request()->tipo)->where('agencia_id', request()->agencia_id)
                    ->where('numero', request()->numero);
                })->ignore(request()->id)
            ],
            'tipo' => 'required|in:corrente,poupanca|max:8',
            'saldo' => 'required|regex:/^\d{1,3}(?:\.\d{3})*?,\d{2}$/',
        ];
    }

    public function messages()
    {
        return [
            'cliente_id.required' => 'É obrigatório informar o Cliente.',
            'agencia_id.required' => 'É obrigatório informar a Agência.',

            'numero.required' => 'É obrigatório informar o Número da Conta.',
            'numero.max' => 'O campo Número da Conta deve ter no máximo 120 caracteres.',
            'numero.max' => 'Já existe uma conta cadastrada para esse Número/Agência/Tipo de Conta! Verifique.',

            'tipo.required' => 'É obrigatório informar o Tipo da Conta.',
            'tipo.in' => 'As opções disponíveis são: Conta corrente ou Conta poupança.',
            'tipo.max' => 'O campo Tipo de Conta deve ter no máximo 8 caracteres.',

            'saldo.required' => 'É obrigatório informar o saldo.',
            'saldo.regex' => 'O formato para o campo Saldo deve estar no formato (0,00).'
        ];
    }
}
