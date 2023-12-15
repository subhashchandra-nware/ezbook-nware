<?php

namespace App\Http\Controllers;

use App\Events\LogEvent;
use App\Http\Controllers\Api\Login\LoginApiController;
use App\Models\FacProvider;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->has('userSession')) {
            return redirect()->route('setting.index');
            // return redirect('/site-settings');
        }
        // dd("subhash");
        return view('pages.logins.login');
    }
    public function admin()
    {
        if (session()->has('userSession')) {
            return redirect()->route('setting.index');
            // return redirect('/site-settings');
        }
        return view('pages.logins.login-admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (session()->has('userSession')) {
            return redirect()->route('setting.index');
            // return redirect('/site-settings');
        }
        return view('pages.logins.register');
    }

    public function selectSite()
    {
        // dd('subhash');
        $siteNames = session()->get('allSitesName');
        return view('pages.logins.select-site', compact('siteNames'));
    }

    public function openSite($siteName)
    {
        $data = [];
        $apiJSON = (new LoginApiController)->openSite($siteName);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        // dd($apiJSON, $original, $data);
        extract($data);
        if ($IsBusinessProfileUpdated == 1) {
            return redirect()->route('dashboard.index');
        } elseif ($AccountStatus == 1) {
            return redirect()->route('setting.index');
        } elseif ($IsVerified == 1) {
            return redirect()->route('login.welcome');
        } else {
            return redirect()->route('login.email.verify');
        }
    }


    public function welcome($id = null)
    {
        if (session()->has('userSession') && session()->has('siteName')) {
            $data = [];
            $siteId = session()->get('siteId');
            $apiJSON = (new LoginApiController)->welcome($siteId);
            $original = collect($apiJSON)->get('original');
            $data = collect($original)->get('data');
            // dd($apiJSON, $original, $data);
            if ($original['status'] == "success") {
                return view('welcome');
            }
        } else {
            return redirect('/');
        }
    }

    public function emailVerificationSend()
    {
        if (session()->has('userSession')) {
            $user = session()->get('userSession');
            $data = [];
            $request = new Request();
            $request->setMethod('POST');
            $request->request->add(['email' => $user['EmailAddress']]);
            $apiJSON = (new LoginApiController)->emailVerificationSend($request);
            $original = collect($apiJSON)->get('original');
            $data = collect($original)->get('data');
            $mailData = collect($original)->get('mail-data');
            $token = $original['token'];

            // dd(session(), session()->get('userSession'), $original);
            return view('pages.logins.verify-email', compact('user', 'token', 'mailData', 'data'));
            // return view('verify-email',['user' => $user]);
        }else{
            return redirect()->route('login');
            // return redirect('/');
        }
    }









    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => ['required', 'unique:facproviders'],
            'firstName' => ['required'],
            'emailAddress' => ['required', 'email'],
        ]);

        $data = [];
        $apiJSON = (new LoginApiController)->store($request);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        // dd($apiJSON, $original, $data);
        if ($original['status'] == 'success') {
            $request->session()->put('userSession',$data);
            return redirect()->route('login.email.verify');
            // return redirect('/verify-email');
        } else {
            // return back()->withInput();
            return back()->with($original['status'], $original['message']);
        }
        // return redirect()->route('register')->with($msg['status'], $msg['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $log['userName'] = session()->get('loginEmailAddress');
        session()->flush();
        session()->getHandler()->destroy(session()->getId());
        $log['result'] = 'LogOut';
        event(new LogEvent($log));
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $log = ['userName' => $request->EmailAddress];
        $request->validate([
            'EmailAddress' => ['required', 'email'],
            'Password' => ['required'],
        ]);
        $data = [];
        $apiJSON = (new LoginApiController)->login($request);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                session()->put($key, $value);
            }
        }
        if($original['status'] == 'success'){
            $log['result'] = "LogIn";
        }else{
            $log['result'] = "LogIn Fail";
        }
        event(new LogEvent($log));

        return redirect()->route($original['redirect']['route'])->with($original['status'], $original['message']);
    }

    /**
     * END::CLASS
     */
}
