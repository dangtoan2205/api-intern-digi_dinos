<?php

namespace Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MapRequest extends FormRequest
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
            'title_vi' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ja' => 'required|string|max:255',
        ];
    }
}
