<?php

namespace App\Http\Controllers\Api\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResourceRequest;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\ResourceLocation;
use App\Models\ResourceConfigurationType;
use App\Models\Usergroupright;
use App\Models\Userright;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
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
            $resourceLocation = null;

            DB::beginTransaction();
            try {
                $resourceLocation = ResourceLocation::create($resourceLocationData);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                echo "<pre>";
                print_r($e->getMessage());
                echo "</pre>";
            }

            if ($resourceLocation != null) {
                return response()->json([
                    "message" => "Resource Location Successfully",
                    "status" => "success",
                    "User" => $resourceLocation,
                ], 200);
            } else {
                return response()->json([
                    "message" => "Error",
                    "status" => "failed",
                ], 500);
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
            ], 200);
        } else {
            return response()->json([
                "message" => "No Resource found",
                "status" => "failed",
            ], 200);
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
                ], 200);
            } else {
                if ($res->delete()) {
                    return response()->json([
                        "message" => "Resource location deleted Successfuly",
                        "status" => "success",
                    ], 200);
                } else {
                    return response()->json([
                        "message" => "Server Error",
                        "status" => "500",
                    ], 500);
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
                ], 200);
            } else {
                return response()->json([
                    "message" => "No Resource Location found",
                    "status" => "failed",
                ], 200);
            }
        }
    }

    public function updateResourceLocation(Request $request)
    {
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
            if ($resource->save()) {
                return response()->json([
                    'message' => 'Resource location updated successfully',
                    'status' => 'success',
                    'data' => $resource
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Resource location not updated',
                    'status' => 'failed'
                ], 500);
            }
        }
    }

    public function getAllResource(Request $request)
    {
        $data = Resource::select()->selectRaw('(SELECT Name FROM resourcetype WHERE id=resourceType LIMIT 1) AS resourceType,
        (SELECT Name FROM resourcelocation WHERE id=resourceLocation LIMIT 1) AS resourceLocation')
        ->where("ProviderID", $request->ProviderID)->orderBy('id', 'desc')->get()->toArray();

        // dd($data);
        if ($data != null) {
            return response()->json([
                "message" => "Reource Found Successfully",
                "status" => "success",
                "data" => $data,
            ], 200);
        } else {
            return response()->json([
                "message" => "No Resource found",
                "status" => "failed",
            ], 200);
        }
    }

    public function storeResource(Request $request)
    // public function storeResource( StoreResourceRequest $request)
    {
        $resource = null;
        $BookingRightsUser = $BookingRightsUserGroup = [];
        // $request->request->add(['ProviderID' => session()->get('siteId')]);
        // $request->request->add(['CreatedBy' => session()->get('loginUserId')]);

        $validator = Validator::make($request->all(), [
            'Name' => 'required',
            'Description' => 'required',
            'resourceType' => 'required',
            'ProviderID' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $BookingRightsUsers = $request->all('BookingRightsUser' );
        $BookingRightsUserGroups = $request->all('BookingRightsUserGroup' );
        $BookingRights = $request->all('CreatedBy', 'BookingRights' );

        $ViewingRightsUsers = $request->all('ViewingRightsUser' );
        $ViewingRightsUserGroups = $request->all('ViewingRightsUserGroup' );
        $ViewingRights = $request->all('CreatedBy', 'ViewingRights' );

        $RequestRightsUsers = $request->all('RequestRightsUser' );
        $RequestRightsUserGroups = $request->all('RequestRightsUserGroup' );
        $RequestRights = $request->all('CreatedBy', 'RequestRights' );

        $ModRightsUsers = $request->all('ModRightsUser' );
        $ModRightsUserGroups = $request->all('ModRightsUserGroup' );
        $ModRights = $request->all('CreatedBy', 'ModRights' );


        $opretionalHours = $request->all('DayofWeek','OpenTime', 'CloseTime');
        $custombookinginfos = $request->all('infoName','infoFieldType', 'infoDescription', 'infoRequire');

        $BookingRightsUsers = $this->columnDataArr( $BookingRightsUsers, ['UserID', 'CreatedBy', 'PermissionType'], $BookingRights);
        $BookingRightsUserGroups = $this->columnDataArr( $BookingRightsUserGroups, ['GroupID', 'CreatedBy', 'PermissionType'], $BookingRights);
        $ViewingRightsUsers = $this->columnDataArr( $ViewingRightsUsers, ['UserID', 'CreatedBy', 'PermissionType'], $ViewingRights);
        $ViewingRightsUserGroups = $this->columnDataArr( $ViewingRightsUserGroups, ['GroupID', 'CreatedBy', 'PermissionType'], $ViewingRights);

        $RequestRightsUsers = $this->columnDataArr( $RequestRightsUsers, ['UserID', 'CreatedBy', 'PermissionType'], $RequestRights);
        $RequestRightsUserGroups = $this->columnDataArr( $RequestRightsUserGroups, ['GroupID', 'CreatedBy', 'PermissionType'], $RequestRights);
        $ModRightsUsers = $this->columnDataArr( $ModRightsUsers, ['UserID', 'CreatedBy', 'PermissionType'], $ModRights);
        $ModRightsUserGroups = $this->columnDataArr( $ModRightsUserGroups, ['GroupID', 'CreatedBy', 'PermissionType'], $ModRights);

        $opretionalHours = $this->columnDataArr( $opretionalHours);
        $custombookinginfos = $this->columnDataArr( $custombookinginfos, ['Name','FieldType', 'Description', 'Require']);

        DB::beginTransaction();
        try {
            $resource = Resource::create($request->all());

            // $res = $resource->toArray();

            // $array = $request->all();
            // $CreatedBy = $array['CreatedBy'];
            // $PermissionType = $array['BookingRights'];
            // $BookingRightsUser = $array['BookingRightsUser'] ?? [];

            // array_walk($BookingRightsUser, function ($val) use (&$userrights, $PermissionType, $CreatedBy) {
            //     $userrights[] = ['CreatedBy' => $CreatedBy, 'PermissionType' => $PermissionType, 'UserID' => $val];
            // });
            // $BookingRightsUserGroup = $array['BookingRightsUserGroup'] ?? [];
            // array_walk($BookingRightsUserGroup, function ($val) use (&$usergrouprights, $PermissionType, $CreatedBy) {
            //     $usergrouprights[] = ['CreatedBy' => $CreatedBy, 'PermissionType' => $PermissionType, 'GroupID' => $val];
            // });

            // $PermissionType = $array['ViewingRights'];
            // $ViewingRightsUser =  $array['ViewingRightsUser'] ?? [];
            // array_walk($ViewingRightsUser, function ($val) use (&$userrights, $PermissionType, $CreatedBy) {
            //     $userrights[] = ['CreatedBy' => $CreatedBy, 'PermissionType' => $PermissionType, 'UserID' => $val];
            // });
            // $ViewingRightsUserGroup = $array['ViewingRightsUserGroup'] ?? [];
            // array_walk($ViewingRightsUserGroup, function ($val) use (&$usergrouprights, $PermissionType, $CreatedBy) {
            //     $usergrouprights[] = ['CreatedBy' => $CreatedBy, 'PermissionType' => $PermissionType, 'GroupID' => $val];
            // });

            $userrights = array_merge($BookingRightsUsers??[], $ViewingRightsUsers??[], $RequestRightsUsers??[],$ModRightsUsers??[] );
            if (isset($userrights) && count($userrights))
                $resource->usersRight()->createMany($userrights);

            $usergrouprights = array_merge($BookingRightsUserGroups??[], $ViewingRightsUserGroups??[], $RequestRightsUserGroups??[], $ModRightsUserGroups??[]);
            if (isset($usergrouprights) && count($usergrouprights))
                $resource->userGroupsRight()->createMany($usergrouprights);

            if (isset($opretionalHours) && count($opretionalHours))
                $resource->operationhours()->createMany($opretionalHours);

            if (isset($custombookinginfos) && count($custombookinginfos))
                $resource->customBookingInfo()->createMany($custombookinginfos);

            DB::commit();
            return response()->json([
                "message" => "Resource Create Successfully.",
                "status" => "success",
                "data" => $resource,
            ], 200);
        } catch (\Exception $exc) {
            DB::rollBack();
            // echo "<pre>";print_r($exc->getMessage());echo "</pre>";
            return response()->json([
                "message" => "Resource not Create.",
                "status" => "error",
                'data' => $exc->getMessage(),
            ], 500);
        }
    }
    public function updateResource( Request $request, Resource $resource)
    {

        $validator = Validator::make($request->all(), [
            'Name' => 'required',
            'Description' => 'required',
            'resourceType' => 'required',
            'ProviderID' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $all = $request->all();
        // dd($all);

        $BookingRightsUsers = $request->all('BookingRightsUser');
        $BookingRightsUserGroups = $request->all('BookingRightsUserGroup' );
        $BookingRights = $request->all('CreatedBy', 'BookingRights' );

        $ViewingRightsUsers = $request->all('ViewingRightsUser' );
        $ViewingRightsUserGroups = $request->all('ViewingRightsUserGroup' );
        $ViewingRights = $request->all('CreatedBy', 'ViewingRights' );

        $RequestRightsUsers = $request->all('RequestRightsUser' );
        $RequestRightsUserGroups = $request->all('RequestRightsUserGroup' );
        $RequestRights = $request->all('CreatedBy', 'RequestRights' );

        $ModRightsUsers = $request->all('ModRightsUser' );
        $ModRightsUserGroups = $request->all('ModRightsUserGroup' );
        $ModRights = $request->all('CreatedBy', 'ModRights' );


        $opretionalHours = $request->all('DayofWeek','OpenTime', 'CloseTime');
        $custombookinginfos = $request->all('infoName','infoFieldType', 'infoDescription', 'infoRequire');

        $BookingRightsUsers = $this->columnDataArr( $BookingRightsUsers, ['UserID', 'CreatedBy', 'PermissionType'], $BookingRights);
        $BookingRightsUserGroups = $this->columnDataArr( $BookingRightsUserGroups, ['GroupID', 'CreatedBy', 'PermissionType'], $BookingRights);
        $ViewingRightsUsers = $this->columnDataArr( $ViewingRightsUsers, ['UserID', 'CreatedBy', 'PermissionType'], $ViewingRights);
        $ViewingRightsUserGroups = $this->columnDataArr( $ViewingRightsUserGroups, ['GroupID', 'CreatedBy', 'PermissionType'], $ViewingRights);

        $RequestRightsUsers = $this->columnDataArr( $RequestRightsUsers, ['UserID', 'CreatedBy', 'PermissionType'], $RequestRights);
        $RequestRightsUserGroups = $this->columnDataArr( $RequestRightsUserGroups, ['GroupID', 'CreatedBy', 'PermissionType'], $RequestRights);
        $ModRightsUsers = $this->columnDataArr( $ModRightsUsers, ['UserID', 'CreatedBy', 'PermissionType'], $ModRights);
        $ModRightsUserGroups = $this->columnDataArr( $ModRightsUserGroups, ['GroupID', 'CreatedBy', 'PermissionType'], $ModRights);

        $opretionalHours = $this->columnDataArr( $opretionalHours);
        $custombookinginfos = $this->columnDataArr( $custombookinginfos, ['Name','FieldType', 'Description', 'Require']);
        // $userrights = array_merge($BookingRightsUsers??[], $ViewingRightsUsers??[], $RequestRightsUsers??[],$ModRightsUsers??[] );
        // dd($userrights);
        DB::beginTransaction();
        try {
            $resource->usersRight()->delete();
            $resource->userGroupsRight()->delete();
            $resource->operationhours()->delete();
            $resource->customBookingInfo()->delete();
            $resource->fill($request->all());
            if($resource->save()){

            // $userrights = array_merge($BookingRightsUsers??[],$ViewingRightsUsers??[]);
            $userrights = array_merge($BookingRightsUsers??[], $ViewingRightsUsers??[], $RequestRightsUsers??[],$ModRightsUsers??[] );
            if (isset($userrights) && count($userrights))
                $resource->usersRight()->createMany($userrights);

            // $usergrouprights = array_merge($BookingRightsUserGroups??[],$ViewingRightsUserGroups??[]);
            $usergrouprights = array_merge($BookingRightsUserGroups??[], $ViewingRightsUserGroups??[], $RequestRightsUserGroups??[], $ModRightsUserGroups??[]);
            if (isset($usergrouprights) && count($usergrouprights))
                $resource->userGroupsRight()->createMany($usergrouprights);

                if (isset($opretionalHours) && count($opretionalHours))
                $resource->operationhours()->createMany($opretionalHours);

                if (isset($custombookinginfos) && count($custombookinginfos))
                $resource->customBookingInfo()->createMany($custombookinginfos);

          }  // echo "<pre>";print_r($resource->toArray());echo "</pre>";
                DB::commit();
            // dd($userrights, $usergrouprights, $opretionalHours, $custombookinginfos);

            return response()->json([
                "message" => "Resource Update Successfully.",
                "status" => "success",
                "data" => $resource,
            ], 200);
        } catch (\Exception $exc) {
            DB::rollBack();
            // echo "<pre>";print_r($exc->getMessage());echo "</pre>";
            // echo "<pre>";print_r($userrights);echo "</pre>";
            // echo "<pre>";print_r($resource);echo "</pre>";
            // echo "<pre>";print_r($id);echo "</pre>";
            // dd($exc->getMessage());
            // echo "<pre>";
            // print_r($request->all());
            // echo "</pre>";
            return response()->json([
                "message" => "Resource not Create.",
                "status" => "error",
            ], 500);
        }
    }

    public function destroyResource( Resource &$resource)
    {
        DB::beginTransaction();
        try {
            $resource->usersRight()->delete();
            $resource->userGroupsRight()->delete();
            $resource->operationhours()->delete();
            $resource->customBookingInfo()->delete();
            $resource->delete();

            // echo "<pre>";print_r($resource->toArray());echo "</pre>";
                DB::commit();
            // dd($userrights, $usergrouprights, $opretionalHours, $custombookinginfos);

            return response()->json([
                "message" => "Resource Deleted Successfully.",
                "status" => "success",
                "data" => $resource,
            ], 200);
        } catch (\Exception $exc) {
            DB::rollBack();
            // echo "<pre>";print_r($exc->getMessage());echo "</pre>";
            // echo "<pre>";print_r($userrights);echo "</pre>";
            // echo "<pre>";print_r($resource);echo "</pre>";
            // echo "<pre>";print_r($id);echo "</pre>";
            // dd($exc->getMessage());
            // echo "<pre>";
            // print_r($request->all());
            // echo "</pre>";
            return response()->json([
                "message" => "Resource not Create.",
                "status" => "error",
            ], 500);
        }
    }



    /**
     * END::CLASS
     */
}
