<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Str;

class ApiForgetPasswordController extends Controller
{
    protected function forgotPassword(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => 'false', 'message' => $error], 422);
            }

            if (!$user) {
                return response([
                    'message' => 'Email Not Found.',
                    'status' => 'false'
                ], 404);
            }
            return response()->json(['message' => 'Email Verified', 'status' => 'true']);
        } catch (Exception $e) {
            return response()->json(['message' => $e, 'status' => 'false']);
        }

        // $input = $request->only('email');

        // $validator = Validator::make($input, ['email' => "required|email"]);

        // if ($validator->fails()) {
        //     return response(['errors' => $validator->errors()->all()], 422);
        // }
        // $response =  Password::sendResetLink($input);

        // if ($response == Password::RESET_LINK_SENT) {
        //     $message = "Mail send successfully";
        //     $response = ['message' => $message, 'status' => 'true'];
        // } else {
        //     $message = "Email could not be sent to this email address";
        //     $response = ['message' => $message, 'status' => 'false'];
        // }
        // //$message = $response == Password::RESET_LINK_SENT ? 'Mail send successfully' : GLOBAL_SOMETHING_WANTS_TO_WRONG;

        // return response($response, 200);

    }


    public function reset_password(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|same:new_password|min:8',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => 'false', 'message' => $error], 422);
            }
            $user = User::where('email', $request->email)->first();
            $user->password = Hash::make($request->get('new_password'));
            $user->update();

            return response()->json(['message' => "Password Reset Successfully", 'status' => 'true', 'user' => $user]);
        } catch (Exception $e) {
            return response()->json(['message' => $e, 'status' => 'false']);
        }
    }

    // protected function sendResetResponse(Request $request)
    // {
    //     //password.reset

    //     $input = $request->only('email', 'token', 'password', 'password_confirmation');
    //     $validator = Validator::make(
    //         $input,
    //         [
    //             'token' => 'required', 'email' => 'required|email',
    //             'password' => 'required|confirmed|min:8',
    //         ]
    //     );
    //     if ($validator->fails()) {
    //         return response(['errors' => $validator->errors()->all()], 422);
    //     }
    //     $response = Password::reset($input, function ($user, $password) {
    //         $user->forceFill(['password' => Hash::make($password)])->save();
    //         //$user->setRememberToken(Str::random(60));
    //         event(new PasswordReset($user));
    //     });
    //     if ($response == Password::PASSWORD_RESET) {
    //         $message = "Password Reset successfully";
    //         $response = ['message' => $message, 'status' => 'true'];
    //     } else {
    //         $message = "Email could not be sent to this email address";
    //         $response = ['message' => $message, 'status' => 'false'];
    //     }
    //     return response()->json($response);
    // }
}
