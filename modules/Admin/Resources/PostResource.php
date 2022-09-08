<?php

namespace Modules\Admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'content_vi' => $this->content_vi,
            'content_ja' => $this->content_ja,
            'content_en' => $this->content_en,
            'created_at' => $this->created_at,
            'status' => $this->status,
            'url_image' => $this->url_image,
            'category_post_id' => $this->category_post_id,
        ];
    }
}
