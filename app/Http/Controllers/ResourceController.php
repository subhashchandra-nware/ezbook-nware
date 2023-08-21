<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResourceLocation;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Api\Resource\ResourceApiController;
use App\Http\Controllers\Api\Countries\CountriesApiController;
use App\Http\Requests\StoreResourceRequest;
use App\Models\custombookinginfo;
use App\Models\operationhour;
use App\Models\Resource;
use App\Models\ResourceType;
use App\Models\User;
use App\Models\UserGroup;
use App\Models\Usergroupright;
use App\Models\Userright;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class ResourceController extends Controller
{

    public function test()
    {
        $data = null;
        $http = false;
        $api = $this->api('api');
        $apiURL = config('global.api.url');
        $listResources = [];

        if ($http) {
            $data = Http::post($apiURL . 'resources')->object();
        } else {
            $data = Resource::where("ProviderID", session()->get('siteId') ?? 1)->get()->toArray();
        }

        // dd($data);

        if ($api) {
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
        } else {
            $listResources = $data;
            return view('pages.resources.resources', compact('listResources'));
        }
    }

    public function getAllResource()
    {
        // $this->api('api');

        $api = config('global.api.url');
        // $listResources = Http::post($api.'resources');
        // dd($this->api('api'));
        $newRequest = new Request();
        $newRequest->setMethod('POST');
        $newRequest->request->add(['ProviderID' => session()->get('siteId')]);
        $result = json_decode(json_encode((new ResourceApiController)->getAllResource($newRequest)), JSON_UNESCAPED_SLASHES);
        $listResources = [];
        // dd($result);

        if ($result['original']['status'] == 'success') {
            $listResources = $result['original']['data'];
            return view('pages.resources.resources', compact('listResources'));
            // return view('resources',compact('listResources'));
        } else {
            // return view('pages.resources.resources',compact('listResources'));
            return view('resources', compact('listResources'));
        }

        // return view('resources', compact('listResources'));
    }

    public function addResource()
    {
        $http = false;
        $api = config('global.api.url');
        $url = config('global.api.url');
        $url = $url . "resource-type";

        if ($http) {
            $response = Http::post($url, [
                'ProviderID' => '1',
            ])->json();

            $responseLocation = Http::post($api . "resource-location", [
                'ProviderID' => '1',
            ])->json();

            $users = http::post($api . 'user')->json();
            $usersGroups = http::post($api . 'user-groups')->json();
        } else {
            $response = Http::post($url, [
                'ProviderID' => '1',
            ])->json();

            $responseLocation = Http::post($api . "resource-location", [
                'ProviderID' => '1',
            ])->json();

            $users = User::all()->toArray();
            $usersGroups = UserGroup::all()->toArray();
        }

        // dd($users, $usersGroups);
        $resourceType = $response['data'];
        $resourceLocation = $responseLocation['data'] ?? ResourceLocation::all(['id', 'Name'])->toArray(); // [['id'=>'1', 'Name'=>'demo']];
        return view('pages.resources.add-resource', compact('resourceType', 'resourceLocation', 'users', 'usersGroups'));
        // return view('add-resource', compact('resourceType', 'resourceLocation'));
    }

    public function storeResource(Request $request)
    // public function storeResource( StoreResourceRequest $request)
    {
        $request->request->add(['ProviderID' => session()->get('siteId')]);
        $request->request->add(['CreatedBy' => session()->get('loginUserId')]);

        // dd($request->all(), $request->all('BookingRightsUser'), $request->all('BookingRightsUserGroup'));

        $validator = Validator::make($request->all(), [
            'Name' => 'required',
            'Description' => 'required',
        ], [
            // 'Name.required' => 'Name required.',
            // 'Description.required' => 'Description required.'
        ]);
        $validator->validate();


        // dd( $request->all() );

        $resultArr = (new ResourceApiController)->storeResource($request);
        // dd(collect( $resultArr)->get('original'));
        $msg = collect($resultArr)->get('original');
        return redirect()->route('resource.resource')->with($msg['status'], $msg['message']);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editResource(Resource $resource)
    {
        // $d = $resource->toArray();
        // $d = $resource->usersRight()->where('id', 92)->get();
        // $d = Resource::with('usersRight')->where('id', 92)->get()->toArray();
        // $d = Resource::with(['usersRight'])->find(60)->toArray();

        // $data['resource'] = $resource->toArray();
        $data = [];
        $PermissionType = ['1'=>'BookingRights', '2'=>'ViewingRights', '3'=>'RequestRights', '4'=>'ModRights', ];

        $AllRightsUsers = Userright::where('userrights.Resource', '=', $resource->ID)->get()->toArray() ?? [];
        $AllRightsUserGroups = Usergroupright::where('usergrouprights.Resource', '=', $resource->ID)->get()->toArray() ?? [];

        array_walk($PermissionType, function($v)use(&$data){
            $data[$v.'Users'] = [];
            $data[$v.'UserGroups'] = [];
        });
        array_walk($AllRightsUsers, function($v)use(&$data, $PermissionType){
            $key = $PermissionType[$v['PermissionType']].'Users';
            $data[$key][] = $v;
        });
        array_walk($AllRightsUserGroups, function($v)use(&$data, $PermissionType){
            $key = $PermissionType[$v['PermissionType']].'UserGroups';
            $data[$key][] = $v;
        });

        // $data['BookingRightsUsers'] = Userright::where('userrights.Resource', '=', $resource->ID)->where('userrights.PermissionType', '=', $resource->BookingRights)->get()->toArray();
        // $data['BookingRightsUserGroups'] = Usergroupright::where('usergrouprights.Resource', '=', $resource->ID)->where('usergrouprights.PermissionType', '=', $resource->BookingRights)->get()->toArray();

        // $data['ViewingRightsUsers'] = Userright::where('userrights.Resource', '=', $resource->ID)->where('userrights.PermissionType', '=', $resource->ViewingRights)->get()->toArray();
        // $data['ViewingRightsUserGroups'] = Usergroupright::where('usergrouprights.Resource', '=', $resource->ID)->where('usergrouprights.PermissionType', '=', $resource->ViewingRights)->get()->toArray();


        $data['custombookinginfos'] = custombookinginfo::where('custombookinginfos.Resource', '=', $resource->ID)->get()->toArray();
        $data['operationhours'] = operationhour::where('operationhours.Resource', '=', $resource->ID)->get()->toArray();

        $data['resourceTypes'] = ResourceType::all(['id', 'Name'])->toArray();
        $data['resourceLocations'] = ResourceLocation::all(['id', 'Name'])->toArray(); // [['id'=>'1', 'Name'=>'demo']];
        $data['users'] = User::all(['id', 'Name'])->toArray();
        $data['usersGroups'] = UserGroup::all(['id', 'Name'])->toArray();

        $data = array_merge($resource->toArray(), $data);
        // dd($d, $data);
        return view('pages.resources.edit-resource', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateResource(Request $request, Resource $resource)
    {
        // dd($request, $resource);
        $request->request->add(['ProviderID' => session()->get('siteId')]);
        $request->request->add(['CreatedBy' => session()->get('loginUserId')]);

        // dd($request->all(), $request->all('BookingRightsUser'), $request->all('BookingRightsUserGroup'));

        $validator = Validator::make($request->all(), [
            'Name' => 'required',
            'Description' => 'required',
        ], [
            // 'Name.required' => 'Name required.',
            // 'Description.required' => 'Description required.'
        ]);
        $validator->validate();


        // dd( $request->all() );

        $resultArr = (new ResourceApiController)->updateResource( $request, $resource);
        // dd($resultArr);
        // dd(collect( $resultArr)->get('original'));
        $msg = collect($resultArr)->get('original');
        return redirect()->route('resource.resource')->with($msg['status'], $msg['message']);
    }

    /**
     * Delete the specified resource in storage.
     */
    public function destroyResource( Resource $resource)
    {
        $resultArr = (new ResourceApiController)->destroyResource($resource);
        $msg = collect($resultArr)->get('original');
        return redirect()->route('resource.resource')->with($msg['status'], $msg['message']);
    }

    /**
     * END::CLASS
     */
}
