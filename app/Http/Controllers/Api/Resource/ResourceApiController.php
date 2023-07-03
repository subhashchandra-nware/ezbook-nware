<?php

namespace App\Http\Controllers\Api\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResourceLocation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResourceApiController extends Controller
{
    public function getAllResources($id)
    {
    }

    public function addNewResourceLocationPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "ProviderID" => "required",
            "Name" => ["required"],
            "Address1" => ["required"],
            "City" => ["required"],
            "State" => "required",
            "PostalCode" => "required",
            "Country" => "required",
            "CreatedBy" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        } else {
            $resourceLocationData = [
                "ProviderID" => $request->ProviderID,
                "Name" => $request->Name,
                "Description" => $request->Description,
                "TimeZone" => null,
                "Address1" => $request->Address1,
                "Address2" => $request->Address2,
                "City" => $request->City,
                "State_Province" => $request->State,
                "PostalCode" => $request->PostalCode,
                "Country" => $request->Country,
                "CreatedBy" => $request->CreatedBy,
            ];

            DB::beginTransaction();
            try {
                $resourceLocation = ResourceLocation::create(
                    $resourceLocationData
                );
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                echo "<pre>";
                print_r($e->getMessage());
                echo "</pre>";
            }

            if ($resourceLocation != null) {
                return response()->json([
                        "message" => "Reource Location Successfully",
                        "status" => "success",
                        "User" => $resourceLocation,
                    ],200);
            } else {
                return response()->json([
                        "message" => "Error",
                        "status" => "failed",
                    ],500);
            }
        }
    }

    public function getAllResourcesLocation(Request $request)
    {
        $data = ResourceLocation::where("ProviderID", $request->ProviderID)->get()->toArray();
        if ($data != null) {
            return response()->json([
                    "message" => "Reource Location Successfully",
                    "status" => "success",
                    "data" => $data,
                ],200);
        } else {
            return response()->json([
                    "message" => "No Resource found",
                    "status" => "failed",
                ],200);
        }
    }

    public function deleteResourceLocation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        } else {
            $res = ResourceLocation::find($request->id);
            if ($res == null) {
                return response()->json([
                        "message" => "Resource location not found",
                        "status" => "failed",
                    ],200);
            } else {
                if ($res->delete()) {
                    return response()->json([
                            "message" => "Resource location deleted Successfuly",
                            "status" => "success",
                        ],200);
                } else {
                    return response()->json([
                            "message" => "Server Error",
                            "status" => "500",
                        ],500);
                }
            }
        }
    }

    public function findResourceLocation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "ResourceLocationId" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        } else {
            $data = ResourceLocation::find($request->ResourceLocationId);
            if ($data != null) {
                return response()->json([
                        "status" => "success",
                        "data" => $data,
                    ],200);
            } else {
                return response()->json([
                        "message" => "No Resource Location found",
                        "status" => "failed",
                    ],200);
            }
        }
    }

    public function updateResourceLocation(Request $request){
        $validator = Validator::make($request->all(), [
            'ResourceLocationId' => 'required',
            "Name" => ["required"],
            "Address1" => ["required"],
            "City" => ["required"],
            "State" => "required",
            "PostalCode" => "required",
            "Country" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        } else {
            $resource = ResourceLocation::find($request->ResourceLocationId);
            $resource->Name = $request->Name;
            $resource->Address1 = $request->Address1;
            $resource->Address2 = $request->Address2;
            $resource->City = $request->City;
            $resource->State_Province = $request->State;
            $resource->PostalCode = $request->PostalCode;
            $resource->Country = $request->Country;
            if($resource->save()){
                return response()->json([
                    'message' => 'Resource location updated successfully',
                    'status' => 'success',
                    'data' => $resource
                ],200);
                }else{
                return response()->json([
                    'message' => 'Resource location not updated',
                    'status' => 'failed'
                ],500);
                }
            }
        }
    }

