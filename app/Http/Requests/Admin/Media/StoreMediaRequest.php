<?php

namespace App\Http\Requests\Admin\Media;

use App\Helpers\AdminHelper;
use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
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
            'title_en' => 'required',
            'title_tc' => 'required',
            'description_en' => 'required',
            'description_tc' => 'required',
            'image'         => 'required'
        ];
    }


    public function withValidator($validator)
    {
        $this->mergeLink($validator);
        $this->mergeFile($validator);

    }


    private function mergeLink($validator)
    {
        $rule = "";
        if (((!is_null($this->file)) && ($this->file != "")) && ((!is_null($this->link)) && ($this->link != ""))) {

            $validator->after(function ($validator) {
                if (!is_null(request()->link)) {
                    $validator->errors()->add('link', 'The link field is required only if the file field is not filled.');
                }
            });

            $this->merge([
                'link' => $rule,
            ]);
        }
    }



    private function mergeFile($validator)
    {
        $rule = "";
        if (((!is_null($this->file)) && ($this->file != "")) && ((!is_null($this->link)) && ($this->link != ""))) {

            $validator->after(function ($validator) {
                if (!is_null(request()->file)) {
                    $validator->errors()->add('file', 'The file field is required only if the link field is not filled.');
                }
            });

            $this->merge([
                'file' => $rule,
            ]);
        }
    }

}
