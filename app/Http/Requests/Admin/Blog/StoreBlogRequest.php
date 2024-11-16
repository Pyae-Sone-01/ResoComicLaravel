<?php

namespace App\Http\Requests\Admin\Blog;

use App\Helpers\AdminHelper;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'title_en.required'   => __('backend.validation_message.title_en'),
            'title_tc.required'   => __('backend.validation_message.title_tc'),
        ];
    }

    public function withValidator($validator)
    {
        $this->mergeBlogImage($validator);
        $this->mergeMetaImage($validator);
    }

    private function mergeBlogImage($validator)
    {
        if (!is_null($this->image_order)) {
            $data = [];
            foreach ($this->image_order as $image) {

                $file_path = AdminHelper::storageFileExist($image);

                $validator->after(function ($validator) use ($file_path) {
                    if (!$file_path) {
                        $validator->errors()->add('image', 'Invalid image path.');
                    }
                });
                $data[] = $file_path;
            }

            $this->merge([
                'gallery_images' => json_encode($data),
            ]);
        }
    }

    private function mergeMetaImage($validator)
    {
        if (!is_null($this->meta_image)) {
            $meta_image_path = AdminHelper::storageFileExist($this->meta_image);

            $validator->after(function ($validator) use ($meta_image_path) {
                if (is_null($meta_image_path)) {
                    $validator->errors()->add('meta_image', 'Invalid Meta Image Path.');
                }
            });

            $this->merge([
                'meta_image' => $meta_image_path,
            ]);
        }
    }
}
