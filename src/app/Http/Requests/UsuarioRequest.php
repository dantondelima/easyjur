<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'nome' => 'required',
                    'email' => 'required|email:rfc,dns|unique:usuarios,email',
                    'password' => 'required|confirmed',
                ];
            }
            case 'PUT':
            {
                return [
                    'nome' => 'required',
                    'email' => 'required|unique:usuarios,email,' . $this->usuario->id,
                    'password' => 'confirmed',
                ];
            }
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.unique' => 'Email já cadastrado',
            'email.email' => 'Email precisa ser válido',
            'password.required' => 'A senha é obrigatória',
            'password.confirmed' => 'Senhas não conferem'
        ];
    }
}
