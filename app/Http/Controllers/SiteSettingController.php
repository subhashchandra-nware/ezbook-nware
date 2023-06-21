<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\SiteSettingApiController;
use App\Models\FacProvider;

class SiteSettingController extends Controller
{
    public function siteSettings(){
        $siteId = session()->get('siteId');
        $result = (new SiteSettingApiController)->firstTimeSiteSettingsDetails($siteId);
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        $registrationDate = $finalResult['created_date'];
        $data = $finalResult['facProviderData'];
        // session()->put('siteUserName',FacProvider::currentSite()->ContactName);
        // session()->put('siteEmailAddress',FacProvider::currentSite()->ContactEmail);
        return view('site-setting',compact('data','registrationDate'));
    }

    public function siteSettingsPost(Request $request){
        $request->validate([
            'companyName' => ['required'],
            'siteId' => ['required'],
            'companySite' => ['required'],
            'contactName' => ['required'],
            'email' => ['required'],
            'mobileNumber' => ['required'],
            'address1' => ['required'],
            'address2' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'zipcode' => ['required'],
            'registrationDate' => ['required'],
        ]);
        $result = (new SiteSettingApiController)->siteDetailSaved($request);
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        if($finalResult['status'] == 'success'){
            return redirect('/dashboard');
        }else{
            return back();
        }
    }
}
