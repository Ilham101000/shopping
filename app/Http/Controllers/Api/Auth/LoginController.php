<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $user = User::where('email', $request->email)->first();

            $token = $user->createToken('myAppToken')->plainTextToken;

            return response()->json([
                'email' => Auth::user()->email,
                'token' => $token,
                'username' => Auth::user()->username,
            ], 200);
        }

        return response()->json([
            'message' => 'Password / Email salah! ',
        ], 401);
    }
}
