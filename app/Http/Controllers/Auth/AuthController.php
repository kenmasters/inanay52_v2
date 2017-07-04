<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // return Validator::make($data, [
        //     'email' => 'required|email|max:255|unique:users',
        //     'password' => 'required|min:6|confirmed',
        // ]);


        // Username login implementation
        return Validator::make($data, [
            'username' => 'bail|required|min:6|unique:users',
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
        // return User::create([
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ]);

        return User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }


    /**
     * Get the login username to be used by the controller.
     * The name of the field in login template
     * @return string
     */
    public function loginUsername()
    {
        return 'login';
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        $login = $request->get('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return [
            $field => $login,
            'password' => $request->get('password'),
        ];
    }


    // Redirect to home page when `/register` is requested.
    // public function showRegistrationForm() {
    //     return redirect('/');
    // }

    // Redirect to home page when `/login` is requested.
    // public function showLoginForm() {
    //     return redirect('/');
    // }

    // /**
    //  * Where to redirect users after login / registration.
    //  *
    //  * @var string
    //  */
    // protected function authenticated($request, $user)
    // {   
    //     if($user->isAdmin()) {
    //         return redirect()->intended('/dashboard');
    //     }
    //     return redirect()->intended('/profile');
    // }
}
