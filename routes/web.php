<?php

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

Route::get('/a', function () {
    echo "999999999999999";
//    return view('welcome');
});


//不用登录可以访问的路由
Route::group(['namespace'=>'Web','middleware'=>'web'],function (){
    Route::match(['post','get'],'/mzsc1','IndexController@mzsc1');
    Route::match(['post','get'],'/','IndexController@mzsc1');
    Route::match(['post','get'],'/index','IndexController@index');
    Route::match(['post','get'],'mzsc','IndexController@mzsc');
    Route::match(['post','get'],'land','UserController@land');
    Route::match(['post','get'],'user_l','UserController@user_l');
    Route::match(['post','get'],'aaa','UserController@aaa');
    Route::match(['post','get'],'register','UserController@register');
    Route::match(['post','get'],'user_r','UserController@user_r');
    Route::match(['post','get'],'Personal_Pages','UserController@Personal_Pages');
    Route::match(['post','get'],'New_username','UserController@New_username');
    Route::match(['post','get'],'Commodity_details','IndexController@Commodity_details');
    Route::match(['post','get'],'Commodity_details_','IndexController@Commodity_details_');
    Route::match(['post','get'],'search','IndexController@search');
    Route::match(['post','get'],'ceshi','UserController@ceshi');
    Route::match(['post','get'],'shopping_cart','UserController@shopping_cart');
    Route::match(['post','get'],'/email','UserController@email');
    Route::match(['post','get'],'/email_','UserController@email_');
    Route::match(['post','get'],'/insert_province','IndexController@insert_province');




//    Route::match(['post','get'],'/admin/commodity','UserController@commodity');
//    Route::match(['post','get'],'/admin/user','UserController@user');
//    Route::match(['post','get'],'/admin/modify','UserController@modify');
//    Route::match(['post','get'],'/admin/modify_','UserController@modify_');
//    Route::match(['post','get'],'/admin/banning','UserController@banning');
//    Route::match(['post','get'],'/admin/banning_','UserController@banning_');
//    Route::match(['post','get'],'/admin/query_banning','UserController@query_banning');
//    Route::match(['post','get'],'/admin/query_commodity','IndexController@query_commodity');
//    Route::match(['post','get'],'/admin/increase_commodity','IndexController@increase_commodity');
//    Route::match(['post','get'],'/admin/search_superior_id','IndexController@search_superior_id');
//    Route::match(['post','get'],'/admin/nav_column','IndexController@nav_column');
//    Route::match(['post','get'],'/admin/modify_nav','IndexController@modify_nav');
//    Route::match(['post','get'],'/admin/modify_nav_','IndexController@modify_nav_');
//    Route::match(['post','get'],'/admin/delete_nav_','IndexController@delete_nav_');
//    Route::match(['post','get'],'/admin/delete_nav','IndexController@delete_nav');
//    Route::match(['post','get'],'/admin/insert_nav','IndexController@insert_nav');
});


//登陆后才能访问的路由
Route::group(['namespace'=>'Web','middleware'=>'auth_web'],function (){
    Route::match(['post','get'],'Cancellation','UserController@Cancellation');
});
