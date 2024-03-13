<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\Models\User;
class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try 
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()->first()
                ], 400);
            }
            // Create and save the user
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            $user->save(); // Finally, save the record.
            $token = $user->createToken('auth_token')->plainTextToken;
                // Return a JSON response
                return response()->json([
                    'success' => true,
                    'message' => 'User created successfully',
                    'user' => $user,
                    'token' => $token,
                ], 201);

        } catch (QueryException $e) {
            return response()->json(['error' => $e], 500);
        }
    }
}
