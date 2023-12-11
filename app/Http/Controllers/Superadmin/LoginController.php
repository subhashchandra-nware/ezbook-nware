<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    // use ResetsPasswords;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::SUPER_ADMIN_HOME;

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
        $user = User::where($this->username, $request->{$this->requestUseername})->get(['AdminLevel'])->first();
        // dd($request, $user, $user->count());
        if(isset($user->type) && $user->type == 'superadmin'){
        return [
            $this->username => $request->{$this->requestUseername},
            $this->password => $request->{$this->requestPassword},
        ];
    }else{
        return [
            $this->username => '',
            $this->password => '',
        ];
    }
    }

    public function redirectPath()
    {
        return $this->redirectTo;
    }


    protected function authenticated(Request $request, $user)
    {
        // dd($request, $user);
        if ($user->AdminLevel == 'superadmin') {
            return redirect()->route('superadmin.dashboard');
        }
        // elseif ($user->AdminLevel == 'admin') {
        //     // return redirect()->route('admin.dashboard');
        //     return redirect()->intended($this->redirectTo);
        // }
        // elseif ($user->AdminLevel == 'user') {
        //     return redirect()->route('user.dashboard');
        // }
        return response()->json(["No Route Found."]);
        // return redirect()->route('home')->with('error', 'No Route .');
    }

    protected function loggedOut(Request $request)
    {
        // dd($request);
        return redirect()->route($request->routeName);
    }


    public function showLoginForm()
    {
        // dd(Auth::check(), $this->redirectTo);
        if (Auth::check()) {
            return redirect()->intended($this->redirectTo);
       } else {
           return view('pages.superadmin.logins.login');
       }
    }

    public function index() {
        return $this->showLoginForm();
    }

    /////////////////////////////////////////////////////////////





    /**
     * END::CLASS
     */
}


/*

php artisan make:controller Superadmin/BillingQueryController -r
php artisan make:controller Superadmin/SaleQueryController -r
php artisan make:controller Superadmin/BookingActivityReportController -r
php artisan make:controller Superadmin/SiteDetailsController -r
php artisan make:controller Superadmin/LoginController -r
php artisan make:controller Superadmin/ResetPasswordController -r

*/
