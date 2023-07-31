<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UProfileController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        return view('clients.profile.index');
    }
}
