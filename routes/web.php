<?php

// use App\Http\Controllers\Api\SignupApiController;

use App\Http\Controllers\Admin\BillingQueryController;
use App\Http\Controllers\Admin\BookingActivityReportController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\SaleQueryController;
use App\Http\Controllers\Admin\SiteDetailsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Cashier\SubscriptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginSignupController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ResourceLocationController;
use App\Http\Controllers\ResourceTypeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\Superadmin\BillingQueryController as SuperadminBillingQueryController;
use App\Http\Controllers\Superadmin\BookingActivityReportController as SuperadminBookingActivityReportController;
use App\Http\Controllers\Superadmin\DashboardController as SuperadminDashboardController;
use App\Http\Controllers\Superadmin\LoginController as SuperadminLoginController;
use App\Http\Controllers\Superadmin\ResetPasswordController as SuperadminResetPasswordController;
use App\Http\Controllers\Superadmin\SaleQueryController as SuperadminSaleQueryController;
use App\Http\Controllers\Superadmin\SiteDetailsController as SuperadminSiteDetailsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Session;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// Route::get('admin', [AdminLoginController::class, 'index'])->name('admin.login');


// Route::get('admin', [LoginController::class, 'admin'])->name('login.admin');

Route::group(['prefix' => 'superadmin', 'as' => 'superadmin.'], function () {
    Route::get('/', [SuperadminLoginController::class, 'showLoginForm'])->name('login');
    Route::get('login', [SuperadminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [SuperadminLoginController::class, 'login'])->name('login');
    Route::post('logout', [SuperadminLoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth', 'user-access:superadmin']], function () {
        Route::get('resetpassword', [SuperadminResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::put('resetpassword', [SuperadminResetPasswordController::class, 'reset'])->name('password.update');

        Route::get('/dashboard', [SuperadminDashboardController::class, 'index'])->name('dashboard');
        // Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
        Route::get('billing-query', [SuperadminBillingQueryController::class, 'index'])->name('billing-query.index');
        Route::post('billing-query', [SuperadminBillingQueryController::class, 'index'])->name('billing-query.index.post');
        Route::get('sale-query', [SuperadminSaleQueryController::class, 'index'])->name('sale-query.index');
        Route::get('booking-activity-report', [SuperadminBookingActivityReportController::class, 'index'])->name('booking-activity-report.index');
        Route::get('site-details', [SuperadminSiteDetailsController::class, 'index'])->name('site-details.index');
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth', 'user-access:admin']], function () {
        Route::get('resetpassword', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::put('resetpassword', [ResetPasswordController::class, 'reset'])->name('password.update');

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        // Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
        Route::get('billing-query', [BillingQueryController::class, 'index'])->name('billing-query.index');
        Route::post('billing-query', [BillingQueryController::class, 'index'])->name('billing-query.index.post');
        Route::get('sale-query', [SaleQueryController::class, 'index'])->name('sale-query.index');
        Route::get('booking-activity-report', [BookingActivityReportController::class, 'index'])->name('booking-activity-report.index');
        Route::get('site-details', [SiteDetailsController::class, 'index'])->name('site-details.index');
    });
});

// Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
//     Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('login');
//     Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
//     Route::post('login', [AdminLoginController::class, 'login'])->name('login');

//     Route::group(['middleware' => ['auth', 'user-access:user']], function () {
//         Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
//     });
// });











    Route::get('/', [LoginController::class, 'index'])->name('login');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::get('register', [LoginController::class, 'create'])->name('register');
    Route::get('logout', [LoginController::class, 'destroy'])->name('logout');
    Route::post('login', [LoginController::class, 'login'])->name('login.login');
    Route::post('register', [LoginController::class, 'store'])->name('register.store');
    Route::get('welcome', [LoginController::class, 'welcome'])->name('login.welcome');
    Route::get('select-site', [LoginController::class, 'selectSite'])->name('login.selectSite');
    Route::get('open-site/{siteName}', [LoginController::class, 'openSite'])->name('login.openSite');
    Route::get('/verify-email', [LoginController::class, 'emailVerificationSend'])->name('login.email.verify');



    // // Route::resource('login', LoginController::class);
    // Route::controller(LoginController::class)->group(function(){
    //     Route::get('/', 'index')->name('login');
    //     Route::get('login', 'index')->name('login');
    //     Route::get('register', 'create')->name('register');
    //     Route::get('logout', 'destroy')->name('logout');
    //     Route::post('login', 'login')->name('login.login');
    //     Route::post('register', 'store')->name('register.store');
    //     Route::get('welcome', 'welcome')->name('login.welcome');
    //     Route::get('select-site', 'selectSite' )->name('login.selectSite');
    //     Route::get('open-site/{siteName}', 'openSite')->name('login.openSite');
    //     Route::get('/verify-email', 'emailVerificationSend')->name('login.email.verify');
    // });


    // Route::get('/', [LoginSignupController::class,'signIn'])->name('login');
    Route::get('/sign-in', [LoginSignupController::class, 'signIn']);
    Route::post('/sign-in', [LoginSignupController::class, 'signInPost']);
    Route::get('/signup', [LoginSignupController::class, 'signupView']);
    Route::post('/signup', [LoginSignupController::class, 'signupDetailSaved']);


    // Route::get('/verify-email',[LoginSignupController::class,'emailVerificationSend'])->name('login.email.verify');
    Route::get('/set-password/{token}', [LoginSignupController::class, 'passwordPageView'])->name('login.setpassword');
    Route::post('/set-password', [LoginSignupController::class, 'setPasswordFirstTime']);
    Route::post('/password-already-set', [LoginSignupController::class, 'passwordAlreadySet']);
    Route::get('/session-expire', [LoginSignupController::class, 'sessionExpire']);
    // Route::get('/logout',[LoginSignupController::class,'sessionExpire']);


    // Route::get('/welcome',[LoginSignupController::class,'welcome'])->name('login.welcome');
    // Route::get('/select-site',[LoginSignupController::class,'selectSite']);
    // Route::get('/open-site/{siteName}',[LoginSignupController::class,'openSite']);
    // Route::get('site-settings',[SiteSettingController::class,'siteSettings']);
    // Route::post('site-settings',[SiteSettingController::class,'siteSettingsPost']);



    Route::middleware(['auth.check'])->group(function () {

        Route::controller(UserController::class)->group(function () {
            Route::get('user/resetpassword', 'password')->name('password.reset');
            Route::put('user/resetpassword', 'updatePassword')->name('password.update');
        });

        Route::resource('user', UserController::class);

        // Route::get('/user',[UserController::class,'getAllUser'])->name('user.list');
        // Route::get('/add-user',[UserController::class,'addUser'])->name('user.create');
        // Route::post('/add-user',[UserController::class,'addUserPost'])->name('user.store');
        // Route::get('/edit-user/{id}',[UserController::class,'editUser'])->name('user.edit');
        // Route::post('/edit-user',[UserController::class,'editUserPost'])->name('user.update');

        // Route::resource('usergroup', UserGroupController::class);
        Route::get('/user-groups', [UserGroupController::class, 'userGroup'])->name('usergroup.index');
        Route::get('/add-user-group', [UserGroupController::class, 'addUserGroup'])->name('user.group.create');
        Route::post('/add-user-group', [UserGroupController::class, 'addUserGroupPost'])->name('user.group.store');
        Route::get('/edit-user-group/{id}', [UserGroupController::class, 'editUserGroup'])->name('user.group.edit');
        Route::post('/edit-user-group', [UserGroupController::class, 'editUserGroupPost'])->name('user.group.update');

        // Route::get('/resources',[ResourceController::class,'getAllResources']);


        Route::resource('setting', SettingController::class);

        Route::resource('dashboard', DashboardController::class);
        Route::controller(DashboardController::class)->group(function () {
            Route::post('dashboard', 'index');
        });

        Route::controller(ResourceLocationController::class)->group(function () {
            Route::get('resource-location', 'getAllResourceLocation')->name('resource.location.list');
            Route::get('add-new-resource-location', 'addNewResourceLocation')->name('resource.location.create');
            Route::post('add-new-resource-location', 'addNewResourceLocationPost')->name('resource.location.store');
            Route::get('edit-resource-location/{id}', 'editResourceLocation')->name('resource.location.edit');
            Route::post('update-resource-location', 'updateResourceLocation')->name('resource.location.update');
        });

        // Route::resource('resourceType', ResourceTypeController::class);
        Route::controller(ResourceTypeController::class)->group(function () {
            Route::get('resource-type', 'resourceType')->name('resource.type.list');
            Route::get('add-new-resource-type', 'addNewResourceType')->name('resource.type.create');
            Route::get('edit-resource-type/{id}', 'editResourceType')->name('resource.type.edit');
            Route::post('resource-type/{ResourceType}', 'update')->name('ResourceType.update');
            //Route::post('add-new-resource-type', 'addNewResourceTypePost');
        });

        Route::controller(ResourceController::class)->group(function () {
            Route::get('resource', 'getAllResource')->name('resource.resource');
            Route::get('resource/test', 'test')->name('resource.test');
            Route::get('add-resource', 'addResource')->name('resource.create');
            Route::post('add-resource', 'storeResource')->name('resource.store');
            Route::get('edit-resource/{resource}', 'editResource')->name('resource.edit');
            Route::put('update-resource/{resource}', 'updateResource')->name('resource.update');
            Route::delete('destroy-resource/{resource}', 'destroyResource')->name('resource.destroy');
        });

        // Route::resource('booking', BookingController::class);
        // Route::controller(BookingController::class)->group(function(){});

        Route::resource('book', BookController::class);
        Route::controller(BookController::class)->group(function () {

            // Route::get('book', 'index')->name('book.index');

            Route::post('book/resource', 'getResource')->name('getresource');
            Route::post('booked/resource/{resource}', 'getBookedResource')->name('getbookedresource');
            // Route::get('book/resource/{resource}', 'getBookedResource')->name('getbookedresource');
            Route::post('book/store', 'store')->name('bookstore');
            Route::get('book/location/{location?}', 'index')->name('book.location');
            // Route::get('book/{location}/{resource?}', 'show')->name('book.location.resource');
            Route::get('book/location/{location}/resource/{resource?}', 'show')->name('book.location.resource');

            Route::get('book/booking/{booking}/subbooking/{SubID?}', 'getBooking')->name('book.getbooking');
            Route::get('book/subbooking/{SubID}', 'getBookingBySubID')->name('book.getbooking.SubID');
            Route::put('book/booking/{booking}', 'update')->name('book.update');
            Route::post('book/accept/{book}', 'accept')->name('book.accept');
            Route::delete('book/reject/{book}', 'reject')->name('book.reject');
        });

        Route::controller(ReportController::class)->group(function () {
            Route::get('report/booking', 'indexBooking')->name('report.booking');
            Route::post('report/booking', 'indexBooking')->name('report.booking');
            Route::get('report/utilization', 'indexUtilization')->name('report.utilization');
            Route::post('report/utilization', 'indexUtilization')->name('report.utilization');
        });
        // Route::resource('report', ReportController::class);

        Route::get('/emailSend', [EmailController::class, 'sendEmail']);

        Route::resource('subscription', SubscriptionController::class);
        Route::controller(SubscriptionController::class)->group(function () {
            Route::get('subscription/{string}/{price}', [SubscriptionController::class, 'charge'])->name('goToPayment');
            Route::post('subscription/process-payment/{string}/{price}', [SubscriptionController::class, 'processPayment'])->name('processPayment');
        });


        Route::get('/clear-cache', function () {
            Artisan::call('cache:clear');
        });
        Route::get('/config-clear', function () {
            Artisan::call('config:clear');
        });
    });

