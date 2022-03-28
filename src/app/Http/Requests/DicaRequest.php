<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DicaRequest extends FormRequest
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
            'nome' => 'required|max:100',
            'veiculo_id' => 'required',
            'marca' => 'required|max:100',
            'modelo' => 'required|max:100',
            'versao' => 'max:100',
            'descricao' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'nome.max' => 'O tamanho máximo do nome é 100 caracteres',
            'marca.required' => 'A marca é obrigatória',
            'marca.max' => 'O tamanho máximo da marca é 100 caracteres',
            'modelo.required' => 'O modelo é obrigatório',
            'modelo.max' => 'O tamanho máximo do modelo é 100 caracteres',
            'versao.max' => 'O tamanho máximo da versao é 100 caracteres',
            'descricao.required' => 'A dica é obrigatória',
            'veiculo_id.required' => 'O tipo é obrigatório',
        ];
    }
}
