<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestQuestionRequest extends FormRequest
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
        // dd($_REQUEST);
        return [
            'question' => 'required|string|max:100',
            'responses.*.response_text' => 'required|string',
            'responses.*.is_true' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'question.required' => 'The question is required.',
        ];
    }
}
