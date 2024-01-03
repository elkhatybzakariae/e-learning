<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
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
            'certificateName' => 'required|string|max:100',
            // 'id_C' => 'required|exists:cours,id_C',
        ];
    }
    public function messages()
    {
        return [
            'certificateName.required' => 'The certificate Name  is required.',
            // 'id_C.required' => 'The Cour select is required.',
        ];
    }
}
