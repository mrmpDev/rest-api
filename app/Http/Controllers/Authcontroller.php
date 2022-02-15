<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Laravel\Passport\PersonalAccessTokenResult;

class Authcontroller extends Controller
{
    public function login(LoginRequest $request)
    {

        $user = auth()->attempt([
            'email' => $request->username,
            'password' => $request->password,
        ]);
        if (auth()->check()) {
            $token = auth()->user()->createToken('password_for_user'.auth()->id());

            return response([
                'token' => $token->accessToken
            ]);
        }

        return response([
            'error' => 'اطلاعات کاربری به در ستی وارد نشده است'
        ], 401);
    }


    public function logout()
    {
        $user = auth()->guard('api')->user();
        $user->logout();

        return $user;
    }

    public function user()
    {
        return auth('api')->user();
    }
}
