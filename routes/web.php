<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\SiteController@getHome')->name('getHome');
Route::get('aboutus', 'App\Http\Controllers\SiteController@getAboutUs')->name('getAboutUs');
Route::get('/teams', 'App\Http\Controllers\SiteController@getgovernorTeams')->name('getgovernorTeams');
Route::get('/department/{department}', 'App\Http\Controllers\SiteController@getDepartmentTeams')->name('getDepartmentTeams');
Route::get('/region-zone', 'App\Http\Controllers\SiteController@getRegionzonedevision')->name('getRegionzonedevision');
Route::get('/program/{program}', 'App\Http\Controllers\SiteController@getProgramDetail')->name('getProgramDetail');
Route::get('/donor/{donortype}', 'App\Http\Controllers\SiteController@getDonorDetail')->name('getDonorDetail');
Route::get('/clubs', 'App\Http\Controllers\SiteController@getClubs')->name('getClubs');
Route::get('/contact', 'App\Http\Controllers\SiteController@getContact')->name('getContact');
Route::get('/news-event', 'App\Http\Controllers\SiteController@getNews')->name('getNews');
Route::get('/news-event/{slug}', 'App\Http\Controllers\SiteController@getNewsDetail')->name('getNewsDetail');
Route::get('/projects', 'App\Http\Controllers\SiteController@getProjects')->name('getProjects');
Route::get('/notice/{notice}', 'App\Http\Controllers\SiteController@getNoticeDetail')->name('getNoticeDetail');
Route::get('/card/{membershipno}', 'App\Http\Controllers\SiteController@getPrintCard')->name('getPrintCard');
Route::post('/Ajax/clubs/Members', 'App\Http\Controllers\SiteController@getAjaxclubMember');
Route::get('/privacy', 'App\Http\Controllers\SiteController@getPrivacy')->name('getPrivacy');
Route::get('/terms', 'App\Http\Controllers\SiteController@getTerms')->name('getTerms');
Route::get('/download', 'App\Http\Controllers\SiteController@getDownload')->name('getDownload');

/* Club Route (Default) */
Route::get('/club/dashboard', 'App\Http\Controllers\HomeController@getDashboard')->middleware(['auth'])->name('club.dashboard');
require __DIR__.'/auth.php';

/* Admin Route */
Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@getDashboard')->middleware(['auth:admin'])->name('admin.dashboard');
require __DIR__.'/adminauth.php';



