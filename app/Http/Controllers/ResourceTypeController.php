<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResourceLocation;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Api\Resource\ResourceTypeApiController;

class ResourceTypeController extends Controller
{
    public function resourceType(){
        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['ProviderID' => session()->get('siteId')]);
        $result = (new ResourceTypeApiController)->getAllResourceType($myRequest);
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        if($finalResult['status'] == 'success'){
            $data = $finalResult['data'];
            return view('pages.resources.resource-type-list',compact('data'));
            // return view('resource-type',compact('data'));
        }
    }

    public function addNewResourceType(){
        // $url = config('global.api.url');
        // $url = $url . "show-all-user-group";

        // $response = Http::post($url, [
        //     'siteId' => '1',
        // ]);

//        dd($response->getBody()->getContents());


        $result = (new ResourceTypeApiController)->getAllConfigurationTypes();
        $array = json_decode(json_encode($result), JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        $configTypes = $finalResult['data'];

        $result2 = (new ResourceTypeApiController)->getAllCustomAttributesFieldType();
        $array2 = json_decode(json_encode($result2), JSON_UNESCAPED_SLASHES);
        $finalResult2 = $array2['original'];
        $fieldType = $finalResult2['data'];

        $result3 = (new ResourceTypeApiController)->getAllResourceTypeLimitedField();
        $array3 = json_decode(json_encode($result3), JSON_UNESCAPED_SLASHES);
        $finalResult3 = $array3['original'];
        $resourceTypeLimitedField = $finalResult3['data'];

        $ProviderID = session()->get('siteId');

        return view('add-resource-type',compact('configTypes','fieldType','ProviderID','resourceTypeLimitedField'));
    }

    // public function addNewResourceTypePost(Request $request){
    //     $request->request->add(['ProviderID' => session()->get('siteId')]); //add request
    //     $result = (new ResourceTypeApiController)->addNewResourceType($request);
    //     $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
    //     $finalResult = $array['original'];
    //     dd($finalResult);
    //     if($finalResult['status'] == 'success'){
    //         return redirect('/resource-type')->with('success',$finalResult['message']);
    //     }
    // }

    public function editResourceType($id){

        $ProviderID = session()->get('siteId');

        $myRequest = new Request();
        $myRequest->setMethod(Request::METHOD_POST);
        $myRequest->request->set('ProviderID', $ProviderID);

        $apiJSON = (new ResourceTypeApiController)->edit($myRequest, $id);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');

        $result = (new ResourceTypeApiController)->getAllConfigurationTypes();
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        $configTypes = $finalResult['data'];

        $result2 = (new ResourceTypeApiController)->getAllCustomAttributesFieldType();
        $array2 = json_decode(json_encode($result2),JSON_UNESCAPED_SLASHES);
        $finalResult2 = $array2['original'];
        $fieldType = $finalResult2['data'];

        $result3 = (new ResourceTypeApiController)->getAllResourceTypeLimitedField();
        $array3 = json_decode(json_encode($result3), JSON_UNESCAPED_SLASHES);
        $finalResult3 = $array3['original'];
        $resourceTypeLimitedField = $finalResult3['data'];

// dd($data, $resourceTypeLimitedField, $fieldType, $ProviderID, $configTypes);
        // return view('pages.resources.resource-type-edit',compact('configTypes','fieldType','ProviderID'));
        return view('edit-resource-type',compact('data', 'configTypes','fieldType','ProviderID', 'resourceTypeLimitedField'));
    }
    public function update(Request $request, $id)
    {
        $apiJSON = (new ResourceTypeApiController)->update($request, $id);
        $original = collect($apiJSON)->get('original');
        $data = collect($original)->get('data');
        // dd($data, $original, $apiJSON);
        return redirect()->route('resource.type.list')->with($original['status'],$original['message']);
    }

}
