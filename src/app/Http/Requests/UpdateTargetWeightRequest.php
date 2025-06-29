<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTargetWeightRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'target_weight' => [
                'required',
                'regex:/^\d{1,4}(\.\d)?$/',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.regex' => '小数点は1桁で4桁までの数字で入力してください',
        ];
    }
}