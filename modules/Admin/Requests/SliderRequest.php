<?php

namespace Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        if (!$this->id) {
            return [
                'title_vi' => 'required|max:50',
                'title_en' => 'required|max:50',
                'title_ja' => 'required|max:50',
                'status' => 'required|integer',
                'image_url' => [
                    'required',
                    'image',
                    'mimes:jpeg,png',
                    'mimetypes:image/jpeg,image/png',
                    'max:2048',
                ],
            ];
        } else {
            return [
                'title_vi' => 'required|max:50',
                'title_en' => 'required|max:50',
                'title_ja' => 'required|max:50',
                'status' => 'required|integer',
            ];
        }
    }
}
