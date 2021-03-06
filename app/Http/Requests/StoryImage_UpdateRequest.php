<?php

namespace emutoday\Http\Requests;

use emutoday\Http\Requests\Request;

class StoryImage_UpdateRequest extends Request
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
      'is_active' => 'boolean',
      'is_featured' => 'boolean',
      'image' => 'mimes:jpeg,jpg,bmp,png | max:1000'
  ];
    }
}
