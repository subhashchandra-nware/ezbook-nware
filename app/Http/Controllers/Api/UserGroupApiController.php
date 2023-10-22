<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserGroupApiController extends Controller
{
    public function addUserGroup(Request $request){
        $validator = Validator::make($request->all(),[
            'siteId' => 'required',
            'Name' => ['required'],
            'Description' => ['required'],
            'CreatedBy' => ['required'],
           ]);
           if($validator->fails()){
            return response()->json($validator->messages(),400);
           }else{
            $userGroupData = [
                'ProviderID' => $request->siteId,
                'Name' => $request->Name,
                'Description' =>  $request->Description,
                'CreatedBy' => $request->CreatedBy,
                ];

                // dd($userGroupData, $request->all());
                $userGroup = null;
                DB::beginTransaction();
                try {
                    // $userGroup = UserGroup::create($userGroupData);
                    $userGroup = UserGroup::create($request->all());
                    // $userGroup = new UserGroup();
                    // $userGroup->fill($request->all());
                    // $userGroup->save();
                    if($request->has('UserID')){
                    $UserID = $this->columnDataArr($request->all('UserID'), ['UserID']);
                    $userGroup->UsersInGroups()->createMany($UserID);
                }
                DB::commit();
                return response()->json([
                    'message' => 'User Group created Successfully',
                    'status' => 'success',
                    'userGroup' => $userGroup,
                    'data' => ['userGroup' => $userGroup],
                ]);
                } catch (\Exception $e) {
                DB::rollBack();
                // throw $e;
                //print_r($e->getMessage());
                return response()->json([
                    'message' => 'User Group not created',
                    'status' => 'error',
                    'data' => $e->getMessage(),
                ],200);
                }

                if($userGroup != null){
                    return response()->json([
                        'message' => 'User Group created Successfully',
                        'status' => 'success',
                        'userGroup' => $userGroup
                    ]);
                }else{
                    return response()->json([
                        'message' => 'User Group not created',
                        'status' => 'failed',
                    ],200);
                }
           }
    }

    public function getAllUserGroup(Request $request){
        $validator = Validator::make($request->all(),[
            'siteId' => 'required',
           ]);
           if($validator->fails()){
            return response()->json($validator->messages(),400);
           }else{
            $group = UserGroup::where('ProviderID',$request->siteId)->get();
            if($group !=null){
                return response()->json([
                    'message' => 'User Type Found',
                    'status' => 'success',
                    'userGroup' => $group
                ],200);
            }else{
                return response()->json([
                    'message' => 'User Type not Found',
                    'status' => 'failed'
                ],200);
            }
           }
    }

    public function deleteUserGroup(Request $request){
        $validator = Validator::make($request->all(),[
            'id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(),400);
        }else{
           $userGroup = UserGroup::find($request->id);
           if($userGroup == null){
            return response()->json([
                'message' => 'User group not found',
                'status' => 'failed',
            ],200);
           }else{
             if($userGroup->delete()){
                return response()->json([
                    'message' => 'User group deleted Successfuly',
                    'status' => 'success',
                ],200);
             }else{
                return response()->json([
                    'message' => 'Server Error',
                    'status' => '500',
                ],200);
             }
           }
        }
    }

    public function updateUserGroup(Request $request){
        $validator = Validator::make($request->all(),[
            'id' => 'required',
            'Name' => ['required'],
            'Description' => ['required'],
           ]);
           if($validator->fails()){
            return response()->json($validator->messages(),400);
           }else{
            $updateUserGroup = UserGroup::find($request->id);
            $UserID = $this->columnDataArr($request->all('UserID'), ['UserID']);
            // dd( $requestData, $request->all(), $GroupID);
            $updateUserGroup->fill($request->all());
            DB::beginTransaction();
            try {
                $updateUserGroup->save();
                if($request->GroupID){
                    $updateUserGroup->UsersInGroups()->delete();
                    $updateUserGroup->UsersInGroups()->createMany($UserID);
                }
                DB::commit();
                return response()->json([
                    'message' => 'User Group Update Successfully',
                    'status' => 'success',
                    'data' => ['updateUserGroup'=>$updateUserGroup],
                ], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                // throw $e;
                return response()->json([
                    'message' => 'User Group not Update',
                    'status' => 'failed',
                    'data' => $e->getMessage(),
                ], 500);
            }


            // if($updateUserGroup != null){
            //     $updateUserGroup->Name = $request->Name;
            //     $updateUserGroup->Description = $request->Description;
            //     if($updateUserGroup->save()){

            //         return response()->json([
            //         'message' => 'User group update Successfully',
            //         'status' => 'success',
            //         ],200);
            //     }else{
            //         return response()->json([
            //             'message' => 'User group not updated',
            //             'status' => 'failed',
            //         ],200);
            //     }
            // }else{
            //     return response()->json([
            //             'message' => 'User group not found',
            //             'status' => 'failed'
            //         ],500);
            // }
        }
    }

    public function getUsersInSite(Request $request)
    {
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



    /**
     * END::CLASS
     */
}
