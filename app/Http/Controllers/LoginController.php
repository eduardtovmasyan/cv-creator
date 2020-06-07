<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function logIn(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ])->validate();

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'These credentials do not match our records.'
            ], 422);
        } else {
            $token = $user->createToken('cv-creater-token')->accessToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response($response);
        }
    }

    public function logOut(Request $request)
    {
        $request->user()->token()->revoke();
        $request->user()->token()->delete();
    }
}
