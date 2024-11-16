<?php

namespace App\Http\Requests\Admin\FaqCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqCategoryRequest extends FormRequest
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
            'name_en'   => 'required',
            'name_tc' => 'required',
            'icon'   => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name_en.required'   => __('backend.validation_message.title_en'),
            'name_tc.required' => __('backend.validation_message.title_tc'),
            'icon.required'   => __('backend.validation_message.icon')
        ];
    }
}
