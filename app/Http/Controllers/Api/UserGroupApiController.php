<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
            
                DB::beginTransaction();
                try {
                $userGroup = UserGroup::create($userGroupData);
                DB::commit();
                } catch (\Exception $e) {
                DB::rollBack();
                //print_r($e->getMessage());
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
}
