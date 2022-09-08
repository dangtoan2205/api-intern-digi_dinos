<?php

namespace Modules\Admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Admin\Models\Menu;

class SliderResource extends JsonResource
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
            'title_ja' => $this->title_ja,
            'title_en' => $this->title_en,
            'image_url' => $this->image_url,
            'status' => $this->status,
            'menus' => Menu::with('menus')->get(),
        ];
    }
}
