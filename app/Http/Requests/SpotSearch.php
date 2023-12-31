<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpotSearch extends FormRequest
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
            'search' => 'min:2|max:50'
        ];
    }

    public function messages()
    {
        return [
            'search.max' => '50文字以下で検索してください。',
            'search.min' => '2文字以上で検索してください。',
        ];
    }
}
