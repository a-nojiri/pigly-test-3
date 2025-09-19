<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStep2Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'current_weight' => ['required', 'numeric', 'between:0,9999.9'],
            'target_weight'  => ['required', 'numeric', 'between:0,9999.9'],
        ];
    }

    public function messages(): array
    {
        return [
            'current_weight.required' =>'現在の体重を入力してください',
            'current_weight.between'  => '4桁までの数字で入力してください',
            'current_weight.numeric'  => '小数点は1桁で入力してください',

            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.between'  => '4桁までの数字で入力してください',
            'target_weight.numeric'  => '小数点は1桁で入力してください',
        ];
    }
}
