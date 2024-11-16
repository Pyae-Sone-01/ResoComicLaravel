<?php

namespace App\Http\Requests\Admin\Page;

use App\Helpers\AdminHelper;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
            'type'     => 'required',
            'banner_image' => 'required'
        ];
    }

    public function withValidator($validator)
    {
        $this->mergeBannerImage($validator);
        $this->mergeMetaImage($validator);
    }


    private function mergeBannerImage($validator)
    {
        if (!is_null($this->banner_image)) {
            $banner_image_path = AdminHelper::storageFileExist($this->banner_image);

            $validator->after(function ($validator) use ($banner_image_path) {
                if (is_null($banner_image_path)) {
                    $validator->errors()->add('banner_image', 'Invalid Banner Image Path.');
                }
            });

            $this->merge([
                'banner_image' => $banner_image_path,
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
