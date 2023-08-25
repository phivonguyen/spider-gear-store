<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'img_id' => $this->image_id,
            'blog_id' => new BlogResource($this->blog_id),
            'img_binary' => $this->img_binary,
            'image_create_date' => $this->image_create_date,
            'image_update_date' => $this->image_update_date,
        ];
    }
}
