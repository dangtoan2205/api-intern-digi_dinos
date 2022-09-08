<?php

namespace Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
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
            'title_vi' => 'required|max:50|unique:category_post',
            'title_ja' => 'required|max:50|unique:category_post',
            'title_en' => 'required|max:50|unique:category_post',
            // 'location' => 'required|min:1|integer',
        ];
    }
}
