<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\UsersApiController;
use App\Models\UserType;
use App\Models\User;
use App\Models\UserGroup;

class UserController extends Controller
{
    public function addUser(){
        $siteId = session()->get('siteId');
        $userGroup = UserGroup::where('ProviderID',$siteId)->select('id','Name')->get();
        $result = (new UsersApiController)->getAllUserType();
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        $allUserType = $finalResult['userType'];
        return view('add-user',compact('allUserType','userGroup'));
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
        if(!session()->has('loginUserId')){
            return redirect('/sign-in');
        }
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

    public function editUser($id){
        $user  = User::find($id);
        if($user !=null){
        $result = (new UsersApiController)->getAllUserType();
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        $allUserType = $finalResult['userType'];
            return view('edit-user',compact('user','allUserType'));
        }else{
            return redirect('/user');
        }
    }

    public function editUserPost(Request $request){
     $result = (new UsersApiController)->editUserPost($request);
     $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
     $finalResult = $array['original'];
     if($finalResult['status'] == 'success'){
        return redirect('/user');
     }else{
        return back();
     }
    }

    // public function deleteUser($id){
    //     dd("deleted");
    // }
}
