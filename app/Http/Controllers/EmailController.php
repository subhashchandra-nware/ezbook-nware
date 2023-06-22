<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function sendEmail(){
        $name = "Sonu Kumar Pandit";
        $data = "Hello " .$name;
        $data = ['data'=> $data];
        $user['to'] = 'sonukumarpandit58@gmail.com';
        Mail::send('mail',$data,function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('Email Verification');
        });
    }
}
