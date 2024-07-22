<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Route::get('register', [RegisteredUserController::class, 'create', false])->name('register');

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

    Route::group(['middleware' => ['auth'], 'prefix' => 'club'], function(){
    Route::get('/manage/members', 'App\Http\Controllers\HomeController@getManageMember')->name('club.getManageMember');
    Route::get('/members/add', 'App\Http\Controllers\HomeController@getAddMember')->name('club.getAddMember');
    Route::post('/member/add', 'App\Http\Controllers\HomeController@postAddNewMember')->name('club.postAddNewMember');
    Route::get('/profile/update', 'App\Http\Controllers\HomeController@getUpdateProfile')->name('club.getUpdateProfile');
    Route::get('/profile', 'App\Http\Controllers\HomeController@getClubProfile')->name('club.profile');
    Route::post('/profile', 'App\Http\Controllers\HomeController@postModifyProfile')->name('club.postModifyProfile');
    Route::post('/upload-logo', 'App\Http\Controllers\HomeController@postUploadLogo')->name('club.postUploadLogo');
    Route::get('/change-password', 'App\Http\Controllers\HomeController@getChangePassword')->name('club.getChangePassword');
    Route::post('/reset-password', 'App\Http\Controllers\HomeController@PostChangePassword')->name('club.password.update');
    Route::get('/member/edit/{member}', 'App\Http\Controllers\HomeController@getMemberEdit')->name('club.getMemberEdit');
    Route::post('/member/edit/{member}', 'App\Http\Controllers\HomeController@postEditMember')->name('club.postEditMember');
    Route::get('/member/{member}', 'App\Http\Controllers\HomeController@getMemberDetail')->name('club.getMemberDetail');
    Route::post('/member/modify/photo/{member}', 'App\Http\Controllers\HomeController@postUploadMemberPhoto')->name('club.postUploadMemberPhoto');
    Route::get('/member/drop/{member}', 'App\Http\Controllers\HomeController@getMemberDrop')->name('club.getMemberDrop');
    Route::get('/registration/list', 'App\Http\Controllers\HomeController@getRegistrationList')->name('club.getRegistrationList');
    Route::get('/registration/form/{registration}', 'App\Http\Controllers\HomeController@getRegistrationProcess')->name('club.getRegistrationProcess');
    Route::post('/registration/register', 'App\Http\Controllers\HomeController@postEventRegister')->name('club.postEventRegister');
    Route::get('/registration/payment/{groupcode}', 'App\Http\Controllers\HomeController@getPayment')->name('club.getPayment');
    Route::get('/payment/{groupcode}', 'App\Http\Controllers\HomeController@postDoPayment')->name('club.postDoPayment');
    Route::post('/memberpostchange/{memberno}', 'App\Http\Controllers\HomeController@postNewDesignationofNewLionYear')->name('club.postNewDesignationofNewLionYear');
    

    Route::get('payment_status/fonepay_payment_success', 'App\Http\Controllers\HomeController@getFonepayResult')->name('club.getFonepayResult');
    Route::get('booking-details/{registration}', 'App\Http\Controllers\HomeController@getBookingDetail')->name('club.getBookingDetail');
    Route::get('invoice/{registration}/{code}', 'App\Http\Controllers\HomeController@getBookingInvoice')->name('club.getBookingInvoice');
    Route::post('ajax/getInvoiceInfo', 'App\Http\Controllers\HomeController@getAjaxInvoice')->name('club.getAjaxInvoiceInfo');
    
    
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
