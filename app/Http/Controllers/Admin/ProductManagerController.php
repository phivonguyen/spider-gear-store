<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductManagerController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('admin.product-manager');
    }
}
