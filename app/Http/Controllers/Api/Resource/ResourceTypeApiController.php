<?php

namespace App\Http\Controllers\Api\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResourceConfigurationType;
use App\Models\ResourceType;
use App\Models\CustomAttributesFields;
use App\Models\CustomAttributesFieldType;
use App\Models\ResourceTypeLimitField;
use App\Models\ResourceTypeLimit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResourceTypeApiController extends Controller
{
    public function getAllConfigurationTypes(){
        $allTypes = ResourceConfigurationType::all();
        return response()->json([
            'status' => 'success',
            'data' => $allTypes
        ],200);
    }

    public function addNewResourceType(Request $request){
        $validator = Validator::make($request->all(), [
            "ProviderID" => 'required',
            "Name" => "required",
            "configurationType" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        } else {
            $data = [
                "ProviderID" => $request->ProviderID,
                "Name" => $request->Name,
                "Description" => $request->Description,
                "configurationType" => $request->configurationType,
                "AdditionalInfoDefaultText" => $request->AdditionalInfoDefaultText,
                "AdditionalEmailText" => $request->AdditionalEmailText,
                "CreatedBy" => $request->CreatedBy,
            ];

            DB::beginTransaction();
            try {
                $type = ResourceType::create($data);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                // echo "<pre>";
                // print_r($e->getMessage());
                // echo "</pre>";
            }
            
            if($request->customAttributeData){
               $totalArrayCount =  count($request->customAttributeData);
               for($i = 0; $i<$totalArrayCount; $i++)
               {
                   $customAttributeFieldsData = [
                       "resourcetype" => $type->id,
                       "Name" => $request->customAttributeData[$i]['customAttributeName'],
                       "FieldType" => $request->customAttributeData[$i]['customAttributeType'],
                       "Description" => $request->customAttributeData[$i]['customAttributeDescription'],
                       "Require" => isset($request->customAttributeData[$i]['customAttributeCheckBox']) ? 1 : 0
                   ];
       
                   DB::beginTransaction();
                   try {
                       $res = CustomAttributesFields::create($customAttributeFieldsData);
                       DB::commit();
                   } catch (\Exception $e) {
                       DB::rollBack();
                    //    echo "<pre>";
                    //    print_r($e->getMessage());
                    //    echo "</pre>";
                   }
       
               }
            }

            if($request->resourceLimitData){
                $totalArrayCount =  count($request->resourceLimitData);
                for($i = 0; $i<$totalArrayCount; $i++)
                {
                    $resourceLimit = [
                        "resourcetype" => $type->id,
                        "LimitType" => $request->resourceLimitData[$i]['LimitType'],
                        "Limit" => $request->resourceLimitData[$i]['Limit'],
                        "GroupAppliedTo" => $request->resourceLimitData[$i]['GroupAppliedTo'],
                    ];
        
                    DB::beginTransaction();
                    try {
                        $res = ResourceTypeLimit::create($resourceLimit);
                        DB::commit();
                    } catch (\Exception $e) {
                        DB::rollBack();
                        // echo "<pre>";
                        // print_r($e->getMessage());
                        // echo "</pre>";
                    }
        
                }
             }

            if ($type != null) {
                return response()->json([
                        "message" => "Resource Type Successfully",
                        "status" => "success",
                        "data" => $type,
                    ],200);
            } else {
                return response()->json([
                        "message" => "Error",
                        "status" => "failed",
                    ],500);
            }
        }
    }

    public function getAllResourceType(Request $request){
        $validator = Validator::make($request->all(), [
            "ProviderID" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        } else {
            $data = ResourceType::where('ProviderID',$request->ProviderID)->get();
            if($data != null){
                return response()->json([
                    "message" => 'record found',
                    "status" => "success",
                    "data" => $data->toArray(),
                ],200);
            }else{
                return response()->json([
                    "message" => '0 record found',
                    "status" => "success",
                ],200);
            }
        }
    }

    public function getAllCustomAttributesFieldType(){
        $data = CustomAttributesFieldType::all();
        if($data != null){
            return response()->json([
                "message" => 'record found',
                "status" => "success",
                "data" => $data->toArray(),
            ],200);
        }else{
            return response()->json([
                "message" => '0 record found',
                "status" => "success",
            ],200);
        }
    }

    public function getAllResourceTypeLimitedField(){
        $data = ResourceTypeLimitField::all();
        if($data != null){
            return response()->json([
                "message" => 'record found',
                "status" => "success",
                "data" => $data->toArray(),
            ],200);
        }else{
            return response()->json([
                "message" => '0 record found',
                "status" => "success",
            ],200);
        }
    }

    public function deleteResourceType(Request $request){
        DB::table('resourcetypelimit')->where('resourcetype',$request->id)->delete();
        DB::table('customattributefields')->where('resourcetype',$request->id)->delete();
        DB::table('resourcetype')->where('id',$request->id)->delete();
        return response()->json([
            "message" => 'data deleted',
            "status" => "success",
        ],200);
    }
}

