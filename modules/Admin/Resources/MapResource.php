<?php

namespace Modules\Admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class MapResource extends JsonResource
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
            'title_vi' => $this->title_vi,
            'title_en' => $this->title_en,
            'title_ja' => $this->title_ja,
            'image_url' => $this->image_url ? URL::to('image/'.$this->image_url) : null,
            'status' => $this->status,
        ];
    }
}
