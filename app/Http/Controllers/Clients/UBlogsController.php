<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UBlogsController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        return view('clients.blogs.index');
    }
}
