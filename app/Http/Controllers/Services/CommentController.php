<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CommentController extends Controller
{
    private function returnData($comment)
    {
        if ($comment->count() === 0) {
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

    public function storeComments(Request $request, string $product_id){
        $forbiddenWords = [
            "spam",
            "viagra",
            "casino",
            "phishing",
            "scam",
            "fraud",
            "hacked",
            "malware",
            "password",
            "credit card"
        ];
        $validatedData = Validator::make($request->all(),[
            'user_id' => 'required',
            'content' => ['required','max:254',
            Rule::notIn($forbiddenWords)],
            'rating' => ['required', 'in:1,2,3,4,5'],
        ]);
        if ($validatedData->fails()) {
            return redirect()
                ->back()
                ->withErrors($validatedData)
                ->withInput();
        }

        $comment = new Comment();
        $comment->product_id = $product_id;
        $comment->user_id = $request->input('user_id');
        $comment->content = $request->input('content');
        $comment->rating = $request->input('user_id');
        $comment->save();

        return redirect()->route('product-detail',['id' => $product_id])->with('success', 'Successfully sent!');
    }
}
