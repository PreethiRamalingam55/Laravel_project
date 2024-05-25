<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    //

    public function reset(Request $request)
    {
        echo 123; exit;
        $request->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
        ? response()->json(['message' => __('passwords.reset')], 200)
        : response()->json(['message' => __('passwords.user')], 400);
    }

    public function showResetForm(Request $request)
    {
        return response()->json(['message' => 'This endpoint is not applicable for API.'], 404);
    }
}
