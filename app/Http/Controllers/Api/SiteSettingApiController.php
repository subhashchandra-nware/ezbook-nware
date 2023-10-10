<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\FacProvider;
use App\Models\UserProviderMapping;

class SiteSettingApiController extends Controller
{
    public function firstTimeSiteSettingsDetails($id)
    {
        $userData = User::find($id);
        $facProviderData = FacProvider::find($id);
        $createdDate = $facProviderData->created_at->format('d-m-Y');
        $response = "";
        if ($userData) {
            $response = [
                'facProviderData' => $facProviderData,
                'status' => 'success',
                'created_date' => $createdDate
            ];
        } else {
            $response = [
                'message' => 'No Record Found',
                'status' => 'failed'
            ];
        }
        return response()->json($response, 200);
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
                $facProvider->IsBusinessProfileUpdated = 1;
                if ($facProvider->save()) {
                    return response()->json([
                        'message' => 'User details updated Successfully',
                        'user_id' => $facProvider->id,
                        'status' => 'success'
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'User details not Updated',
                        'user_id' => $facProvider->id,
                        'status' => 'failed'
                    ], 200);
                }
            } else {
                return response()->json([
                    'message' => 'Wrong User Id',
                    'user_id' => $request->id,
                    'status' => 'failed'
                ], 200);
            }
        }
    }

    public function accountStatusActivated(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $facProviderId = UserProviderMapping::where('id', $request->id)->value('ProviderId');
        $updateAccountStatus = FacProvider::find($facProviderId);
        try {
            if (!$updateAccountStatus->AccountStatus) {
                $updateAccountStatus->AccountStatus = '1';
                $updateAccountStatus->save();
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Account Status value updated',
                'AccountStatus' => $updateAccountStatus->AccountStatus,
                'data' => $updateAccountStatus,
                'datafac' => $facProviderId,
            ], 200);
        } catch (\Throwable $th) {
            // dd($facProviderId, $updateAccountStatus);
            throw $th;
        }
    }

    public function checkAccountStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $accountStatus = FacProvider::where('id', $request->id)->value('AccountStatus');
        return response()->json([
            'status' => 'success',
            'AccountStatus' => $accountStatus
        ], 200);
    }

    public function userHasMultipleSite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $getAllUserId = User::where('EmailAddress', $request->email)->select('id')->get()->toArray();
        $userProvidingMappingResult = UserProviderMapping::whereIn('id', $getAllUserId)->select('ProviderId')->get()->toArray();
        $siteResult = FacProvider::whereIn('id', $userProvidingMappingResult)->select('Name')->get();
        $data = [];
        $data['getAllUserId'] = $getAllUserId;
        $data['userProvidingMappingResult'] = $userProvidingMappingResult;
        $data['siteResult'] = $siteResult;
        $siteName = $siteResult->implode('Name', ', ');
        return response()->json([
            'status' => 'success',
            'total_site_count' => $siteResult->count(),
            'site_name' => $siteName,
            'data' => $data,
        ], 200);
    }
}
