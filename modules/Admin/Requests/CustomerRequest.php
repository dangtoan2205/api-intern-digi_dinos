<?php

namespace Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the admin is authorized to make this request.
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
            'title_vi' => 'required',
            'title_en' => 'required',
            'title_ja' => 'required',
            'image' => 'image',
            'is_active' => 'required',
        ];
    }
}
