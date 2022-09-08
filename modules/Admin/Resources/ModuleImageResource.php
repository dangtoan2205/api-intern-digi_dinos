<?php

namespace Modules\Admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class ModuleImageResource extends JsonResource
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
            'module_id' => $this->module_id,
            'module_name' => $this->module->name_vi,
            'name_vi' => $this->name_vi,
            'name_en' => $this->name_en,
            'name_ja' => $this->name_ja,
            'image_url' => $this->image_url ? URL::to('image/'.$this->image_url) : null,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
