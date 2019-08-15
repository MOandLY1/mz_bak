<?php

Route::group(['namespace'=>'Admin','middleware'=>'api'],function () {
    Route::match(['post', 'get'], '/commodity', 'UserController@commodity');
    Route::match(['post', 'get'], '/user', 'UserController@user');
    Route::match(['post', 'get'], '/modify', 'UserController@modify');
    Route::match(['post', 'get'], '/modify_', 'UserController@modify_');
    Route::match(['post', 'get'], '/banning', 'UserController@banning');
    Route::match(['post', 'get'], '/banning_', 'UserController@banning_');
    Route::match(['post', 'get'], '/query_banning', 'UserController@query_banning');
    Route::match(['post', 'get'], '/query_commodity', 'IndexController@query_commodity');
    Route::match(['post', 'get'], '/increase_commodity', 'IndexController@increase_commodity');
    Route::match(['post', 'get'], '/increase_commodity_', 'IndexController@increase_commodity_');
    Route::match(['post', 'get'], '/search_superior_id', 'IndexController@search_superior_id');
    Route::match(['post', 'get'], '/nav_column', 'IndexController@nav_column');
    Route::match(['post', 'get'], '/modify_nav', 'IndexController@modify_nav');
    Route::match(['post', 'get'], '/modify_nav_', 'IndexController@modify_nav_');
    Route::match(['post', 'get'], '/delete_nav_', 'IndexController@delete_nav_');
    Route::match(['post', 'get'], '/delete_nav', 'IndexController@delete_nav');
    Route::match(['post', 'get'], '/insert_nav', 'IndexController@insert_nav');
    Route::match(['post', 'get'], '/admin_land', 'UserController@admin_land');
    Route::match(['post', 'get'], '/query_superior', 'IndexController@query_superior');
    Route::match(['post', 'get'], '/query_jurisdiction_superior', 'UserController@query_jurisdiction_superior');
    Route::match(['post', 'get'], '/added_administrator', 'UserController@added_administrator');
    Route::match(['post', 'get'], '/query_land_administration', 'UserController@query_land_administration');
    Route::match(['post', 'get'], '/query_selection', 'IndexController@query_selection');
    Route::match(['post', 'get'], '/query_commodity_selection', 'IndexController@query_commodity_selection');
    Route::match(['post', 'get'], '/insert_commodity', 'IndexController@insert_commodity');
    Route::match(['post', 'get'], '/search_color', 'IndexController@search_color');
    Route::match(['post', 'get'], '/search_memory', 'IndexController@search_memory');
    Route::match(['post', 'get'], '/insert_color', 'IndexController@insert_color');
    Route::match(['post', 'get'], '/insert_memory', 'IndexController@insert_memory');
    Route::match(['post', 'get'], '/insert_photo', 'IndexController@insert_photo');
    Route::match(['post', 'get'], '/query_appoint_commodity', 'IndexController@query_appoint_commodity');
    Route::match(['post', 'get'], '/insert_commodity_', 'IndexController@insert_commodity_');
    Route::match(['post', 'get'], '/modify_stock', 'IndexController@modify_stock');
    Route::match(['post', 'get'], '/insert_stock', 'IndexController@insert_stock');
    Route::match(['post', 'get'], '/modify_price', 'IndexController@modify_price');
    Route::match(['post', 'get'], '/prohibition_commodity', 'IndexController@prohibition_commodity');
    Route::match(['post', 'get'], '/prohibition_commodity_', 'IndexController@prohibition_commodity_');
    Route::match(['post', 'get'], '/upper_shelf_commodity', 'IndexController@upper_shelf_commodity');
    Route::match(['post', 'get'], '/relieve_prohibition', 'UserController@relieve_prohibition');
    Route::match(['post', 'get'], '/query_selection_', 'IndexController@query_selection_');
    Route::match(['post', 'get'], '/query_commodity_name', 'IndexController@query_commodity_name');
    Route::match(['post', 'get'], '/query_commodity_name_', 'IndexController@query_commodity_name_');
    Route::match(['post', 'get'], '/query_selection_color_capacity', 'IndexController@query_selection_color_capacity');
    Route::match(['post', 'get'], '/query_region', 'IndexController@query_region');
    Route::match(['post', 'get'], '/insert_region', 'IndexController@insert_region');
    Route::match(['post', 'get'], '/query_region_', 'IndexController@query_region_');












});
//登陆后才能访问的路由
Route::group(['namespace'=>'Web','middleware'=>'auth_api'],function (){
    Route::match(['post','get'],'Cancellation','UserController@Cancellation');
});