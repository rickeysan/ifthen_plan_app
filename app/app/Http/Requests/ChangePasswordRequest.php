<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Rules\alpha_num_check;

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
            'current_pass' => ['required',
            function($attribute, $value, $fail){
                if(!Hash::check($value, Auth::user()->password)){
                    logger('パスワードが違います');
                    $fail('現在のパスワードが違います');
                }}],
            'new_pass' => ['required','min:8','max:255','confirmed',new alpha_num_check()],
            'new_pass_confirmation' => 'required',
        ];
    }
}
