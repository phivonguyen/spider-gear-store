<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAll()
    {
        $users = User::all();

        if ($users->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(UserResource::collection($users), 'OK', 200);
    }

    public function getUserById($id)
    {
        $user = User::where('id', $id)->first();

        if ($user->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(new UserResource($user), 'OK', 200);
    }

    public function getUserByRoleId($role_id)
    {
        $users = User::where('role_id', $role_id)->get();

        if ($users->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(UserResource::collection($users), 'OK', 200);
    }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $user = new User();

            $role_id = $req['role_id'] ?? 2;

            $user->fill([
                'username' => $req['username'],
                'password' => $req['password'],
                'role_id' => $role_id
            ]);

            $user->save();
            DB::commit();
            return Payload::toJson(true, 'Created Successfully', 201);
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }

    public function updateStatus(Request $req)
    {
        DB::beginTransaction();
        try {
            $result = User::where('id', $req->id)->update(['status' => $req->status]);

            if ($result == 1) {
                DB::commit();
                return Payload::toJson($result, "Updated successfully", 201);
            }

            return Payload::toJson($result, "Update failed", 404);
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }

    public function update($req)
    {
        DB::beginTransaction();
        try {
            $result = User::where('id', '=', Auth::user()->id)->update([
                'first_name' => $req['first_name'] ?? Auth::user()->first_name,
                'middle_name' => $req['middle_name'] ?? Auth::user()->middle_name,
                'last_name' => $req['last_name'] ?? Auth::user()->last_name,
                'email' => $req['email'] ?? Auth::user()->email,
                'username' => Auth::user()->username,
                'password' => $req['password'] ?? Auth::user()->password,
                'phone' => $req['phone'] ?? Auth::user()->phone,
                'role_id' => 2,
            ]);

            if ($result) {
                DB::commit();
                return Payload::toJson(true, 'Updated successfully', 200);
            }

            return Payload::toJson(false, 'Update failed', 404);
        } catch (Exception $ex) {
            DB::rollBack();
            return $ex;
        }
    }

    public function remove($id)
    {
        DB::beginTransaction();
        try {
            $result = User::where('id', $id)->delete();

            if ($result) {
                DB::commit();
                return Payload::toJson(true, 'Removed successfully', 200);
            }

            return Payload::toJson(false, 'Remove failed', 200);
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }
}
