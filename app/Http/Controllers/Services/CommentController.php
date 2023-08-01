<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getAllComment() {
        $comments = Comment::all();

        if ($comments->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(CommentResource::collection($comments), 'Ok', 200);
    }

    public function getCommentbyProductId(string $productId) {
        $comment = Comment::where('product_id', $productId)->first();
        if ($comment->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(CommentResource::collection($comment), 'Ok', 200);
    }

    public function getCommentbyUserId(string $userId) {
        $comment = Comment::where('product_id', $userId)->first();
        if ($comment->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(CommentResource::collection($comment), 'Ok', 200);
    }

    public function getCommentbyCommentIdAndUserId(string $commentId, string $userId) {
        $comment = Comment::where([
            ['comment_id', '=', $commentId],
            ['user_id', '=', $userId]
        ])->first();

        if ($comment->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(CommentResource::collection($comment), 'Ok', 200);
    }
}