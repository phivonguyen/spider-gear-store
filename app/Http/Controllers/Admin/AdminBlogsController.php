<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Blog;
use App\Models\BlogCategories;
use App\Models\BlogComments;
use App\Http\Controllers\Services\BlogsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminBlogsController extends Controller
{

    protected $blogsController;
    function __construct()
    {
        $this->blogsController = new BlogsController();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = $this->blogsController->getBlogPagination(3);

        $userWithBlog = User::with('blog')->get();
        return view('admin.blog-list.index',['blogs' => $blogs['data'],'userWithBlog' => $userWithBlog,'i'=>((request()->input('page', 1) -1)*5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.add-blog.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =Validator::make($request->all(), [
            'blog_id' => 'required',
            'title' => 'required|max:255',
            'user_id' => 'required',
            'content' => 'required',
            'b_category_id' => ['required', 'in:1,2,3,4'],
            'blogimage' => ['nullable','file','mimes:webp','max:2048'],
        ]);
        if ($validatedData->fails()) {
            return redirect()
                ->back()
                ->withErrors($validatedData)
                ->withInput();
        }
        if(!$request->hasFile('blogimage')){
            return "Please choose image for blog";
        }
        $imagePath = $request->file('blogimage')->getPathname();
        $imageData = base64_encode(file_get_contents($imagePath));
        $base64Image = 'data:image/webp;base64,' . $imageData;

        $blog = new Blog();
        $blog->blog_id = $request->input('blog_id');
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->b_category_id = $request->input('b_category_id');
        $blog->user_id = $request->input('user_id');
        $blog->blogimage = $base64Image;
        $blog->save();
        return redirect()->route('blog-list.index')->with('alert','Add new blog successfully!!');
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
    public function edit(string $blog_id)
    {
        $blog = $this->blogsController->getBlogById($blog_id);
        return view('admin.edit-blog.index',['blog' => $blog['data']]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $blog_id)
    {

        $validatedData = Validator::make($request->all(),[
            'blog_id' => 'required',
            'title' => 'required|max:255',
            'user_id' => 'required',
            'content' => 'required',
            'b_category_id' => ['required', 'in:1,2,3,4'],
            'blogimage' => ['nullable','file','mimes:webp','max:2048'],
        ]);
        if ($validatedData->fails()) {
            return redirect()
                ->back()
                ->withErrors($validatedData)
                ->withInput();
        }
        $blog = Blog::where('blog_id', '=', $blog_id)->update($request->validate([
            'blog_id' => 'required',
            'title' => 'required|max:255',
            'user_id' => 'required',
            'content' => 'required',
            'b_category_id' => ['required', 'in:1,2,3,4'],
            'blogimage' => ['nullable','file','mimes:webp','max:2048'],
        ]));
        return redirect()->route('blog-list.index')->with('alert','Blog was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $blog_id)
    {
        //
        $blog = Blog::where('blog_id', '=', $blog_id)->delete();
        return redirect()->route('blog-list.index')->with('alert', 'Blog was deleted successfully!');
    }
}
