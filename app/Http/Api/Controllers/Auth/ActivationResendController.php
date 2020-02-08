<?php

namespace Template\Http\Api\Controllers\Auth;

use Illuminate\Http\Request;
use Template\App\Controllers\Controller;
use Template\Domain\Auth\Events\UserRequestedActivationEmail;
use Template\Domain\Auth\Requests\ActivateResendRequest;
use Template\Domain\Users\Models\User;

class ActivationResendController extends Controller
{

    /**
     * Resend activation link.
     *
     * @param ActivateResendRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivateResendRequest $request)
    {
        //find user
        $user = User::where('email', $request->email)->first();

        //send activation email
        event(new UserRequestedActivationEmail($user));

        return response()->json(null, 204);
    }
}
