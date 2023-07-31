<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        return view('admin.login.index');
    }
}
