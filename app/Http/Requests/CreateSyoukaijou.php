<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSyoukaijou extends FormRequest
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
            'title' => 'required',
            'main' => 'required',
            'spotname' => 'required',
            'image1' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image1.required' => 'スポットビューには、画像が１枚必須です。',
        ];
    }
}
