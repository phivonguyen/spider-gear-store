<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategories;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BlogCommentsResource;
use App\Http\Payload;
use App\Models\BlogComments;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    private function returnData($blog)
    {
        if ($blog->count() === 0) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(BlogResource::collection($blog), 'Ok', 200);
    }

    public function getAllBlogs()
    {
        $blog = Blog::all();

        return $this->returnData($blog);
    }

    public function getBlogById(string $id)
    {
        $blog = Blog::where('blog_id', '=', $id)->first();

        return Payload::toJson(new BlogResource($blog), 'Ok', 200);
    }

    public function getBlogByCategory(string $id)
    {
        $blog = Blog::where('b_category_id', '=', $id)->get();

        return $this->returnData($blog);
    }

    public function getAllBlogCategories()
    {
        $blog_categories = BlogCategories::all();

        return $this->returnData($blog_categories);
    }

    public function getBlogByUser(string $user)
    {
        $blog = Blog::where('user_id', '=', $user)->get();

        return $this->returnData($blog);
    }

    public function getAllBlogComments()
    {
        $blog_comments = BlogComments::all();

        return $this->returnData($blog_comments);
    }

    public function getBlogCommentsByBlogId(string $id)
    {
        $blog_comments = BlogComments::where('blog_id', '=', $id)->get();

        return $this->returnData($blog_comments);
    }
    public function deleteBlog(string $id){
        $blog = Blog::where('blog_id', '=', $id)->first();
        $blog -> delete();

        return redirect()-> route('admin.blog-list.index')->with('success', 'Blog was deleted!');
    }
}
