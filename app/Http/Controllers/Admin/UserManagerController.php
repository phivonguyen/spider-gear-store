<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\UserController;
use App\Http\Payload;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserManagerController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserController();
    }

    public function index()
    {
        $user_data = $this->userService->getAll();

        if ($user_data['data'] == null) return redirect()->back()->withErrors(['data' => 'No data']);

        $users = $user_data['data']->collection;

        return view('admin.user-manager', ['users' => $users]);
    }

    public function updateStatus($id, $status)
    {
        $req = new Request([
            'id' => $id,
            'status' => $status
        ]);

        $result = $this->userService->updateStatus($req);

        if ($result) return Payload::toJson(true, 'Updated successfully', 200);

        return Payload::toJson(false, 'Update failed', 404);
    }

    public function remove($id)
    {
        $result = $this->userService->remove($id);

        if ($result) return Payload::toJson(true, 'Updated successfully', 200);

        return Payload::toJson(false, 'Update failed', 404);
    }
}
