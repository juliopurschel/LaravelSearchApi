<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name'       => 'required',
            'cpf'        => 'required|max:14|min:14',
            'telefone'   => 'required|max:15|min:14',
            'cep'        => 'required|max:8|min:8',
            'cidade'     => 'required',
            'estado'     => 'required',
            'bairro'     => 'required',
            'endereco'   => 'required' 
        ];
    }
}
