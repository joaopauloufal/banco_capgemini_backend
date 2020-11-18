<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgenciaRequest extends FormRequest
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
            'numero' => 'required|max:50'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome é obrigatório.',
            'nome.max' => 'O campo Nome deve ter no máximo 200 caracteres.',

            'numero.required' => 'O campo Número da Agência é obrigatório.',
            'numero.max' => 'O campo Número da Agência deve ter no máximo 50 caracteres.',
        ];
    }
}
