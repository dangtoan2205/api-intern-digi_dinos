<?php

namespace Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
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
            'name_vi' => 'required|min:3|max:50',
            'name_en' => 'required|max:50|min:3',
            'name_ja' => 'required|max:50|min:3',
        ];
    }
}
