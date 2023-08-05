<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUser()
    {
        $user = User::all();

        if ($user->count() === 0) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(UserResource::collection($user), 'Ok', 200);
    }

    public function getUserById(string $id)
    {
        $user = User::where('user_id', '=', $id)->first();

        return Payload::toJson(new UserResource($user), 'Ok', 200);
    }

    public function getUserByEmail(string $email)
    {
        $user = User::where('email', '=', $email)->first();

        return Payload::toJson(new UserResource($user), 'Ok', 200);
    }
}
