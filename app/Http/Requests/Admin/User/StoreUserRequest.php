<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'     => 'required',
            'email'    => "required|string|max:255|email|unique:users,email,{$this->user}",
            'password' => 'required|min:6',
            'roles'    => 'required',
        ];
    }

    public function messages()
    {
        return [

            'name.required'     => __('backend.validation_message.name'),
            'email.required'    => __('backend.validation_message.email'),
            'email.unique'      => __('backend.validation_message.email_unique'),
            'password.required' => __('backend.validation_message.password'),
            'roles.required'    => __('backend.validation_message.roles'),

        ];
    }

    public function prepareForValidation(){

        $roles         = $this->roles ? array_map('intval', $this->roles, []) : [];
    
        $this->merge([
            'roles'         => $roles,
        ]);

    }
}
