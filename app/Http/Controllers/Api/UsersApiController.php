<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserType;
use App\Models\FacProvider;
use App\Models\UserGroup;
use App\Models\UserProviderMapping;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UsersApiController extends Controller
{
    public function index(Request $request){
        $validator = Validator::make($request->all(), [
            'siteId' => ['required'],
        ]);

        $data = [];
        if ($validator->fails()) {
            return response()->json(['status' =>'error', 'message' => $validator->messages()], 400);
        } else {
            $users = User::with('FacProviders','userType')
            ->whereHas('FacProviders', function($q) use ($request){
                $q->where('ProviderId', $request->siteId);
            })
            ->get();
            // ->toSql();
            $data['users'] = $users;
            // dd($users);
            // $results = DB::select("SELECT users.id as id,Name,EmailAddress,PhoneNumbers,AdminLevel,userType FROM `user_provider_mapping` INNER JOIN users on users.id = user_provider_mapping.UserId INNER JOIN usertype on usertype.id = users.AdminLevel where deleted_at IS NULL and user_provider_mapping.ProviderId =" . $request->siteId);
            if ($data != null) {
                return response()->json([
                    'message' => 'User Found',
                    'status' => 'success',
                    'data' => $data
                ], 200);
            } else {
                return response()->json([
                    'message' => 'User not Found',
                    'status' => 'failed',
                    'data' => null,
                ], 200);
            }
        }
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'siteId' => ['required'],
        ]);

        $data = [];
        if ($validator->fails()) {
            return response()->json(['status' =>'error', 'message' => $validator->messages()], 400);
        } else {
            $UserGroups = UserGroup::where('ProviderID', $request->siteId)->select('id', 'Name')->get()->toArray();
            $UserTypes = UserType::all()->toArray();
            // ->toSql();
            $data['UserGroups'] = $UserGroups;
            $data['UserTypes'] = $UserTypes;
            // dd($users);
            // $results = DB::select("SELECT users.id as id,Name,EmailAddress,PhoneNumbers,AdminLevel,userType FROM `user_provider_mapping` INNER JOIN users on users.id = user_provider_mapping.UserId INNER JOIN usertype on usertype.id = users.AdminLevel where deleted_at IS NULL and user_provider_mapping.ProviderId =" . $request->siteId);
            if ($data != null) {
                return response()->json([
                    'message' => 'User group and type Found.',
                    'status' => 'success',
                    'data' => $data
                ], 200);
            } else {
                return response()->json([
                    'message' => 'User group and type not Found.',
                    'status' => 'failed',
                    'data' => null,
                ], 200);
            }
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'siteId' => 'required',
            'Name' => ['required'],
            'LoginName' => ['required'],
            'Password' => ['required'],
            'EmailAddress' => ['required'],
            'AdminLevel' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>'error', 'message' => $validator->messages()], 400);
        } else {
            $requestData = $request->all();
            if ($request->has('Password')) {
                $requestData['Password'] =  Hash::make($request->Password);
                // dd('subhash');
            }
            // dd( $requestData, $request->all());
            DB::beginTransaction();
            try {
                $user = User::create($requestData);
                $userProviderMappingData = [
                    // 'UserId' => $user->id,
                    'ProviderId' => $request->siteId,
                    'Active' => 1,
                ];
                $user->UserProviderMappings()->create($userProviderMappingData);
                $GroupID = $this->columnDataArr($request->all('GroupID'), ['GroupID']);
                if($request->GroupID){
                    $user->UsersInGroups()->createMany($GroupID);
                    // $user->UsersInGroups()->create(['GroupID' => $request->GroupID]);
                    // $userProviderMapping = UserProviderMapping::create($userProviderMappingData);
                }
                DB::commit();
                return response()->json([
                    'message' => 'User register Successfully',
                    'status' => 'success',
                    'data' => ['user'=>$user],
                ], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                // echo "<pre>";
                // print_r($e->getMessage());
                // echo "</pre>";
                return response()->json([
                    'message' => 'User not Register',
                    'status' => 'failed',
                    'data' => $e->getMessage(),
                ], 500);
            }
        }

    }

    public function show(Request $request){}
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'siteId' => ['required'],
            'id' => ['required'],
        ]);

        $data = [];
        if ($validator->fails()) {
            return response()->json(['status' =>'error', 'message' => $validator->messages()], 400);
        } else {
            $users = User::with('FacProviders','userType', 'UsersInGroups')
            ->whereHas('FacProviders', function($q) use ($request){
                $q->where('ProviderId', $request->siteId);
            })->where('id', $request->id)
            ->get();
            // ->toArray();
            // ->toSql();
            // dd($request->all(), $users);

            $UserGroups = UserGroup::where('ProviderID', $request->siteId)->select('id', 'Name')->get()->toArray();
            $UserTypes = UserType::all()->toArray();
            // ->toSql();
            $data['UserGroups'] = $UserGroups;
            $data['UserTypes'] = $UserTypes;
            $data['users'] = $users;
            // dd($users);
            if ($data != null) {
                return response()->json([
                    'message' => 'User Found.',
                    'status' => 'success',
                    'data' => $data
                ], 200);
            } else {
                return response()->json([
                    'message' => 'User not Found.',
                    'status' => 'failed',
                    'data' => null,
                ], 200);
            }
        }
    }
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'siteId' => 'required',
            'Name' => ['required'],
            'LoginName' => ['required'],
            // 'Password' => ['required'],
            'EmailAddress' => ['required'],
            'AdminLevel' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>'error', 'message' => $validator->messages()], 400);
        } else {
            $requestData = $request->all();
            if ($request->has('Password')) {
                $requestData['Password'] =  Hash::make($request->Password);
                // dd('subhash');
            }
            $GroupID = $this->columnDataArr($request->all('GroupID'), ['GroupID']);
            // dd( $requestData, $request->all(), $GroupID);
            $user->fill($requestData);
            DB::beginTransaction();
            try {
                $user->save();
                if($request->GroupID){
                    // $user->UsersInGroups()->update(['GroupID' => $request->GroupID]);
                    $user->UsersInGroups()->delete();
                    $user->UsersInGroups()->createMany($GroupID);
                }
                DB::commit();
                return response()->json([
                    'message' => 'User Update Successfully',
                    'status' => 'success',
                    'data' => ['user'=>$user],
                ], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                // echo "<pre>";
                // print_r($e->getMessage());
                // echo "</pre>";
                return response()->json([
                    'message' => 'User not Update',
                    'status' => 'failed',
                    'data' => $e->getMessage(),
                ], 500);
            }
        }
    }
    public function destroy(Request $request, $id){
        DB::beginTransaction();
        try {
        $user = User::find($id);
        $user->delete();
        DB::commit();
        return response()->json(['status' =>'success', 'message' => 'User is deleted.'], 200);
        } catch (\Exception $exc) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message'=> $exc->getMessage()], 500);
        }

    }

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'siteId' => 'required',
            'Name' => ['required'],
            'LoginName' => ['required'],
            'LogonPassword' => ['required'],
            'EmailAddress' => ['required'],
            'AdminLevel' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>'error', 'message' => $validator->messages()], 400);
        } else {


            $siteId = $request->siteId;
            $ManageUsers = 0;
            $ManageFacilities = 0;
            $ManageSysSettings = 0;
            $CollectiveBookings = 0;
            $CancelBookings = 0;
            if ($request->has('ManageUsers')) {
                $ManageUsers = 1;
            }
            if ($request->has('ManageFacilities')) {
                $ManageFacilities = 1;
            }
            if ($request->has('ManageSysSettings')) {
                $ManageSysSettings = 1;
            }
            if ($request->has('CollectiveBookings')) {
                $CollectiveBookings = 1;
            }
            if ($request->has('CancelBookings')) {
                $CancelBookings = 1;
            }
            $userData = [
                'Name' => $request->Name,
                'LoginName' => $request->LogonName,
                'Password' =>  Hash::make($request->LogonPassword),
                'EmailAddress' => $request->EmailAddress,
                'PhoneNumbers' => $request->PhoneNumbers,
                'Description' => $request->Description,
                'AdminLevel' => $request->AdminLevel,
                'ManageUsers' => $ManageUsers,
                'ManageFacilities' => $ManageFacilities,
                'ManageSysSettings' => $ManageSysSettings,
                'CollectiveBookings' => $CollectiveBookings,
                'CancelBookings' => $CancelBookings
            ];

            DB::beginTransaction();
            try {
                $user = User::create($userData);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                // echo "<pre>";
                // print_r($e->getMessage());
                // echo "</pre>";
            }

            $userProviderMappingData = [
                'UserId' => $user->id,
                'ProviderId' => $siteId,
                'Active' => 1,
            ];

            DB::beginTransaction();
            try {
                $userProviderMapping = UserProviderMapping::create($userProviderMappingData);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                // echo "<pre>";
                // print_r($e->getMessage());
                // echo "</pre>";
            }
        }

        if ($user != null && $userProviderMapping != null) {
            return response()->json([
                'message' => 'User register Successfully',
                'status' => 'success',
                'User' => $user
            ], 200);
        } else {
            return response()->json([
                'message' => 'User not Register',
                'status' => 'failed'
            ], 500);
        }
    }

    public function editUserPost(Request $request)
    {
        // dd( $request->all() );
        $validator = Validator::make($request->all(), [
            'userId' => 'required',
            'Name' => ['required'],
            'LogonName' => ['required'],
            'EmailAddress' => ['required'],
            'AdminLevel' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>'error','message'=>$validator->messages()], 400);
        } else {
            // $siteId = $request->siteId;
            // $ManageUsers = 0;
            // $ManageFacilities = 0;
            // $ManageSysSettings = 0;
            // $CollectiveBookings = 0;
            // $CancelBookings = 0;
            // if ($request->has('ManageUsers')) {
                //     $ManageUsers = 1;
                // }
                // if ($request->has('ManageFacilities')) {
                    //     $ManageFacilities = 1;
                    // }
                    // if ($request->has('ManageSysSettings')) {
            //     $ManageSysSettings = 1;
            // }
            // if ($request->has('CollectiveBookings')) {
                //     $CollectiveBookings = 1;
                // }
                // if ($request->has('CancelBookings')) {
                    //     $CancelBookings = 1;
            // }

            $user = User::find($request->userId);
            $user->fill($request->all());
            // $user->Name = $request->Name;
            // $user->LoginName = $request->LoginName;
            // $user->EmailAddress = $request->EmailAddress;
            // $user->PhoneNumbers = $request->PhoneNumbers;
            // $user->Description = $request->Description;
            // $user->AdminLevel = $request->AdminLevel;
            // $user->ManageUsers = $ManageUsers;
            // $user->ManageFacilities = $ManageFacilities;
            // $user->ManageSysSettings = $ManageSysSettings;
            // $user->CollectiveBookings = $CollectiveBookings;
            // $user->CancelBookings = $CancelBookings;
            $LogonPassword = $request->LogonPassword;
            if ($LogonPassword != null) {
                $user->Password = Hash::make($request->LogonPassword);
            }

            if ($user->save()) {
                return response()->json([
                    'message' => 'User update Successfully',
                    'status' => 'success',
                    'User' => $user
                ], 200);
            } else {
                return response()->json([
                    'message' => 'User not updated',
                    'status' => 'failed'
                ], 500);
            }
        }
    }


    public function siteDetailSaved(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
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
            'registrationDate' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        } else {
            $facProvider = FacProvider::find($request->id);
            if ($facProvider != null) {
                $facProvider->id = $request->id;
                $facProvider->ContactName = $request->contactName;
                $facProvider->ContactNumber = $request->mobileNumber;
                $facProvider->ContactEmail = $request->email;
                $facProvider->ContactAddress1 = $request->address1;
                $facProvider->ContactAddress2 = $request->address2;
                $facProvider->ContactCity = $request->city;
                $facProvider->ContactZip = $request->zipcode;
                $facProvider->ContactCountry = $request->country;
                $facProvider->HomeURL = $request->siteId;
                $facProvider->OrgUrl = $request->companySite;
                if ($facProvider->save()) {
                    return response()->json([
                        'message' => 'User details updated Successfully',
                        'user_id' => $facProvider->id,
                        'status' => 1
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'User details not Updated',
                        'user_id' => $facProvider->id,
                        'status' => 0
                    ], 200);
                }
            } else {
                return response()->json([
                    'message' => 'Wrong User Id',
                    'user_id' => $request->id,
                    'status' => 0
                ], 200);
            }
        }
    }

    public function getAllUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'siteId' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        } else {
            $results = DB::select("SELECT users.id as id,Name,EmailAddress,PhoneNumbers,AdminLevel,userType FROM `user_provider_mapping` INNER JOIN users on users.id = user_provider_mapping.UserId INNER JOIN usertype on usertype.id = users.AdminLevel where deleted_at IS NULL and user_provider_mapping.ProviderId =" . $request->siteId);
            if ($results != null) {
                return response()->json([
                    'message' => 'User Found',
                    'status' => 'success',
                    'User' => $results
                ], 200);
            } else {
                return response()->json([
                    'message' => 'User not Found',
                    'status' => 'failed'
                ], 200);
            }
        }
    }

    public function getAllUserType()
    {
        $allRecord = UserType::all();
        if ($allRecord != null) {
            return response()->json([
                'message' => 'User Type Found',
                'status' => 'success',
                'userType' => $allRecord
            ], 200);
        } else {
            return response()->json([
                'message' => 'User Type not Found',
                'status' => 'failed'
            ], 200);
        }
    }

    public function deleteUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        } else {
            $user = User::find($request->id);
            if ($user != null) {
                $user->deleted_at = Carbon::now();
                if ($user->save()) {
                    return response()->json([
                        'message' => 'User deleted Successfuly',
                        'status' => 'success',
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'User not deleted Successfully',
                        'status' => 'failed'
                    ], 200);
                }
            } else {
                return response()->json([
                    'message' => 'User not found',
                    'status' => 'failed'
                ], 200);
            }
        }
    }


    public function password()
    {
        return view('pages.users.password-edit');
    }
    public function updatePassword(Request $request)
    {
        $user = User::find($request->id);
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'oldPassword' => [
                'required', function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->Password)) {
                        $fail('Your password was not updated, since the provided current password does not match.');
                    }
                },
            ],
            'Password' => 'required|min:8',
            'confirmPassword' => 'required|same:Password',
        ]);
        $validator->validate();

        // $user = User::where('EmailAddress',  $user->EmailAddress);
        // dd($request->all(), $user );
        // $user->fill(['Password' => Hash::make($request->Password)]);
        DB::beginTransaction();
        try {
            User::where('EmailAddress',  $user->EmailAddress)->update(['Password' => Hash::make($request->Password)]);
                // $user->save();
                DB::commit();
                return response()->json([
                    'message' => 'Your password is updated.',
                    'status' => 'success'
                ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => 'Your password is not updated.',
                'status' => 'error'
            ], 200);
        }
    }

    /**
     * END::CLASS
     */
}
