<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class Game_ssj2sUpdateRequest extends FormRequest
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
            //'title' => 'required|max:50',
            //'description' => 'required|max:255',
            //'user_id' => 'required|exists:users,id'
        ];
    }
    /*public function messages(){
        return [
            'title.required' => 'O titulo é obrigatório',
            'title.max' => 'Titulo com número inválido de caracteres',

            'description.required' => 'A descrição é obrigatória',
            'description.max' => 'Descrição com número inválido de caracteres',
        ];
    }*/
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'status' => 422,
                    'data' => $validator->errors(),
                    'msg' => 'Erro de Validação.'
                ], 422
            )
        );
    }
}
