<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Contracts\Validation\Validator;

class ChangePasswordRequest extends FormRequest
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
            'current_pass'=>'required | min:8',
            'new_pass'=>'required | min:8 | confirmed',
        ];
    }

    // public function withValidator(Validator $validator) {
    //     $validator->after(function($validator) {
    //         dd('withValidatorです');
    //         dd($validator);
    //     });
    // }
}
