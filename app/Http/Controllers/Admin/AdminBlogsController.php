<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Blog;
use App\Models\BlogCategories;
use App\Models\BlogComments;
use App\Http\Controllers\Services\BlogsController;
use Illuminate\Http\Request;

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
        $blogs = $this->blogsController->getAllBlogs();
        $userWithBlog = User::with('blog')->get();

        return view('admin.blog-list.index',['blogs' => $blogs['data'],'userWithBlog' => $userWithBlog]);
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
        //
        Blog::create($request->all());

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
    public function edit(Blog $blog)
    {
        return view('admin.edit-blog.index',['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
        $blog->update($request->all());
        return redirect()->route('blog-list.index')->with('alert','Blog was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
        $blog->delete();
        return redirect()->route('blog-list.index')->with('alert', 'Blog was deleted successfully!');
    }
}
