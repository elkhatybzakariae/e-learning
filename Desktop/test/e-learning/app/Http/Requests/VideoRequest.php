<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'aboutVideo' => 'required|string|max:100',
            'lien' => 'required|string|max:100',
            'id_Sess' => 'required|exists:sessions,id_Sess',
        ];
        
    }
    public function messages()
    {
        return [
            'title.required' => 'The title  is required.',
            'aboutVideo.required' => 'required.',
            'lien.required' => 'required.',
            'id_Sess.required' => 'The Session select is required.',
        ];
    }
}
