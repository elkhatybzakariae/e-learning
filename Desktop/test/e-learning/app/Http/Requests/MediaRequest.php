<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
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
            'mediaName' => 'required|string|max:100',
            'path' => 'required',
            'id_V' => 'required|exists:Videos,id_V',
        ];
    }
    public function messages()
    {
        return [
            'mediaName.required' => 'The media Name  is required.',
            'path.required' => 'The file  is required.',
            'id_V.required' => 'The video select is required.',
        ];
    }
}
