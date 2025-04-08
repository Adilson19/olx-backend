<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class SignInRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            //  Regras de Login
            'email'=> 'required|email|max:255',
            'password'=>'required|min:3|max:255'
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json(
            [
                    'error' => array_values($validator->errors()->getMessages())
                ]
            )
        );

    }
}
