<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\UserController;
use Illuminate\Http\Request;
class ULoginController extends Controller
{
    function __construct()
    {
        $this->userController = new UserController();
    }

    public function index()
    {
        return view('account.login.index');
    }

    // public function processLogin(Request $request){
    //     $email = $request->input('email');
    //     $psw = $request->input('password');
    //     $user = $this->userController->getUserByEmail($email);

    //     return redirect("/");
    // }
}