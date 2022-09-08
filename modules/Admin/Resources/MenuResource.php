<?php

namespace Modules\Admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Admin\Models\Menu;

class MenuResource extends JsonResource
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
            'title' => $this->title,
            'link' => $this->link,
            'icon' => $this->icon,
            'parent_id' => $this->parent_id,
            'position' => $this->position,
            'parent' => $this->parent_id != 0 ? $this->parent->title : null,
        ];
    }
}
