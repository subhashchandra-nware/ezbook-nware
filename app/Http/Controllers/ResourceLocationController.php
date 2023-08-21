<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResourceLocation;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Api\Resource\ResourceApiController;
use App\Http\Controllers\Api\Countries\CountriesApiController;

class ResourceLocationController extends Controller
{
    public function getAllResource(){
        return view('resources');
    }

    public function getAllResourceLocation(){
        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['ProviderID' => session()->get('siteId')]);
        $result = (new ResourceApiController)->getAllResourcesLocation($myRequest);
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        if($finalResult['status'] == 'success'){
            $data = $finalResult['data'];
            return view('resource-location',compact('data'));
        }else{
            return view('resource-location');
        }

    }

    public function addNewResourceLocation(){
        $result = (new CountriesApiController)->getAllCountryName();
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        if($finalResult['status'] == 'success'){
            $countries = $finalResult['countries'];
            return view('add-new-resource-location',compact('countries'));
        }
    }

    public function addNewResourceLocationPost(Request $request){
        $request->validate([
            'Name' => 'required',
            'Address1' => 'required',
            'City' => 'required',
            'State' => 'required',
            'PostalCode' => 'required',
            'Country' => 'required',
        ]);
        $request->request->add(['ProviderID' => session()->get('siteId')]);
        $request->request->add(['CreatedBy' => session()->get('loginUserId')]);

        $result = (new ResourceApiController)->addNewResourceLocationPost($request);
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        if($finalResult['status'] == 'success'){
            return redirect('/resource-location')->with('success',$finalResult['message']);
        }
    }

    public function editResourceLocation($id){
        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['ResourceLocationId' => $id]);
        $result = (new ResourceApiController)->findResourceLocation($myRequest);
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        if($finalResult['status'] == 'success'){
            $data = $finalResult['data'];
            $result = (new CountriesApiController)->getAllCountryName();
            $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
            $finalResult = $array['original'];
            if($finalResult['status'] == 'success'){
                $countries = $finalResult['countries'];
                return view('edit-resource-location',compact('data','countries'));
            }
        }else{
            return redirect('/resource-location');
        }
    }

    public function updateResourceLocation(Request $request){
        $result = (new ResourceApiController)->updateResourceLocation($request);
        $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
        $finalResult = $array['original'];
        if($finalResult['status'] == 'success'){
            return redirect('/resource-location')->with('success',$finalResult['message']);
        }
    }
}
