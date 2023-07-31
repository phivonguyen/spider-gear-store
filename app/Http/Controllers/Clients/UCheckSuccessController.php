<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UCheckSuccessController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        return view('clients.check-success.index');
    }
}
