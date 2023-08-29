<?php

namespace App\Http\Controllers\Clients;
use App\Models\Blog;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\BlogsController;
use Illuminate\Validation\Rule;
use App\Models\BlogComments;
use App\Models\BlogCategories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class UBlogsController extends Controller
{
    protected $blogsController;
    function __construct()
    {
        $this->blogsController = new BlogsController();
    }

    public function index()
    {
        $newBlog = $this->blogsController->getBlogByCategory(2);
        $saleBlog = $this->blogsController->getBlogByCategory(1);
        $blogs = $this->blogsController->getAllBlogs();
        $blogsP = Blog::paginate(2);
        $randomHit1 = rand(1, 200);
        $randomHit2 = rand(1, 200);
        $userWithBlog = User::with('blog')->get();
        return view('clients.blogs.index',  ['blogs' => $blogs['data'],'userWithBlog' => $userWithBlog,'blogsP'=>$blogsP,'randomHit1' =>$randomHit1,'randomHit2' =>$randomHit2,'newBlog'=> $newBlog['data'],'saleBlog'=>$saleBlog['data']]);
    }

    public function showBlogDetail(string $id) {
        $blog = $this->blogsController->getBlogById($id);
        $userWithBlog = User::with('blog')->get();
        $userWithBlog_Comments = User::with('blog_comments')->get();
        $blog_comments = $this->blogsController->getBlogCommentsByBlogId($id);

        return view('clients.blog-detail.index', ['blog' => $blog['data'],'blog_comments' =>  $blog_comments['data'],'userWithBlog' => $userWithBlog,'userWithBlog_Comments' => $userWithBlog_Comments]);
    }

    public function createBlogComments(string $id){
        $blog = $this->blogsController->getBlogById($id);
        return view('clients.blog_comments.index', ['blog' => $blog['data']]);
    }

    public function showBlogCategories(){
        $blog_categories = $this->blogsController->getAllBlogCategories();
        return view('clients.home.index', ['blog_categories' => $blog_categories['data']]);
    }

    public function blogComment(Request $request, string $id){
        // Validate dữ liệu đầu vào
        $blog = $this->blogsController->getBlogById($id);
        $blog_id = $blog['data'] -> blog_id;
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
        $userWithBlog = User::with('blog')->get();
        $validator = Validator::make($request->all(), [
            'content' => [
                'required',
                'max:500',
                Rule::notIn($forbiddenWords),
            ], // Ví dụ: Nội dung không được trống và không quá 500 ký tự
        ]);
        if (!$blog) {
            return redirect()->back()->with('error', 'No blog was existed.');
        }

        // $user_id = Auth::user()->id; // Lấy user_id của người dùng đã đăng nhập

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Lưu bình luận và liên kết với bài viết và người dùng
        $blog_comments = new BlogComments();
        $blog_comments->blog_id = $id;
        $blog_comments->user_id = 1; // Hoặc lấy user id từ request, tùy theo cách bạn xác định user
        $blog_comments->content = $request->input('content');
        $blog_comments->save();

        return redirect()->route('blog-detail',['id' => $blog_id])->with('success', 'Successfully sent!');
    }
}
