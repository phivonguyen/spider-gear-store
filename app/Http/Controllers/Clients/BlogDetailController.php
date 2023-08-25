<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\BlogsController;
use Illuminate\Http\Request;

class BlogDetailController extends Controller
{
    protected $blogController;
    function __construct()
    {
        $this->blogController = new BlogsController();
    }

    public function index()
    {
        return view('clients.blog-detail.index');
    }
}
