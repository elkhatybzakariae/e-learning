<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
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
            'Sess_Name' => 'required|string|max:100',
            'id_Sec' => 'required|exists:sections,id_Sec',
        ];
    }
    public function messages()
    {
        return [
            'Sess_Name.required' => 'The title  is required.',
            'id_Sec.required' => 'The Section select is required.',
        ];
    }
}
