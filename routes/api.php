<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function(){
	Route::post('auth', 'UserController@login');
    Route::get('verifyemail/{token}', 'UserController@activate_email_account');
	Route::post('resend-activation-link', 'UserController@resend_activation_link');
	Route::post('reset-password-token', 'UserController@send_reset_password_token');
	Route::post('update-password', 'UserController@update_password');
	Route::post('signup', 'UserController@register');
	Route::group(['middleware' => 'auth:api'], function(){
		
	 });
	Route::prefix('user')->group(function(){
		Route::post('getUser', 'UserController@getUser');
		Route::post('update', 'UserController@update');
	});
});
