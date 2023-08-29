<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\UserController;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserController();
    }

    public function index()
    {
        return view('client.register');
    }

    public function register(RegisterRequest $req)
    {
        $input = $req->all();

        $user = User::where('username', '=', $input['username'])->first();

        if ($user) return redirect()->back()->withErrors(['username' => "Username already exists"]);

        $this->userService->save($input);

        Auth::attempt(['username' => $input['username'], 'password' => $input['password']]);

        return redirect()->route('user/home');
    }
}
