<?php

namespace Modules\Admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Admin\Models\Menu;

class RoleResource extends JsonResource
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
            'name' => $this->name,
            'guard_name' => $this->guard_name,
            'menus' => Menu::with('menus')->get(),
        ];
    }
}
