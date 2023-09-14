<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServicoFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:80|min:5',
            'descricao' => 'required|max:200|min:10',
            'duracao' => 'required',
            'preco' => 'required'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'sucess' => false,
            'error' =>$validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'nome.required'=> 'O campo nome é obrigatorio',
            'nome.max'=> 'O campo nome deve conter no maximo 80 caracteres',
            'nome.min'=> 'O campo nome deve conter no minimo 5 caracteres',
            'descricao.required'=> 'Descricao obrigatoria',
            'descricao.max'=> 'A descricao deve conter no maximo 200 caracteres',
            'descricao.min'=> 'A descricao deve conter no minimo 10 caracteres',
            'duracao.required'=> 'Duracao obrigatoria',
            'preco.required'=> 'Preco obrigatorio'
        ];
    }
}
