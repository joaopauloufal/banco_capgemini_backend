<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaSaldoRequest extends FormRequest
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
            'id' => 'required|exists:contas,id'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'É obrigatório informar a Conta.',
            'id.exists' => 'A conta informada não existe em nossos registros.',
        ];
    }
}
