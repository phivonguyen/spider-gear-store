<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'blog_id' => $this->blog_id,
            'user_id' => new UserResource($this->user),
            'b_category_id' => new BlogCategoriesResource($this->b_category_id),
            'title' => $this->title,
            'content' => $this->content,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
