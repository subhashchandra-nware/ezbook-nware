<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserGroupApiController;
use App\Models\UserGroup;

class UserGroupController extends Controller
{
    public function index(){}
    public function create(Request $request){}
    public function store(Request $request){}
    public function show(UserGroup $userGroup){}
    public function edit(UserGroup $userGroup){}
    public function update(Request $request, UserGroup $userGroup){}
    public function destroy(UserGroup $userGroup){}

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
        $data = [];
        $siteId = session()->get('siteId');
        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['siteId' => $siteId]);

        $apiJSON = (new UserGroupApiController)->getUsersInSite($myRequest);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        // dd($data);
        return view('add-user-group' ,compact('data'));
    }

    public function addUserGroupPost(Request $request){
       $request->validate([
        'Name' => ['required'],
        'Description' => ['required'],
       ]);
        $request->request->add(['siteId' => session()->get('siteId')]); //add request
        $request->request->add(['ProviderID' => session()->get('siteId')]); //add request
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
        $userGroup = UserGroup::with('UsersInGroups')->find($id);
        $data = [];
        $siteId = session()->get('siteId');
        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['siteId' => $siteId]);
        $apiJSON = (new UserGroupApiController)->getUsersInSite($myRequest);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');

        // dd($data,$userGroup->toArray());
        if($userGroup == null){
            return redirect('/user-groups');
        }else{
            return view('edit-user-group',compact('userGroup', 'data'));
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
