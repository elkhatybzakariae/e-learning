<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourRequest extends FormRequest
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
            'title' => 'required|string|max:100',
            'info' => 'required|string|max:100',
            'description' => 'nullable|string|max:100',
            'Prerequisites' => 'nullable|string|max:100',
            'price' => 'required|string|max:100',
            'coupon' => 'nullable|string|max:100',
            'id_Sj' => 'required|exists:sujets,id_Sj',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The title  is required.',
            'info.required' => 'The info  is required.',
            'price.required' => 'The price  is required.',
            'id_Sj.required' => 'The sujet select is required.',
        ];
    }
}
