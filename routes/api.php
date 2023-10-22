<?php

use App\Http\Controllers\Api\Book\BookApiController;
use App\Http\Controllers\Api\Countries\CountriesApiController;
use App\Http\Controllers\Api\EmailApiController;
use App\Http\Controllers\Api\Resource\ResourceApiController;
use App\Http\Controllers\Api\Resource\ResourceTypeApiController;
use App\Http\Controllers\Api\SignupApiController;
use App\Http\Controllers\Api\SiteSettingApiController;
use App\Http\Controllers\Api\UserGroupApiController;
use App\Http\Controllers\Api\UsersApiController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

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
    // p("working");
});

Route::post('signup-detailSaved','App\Http\Controllers\Api\SignupApiController@store');
// Route::get('users/get',[SignupController::class,'index']);
Route::get('users/get',[SignupApiController::class,'index']);
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

Route::controller(ResourceApiController::class)->group(function(){
    Route::get('all-resources','getAllResources');
    Route::get('resource', 'getAllResource')->name('api.resource.resource');
    Route::get('all-resource-location','getAllResourcesLocation');
    Route::post('add-resource', 'storeResource');
    Route::post('add-new-resource-location','addNewResourceLocationPost');
    Route::post('find-resource-location','findResourceLocation');
    Route::post('update-resource-location','updateResourceLocation');
    Route::post('delete-resource-location','deleteResourceLocation');
});

// Route::get('resource/test', [ResourceController::class, 'test'])->name('resource.test');

Route::controller(ResourceTypeApiController::class)->group(function(){
    Route::post('resource-type','getAllResourceType');
    Route::get('resource-configuration-type','getAllConfigurationTypes');
    Route::post('add-new-resource-type','addNewResourceType');
    Route::post('resource-type/{ResourceType}', 'update')->name('api.ResourceType.update');
    Route::post('resource-type-limited-field','getAllResourceTypeLimitedField');
    Route::post('delete-resource-type','deleteResourceType');
});

// Route::resource('booking', BookingApiController::class);
// Route::controller(BookingController::class)->group(function(){});

Route::resource('book', BookApiController::class);
Route::controller(BookApiController::class)->group(function(){
    Route::post('book/resource', 'getResource')->name('getresource');
    Route::post('booked/resource/{resource}', 'getBookedResource')->name('getbookedresource');
    Route::post('book/store', 'store')->name('bookstore');
    // Route::get('book/{location?}', 'index')->name('book.location');
    Route::get('book/{location}/{resource?}', 'show')->name('book.location.resource');
});





// Route::get('all-resources',[ResourceApiController::class,'getAllResources']);
// Route::get('all-resource-location',[ResourceApiController::class,'getAllResourcesLocation']);
// Route::post('add-new-resource-location',[ResourceApiController::class,'addNewResourceLocationPost']);
// Route::post('delete-resource-location',[ResourceApiController::class,'deleteResourceLocation']);

Route::get('all-countries',[CountriesApiController::class,'getAllCountryName']);
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
