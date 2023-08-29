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
            'user_id' => new UserResource($this->id),
            'content' => $this->content,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ];
    }
}
