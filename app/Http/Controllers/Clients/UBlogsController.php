<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\BlogsController;

use Illuminate\Http\Request;

class UBlogsController extends Controller
{
    function __construct()
    {
        $this->blogController = new BlogsController();
    }

    public function index()
    {
        return view('clients.blogs.index');
    }

    public function showBlogDetail(string $id) {
        $blog = $this->productController->getBlogById($id);
        return view('clients.blog-detail.index', ['blog' => $blog['data']]);
    }
}