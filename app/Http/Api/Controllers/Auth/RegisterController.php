<?php

namespace Template\Http\Api\Controllers\Auth;

use Illuminate\Http\Request;
use Template\App\Controllers\Controller;
use Template\Domain\Auth\Events\UserSignedUp;
use Template\Domain\Auth\Requests\UserSignUpRequest;
use Template\Domain\Users\Models\User;

class RegisterController extends Controller
{
    /**
     * Handles the registration request and stores user in storage.
     *
     * @param UserSignUpRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(UserSignUpRequest $request)
    {
        $user = User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'activated' => false,
        ]);

        //send user an activation email
        event(new UserSignedUp($user));

        return response()->json(null, 204);
    }
}
