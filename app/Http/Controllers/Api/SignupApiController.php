<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\FacProvider;
use App\Models\UserProviderMapping;
use Illuminate\Support\Facades\Hash;
use App\Models\PasswordReset;

class SignupApiController extends Controller
{
    public function index()
    {
        $users = User::all();
        if(count($users) > 0){
            $response = [
                'message' => count($users). ' users found',
                'status' => 1,
                'data' => $users
            ];
        }else{
            $response = [
                'message' => count($users). ' users found',
                'status' => 0
            ];

        }
        return response()->json($response,200);
        // p($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(),[
        'Name' => ['required','unique:facproviders'],
        'firstName' => ['required'],
        'emailAddress' => ['required','email'],
       ]);

       $fullName = $request->firstName." ". $request->lastName;

       if($validator->fails()){
        return response()->json($validator->messages(),400);
       }else{
        $userExists = User::where('EmailAddress', '=', $request->emailAddress)->first();
        if($userExists != null){
            if($userExists->Password != null){
                $userData = [
                    'Name' => $fullName,
                    'LoginName' => '',
                    'Password' => $userExists->Password,
                    'EmailAddress' => $userExists->EmailAddress,
                    'AdminLevel' => 1,
                  ];
            }else{
                $userData = [
                    'Name' => $fullName,
                    'LoginName' => '',
                    'Password' => '',
                    'EmailAddress' => $request->emailAddress,
                    'AdminLevel' => 1,
                  ];
            }
        }else{
           $userData = [
            'Name' => $fullName,
            'LoginName' => '',
            'Password' => '',
            'EmailAddress' => $request->emailAddress,
            'AdminLevel' => 1,
          ];
        }

        DB::beginTransaction();
        try {
            $user = User::create($userData);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // p($e->getMessage());
        }

        $facprovidersData = [
            'Name' => trim($request->Name),
            'LoginName' => '',
            'ContactName' => $fullName,
            'ContactEmail' => $request->emailAddress,
            'HomeURL' => '',
            'ExpiryDate' => date("Y-m-d h:i:s"),
            'AccountStatus' => 0,
            'TimeZone' => '',
            'IsVerified' => ($userExists != null) ? 1 : 0,
            'IsBusinessProfileUpdated' => 0,
            'CreatedBy' => $user->id
        ];

        DB::beginTransaction();
        try {
            $facProvider = FacProvider::create($facprovidersData);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // p($e->getMessage());
        }

        $userProviderMappingData = [
            'UserId' => $user->id,
            'ProviderId' => $facProvider->id,
            'Active' => 1,
        ];

        DB::beginTransaction();
        try {
            $userProviderMapping = UserProviderMapping::create($userProviderMappingData);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            p($e->getMessage());
        }
       }

       if($user !=null && $facProvider !=null && $userProviderMapping !=null){
        return response()->json([
            'message' => 'User register Successfully',
            'status' => 1,
            'user_id' => $user->id,
            'name' => $user->Name,
            'emailAddress' => $user->EmailAddress,
            'user' => $user
        ],200);
       }else{
        return response()->json([
            'message' => 'User not Register',
            'status' => 0
        ],500);
       }
        // p($request->all());
    }

    public function emailVerificationSend($id){
        $data = User::find($id);
        $email = $data->EmailAddress;
        return view('verify-email',compact('id','email'));
    }

    /**
     * Summary of setFirstTimePassword
     * @param \Illuminate\Http\Request $request
     * @param mixed $token
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function setFirstTimePassword(Request $request,$token){
        /* Delete Token older than 2 min
        $formatted = Carbon::now()->subMintues(2)->toDateTimeString();
        PasswordReset::where('created_at','<=', $formatted)->delete();
        */

        $validator = Validator::make($request->all(),[
            'password' => ['required','min:8','confirmed'],
            'password_confirmation' => ['required']
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(),400);
        }else{
            $passwordReset = PasswordReset::where('token',$token)->first();
            if(!$passwordReset){
                return response()->json([
                    'message' => 'Token is invalid',
                    'status' => 'failed'
                ],200);
            }

            $user = User::where('EmailAddress',$passwordReset->email)->first();
            $user->Password = Hash::make($request->password);
            $user->save();

            //User::where('EmailAddress',$passwordReset->email)->update( array('Password'=> Hash::make($request->password)) );

            FacProvider::where('ContactEmail', $passwordReset->email)->update( array('IsVerified'=>1) );

            PasswordReset::where('token',$token)->delete();
            return response()->json([
                'message' => 'Password changed successfully',
                'status' => 'success'
            ],200);
        }
    }

    public function passwordCheck(Request $request){
        $validator = Validator::make($request->all(),[
            'EmailAddress' => ['required'],
            'Password' => ['required'],
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(),400);
        }

        $user = User::where([
            ['EmailAddress', '=',  $request->EmailAddress],
            ['deleted_at', '=', NULL]
        ])->first();

        if($user != null){
            $res = Hash::check($request->Password, $user->Password);
            if($res){
                return response()->json([
                    'status' => 'success',
                    'user' => $user,
                    'message' => 'User exists',
                ],200);
            }else{
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Email and Password do not match',
                ],200);
            }
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Email id not exists',
            ],200);
        }
    }

    public function isPasswordResetLinkValid($token){
        $passwordReset = PasswordReset::where('token',$token)->first();
            if(!$passwordReset){
                return response()->json([
                    'message' => 'Token is invalid',
                    'status' => 'failed'
                ],200);
            }else{
                return response()->json([
                    'message' => 'Token is valid',
                    'status' => 'success'
                ],200);
            }
    }

    public function checkUserhasPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'token' => ['required',],
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(),400);
        }
        $passwordReset = PasswordReset::where('token',$request->token)->first();
        $user = User::where('EmailAddress',$passwordReset->email)->first();
        if(!$user->Password){
            return response()->json([
                'message' => 'Password not set',
                'status' => 'failed'
            ],200);
        }else{
            return response()->json([
                'message' => 'Password already set',
                'status' => 'success'
            ],200);
        }
    }
}
