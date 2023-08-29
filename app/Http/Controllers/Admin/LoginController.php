<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        if (Auth::check()) {
            if (Auth::user()->role_id != 1) {
                Auth::logout();

                return redirect()->route('admin/login/get')->withErrors(['role' => 'Access denied! You are not an Admin!']);
            }

            return redirect()->route('admin/dashboard');
        }

        return view('admin.login');
    }

    public function login (LoginRequest $req)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id != 1) {
                Auth::logout();

                return redirect()->route('admin/login/get')->withErrors(['role' => 'Access denied! You are not an Admin!']);
            }

            return redirect()->route('admin/dashboard');
        }

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

        if ($user && $user['role_id'] !== 1) {
            return redirect()->back()
                ->withInput($req->all())
                ->withErrors(['role' => "Access denied! You are not an Admin!"]);
        }

        Auth::attempt(['username' => $input['username'], 'password' => $input['password']]);

        return redirect()->route('admin/dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user/home');
    }
}
