<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Auth;
use Str;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $loginPath = '/letadminin';

    
    public function redirectTo()
    {

        return redirect('/admin');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        // if (Str::contains(url()->previous(), ['/member/', '/'.lng().'/member/'])) {
        //     return redirect()->route('front.login');
        // }

        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $input = $request->all();

        $remember = $request->has('remember') ? true : false;

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if (auth()->attempt([$fieldType => $input['email'], 'password' => $input['password']], $remember)) {
            return redirect('/admin');
                
        } else {
            return redirect()->back()
                ->with('error', 'Your Credentials are invalid');
        }
    }

    public function logout()
    {
        if(Auth::check()) {
            Auth::logout();
        }
        return redirect('/letadminin');
    }
}
