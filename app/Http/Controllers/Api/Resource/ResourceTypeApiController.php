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
use App\Models\UserGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResourceTypeApiController extends Controller
{
    public function index(Request $request)
    {
    }
    public function create(Request $request)
    {
    }
    public function store(Request $request)
    {
    }
    public function show($id)
    {
    }
    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "ProviderID" => 'required',
            // "Name" => "required",
            // "configurationType" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->messages()], 400);
        } else {
            $ResourceType = ResourceType::with(['CustomAttributesFields.CustomAttributesFieldTypes', 'ResourceTypeLimits.ResourceTypeLimitFields', 'ResourceTypeLimits.UserGroups'])->findOrFail($id);
            // ->where('ProviderID', $request->ProviderID)->where('id', $id)->first();
            $CustomAttributesFieldTypes = CustomAttributesFieldType::all()->toArray();
            $ResourceTypeLimitFields = ResourceTypeLimitField::all()->toArray();
            $UserGroups = UserGroup::all()->toArray();
            // dd($ResourceType, $CustomAttributesFieldTypes, $ResourceTypeLimitFields);

            $data['ResourceType'] = $ResourceType;
            $data['CustomAttributesFieldTypes'] = $CustomAttributesFieldTypes;
            $data['ResourceTypeLimitFields'] = $ResourceTypeLimitFields;
            $data['UserGroups'] = $UserGroups;
            if ($ResourceType != null) {
                return response()->json([
                    "message" => 'record found',
                    "status" => "success",
                    "data" => $data,
                ], 200);
            } else {
                return response()->json([
                    "message" => 'No record found',
                    "status" => "success",
                ], 200);
            }
        }
    }
    public function update(Request $request, $id)
    {
        $CustomAttributesFields = $this->columnDataArr($request->all(['customAttributeName', 'customAttributeFieldType', 'customAttributeDescription', 'customAttributeRequire']),['Name', 'FieldType', 'Description', 'Require']);
        $ResourceTypeLimits = $this->columnDataArr($request->all(['resourceTypeLimitLimitType', 'resourceTypeLimitLimit', 'resourceTypeLimitGroupAppliedTo']), ['LimitType', 'Limit', 'GroupAppliedTo']);
        // dd($request->all(), $id, $CustomAttributesFields, $ResourceTypeLimits);
        $validator = Validator::make($request->all(), [
            "ProviderID" => 'required',
            "Name" => "required",
            "configurationType" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->messages()], 400);
        } else {
            DB::beginTransaction();
            $resourceType = ResourceType::find($id);

            $resourceType->fill($request->all());
            try {
                $resourceType->save();
                if (isset($CustomAttributesFields) && count($CustomAttributesFields)){
                    $resourceType->CustomAttributesFields()->delete();
                    $resourceType->CustomAttributesFields()->createMany($CustomAttributesFields);
                }
                if (isset($ResourceTypeLimits) && count($ResourceTypeLimits)){
                    $resourceType->ResourceTypeLimits()->delete();
                    $resourceType->ResourceTypeLimits()->createMany($ResourceTypeLimits);
                }
                // $type = ResourceType::create($data);
                DB::commit();
                return response()->json([
                    "message" => "Resource Type Update Successfully.",
                    "status" => "success",
                    "data" => $resourceType,
                ], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                // echo "<pre>";
                // print_r($e->getMessage());
                // echo "</pre>";
                return response()->json([
                    "message" => $e->getMessage() ,
                    // "message" => "Resource Type Not Update.",
                    "status" => "failed",
                    "data" => $resourceType,
                ], 200);
            }
        }
    }
    public function destroy($id)
    {
    }

    public function getAllConfigurationTypes()
    {
        $allTypes = ResourceConfigurationType::all();
        return response()->json([
            'status' => 'success',
            'data' => $allTypes
        ], 200);
    }

    public function addNewResourceType(Request $request)
    {
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

            if ($request->customAttributeData) {
                $totalArrayCount =  count($request->customAttributeData);
                for ($i = 0; $i < $totalArrayCount; $i++) {
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

            if ($request->resourceLimitData) {
                $totalArrayCount =  count($request->resourceLimitData);
                for ($i = 0; $i < $totalArrayCount; $i++) {
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
                ], 200);
            } else {
                return response()->json([
                    "message" => "Error",
                    "status" => "failed",
                ], 500);
            }
        }
    }



    public function getAllResourceType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "ProviderID" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        } else {
            $data = ResourceType::where('ProviderID', $request->ProviderID)->get();
            if ($data != null) {
                return response()->json([
                    "message" => 'record found',
                    "status" => "success",
                    "data" => $data->toArray(),
                ], 200);
            } else {
                return response()->json([
                    "message" => '0 record found',
                    "status" => "success",
                ], 200);
            }
        }
    }


    public function getAllCustomAttributesFieldType()
    {
        $data = CustomAttributesFieldType::all();
        if ($data != null) {
            return response()->json([
                "message" => 'record found',
                "status" => "success",
                "data" => $data->toArray(),
            ], 200);
        } else {
            return response()->json([
                "message" => '0 record found',
                "status" => "success",
            ], 200);
        }
    }

    public function getAllResourceTypeLimitedField()
    {
        $data = ResourceTypeLimitField::all();
        if ($data != null) {
            return response()->json([
                "message" => 'record found',
                "status" => "success",
                "data" => $data->toArray(),
            ], 200);
        } else {
            return response()->json([
                "message" => '0 record found',
                "status" => "success",
            ], 200);
        }
    }







    public function deleteResourceType(Request $request)
    {
        DB::table('resourcetypelimit')->where('resourcetype', $request->id)->delete();
        DB::table('customattributefields')->where('resourcetype', $request->id)->delete();
        DB::table('resourcetype')->where('id', $request->id)->delete();
        return response()->json([
            "message" => 'data deleted',
            "status" => "success",
        ], 200);
    }
}
