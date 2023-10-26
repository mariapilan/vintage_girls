<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaFormRequest extends FormRequest
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
            'profissional_id' => 'required',
            'clinte_id' => 'required',
            'servico_id' => 'required',
            'data_hora' => 'required',
            'tipo_pagamento' => 'required|max: 20|min: 3',
            'valor' => 'required'
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
           'success'=>false,
           'error'=>$validator->errors()
        ]));
      }
      public function messages(){
       return [
        'nome.required'=>'O campo nome é obrigatorio',
        'data_hora.required'=>'O campo data/hora é obrigatorio',
        'tipo_pagamento.required'=>'O campo tipo de pagamento é obrigatorio',
        'tipo_pagamento.max'=>'O maximo é 20 caracteres',
        'tipo_pagamento.min'=>'É obrigatorio no minimo 3 caracteres',
        'valor.required'=>'O valor é obrigatorio'

       ];
}
}