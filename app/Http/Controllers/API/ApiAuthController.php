<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8'
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => 'false', 'message' => $error, 'user' => []], 422);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'user',
                'password' => Hash::make('password'),
            ]);

            $token = $user->createToken('projectToken')->plainTextToken;
            Auth::login($user, true);
            // $user->sendEmailVerificationNotification();

            $success = 'User Registered Successfully |';

            return response(['user' => $user, 'token' => $token, 'message' =>  $success,]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'false', 'message' => $e->getMessage()], 500);
        }
    }

    function logout()
    {
        try {
            auth()->user()->tokens()->delete();
            return response()->json(['Logged Out'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'false', 'message' => $e->getMessage()], 500);
        }
    }

    function login(Request $request)
    {

        try {
            $user = User::where([['email', $request->email]])->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }

            $token = $user->createToken('projectToken')->plainTextToken;
            Auth::login($user, true);
            // $user->sendEmailVerificationNotification();
            $success = 'Login Successfull';
            return response(['user' => $user, 'token' => $token, 'message' =>  $success,]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'false', 'message' => $e->getMessage()], 500);
        }
    }
}
