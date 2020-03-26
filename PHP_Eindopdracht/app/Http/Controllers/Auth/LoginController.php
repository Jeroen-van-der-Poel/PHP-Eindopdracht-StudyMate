<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function attemptLogin(Request $request) {
        $users = User::all();
        $isUserValidated=false;
        $field = $request->email;

        foreach ($users as $user) {
            try { // required if the field is not encrypted
                // login using username or email
                if (($field == $user->email) && \Hash::check($request->password, $user->password)) {
                    $isUserValidated=true;
                    $this->guard()->login($user,false);
                    break; // Exit from the foreach loop
                }
            } catch (DecryptException $e) {
                // nothing
            }
        }
        return $isUserValidated;
    }
}
