<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $rule =  [
            'title' => 'required|min:10'
        ];

        return $rule;
    }

    public function messages()
    {
        return [
            'title.required' => 'Обязательно заполни поле',
            'title.min' => 'не меньше :min'
        ];
    }
}
