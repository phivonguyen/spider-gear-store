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

        $userWithBlog = User::with('blog')->get();
        return view('clients.blogs.index',  ['blogs' => $blogs['data'],'userWithBlog' => $userWithBlog,'newBlog'=> $newBlog['data'],'saleBlog'=>$saleBlog['data']]);
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
        return view('clients.comments.index', ['blog' => $blog['data']]);
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

//Admin
    public function blogList(){
        $blogs = $this->blogsController->getAllBlogs();
        // $blog = $this->blogsController->getBlogById($id);
        $userWithBlog = User::with('blog')->get();
        // if ($action === 'delete') {
        //     // Xử lý xóa bài viết
        //     $blog['data']->delete();
        //     return redirect()->back()->with('success', 'Blog was deleted');
        // } elseif ($action === 'hide') {
        //     // Xử lý ẩn bài viết
        //     $blog['data']->hidden = true;
        //     $blog['data']->save();
        //     return redirect()->back()->with('success', 'Blog was hided');
        // }
        return view('admin.blog-list.index',['blogs' => $blogs['data'],'userWithBlog' => $userWithBlog]);
    }

    public function addBlog(Request $request){
        $blog_categories = $this->blogsController->getAllBlogCategories();
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
        $validator = Validator::make($request->all(), [
            'blog_id'=> [
                'required',
                'max:245',
            ],
            'b_category_id'=>[
                'required',
                'in:1,2,3,4',
            ],
            'title'=>[
                'required',
                'max:500',
                Rule::notIn($forbiddenWords),
            ],
            'content' => [
                'required',
                'max:500',
                Rule::notIn($forbiddenWords),
            ],
            'blogimage' => [
                'nullable',
                'max:50000000',
                'mimes:webp',
            ],// Ví dụ: Nội dung không được trống và không quá 500 ký tự
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request ->hasFile('blogimage')){
            $imagePath = $request->file('blogimage')->getPathName();
            $base64Image = base64_encode(File::get($imagePath));
        }

        $blog = new Blog();
        $blog->blog_id = $request->input('blog_id');
        $blog->user_id = 1;         // Hoặc lấy user id từ request, tùy theo cách bạn xác định user
        $blog->b_category_id = $request->input('b_category_id');
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        // $blog->blogimage = $base64Image;
        $blog->save();

        return redirect()->route('add-blog')->with('success', 'Successfully sent!');    }
}
