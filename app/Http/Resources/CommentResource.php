<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'user' => new UserResource($this->user),
            'product' => new ProductResource($this->product),
            'content' => $this->content,
            'comment_create_date' => $this->comment_create_date,
            'comment_update_date' => $this->comment_update_date,
        ];
    }
}
