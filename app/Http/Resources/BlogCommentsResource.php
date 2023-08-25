<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogCommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'comment_id' => $this->comment_id,
            'blog_id' => new BlogResource($this->blog_id),
            'user_id' => new UserResource($this->user_id),
            'content' => $this->content,
            'user_create_date' => $this->user_create_date,
            'user_update_date' => $this->user_update_date,
        ];
    }
}
