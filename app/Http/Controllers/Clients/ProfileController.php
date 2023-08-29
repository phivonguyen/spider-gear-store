<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\UserController;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserController();
    }

    public function index()
    {
        $user = Auth::user();

        return view('client.profile', ['user' => $user]);
    }

    public function updateProfile(UpdateProfileRequest $req)
    {
        $input = $req->all();

        $result = $this->userService->update($input);

        if ($result) return redirect()->route('user/profile/get')->withErrors(['success' => "Update successfully"]);

        return redirect()->route('user/profile/get')->withErrors(['fail' => "Update failed"]);
    }
}
