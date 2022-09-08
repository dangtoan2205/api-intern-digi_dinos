<?php

namespace Modules\Admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecruitmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param mixed $request Request.
     * @return array \Illuminate\Contracts\Support\Arrayable\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'recruitment_position_id' => $this->recruitment_position_id,
            'recruitment_position' => $this->recruitment_position->name_vi,
            'title_vi' => $this->title_vi,
            'title_en' => $this->title_en,
            'title_ja' => $this->title_ja,
            'salary' => $this->salary,
            'post_date' => $this->post_date,
            'expired_date' => $this->expired_date,
            'des_vi' => $this->des_vi,
            'des_en' => $this->des_en,
            'des_ja' => $this->des_ja,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
