<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
            'new_pass' => 'required | min:8 | confirmed',
            'new_pass_confirmation' => 'required',
            'current_pass' => ['required',
            function($attribute, $value, $fail){
                if(!Hash::check($value, Auth::user()->password)){
                    logger('パスワードが違います');
                    $fail('現在のパスワードが違います');
                }}],
        ];
    }

    // public function withValidator(Validator $validator) {
    //     $validator->after(function($validator) {
    //         dd('withValidatorです');
    //         dd($validator);
    //     });
    // }
}
