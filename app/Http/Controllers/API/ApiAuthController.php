<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required|min:10|max:10',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8'
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => 'false', 'message' => $error, 'user' => []], 422);
            }

            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'role' => 'user',
                'password' => Hash::make($request->input('password')),
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

    function logout(Request $request)
    {
        try {
            if (auth()->user()->tokens()) {
                auth()->user()->tokens()->delete();
                return response()->json(['status' => 'true', 'message' => 'Logged Out']);
            } else {
                return response()->json(['status' => 'false', 'message' => 'Token Not Found']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'false', 'message' => $e->getMessage()], 500);
        }
    }

    function login(Request $request)
    {

        try {
            $user = User::where([['email', $request->email]])->first();

            if (!$user) {
                return response([
                    'message' => ['Email Not Found.']
                ], 404);
            }
            if (!Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['Incorrect Password.']
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


    public function auth_user()
    {
        try {
            $user = Auth::user();
            return response()->json(['user' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'false', 'message' => $e->getMessage()], 500);
        }
    }
}
