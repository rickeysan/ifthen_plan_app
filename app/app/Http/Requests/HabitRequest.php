<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitRequest extends FormRequest
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
            'category_id'=>'required',
            'purpose'=>'required|max:255',
            'task'=>'required|max:255',
            'begin_date'=>'required',
            'finish_date'=>'required|after:begin_date',
            'plan_text'=>'required|max:60',
        ];
    }
}
