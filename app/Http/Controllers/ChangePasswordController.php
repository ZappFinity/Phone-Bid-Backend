<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        //if current password is not correct
        $user = auth()->user();

        if (!\Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Current password is incorrect'
            ], 401);
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully'
        ]);
    }

    public function forgotPassword(Request $request)
    {
        //Validating Email
        $request->validate(['email' => 'required|email']);

        //password reset link to the user
        $status = Password::sendResetLink(
            $request->only('email')
        );

        //response
        return $status === Password::RESET_LINK_SENT
            ? response()->json(['success' => true, 'message' => __($status)])
            : response()->json(['success' => false, 'message' => __($status)], 400);
    }
}
