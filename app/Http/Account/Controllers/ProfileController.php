<?php

namespace Template\Http\Account\Controllers;

use Template\App\Controllers\Controller;
use Template\Domain\Account\Requests\ProfileStoreRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the user profile view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.profile.index');
    }

    /**
     * Store user's profile details in storage.
     *
     * @param ProfileStoreRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileStoreRequest $request)
    {
        //update user
        $user = auth()->user();
        $user->update($request->only('name', 'phone'));

        //update user avatar
        if ($request->hasFile('avatar')) {
            if ($request->avatar->isValid()) {
                $user->addMedia($request->avatar)->toMediaCollection('avatar');
            }
        }

        //redirect with success
        return back()->withSuccess('Profile updated successfully.');
    }

}
