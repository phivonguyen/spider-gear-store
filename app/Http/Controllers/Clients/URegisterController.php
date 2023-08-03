<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class URegisterController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        return view('account.register.index');
    }

    // public function processRegister(Request $request){
    //     $firstName =$request->input('first_name');
    //     $lastName =$request->input('last_name');
    //     $email = $request->input('email');
    //     $psw = $request->input('password');


    // }
}