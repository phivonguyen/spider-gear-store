<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use App\Models\PasswordResetToken;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
    }

    public function index($token)
    {
        return view('client.reset-password', ['token' => $token]);
    }

    public function reset(PasswordResetRequest $req)
    {
        $input = $req->all();


        $record = PasswordResetToken::where('token', $req['token'])->first();

        if (!$record) return redirect()->back('user/home');

        $email = $record->email;

        DB::beginTransaction();
        try {
            $result = User::where('email', $email)->update(['password' => Hash::make($input['new_pw'])]);


            if ($result == 1) {
                PasswordResetToken::where('token', $req['token'])->delete();

                DB::commit();

                return redirect()->route('user/login/get');
            }

            return redirect()->route('user/home');
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }
}
