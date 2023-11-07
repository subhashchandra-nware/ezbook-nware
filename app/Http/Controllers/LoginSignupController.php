<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\EmailApiController;
use App\Http\Controllers\Api\SignupApiController;
use App\Http\Controllers\Api\SiteSettingApiController;
use App\Models\FacProvider;
use App\Models\PasswordReset;
use Illuminate\Http\Request;

class LoginSignupController extends Controller
{
    public function signIn(){
        // Session::flush();
        // Auth::logout();
        // session_unset();
        // Session::flush();
        // session()->getHandler()->destroy(session()->getId());

        // dd(session(), session()->has('userSession'), session()->getId());

        if (session()->has('userSession')) {
            return redirect()->route('setting.index');
            // return redirect('/site-settings');
        }
        return view('sign-in');
    }

    public function signInPost(Request $request){
        $request->validate([
            'EmailAddress' => ['required'],
            'Password' => ['required'],
        ]);

        // $result = (new SignupApiController)->passwordCheck($request);
        // $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        // $finalResult = $array['original'];

        $apiJSON = (new SignupApiController)->passwordCheck($request);
        $original = collect($apiJSON)->get('original');
        $finalResult = $original;
        $userId = "";
        $Loginstatus = $finalResult['status'];
        $message = $finalResult['message'];

        if($Loginstatus == 'success'){
            $userId = $finalResult['user']['id'];
            session()->put('loginUserId',$userId);
            session()->put('userSession',$finalResult);
            session()->put('loginUserName',$finalResult['user']['Name']);
            session()->put('loginEmailAddress',$finalResult['user']['EmailAddress']);

            $checkUserHasMultipleSite = new Request();
            $checkUserHasMultipleSite->setMethod('POST');
            $checkUserHasMultipleSite->request->add(['email' => $request->EmailAddress]);

            $result = (new SiteSettingApiController)->userHasMultipleSite($checkUserHasMultipleSite);
            $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
            $siteResult = $array['original'];
            $totalSiteCount = $siteResult['total_site_count'];
            session()->put('totalSiteCount',$totalSiteCount);
            if($totalSiteCount > 1){
                $siteName = preg_split("/[,]/",$siteResult['site_name']);
                session()->put('allSitesName',$siteName);
                // return redirect()->route('setting.index');
                return redirect('/select-site');
            }else{
                $siteName = $siteResult['site_name'];
                $facProviderId = FacProvider::where('Name', $siteName)->value('id');
                $siteData = FacProvider::where('Name', $siteName)->get()->toArray();
                session()->put('siteName',$siteName);
                session()->put('allSitesName',$siteName);
                session()->put('siteId',$facProviderId);
                session()->put('siteData',$siteData[0]);
                $accountStatus = $this->redirectSingleSite($userId);
                extract($accountStatus);
                // list($IsVerified, $AccountStatus, $IsBusinessProfileUpdated) = $accountStatus;
                // dd($IsVerified, $AccountStatus, $IsBusinessProfileUpdated, $accountStatus);
                if($IsBusinessProfileUpdated == 1){
                    return redirect()->route('dashboard.index');
                }elseif($AccountStatus == 1){
                    return redirect()->route('setting.index');
                    // return redirect('/site-settings');
                }elseif($IsVerified == 1){
                    // return redirect('/welcome');
                    return redirect()->route('login.welcome');
                }else{
                    return redirect()->route('login.email.verify');
                    // return redirect('/welcome');
                }
            }

        }else{
            return back()->with('error',$message);
        }
    }

    public function signupView(){
        return view('signup');
    }

    public function signupDetailSaved(Request $request){
        $request->validate([
            'Name' => ['required','unique:facproviders'],
            'firstName' => ['required'],
            'emailAddress' => ['required','email'],
        ]);

        $data = [];
        // $result = (new SignupApiController)->store($request);
        // $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        // $finalResult = $array['original'];

        $apiJSON = (new SignupApiController)->store($request);
        $original = collect($apiJSON)->get('original');
        // $data = collect($original)->get('data');
        $finalResult = $original;

        $userId= $finalResult['user_id'];
        $status = $finalResult['status'];
        $fullName = $finalResult['name'];
        $emailAddress = $finalResult['emailAddress'];
        if($status == 1){
            $request->session()->put('userSession',$finalResult);
            $myRequest = new Request();
            $myRequest->setMethod('POST');
            $myRequest->request->add(['email' => $emailAddress]);

            $result = (new EmailApiController)->sendPasswordEmail($myRequest);
            $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
            $finalResult = $array['original'];
            $status = $finalResult['status'];
            // dd($array);
            if($status == 'success'){
            return redirect('/verify-email');
            }
        }else{
            // return back()->withInput();
            return back();
        }
    }

