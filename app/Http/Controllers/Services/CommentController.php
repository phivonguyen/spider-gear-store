<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private function returnData($comment)
    {
        if ($comment->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(CommentResource::collection($comment), 'Ok', 200);
    }

    public function getAllComment()
    {
        $comment = Comment::all();

        return $this->returnData($comment);
    }

    public function getCommentByProductId(string $id)
    {
        $comment = Comment::where('product_id', '=', $id)->first();

        return $this->returnData($comment);
    }

    public function getCommentByUserId(string $id)
    {
        $comment = Comment::where('user_id', '=', $id)->first();

        return $this->returnData($comment);
    }
}
