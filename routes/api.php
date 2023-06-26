<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SignupApiController;
use App\Http\Controllers\Api\SiteSettingApiController;
use App\Http\Controllers\Api\UsersApiController;
use App\Http\Controllers\Api\EmailApiController;
use App\Http\Controllers\Api\UserGroupApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/test',function(){
    p("working");
});

Route::post('signup-detailSaved','App\Http\Controllers\Api\SignupApiController@store');
Route::get('users/get',[SignupController::class,'index']);
Route::post('set-password',[SignupApiController::class,'setFirstTimePassword']);
Route::post('password-check',[SignupApiController::class,'passwordCheck']);
Route::post('check-user-has-password',[SignupApiController::class,'checkUserhasPassword']);

Route::get('siteSettings/{id}',[SiteSettingApiController::class,'firstTimeSiteSettingsDetails']);
Route::post('siteDetailSaved',[SiteSettingApiController::class,'siteDetailSaved']);
Route::post('check-account-status',[SiteSettingApiController::class,'checkAccountStatus']);
Route::post('account-status-activated',[SiteSettingApiController::class,'accountStatusActivated']);
Route::post('user-has-multiple-sites',[SiteSettingApiController::class,'userHasMultipleSite']);

Route::post('add-user',[UsersApiController::class,'addUser']);
Route::post('all-user',[UsersApiController::class,'getAllUser']);
Route::get('all-userType',[UsersApiController::class,'getAllUserType']);
Route::post('delete-user',[UsersApiController::class,'deleteUser']);

Route::post('email-send',[EmailApiController::class,'sendPasswordEmail']);

Route::post('add-user-group',[UserGroupApiController::class,'addUserGroup']);
Route::post('show-all-user-group',[UserGroupApiController::class,'getAllUserGroup']);
Route::post('delete-user-group',[UserGroupApiController::class,'deleteUserGroup']);
Route::post('update-user-group',[UserGroupApiController::class,'updateUserGroup']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/user',function(){
//     return "hello world";
// });

// Route::post('/user',function(){
//     return response()->json("Post Api hit Succesffuly"); 
// });

// Route::delete('/user/{id}',function($id){
//     return response("Delete = ".$id,200);
// });

// Route::put('/user/{id}',function($id){
//     return response("Update = ".$id,200); 
// });