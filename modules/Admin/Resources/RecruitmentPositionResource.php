<?php

namespace Modules\Admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecruitmentPositionResource extends JsonResource
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
            'name_vi' => $this->name_vi,
            'name_en' => $this->name_en,
            'name_ja' => $this->name_ja,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