    public function emailVerificationSend(){
        if (session()->has('userSession')) {
            $user = session()->get('userSession');
            return view('verify-email',['user' => $user]);
        }else{
            return redirect('/');
        }
        return view('verify-email');
    }

    public function passwordPageView($token){
        $tokenRequest = new Request();
        $tokenRequest->setMethod('POST');
        $tokenRequest->request->add(['token' => $token]);

        $result = (new SignupApiController)->isPasswordResetLinkValid($token);
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];

        if($finalResult['status'] == "success"){
            session()->put('passToken',$token);
            $result = (new SignupApiController)->checkUserhasPassword($tokenRequest);
            $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
            $passwordAlreadySet = $array['original'];
            if($passwordAlreadySet['status'] == 'success'){
                $pass = 'set';
                return view('set-password',compact('pass'));
            }else{
                $pass = '';
                return view('set-password',compact('pass'));
            }
        }else{
            return "Password Reset Link is expired";
        }
    }

    public function setPasswordFirstTime(Request $request){
        $request->validate([
            'password' => ['required','min:8','confirmed'],
            'password_confirmation' => ['required']
        ]);

        $passToken = session()->get('passToken');
        $result = (new SignupApiController)->setFirstTimePassword($request,$passToken);
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        $status = $finalResult['status'];
        if($status == "success"){
            session()->flush();
            return redirect('/')->with('success','Password changed successfully. Please login again');
        }else{
            return back();
        }
    }

    public function passwordAlreadySet(){
        $token = session()->get('passToken');
        $passwordReset = PasswordReset::where('token',$token)->first();
        FacProvider::where('ContactEmail', $passwordReset->email)->update( array('IsVerified'=>1) );
        PasswordReset::where('token',$token)->delete();
        session()->flush();
        return redirect('/')->with('success','Your site is verified. Please login again');
    }

    public function sessionExpire(){
        session()->flush();
        session()->getHandler()->destroy(session()->getId());
        return redirect('/');
    }

    public function welcome(){
        if (session()->has('userSession') && session()->has('siteName')) {
            $siteId = session()->get('siteId');
            $myRequest = new Request();
            $myRequest->setMethod('POST');
            $myRequest->request->add(['id' =>  $siteId]);
            $result = (new SiteSettingApiController)->accountStatusActivated($myRequest);
            $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
            $finalResult = $array['original'];
            // dd($result);
            if($finalResult['status'] == "success"){
                return view('welcome');
            }
        }else{
            return redirect('/');
        }
    }

    public function redirectSingleSite($id){
        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['id' => $id]);

        $data = [];
        $apiJSON = (new SiteSettingApiController)->checkAccountStatus($myRequest);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');

        return $data;
        // $result = (new SiteSettingApiController)->checkAccountStatus($myRequest);
        // $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        // $finalResult = $array['original'];
        // return $finalResult['AccountStatus'];

        // dd($apiJSON, $original, $data, $result, $array, $finalResult);
    }

    /**
     * Summary of selectSite
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @author Subhash Chandra <Subhash.Chandra@nwaresoft.com>
     */
    public function selectSite(){
        $siteName = session()->get('allSitesName');
        return view('select-site',compact('siteName'));
    }


    public function openSite($siteName){
        $siteName = trim($siteName);
        $facProviderId = FacProvider::where('Name', $siteName)->value('id');
        // dd($facProviderId);
        session()->put('siteName',$siteName);
        session()->put('siteId',$facProviderId);
        $accountStatus = $this->redirectSingleSite($facProviderId);
        if($accountStatus == 1){
            return redirect()->route('setting.index');
            // return redirect('/site-settings');
        }else{
            return redirect('/welcome');
        }
    }




    /**
     * END::CLASS
     */
}
