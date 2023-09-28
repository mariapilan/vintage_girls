<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfissionalFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'nome' => 'required|max:120|min:5',
            'celular' => 'required|max:11|min:10',
            'email' => 'required|email|max:120|',
            'cpf' => 'required|max:11|min:11',
            'dataNascimento' => 'required',
            'cidade' => 'required|max:120|',
            'estado' => 'required|max:2|min:2',
            'pais' => 'required|max:80|',
            'rua' => 'required|max:120|',
            'numero' => 'required|max:10|',
            'bairro' => 'required|max:100',
            'cep' => 'required|max:8|min:8|',
            'complemento' => 'max:150|',
            'senha' => 'required',
            'salario' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'sucess' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatorio',
            'nome.max' => 'O campo nome deve conter no maximo 120 caracteres',
            'nome.min' => 'O campo nome deve conter no minimo 5 caracteres',

            'celular.required' => 'O campo celular é obrigatorio',
            'celular.max' => 'O campo celular deve conter no maximo 200 caracteres',
            'celular.min' => 'O campo celular deve conter no minimo 10 caracteres',

            'email.required' => 'O campo email é obrigatorio',
            'email.max' => 'O campo email deve conter no maximo 120 caracteres',

            'cpf.required' => 'O campo cpf é obrigatorio',
            'cpf.max' => 'O campo cpf deve conter no maximo 11 caracteres',
            'cpf.min' => 'O campo cpf deve conter no minimo 11 caracteres',

            'dataNascimento.required' => 'O campo data de nascimento é obrigatorio',

            'cidade.required' => 'O campo cidade é obrigatorio',
            'cidade.max' => 'O campo cidade deve conter no maximo 120 caracteres',

            'estado.required' => 'O campo estado é obrigatorio',
            'estado.max' => 'O campo estado deve conter no maximo 2 caracteres',
            'estado.min' => 'O campo estado deve conter no minimo 2 caracteres',

            'pais.required' => 'O campo pais é obrigatorio',
            'pais.max' => 'O campo pais deve conter no maximo 80 caracteres',

            'rua.required' => 'O campo rua é obrigatorio',
            'rua.max' => 'O campo rua deve conter no maximo 120 caracteres',

            'numero.required' => 'O campo numero é obrigatorio',
            'numero.max' => 'O campo numero deve conter no maximo 10 caracteres',

            'bairro.required' => 'O campo bairro é obrigatorio',
            'bairro.max' => 'O campo bairro deve conter no maximo 100 caracteres',

            'cep.required' => 'O campo cep é obrigatorio',
            'cep.max' => 'O campo cep deve conter no maximo 8 caracteres',
            'cep.min' => 'O campo cep deve conter no minimo 8 caracteres',

            'complemento.max' => 'O campo complemento deve conter no maximo 150 caracteres',

            'senha.required' => 'O campo senha é obrigatorio',

            'salario.required' => 'O campo salario é obrigatorio',
        ];
    }
};
