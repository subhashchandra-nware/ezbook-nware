<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    protected $username = 'EmailAddress';
    protected $password = 'password';
    protected $requestUseername = 'email';
    protected $requestPassword = 'password';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function showLoginForm(){}

    public function credentials(Request $request)
    {
        return [
            $this->username => $request->{$this->requestUseername},
            $this->password => $request->{$this->requestPassword},
        ];
    }
    public function login(Request $request)
    {
        $request->validate([
            $this->requestUseername => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
            $this->requestPassword => 'required|string',
        ]);
        // dd(auth()->attempt($this->credentials($request)) );
        if (auth()->attempt($this->credentials($request))) {
            if (auth()->user()->AdminLevel == 'superadmin') {
                return redirect()->route('superadmin');
            } elseif (auth()->user()->AdminLevel == 'admin') {
                return redirect()->route('admin');
            } elseif (auth()->user()->AdminLevel == 'user') {
                return redirect()->route('user');
            }
            return redirect()->route('home')->with('error', 'No Route .');
        } else {
            return redirect()->route('login')->with('error', 'Email and Password is Wrong.');
        }
    }


    /**
     * END::CLASS
     */
}
