<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Blog;
use App\Models\BlogCategories;
use App\Models\BlogComments;
use App\Http\Resources\BlogCommentsResource;
use App\Http\Controllers\Services\BlogsController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Payload;


class AdminBlogCommentController extends Controller
{

    private function returnData($blog_comment)
    {
        if ($blog_comment->count() === 0) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(BlogCommentsResource::collection($blog_comment), 'Ok', 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sql = BlogComments::select('user.first_name as first_name', 'blog_comments.*', 'blog.title as title')
        -> join('user', 'user.id','=','blog_comments.user_id')
        -> join('blog', 'blog.blog_id','=','blog_comments.blog_id')
        -> get();
        $blog_comments = $this ->returnData($sql);
        return view('admin.comment-list.index',['blog_comments'=> $blog_comments['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog_comments = BlogComments::where('comment_id', '=', $id)->delete();
        return redirect()->route('comment-list.index')->with('alert', 'Comment was deleted successfully!');
    }
}
