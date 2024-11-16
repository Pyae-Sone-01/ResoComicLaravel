<?php

namespace App\Http\Requests\Admin\Faq;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
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
            "title_en" => "required",
            "description_en" => "required",
            "title_tc" => "required",
            "description_tc" => "required",
            "faq_category_id" => "required"
        ];
    }

    public function messages()
    {
        return [
            'faq_category_id.required'   => 'The FAQ category is required.',
        ];
    }
}
