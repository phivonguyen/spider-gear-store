<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Models\PasswordResetToken;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('client.forgot-password');
    }

    public function reset(Request $req)
    {
        $user = User::where('email', '=', $req->email ?? '')->first();

        if (!$user) return redirect()->route('user/forgot-password/get')->withErrors(['email' => "Your email doesn't exist in system"]);

        $token = Str::random(64);

        DB::beginTransaction();
        try {
            $email = new PasswordResetToken();

            $email->fill([
                'email' => $req->email,
                'token' => $token
            ]);

            $email->save();
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }

        Mail::send('client.forgot-password-mail', ['token' => $token], function ($msg) use ($req) {
            $msg->to($req->email);
            $msg->subject('Spider Gear Store - Reset Password');
        });
    }
}
