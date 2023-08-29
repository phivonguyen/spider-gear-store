<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\UserController;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('client.login');
    }

    public function login(LoginRequest $req)
    {
        $input = $req->all();

        $user = User::where('username', '=', $input['username'])->first();

        if (!$user) {
            return redirect()->back()
                ->withErrors(['username' => "Username doesn't exist"]);
        }

        if ($user && !Hash::check($input['password'], $user->password)) {
            return redirect()->back()
                ->withInput($req->all())
                ->withErrors(['password' => "Wrong password"]);
        }

        if ($user && $user->status != "Active") {
            return redirect()->back()
                ->withErrors(['status' => "You are banned from this store!"]);
        }

        $remember = false;

        if (array_key_exists('remember', $input) && $input['remember'] == "on") $remember = true;

        Auth::attempt(['username' => $input['username'], 'password' => $input['password']], $remember);

        return redirect()->route('user/home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user/home');
    }
}
