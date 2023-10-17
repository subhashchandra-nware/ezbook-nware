<?php

namespace App\Http\Controllers\Api\Setting;

use App\Http\Controllers\Controller;
use App\Models\FacProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $id = session()->get('siteId');
        $FacProvider = FacProvider::find($id);
        // $data['User'] = User::find($id)->toArray();
        // dd(session() , $id, $FacProvider);
       $data['FacProvider'] = $FacProvider->toArray();
       $data['registrationDate'] = $FacProvider->created_at->format('d-m-Y');

        if ($data != null) {
            return response()->json([
                "message" => "Site Settings are Found Successfully.",
                "status" => "success",
                "data" => $data,
            ], 200);
        } else {
            return response()->json([
                "message" => "Site Settings are not found.",
                "status" => "failed",
            ], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required',
            // 'ContactName' => 'required',
            // 'ContactNumber' => 'required',
            // 'ContactEmail' => 'required',
            // 'ContactAddress1' => 'required',
            // 'ContactAddress2' => 'required',
            // 'ContactCity' => 'required',
            // 'ContactZip' => 'required',
            // 'ContactCountry' => 'required',
            'HomeURL' => 'required',
            // 'OrgUrl' => 'required',
            // 'registrationDate' => 'required',
            // 'IsBusinessProfileUpdated' => 1;
        ]);
        $validator->validate();

        $file = $request->file('file');

        $FacProvider = FacProvider::find($request->id);
        if( ! empty($file) ){
            $file->move('media/logos', $request->Name.'.png');
            // $file->move('media/logos', $request->Name.'.'.$file->extension());
            $FacProvider->HasLogo = 1;
            session()->put('siteData.HasLogo', $FacProvider->HasLogo);
        }
        $FacProvider->fill($request->all());
        if( ! $FacProvider->IsBusinessProfileUpdated ){
            $FacProvider->IsBusinessProfileUpdated = 1;
        }
        // dd($FacProvider->toArray(), $request->all());
        try {
            if($FacProvider->save()){
                    return response()->json([
                        'message' => 'User details updated Successfully',
                        'user_id' => $FacProvider->id,
                        'status' => 'success'
                    ],200);
                }
            } catch (\Exception $th) {
                // throw $th;
                return response()->json([
                    'message' => $th->getMessage(),
                    'user_id' => $FacProvider->id,
                    'status' => 'failed'
                ],200);
            }


        //     if($FacProvider != null){
        //         $FacProvider->id = $request->id;
        //         $FacProvider->ContactName = $request->contactName;
        //         $FacProvider->ContactNumber = $request->mobileNumber;
        //         $FacProvider->ContactEmail = $request->email;
        //         $FacProvider->ContactAddress1 = $request->address1;
        //         $FacProvider->ContactAddress2 = $request->address2;
        //         $FacProvider->ContactCity = $request->city;
        //         $FacProvider->ContactZip = $request->zipcode;
        //         $FacProvider->ContactCountry = $request->country;
        //         $FacProvider->HomeURL = $request->siteId;
        //         $FacProvider->OrgUrl = $request->companySite;
        //         $FacProvider->IsBusinessProfileUpdated = 1;
        //         if($FacProvider->save()){
        //             return response()->json([
        //                 'message' => 'User details updated Successfully',
        //                 'user_id' => $FacProvider->id,
        //                 'status' => 'success'
        //             ],200);
        //         }else{
        //             return response()->json([
        //                 'message' => 'User details not Updated',
        //                 'user_id' => $FacProvider->id,
        //                 'status' => 'failed'
        //             ],200);
        //         }
        //     }else{
        //         return response()->json([
        //             'message' => 'Wrong User Id',
        //             'user_id' => $request->id,
        //             'status' => 'failed'
        //         ],200);
        //     }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function siteSettings(){
        if(session()->get('userSession')){
            $userId = session()->get('userSession')['user']['id'];
            $user = User::find($userId);
            $password = $user->Password;
            if($password == null || $password == ""){
                session()->flush();
                return redirect('/');
            }
            else{
                $siteId = session()->get('siteId');
                $result = (new SiteSettingApiController)->firstTimeSiteSettingsDetails($siteId);
                $array = json_decode(json_encode($result),JSON_UNESCAPED_SLASHES);
                $finalResult = $array['original'];
                $registrationDate = $finalResult['created_date'];
                $data = $finalResult['facProviderData'];
                // session()->put('siteUserName',FacProvider::currentSite()->ContactName);
                // session()->put('siteEmailAddress',FacProvider::currentSite()->ContactEmail);
                return view('site-setting',compact('data','registrationDate'));
            }
        }else{
            return redirect('/');
        }
    }

    /**
     * END::CLASS
     */
}
