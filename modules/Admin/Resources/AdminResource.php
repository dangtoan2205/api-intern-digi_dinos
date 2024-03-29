<?php

namespace Modules\Admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Admin\Models\Menu;

class AdminResource extends JsonResource
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
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password,
            'avatar_url' => $this->avatar_url,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'is_active' => $this->is_active,
            'menus' => Menu::with('menus')->where('parent_id', 0)->get(),
        ];
    }
}
