<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SignupApiController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LoginSignupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth::routes();

Route::get('/', [LoginSignupController::class,'signIn']);
Route::get('/sign-in', [LoginSignupController::class,'signIn']);
Route::post('/sign-in',[LoginSignupController::class,'signInPost']);
Route::get('/signup',[LoginSignupController::class,'signupView']);
Route::post('/signup',[LoginSignupController::class,'signupDetailSaved']);
Route::get('/verify-email',[LoginSignupController::class,'emailVerificationSend']);
Route::get('/set-password/{token}',[LoginSignupController::class,'passwordPageView']);
Route::post('/set-password',[LoginSignupController::class,'setPasswordFirstTime']);
Route::post('/password-already-set',[LoginSignupController::class,'passwordAlreadySet']);
Route::get('/session-expire',[LoginSignupController::class,'sessionExpire']);
Route::get('/logout',[LoginSignupController::class,'sessionExpire']);

Route::get('/welcome',[LoginSignupController::class,'welcome']);
Route::get('/select-site',[LoginSignupController::class,'selectSite']);
Route::get('/open-site/{siteName}',[LoginSignupController::class,'openSite']);
Route::get('site-settings',[SiteSettingController::class,'siteSettings']);
Route::post('site-settings',[SiteSettingController::class,'siteSettingsPost']);

Route::get('/dashboard',function(){
    return view('dashboard');
});

Route::get('/user',[UserController::class,'getAllUser']);
Route::get('/add-user',[UserController::class,'addUser']);
Route::post('/add-user',[UserController::class,'addUserPost']);
Route::get('/edit-user/{id}',[UserController::class,'editUser']);
Route::post('/edit-user',[UserController::class,'editUserPost']);
//Route::get('/delete-user/{id}',[UserController::class,'deleteUser']);

Route::get('/user-groups',[UserGroupController::class,'userGroup']);
Route::get('/add-user-group',[UserGroupController::class,'addUserGroup']);
Route::post('/add-user-group',[UserGroupController::class,'addUserGroupPost']);

Route::get('/emailSend',[EmailController::class,'sendEmail']);