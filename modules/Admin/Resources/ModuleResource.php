<?php

namespace Modules\Admin\Resources;

use http\Env\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param mixed $request Request.
     * @return array\Illuminate\Contracts\Support\Arrayable\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name_vi' => $this->name_vi,
            'name_en' => $this->name_en,
            'name_ja' => $this->name_ja,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
