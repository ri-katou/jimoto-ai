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
            'title' => 'required|max:40',
            'main' => 'required|max:1000',
            'spotname' => 'required|max:40',
            'image1' => 'required',
            'addles' => 'nullable|max:255',
            'url' => 'nullable|url|max:255',
            'search' => 'max:100'
        ];
    }

    public function messages()
    {
        return [
            'image1.required' => 'スポットビューには、画像が１枚必須です。',
        ];
    }
}
