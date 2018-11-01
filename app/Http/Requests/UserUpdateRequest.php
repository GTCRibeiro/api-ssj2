<?php

namespace App\Http\Requests;

use App;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class UserUpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'A mensagem que quisermos, tipo, o nome é preciso',
            'name.max' => 'Nome com número inválido de caracteres',

            'email.required' => 'Email é obrigatório',
            'email.email' => 'Email introduzido não é válido',
            'email.unique:users' => 'Email não é único',

            'password.required' => 'Password é obrigatória',
            'password.min' => 'Password com tamanho inválido'
        ];
    }
    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(
            response()->json(
            [
                'status' => 422,
                'data'=> $validator->errors(),
                'msg'=> 'Erro de Validação.'
            ], 422
            )
        );


        //throw new ErrorException($validator->errors()->first());
    }
}
