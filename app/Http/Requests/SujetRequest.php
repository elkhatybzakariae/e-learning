<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SujetRequest extends FormRequest
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
            'SjName' => 'required|string|max:100',
            'id_SCat' => 'required|exists:sous_categories,id_SCat',
        ];
    }
    public function messages()
    {
        return [
            'SjName.required' => 'The suject name is required.',
            'id_SCat.required' => 'The subcategory select is required.',
        ];
    }
}
