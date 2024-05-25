<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class ForgetPasswordController extends Controller
{
    //

    public function forget_password(Request $request)
    {
      
        $credentials = $request->validate(['email' => 'required|email']);
        
        $status = Password::sendResetLink(
            $credentials
        );
   
        return $status === Password::RESET_LINK_SENT
                    ? response()->json(['message' => __($status)])
                    : response()->json(['message' => __($status)], 400);
    }

    public function showLinkRequestForm(Request $request)
    {
        return response()->json(['message' => 'This endpoint is not applicable for API.'], 404);
    }
    
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        if ($status === Password::RESET_LINK_SENT) {
            // Password reset link sent successfully
            return response()->json(['message' => 'Reset link sent successfully']);
        } else {
            // Unable to send reset link
            return response()->json(['message' => 'Unable to send reset link'], 500);
        }
    }
}
