<?php

namespace emutoday\Http\Requests;

use emutoday\Http\Requests\Request;

class StoryImage_StoreRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'image_name' => 'alpha_num | required | unique:story_images',
          'is_active' => 'boolean',
          'is_featured' => 'boolean',
          'image' => 'required | mimes:jpeg,jpg,bmp,png | max:1000'
        ];
    }
}
