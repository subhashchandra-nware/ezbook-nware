<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::SUPER_ADMIN_HOME;
    protected $username = 'EmailAddress';
    protected $password = 'password';
    protected $PasswordConfirmation = 'password_confirmation';
    protected $token = 'token';

    protected $requestUseername = 'email';
    protected $requestPassword = 'password';
    protected $requestPasswordConfirmation = 'password_confirmation';
    protected $requestToken = 'token';


    public function credentials(Request $request)
    {
        return [
            $this->username => $request->{$this->requestUseername},
            $this->password => $request->{$this->requestPassword},
            $this->PasswordConfirmation => $request->{$this->requestPasswordConfirmation},
            $this->token => $request->{$this->requestToken},
        ];
    }

    public function showResetForm()
    {
        $user = auth()->user();
        $token = app('auth.password.broker')->createToken($user);
        return view('pages.superadmin.logins.reset-password', compact('user', 'token'));
    }




    /**
     * END::CLASS
     */
}
