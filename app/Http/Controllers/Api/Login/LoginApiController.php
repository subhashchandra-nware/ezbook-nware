<?php

namespace App\Http\Controllers\Api\Login;

use App\Http\Controllers\Controller;
use App\Models\FacProvider;
use App\Models\PasswordReset;
use App\Models\User;
use App\Models\UserProviderMapping;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    public function openSite($siteName)
    {
        $siteName = trim($siteName);
        // $data = FacProvider::where('Name', $siteName)->get(['id', 'IsVerified', 'AccountStatus', 'IsBusinessProfileUpdated'])->firstOrFail()->toArray();
        $data = FacProvider::with('Users')->where('Name', $siteName)->get(['id', 'IsVerified', 'AccountStatus', 'IsBusinessProfileUpdated'])->firstOrFail();
        // dd($data);
        session()->put('siteName', $siteName);
        session()->put('siteId', $data->id);
        // session()->put('d', $data);
        session()->put('userSession', $data->Users->first()->toArray());
        session()->put('loginUserId', $data->Users->first()->id);
        session()->put('loginUserName', $data->Users->first()->Name);
        session()->put('loginEmailAddress', $data->Users->first()->EmailAddress);
        // session()->put('daa', $d->Users->first()->Name);
        try {
            if ($data) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Account Status value.',
                    'data' => $data->toArray(),
                ], 200);
            }
        } catch (\Throwable $th) {
            // dd($facProviderId, $updateAccountStatus);
            // throw $th;
            return response()->json([
                'status' => 'error',
                // 'message' => 'Account Status value.',
                'data' => $th->getMessage(),
            ], 400);
        }
    }


    public function welcome($id)
    {
        $FacProvider = FacProvider::find($id);
        try {
            if (!$FacProvider->AccountStatus) {
                $FacProvider->AccountStatus = 1;
                $FacProvider->save();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Account Status value updated',
                    'AccountStatus' => $FacProvider->AccountStatus,
                    'data' => $FacProvider,
                ], 200);
            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Account Status value already updated',
                    'AccountStatus' => $FacProvider->AccountStatus,
                    'data' => $FacProvider,
                ], 200);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => ['required', 'unique:facproviders'],
            'firstName' => ['required'],
            'emailAddress' => ['required', 'email'],
        ]);

        $fullName = $request->firstName . " " . $request->lastName;

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->messages()], 400);
        } else {
            // $userExists = User::with('FacProviders')->where('EmailAddress', '=', $request->emailAddress)->get()->toArray();
            // dd($request->all(), $userExists);

            $userExists = User::where('EmailAddress', '=', $request->emailAddress)->first();
            if ($userExists != null) {
                $userData = [
                    'Name' => $fullName,
                    'LoginName' => '',
                    'Password' => $userExists->Password ?? '',
                    'EmailAddress' => $userExists->EmailAddress,
                    'AdminLevel' => 1,
                ];
            } else {
                $userData = [
                    'Name' => $fullName,
                    'LoginName' => '',
                    'Password' => '',
                    'EmailAddress' => $request->emailAddress,
                    'AdminLevel' => 1,
                ];
            }
            $facprovidersData = [
                'Name' => trim($request->Name),
                'LoginName' => '',
                'ContactName' => $fullName,
                'ContactEmail' => $request->emailAddress,
                'HomeURL' => '',
                'ExpiryDate' => date("Y-m-d h:i:s"),
                'AccountStatus' => 0,
                'TimeZone' => '',
                'IsVerified' => ($userExists != null) ? 1 : 0,
                'IsBusinessProfileUpdated' => 0,

            ];


            $email = $request->emailAddress;
            $token = Str::Random(60);

            DB::beginTransaction();
            try {
                $user = User::create($userData);
                $facprovidersData['CreatedBy'] = $user->id;
                $user->FacProviders()->create($facprovidersData);
                if($userExists == null){
                    PasswordReset::create(['email' => $email, 'token' => $token,]);
                }
                DB::commit();
                Mail::Send('pages.logins.mail',['token' => $token,'fullName' => $fullName],function(Message $message)use($email){
                    $message->subject('Verify your site');
                    $message->to($email);
                   });
                return response()->json([
                    'message' => 'User register Successfully',
                    'status' => 'success',
                    'user_id' => $user->id,
                    'name' => $user->Name,
                    'emailAddress' => $user->EmailAddress,
                    'user' => $user,
                    'data' => $user,
                ], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                // echo '<pre>';print_r($e->getMessage());echo '</pre>';
                return response()->json([
                    'message' => 'User not Register',
                    'status' => 0,
                    'data' => $e->getMessage(),
                ], 500);
            }
            // dd($request->all(), $userExists, $user);

        }
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
    public function destroy(string $id)
    {
        session()->flush();
        session()->getHandler()->destroy(session()->getId());
        redirect()->route('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'EmailAddress' => ['required', 'email'],
            'Password' => ['required'],
        ]);

        $data = [];
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->messages()], 400);
        } else {
            $users = User::where([
                ['EmailAddress', '=',  $request->EmailAddress],
                ['deleted_at', '=', NULL]
            ]);
            $usersWithFacProviders = $users->with('FacProviders')->get();
            $user = $users->first();

            // dd($usersWithFacProviders->toArray() );
            if ($user != null) {
                if($user->Password == ''){
                    // return redirect()->route('login.email.verify');
                    return response()->json([
                        'status' => 'warning',
                        'message' => 'Email id is not verified.',
                        'redirect' => ['route' => 'login.email.verify', 'url' => route('login.email.verify')],
                        'data' => $user->toArray(),
                    ], 200);
                }
                $res = Hash::check($request->Password, $user->Password);
                if ($res) {
                    $FacProviders = collect($usersWithFacProviders->toArray())->pluck('fac_providers.0');
                    $siteNames = collect($FacProviders)->pluck('Name')->all();
                    // dd( $FacProviders->all(), $FacProviders->count(), $usersWithFacProviders->toArray(), $usersWithFacProviders->count(), $siteNames);

                    // session()->put('userSession', $user->toArray());
                    // session()->put('loginUserId', $user->id);
                    // session()->put('loginUserName', $user->Name);
                    // session()->put('loginEmailAddress', $user->EmailAddress);
                    // session()->put('totalSiteCount', $usersWithFacProviders->count());

                    $data = [
                        'userSession' => $user->toArray(),
                        'loginUserId' => $user->id,
                        'loginUserName' => $user->Name,
                        'loginEmailAddress' => $user->EmailAddress,
                        'totalSiteCount' => $usersWithFacProviders->count(),
                    ];

                    if ($usersWithFacProviders->count() > 1) {
                        // session()->put('allSitesName', $siteNames);
                        // return redirect()->route('login.selectSite');

                        $data['allSitesName'] = $siteNames;
                        return response()->json([
                            'status' => 'success',
                            'message' => 'Multiple Site Exist.',
                            'totalSiteCount' => $usersWithFacProviders->count(),
                            'redirect' => ['route' => 'login.selectSite', 'url' => route('login.selectSite')],
                            'data' => $data,
                        ], 200);
                    } else {
                        $collect = collect($usersWithFacProviders->first()->FacProviders->toArray());
                        $siteData = $collect->all();
                        $siteName = $collect->value('Name');
                        $facProviderId = $collect->value('id');

                        $IsBusinessProfileUpdated = $collect->value('IsBusinessProfileUpdated');
                        $AccountStatus = $collect->value('AccountStatus');
                        $IsVerified = $collect->value('IsVerified');

                        // session()->put('siteName', $siteName);
                        // session()->put('allSitesName', $siteName);
                        // session()->put('siteId', $facProviderId);
                        // session()->put('siteData', $siteData[0]);
// dd($usersWithFacProviders->toArray(), $usersWithFacProviders->first()->FacProviders->toArray(), $collect);
                        $data['siteName'] = $siteName;
                        $data['allSitesName'] = $siteName;
                        $data['siteId'] = $facProviderId;
                        $data['siteData'] = $siteData[0];


                        if ($IsBusinessProfileUpdated == 1) {
                            $redirect = 'dashboard.index';
                            // return redirect()->route($redirect);
                        } elseif ($AccountStatus == 1) {
                            $redirect = 'setting.index';
                            // return redirect()->route($redirect);
                            // return redirect('/site-settings');
                        } elseif ($IsVerified == 1) {
                            $redirect = 'login.welcome';
                            // return redirect('/welcome');
                            // return redirect()->route($redirect);
                        } else {
                            $redirect = 'login.email.verify';
                            // return redirect()->route($redirect);
                            // return redirect('/welcome');
                        }

                        return response()->json([
                            'status' => 'success',
                            'message' => 'Single Site Exist.',
                            'totalSiteCount' => $usersWithFacProviders->count(),
                            'redirect' => ['route' => $redirect, 'url' => route($redirect)],
                            'data' => $data,
                        ], 200);
                    }
                } else {
                    return response()->json([
                        'status' => 'failed',
                        'message' => 'Email and Password do not match',
                        'redirect' => ['route' => 'login', 'url' => route('login')],
                    ], 200);
                }
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Email id not exists',
                    'redirect' => ['route' => 'login', 'url' => route('login')],
                ], 200);
            }
        }
    }


    public function emailVerificationSend(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => ['required'],
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(),400);
        }

        $user = User::where('EmailAddress', '=', $request->email)->first();

        $email = $request->email;
        $token = Str::Random(60);

        PasswordReset::create([
            'email' => $email,
            'token' => $token,
            // 'created_at' => Carbon::now()
        ]);

       // dump("http://127.0.0.1:8000/api/email-send/".$token);
       $fullName = $user->Name;
       Mail::Send('mail',['token' => $token,'fullName' => $fullName],function(Message $message)use($email){
        $message->subject('Verify your site');
        $message->to($email);
       });

        return response()->json([
            'message' => 'Email Sent',
            'status' => 'success',
            'token' => $token,
        ],200);
    }







    /**
     * END::CLASS
     */
}
