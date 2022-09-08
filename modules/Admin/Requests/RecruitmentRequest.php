<?php

namespace Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecruitmentRequest extends FormRequest
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
            'title_vi' => 'required|min:3|max:50|string',
            'title_en' => 'required|max:50|min:3|string',
            'title_ja' => 'required|max:50|min:3|string',
            'des_vi' => 'required|min:50|max:5000',
            'des_en' => 'required|min:50|max:5000',
            'des_ja' => 'required|min:50|max:5000',
            'post_date' => 'required|date',
            'expired_date' => 'required|date',
            'salary' => 'required',
            'status' => 'required|integer',
            'recruitment_position_id' => 'required|integer',
        ];
    }
}
