<?php

namespace Modules\Admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'title_vi' => $this->title_vi,
            'title_en' => $this->title_en,
            'title_ja' => $this->title_ja,
            'image' => $this->image,
            'is_active' => $this->is_active,
        ];
    }
}
