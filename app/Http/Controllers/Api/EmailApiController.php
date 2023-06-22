<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\FacProvider;
use App\Models\PasswordReset;
use App\Models\UserProviderMapping;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Str;
use Carbon\Carbon;


class EmailApiController extends Controller
{
    public function sendPasswordEmail(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => ['required'],
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(),400);
        }

        $user = User::where('EmailAddress', '=', $request->email)->first();

        $email = $request->email;
        $token = Str::Random(60);

        PasswordReset::create([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

       // dump("http://127.0.0.1:8000/api/email-send/".$token);
       $fullName = $user->Name;
       Mail::Send('mail',['token' => $token,'fullName' => $fullName],function(Message $message)use($email){
        $message->subject('Verify your site');
        $message->to($email);
       });

        return response()->json([
            'message' => 'Email Sent',
            'status' => 'success',
        ],200);
    }
}
