<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserGroupApiController;
use App\Models\UserGroup;

class UserGroupController extends Controller
{
    public function userGroup(){
        $siteId = session()->get('siteId');
        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['siteId' => $siteId]);

        $result = (new UserGroupApiController)->getAllUserGroup($myRequest);
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        if($finalResult['status'] == 'success'){
            $userGroup = $finalResult['userGroup'];
            return view('user-groups',compact('userGroup'));
        }
    }

    public function addUserGroup(){
        return view('add-user-group');
    }

    public function addUserGroupPost(Request $request){
       $request->validate([
        'Name' => ['required'],
        'Description' => ['required'],
       ]);
        $request->request->add(['siteId' => session()->get('siteId')]); //add request
        $request->request->add(['CreatedBy' => session()->get('loginUserId')]); //add request        

        $result = (new UserGroupApiController)->addUserGroup($request);
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        if($finalResult['status'] == "success"){
            return redirect('/user-groups');
        }else{
            return back();
        }
    }

    public function editUserGroup($id){
        $userGroup = UserGroup::find($id);
        if($userGroup == null){
            return redirect('/user-groups');
        }else{
            return view('edit-user-group',compact('userGroup'));
        }
    }

    public function editUserGroupPost(Request $request){
     $result = (new UserGroupApiController)->updateUserGroup($request);
     $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
     $finalResult = $array['original'];
     if($finalResult['status'] == 'success'){
        return redirect('/user-groups');
     }else{
        return back();
     }
    }
}
