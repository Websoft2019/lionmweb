<?php

use App\Http\Controllers\Adminauth\AuthenticatedSessionController;
use App\Http\Controllers\Adminauth\ConfirmablePasswordController;
use App\Http\Controllers\Adminauth\EmailVerificationNotificationController;
use App\Http\Controllers\Adminauth\EmailVerificationPromptController;
use App\Http\Controllers\Adminauth\NewPasswordController;
use App\Http\Controllers\Adminauth\PasswordResetLinkController;
use App\Http\Controllers\Adminauth\RegisteredUserController;
use App\Http\Controllers\Adminauth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){

    // Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

    // Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/profile', 'App\Http\Controllers\AdminController@getProfile')->name('getProfile');
    Route::post('/profile/', 'App\Http\Controllers\AdminController@postAdminPasswordChange')->name('postAdminPasswordChange');
    Route::get('/club/manage', 'App\Http\Controllers\AdminController@getManageClub')->name('getManageClub');
    Route::get('/club/add', 'App\Http\Controllers\AdminController@getClubAdd')->name('getClubAdd');
    Route::get('/club/edit/{club}', 'App\Http\Controllers\AdminController@getEditClub')->name('getEditClub');
    Route::post('/club/edit/{club}', 'App\Http\Controllers\AdminController@postEditClub')->name('postEditClub');
    Route::get('/club/hideORdelete/{club}', 'App\Http\Controllers\AdminController@getHideORDeleteClub')->name('getHideORDeleteClub');
    Route::get('/club/resetpasswordandsendSMS/{club}', 'App\Http\Controllers\AdminController@getResetPasswordAndSendSMS')->name('getResetPasswordAndSendSMS');

    Route::post('/club/add', 'App\Http\Controllers\AdminController@postAddNewClub')->name('postAddNewClub');
    Route::get('/autocomplete/zone/list/', 'App\Http\Controllers\AdminController@getAutoCompleteZoneList')->name('getAutoCompleteZoneList');
    Route::get('/autocomplete/club/list/', 'App\Http\Controllers\AdminController@getAutoCompleteClubList')->name('getAutoCompleteClubList');
    

    Route::get('/donor/manage', 'App\Http\Controllers\AdminController@getManageDonor')->name('getManageDonor');
    Route::post('/ajax/search/membership', 'App\Http\Controllers\AdminController@getAjaxMembership')->name('abc');
    Route::get('/club/{club}', 'App\Http\Controllers\AdminController@getClubDetail')->name('getClubDetail');

    Route::post('/club/{club}', 'App\Http\Controllers\AdminController@postAddNewMember')->name('postAddNewMember');
    Route::get('/member/deleteparmantly/{membership_no}', 'App\Http\Controllers\AdminController@getMemberDeleteParmantly')->name('getMemberDeleteParmantly');
    Route::get('/member/drop/{membership_no}', 'App\Http\Controllers\AdminController@getMemberDrop')->name('getMemberDrop');
    Route::get('/member/make-active/{membership_no}', 'App\Http\Controllers\AdminController@getMakeActiveMember')->name('getMakeActiveMember');
    Route::post('/member/edit/{member}', 'App\Http\Controllers\AdminController@postEditMember')->name('postEditMember');
    Route::post('/sort/members', 'App\Http\Controllers\AdminController@postSortMember');

    Route::get('/members', 'App\Http\Controllers\AdminController@getAllMembers')->name('getAllMembers');


    Route::get('/district-deparment/manage', 'App\Http\Controllers\AdminController@getManageDistrictDepartment')->name('getManageDistrictDepartment');
    Route::post('/district-deparment/manage', 'App\Http\Controllers\AdminController@postAddDepartment')->name('postAddDepartment');
    Route::get('/district-deparment/member/manage/{department}', 'App\Http\Controllers\AdminController@getAddDepartmentMember')->name('getAddDepartmentMember');
    Route::post('/district-deparment/member/add', 'App\Http\Controllers\AdminController@postAddDepartmentMember')->name('postAddDepartmentMember');
    Route::get('/district-deparment/delete/{department}', 'App\Http\Controllers\AdminController@getDeleteDepartment')->name('getDeleteDepartment');
    Route::get('/district-deparment/edit/{department}', 'App\Http\Controllers\AdminController@getDepartmentEdit')->name('getDepartmentEdit');
    Route::post('/district-deparment/edit/{department}', 'App\Http\Controllers\AdminController@postEditDepartment')->name('postEditDepartment');

    Route::get('/district-team/manage', 'App\Http\Controllers\AdminController@getManageDistrictTeam')->name('getManageDistrictTeam');
    Route::get('/district-team/add', 'App\Http\Controllers\AdminController@getAddDistrictTeam')->name('getAddDistrictTeam');


    Route::post('/donor/add', 'App\Http\Controllers\AdminController@postAddNewDonor')->name('postAddNewDonor');

    Route::get('/registration/add', 'App\Http\Controllers\AdminController@getManageRegistration')->name('getManageRegistration');
    Route::post('/registration/add', 'App\Http\Controllers\AdminController@postAddNewRegistration')->name('postAddNewRegistration');
    Route::get('/registration/manage', 'App\Http\Controllers\AdminController@getRegistrationList')->name('getRegistrationList');
    Route::get('/registration/details/{registration}', 'App\Http\Controllers\AdminController@getRegstrationDetail')->name('getRegstrationDetail');

    Route::get('/member/{member}', 'App\Http\Controllers\AdminController@getMemberDetail')->name('getMemberDetail');

    Route::post('regionkozone/add', 'App\Http\Controllers\AdminController@postAddRegionKoZone')->name('postAddRegionKoZone');
    Route::post('zonekoclub/add', 'App\Http\Controllers\AdminController@postAddZoneKoClub')->name('postAddZoneKoClub');
    Route::get('zonekoclub/delete/{zonekoclub}', 'App\Http\Controllers\AdminController@getZoneEnrollClubDelete')->name('getZoneEnrollClubDelete');
    Route::get('enrollmember/delete/{member}', 'App\Http\Controllers\AdminController@getDeleteEnrollMember')->name('getDeleteEnrollMember');
    



    // cms 
    Route::get('/governorteam/manage', 'App\Http\Controllers\AdminCMSController@getManageGovernorTeam')->name('getManageGovernorTeam');
    Route::post('/governorteam/manage', 'App\Http\Controllers\AdminCMSController@postAddGovernorTeam')->name('postAddGovernorTeam');
    Route::get('/program/manage', 'App\Http\Controllers\AdminCMSController@getManageProgram')->name('getManageProgram');
    Route::post('/program/manage', 'App\Http\Controllers\AdminCMSController@postAddProgram')->name('postAddProgram');
    Route::get('/donortype/manage', 'App\Http\Controllers\AdminCMSController@getManageDonorType')->name('getManageDonorType');
    Route::post('/donortype/manage', 'App\Http\Controllers\AdminCMSController@postAddDonorType')->name('postAddDonorType');

    Route::get('/manage/posts', 'App\Http\Controllers\AdminCMSController@getManagePost')->name('getManagePost');
    Route::post('/manage/posts', 'App\Http\Controllers\AdminCMSController@postAddOfficer')->name('postAddOfficer');
    Route::get('/manage/edit/posts/{officer}', 'App\Http\Controllers\AdminCMSController@getOfficerEdit')->name('getOfficerEdit');
    Route::get('/manage/edit/posts/{officer}', 'App\Http\Controllers\AdminCMSController@postEditOfficer')->name('postEditOfficer');

    Route::get('/manage/news', 'App\Http\Controllers\AdminCMSController@getManageNews')->name('getManageNews');
    Route::post('/manage/news', 'App\Http\Controllers\AdminCMSController@postAddNews')->name('postAddNews');
    Route::get('/manage/news/edit/{news}', 'App\Http\Controllers\AdminCMSController@getEditNews')->name('getEditNews');
    Route::post('/manage/news/edit/{news}', 'App\Http\Controllers\AdminCMSController@postEditNews')->name('postEditNews');
    Route::get('/manage/news/delete/{news}', 'App\Http\Controllers\AdminCMSController@getDeleteNews')->name('getDeleteNews');

    Route::get('/manage/notice', 'App\Http\Controllers\AdminCMSController@getManageNotice')->name('getManageNotice');
    Route::post('/manage/notice', 'App\Http\Controllers\AdminCMSController@postAddNotice')->name('postAddNotice');
    Route::get('/manage/notice/edit/{notice}', 'App\Http\Controllers\AdminCMSController@getEditNotice')->name('getEditNotice');
    Route::post('/manage/notice/edit/{notice}', 'App\Http\Controllers\AdminCMSController@postEditNotice')->name('postEditNotice');
    Route::get('/manage/notice/delete/{notice}', 'App\Http\Controllers\AdminCMSController@getDeleteNotice')->name('getDeleteNotice');

    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
