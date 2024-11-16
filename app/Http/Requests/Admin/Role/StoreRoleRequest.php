<?php

namespace App\Http\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
            'name'  => 'required',
            'label' => 'required',
        ];
    }

    public function message()
    {
        return [
            'name.required'  => __('backend.validation_message.name_en'),
            'label.required' => __('backend.validation_message.label_en'),
        ];
    }

    public function prepareForValidation(){

        $permissions         = $this->permissions ? array_map('intval', $this->permissions, []) : [];
    
        $this->merge([
            'permissions'         => $permissions,
        ]);

    }
}
