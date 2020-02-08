<?php

namespace Template\Http\Auth\Controllers;

use Template\App\Controllers\Controller;
use Template\Domain\Auth\Events\UserSignedUp;
use Template\Domain\Users\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \Template\Domain\Users\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['full_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'activated' => false,
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        // Log user out
        if (auth()->user()) {
            $this->guard()->logout();
        }

        // Send user an activation email
        event(new UserSignedUp($user));

        $user->createAsStripeCustomer();

        // Redirect user
        return redirect($this->redirectPath())
            ->withInput(['email'])
            ->withSuccess('Please check your email for an activation link.');
    }
}
