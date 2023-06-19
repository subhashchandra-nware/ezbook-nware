<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\UsersApiController;
use App\Models\UserType;
use App\Models\User;

class UserController extends Controller
{
    public function addUser(){
        $result = (new UsersApiController)->getAllUserType();
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        $allUserType = $finalResult['userType'];
        return view('add-user',compact('allUserType'));
    }

    public function addUserPost(Request $request){
        //dd($request->all());
        $request->validate([
            'Name' => ['required'],
            'LogonName' => ['required'],
            'LogonPassword' => ['required'],
            'EmailAddress' => ['required','email'],
            'AdminLevel' => 'required'
        ]);

        $result = (new UsersApiController)->addUser($request);
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        if($finalResult['status'] == 'success'){
            return redirect('/user');
        }
    }

    public function getAllUser(){
        $siteId = session()->get('siteId');
        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['siteId' => $siteId]);

        $result = (new UsersApiController)->getAllUser($myRequest);
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        if($finalResult['status'] == 'success'){
            $users = $finalResult['User'];
            return view('user',compact('users'));
        }
    }
}
