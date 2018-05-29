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

Route::group(['middleware' => ['web']], function () {
    Route::post('login','Auth\LoginController@login');  
    Route::post('register','Auth\RegisterController@register');  
    Route::post('logout','Auth\LoginController@logout');
    Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail'); 
    Route::post('password/reset','Auth\ResetPasswordController@reset');
    Route::post('upload/file','UploadController@upload');
    Route::get('get/token',function(){
    	return view('file');
    });
    Route::get('get/index',function(){
    	return view('show');
    });
     Route::get('download/{id}',function($id){
    	return redirect(\Storage::disk('gcs')->url(\App\Upload::find($id)->image));
    });
      Route::get('delete/{id}',function($id){
    	\App\Upload::find($id)->delete();
    	return redirect('/api/get/index');
    });
      Route::get('rec_delete/{id}',function($id){
    	\App\Upload::withTrashed()->find($id)->restore();
    	return redirect('/api/get/index');
    });
}); 
  

