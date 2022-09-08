<?php

namespace Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleImageRequest extends FormRequest
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
            'module_id' => 'required|integer',
            'name_vi' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ja' => 'required|string|max:255',
            'status' => 'required',
            'image_url' => 'max:10000',
        ];
    }
}
