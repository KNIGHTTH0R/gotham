<?php

namespace gotham\Http\Controllers\Auth;

use gotham\User;
use gotham\Http\Controllers\Controller;
use gotham\Http\Controllers\MyUtilController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/dashboard';

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $myUtil = new MyUtilController;
        
        return User::create([
            'first_name' => $myUtil->firstlettertoupper($data['first_name']),
            'last_name' => $myUtil->firstlettertoupper($data['last_name']),
            'email' => strtolower($data['email']),
            'permission_level' => 'Guest',
            'account_status' => 'Disabled',
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        if ($user->account_status == 'Disabled') {

            $message = 'Account registered successfully but it is currently disabled. Please contact your administrator for access.';

            // Log the user out.
            $this->guard()->logout($request);

            // Add user to Guest Group
            $guestGroup = \gotham\Group::where('name', 'Guests')->first();
            $user->groups()->save($guestGroup);

            // Return them to the log in form.
            return redirect()->back()
                ->withErrors([
                    // This is where we are providing the error message.
                    $message,
                ]);
        }
    }
}
