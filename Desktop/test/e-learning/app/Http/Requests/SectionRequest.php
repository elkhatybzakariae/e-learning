<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'Sec_Name' => 'required|string|max:100',
            'id_C' => 'required|integer|exists:cours,id_C',
        ];
    }
    public function messages()
    {
        return [
            'Sec_Name.required' => 'The title  is required.',
            'id_C.required' => 'The cour select is required.',
        ];
    }
}
