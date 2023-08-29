<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function getAll()
    {
        $roles = Role::all();

        if ($roles->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(RoleResource::collection($roles), 'OK', 200);
    }

    public function getRoleById($id)
    {
        $role = role::where('id', $id)->first();

        if ($role->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(new RoleResource($role), 'OK', 200);
    }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $role = new Role();

            $role->fill([
                'name' => $req->name,
            ]);

            $role->save();
            DB::commit();
            return Payload::toJson(true, 'Created Successfully', 201);
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }

    public function update($req)
    {
        DB::beginTransaction();
        try {
            $result = Role::where('id', $req->id)->update([
                'name' => $req->name
            ]);

            if ($result) {
                DB::commit();
                return Payload::toJson(true, 'Updated Successfully', 200);
            }

            return Payload::toJson(false, 'Update fail', 404);
        } catch (Exception $ex) {
            DB::rollBack();
            return $ex;
        }
    }

    public function remove($id)
    {
        DB::beginTransaction();
        try {
            $result = Role::where('id', $id)->delete();

            if ($result) {
                DB::commit();
                return Payload::toJson(true, 'Removed Successfully', 201);
            }
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }
}
