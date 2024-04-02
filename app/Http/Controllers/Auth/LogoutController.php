<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        //Logging Out User
        if ($token = $request->bearerToken()) {
            $authToken = PersonalAccessToken::findToken($token);
            $authToken->delete();
        }

        //Return Response
        return response()->json([
            'success' => true,
            'message' => 'User Logged Out Successfully!',
        ]);
    }
}
