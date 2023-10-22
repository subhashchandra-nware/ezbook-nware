<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\UsersApiController;
use App\Models\UserType;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        if (!session()->has('loginUserId')) {
            return redirect('/sign-in');
        }
        $data = [];
        $siteId = session()->get('siteId');
        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['siteId' => $siteId]);

        $apiJSON = (new UsersApiController)->index($myRequest);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        // dd($data);
        return view('pages.users.user-list', compact('data'))->with($original['status'], $original['message']);

    }
    public function create()
    {
        $data = [];
        $siteId = session()->get('siteId');
        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['siteId' => $siteId]);

        $apiJSON = (new UsersApiController)->create($myRequest);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        // dd($data);
        return view('pages.users.user-add', compact('data'))->with($original['status'], $original['message']);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = [];
        $siteId = session()->get('siteId');
        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['siteId' => $siteId]);

        $apiJSON = (new UsersApiController)->store($request);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        // dd($apiJSON, $original, $data);
        return redirect()->route('user.index')->with($original['status'],$original['message']);
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $data = [];
        $siteId = session()->get('siteId');
        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['siteId' => $siteId]);
        $myRequest->request->add(['id' => $id]);

        $apiJSON = (new UsersApiController)->edit($myRequest);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        // dd($data);
        return view('pages.users.user-edit', compact('data'))->with($original['status'], $original['message']);
    }
    public function update(Request $request, User $user)
    {
        $data = [];
        $siteId = session()->get('siteId');
        $request->request->add(['siteId' => $siteId]);

        // dd($siteId, $myRequest->all(), $request->all());
        $apiJSON = (new UsersApiController)->update($request, $user);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        // dd($apiJSON, $original, $data);
        return redirect()->route('user.index')->with($original['status'],$original['message']);

    }
    public function destroy($id)
    {
    }

    public function addUser()
    {
        $siteId = session()->get('siteId');
        $userGroups = UserGroup::where('ProviderID', $siteId)->select('id', 'Name')->get()->toArray();
        $result = (new UsersApiController)->getAllUserType();
        $array = json_decode(json_encode($result), JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        $allUserType = $finalResult['userType'];
        // dd($allUserType);
        return view('pages.users.user-add', compact('allUserType', 'userGroups'));
        // return view('add-user',compact('allUserType','userGroup'));
    }

    public function addUserPost(Request $request)
    {
        // dd($request->all());
        // dd($finalResult);
        $request->validate([
            'Name' => ['required'],
            'LoginName' => ['required'],
            'LogonPassword' => ['required'],
            'EmailAddress' => ['required', 'email'],
            'AdminLevel' => 'required'
        ]);

        // $result = (new UsersApiController)->addUser($request);
        // $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        // $finalResult = $array['original'];

        $data = [];
        $apiJSON = (new UsersApiController)->addUser($request);
        $original = collect($apiJSON)->get('original');
        // $data = collect($original)->get('data');
        $finalResult = $original;
        return redirect('/user')->with($original['status'], $original['message']);

        if ($finalResult['status'] == 'success') {
            return redirect('/user')->with($original['status'], $original['message']);
        }
    }

    public function getAllUser()
    {
        if (!session()->has('loginUserId')) {
            return redirect('/sign-in');
        }
        $siteId = session()->get('siteId');
        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['siteId' => $siteId]);

        $result = (new UsersApiController)->getAllUser($myRequest);
        $array = json_decode(json_encode($result), JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        if ($finalResult['status'] == 'success') {
            $users = $finalResult['User'];
            return view('user', compact('users'));
        }
    }

    public function editUser($id)
    {
        $user  = User::find($id);
        $usergroups = UserGroup::all()->toArray();
        // dd($user->toArray());
        if ($user != null) {
            $result = (new UsersApiController)->getAllUserType();
            $array = json_decode(json_encode($result), JSON_UNESCAPED_SLASHES);
            $finalResult = $array['original'];
            $allUserType = $finalResult['userType'];
            return view('pages.users.user-add-edit', compact('user', 'allUserType', 'usergroups'));
            // return view('edit-user',compact('user','allUserType'));
        } else {
            return redirect('/user');
        }
    }

    public function editUserPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => 'required',
            'Name' => ['required'],
            'LogonName' => ['required'],
            'EmailAddress' => ['required'],
            'AdminLevel' => 'required'
        ]);
        $validator->validate();
        //  $result = (new UsersApiController)->editUserPost($request);
        //  $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        //  $finalResult = $array['original'];

        $data = [];
        $apiJSON = (new UsersApiController)->editUserPost($request);
        $original = collect($apiJSON)->get('original');
        //  $data = collect($original)->get('data');
        $finalResult = $original;
        //  dd($finalResult);
        if ($finalResult['status'] == 'success') {
            return redirect('/user');
        } else {
            return back()->with($finalResult['status'], $finalResult['message']);
        }
    }

    public function password()
    {
        return view('pages.users.password-edit');
    }
    public function updatePassword(Request $request)
    {
        $data = [];
        $apiJSON = (new UsersApiController)->updatePassword($request);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        // dd( $request->all(), $apiJSON);
        // dd($original, $apiJSON);
        return redirect()->route('password.reset')->with($original['status'], $original['message']);
    }

    // public function deleteUser($id){
    //     dd("deleted");
    // }
}
