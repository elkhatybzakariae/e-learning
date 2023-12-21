<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SousCategorieRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'SCatName' => 'required|string|max:100',
            'id_Cat' => 'required|exists:categories,id_Cat',
        ];
    }
    public function messages()
    {
        return [
            'SCatName.required' => 'The subcategory name is required.',
            'id_Cat.required' => 'The category select is required.',
        ];
    }
}
