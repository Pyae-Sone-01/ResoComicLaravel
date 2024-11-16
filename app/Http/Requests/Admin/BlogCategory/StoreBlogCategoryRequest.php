<?php

namespace App\Http\Requests\Admin\BlogCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title_en'   => 'required',
            'title_tc' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title_en.required'   => __('backend.validation_message.title_en'),
            'title_tc.required' => __('backend.validation_message.title_tc')
        ];
    }

}
