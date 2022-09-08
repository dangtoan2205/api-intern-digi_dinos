<?php

namespace Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            // 'image' => 'required|image|mimes:jpeg,png|mimetypes:image/jpeg,image/png|max:2048',
            'title_vi' => 'required|max:50',
            'title_en' => 'required|max:50',
            'title_ja' => 'required|max:50',
            'name_vi' => 'required|max:70',
            'name_en' => 'required|max:70',
            'name_ja' => 'required|max:70',
            'des_vi' => 'required',
            'des_en' => 'required',
            'des_ja' => 'required',
        ];
    }
}
