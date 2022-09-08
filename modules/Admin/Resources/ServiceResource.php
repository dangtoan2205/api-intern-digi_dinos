<?php

namespace Modules\Admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param mixed $request Request.
     *
     * @return mixed
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
            'title_vi' => $this->title_vi,
            'title_en' => $this->title_en,
            'title_ja' => $this->title_ja,
            'name_vi' => $this->name_vi,
            'name_en' => $this->name_en,
            'name_ja' => $this->name_ja,
            'des_vi' => $this->des_vi,
            'des_en' => $this->des_en,
            'des_ja' => $this->des_ja,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
