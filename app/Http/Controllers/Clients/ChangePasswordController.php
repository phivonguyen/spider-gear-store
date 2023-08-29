<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\UserController;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserController();
    }

    public function index()
    {
        return view('client.change-password');
    }

    public function updateProfile(ChangePasswordRequest $req)
    {
        $input = $req->all();

        if ($input['old_pw'] != Auth::user()->password) return redirect()->route('user/change-password/get')->withErrors(['old_pw' => "Old password is not correct"]);
        if ($input['new_pw'] == Auth::user()->password) return redirect()->route('user/change-password/get')->withErrors(['new_pw' => "New password is the same as old"]);

        $result = $this->userService->update($input);

        if ($result) return redirect()->route('user/change-password/get')->withErrors(['success' => "Update successfully"]);

        return redirect()->route('user/change-password/get')->withErrors(['fail' => "Update failed"]);
    }
}
