<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UHomeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('clients.home.index');
    }
}
