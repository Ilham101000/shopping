<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'name' => 'required',
            'postcode' => 'required',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        $user = User::create($validateData);

        $token = $user->createToken('myAppToken');

        return (new UserResource($user))->additional([
            'token' => $token->plainTextToken,
        ]);
    }

    public function all() {
        $user = User::all();

        return response()->json([
            $user
        ]);
    }
}
