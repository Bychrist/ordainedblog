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


Auth::routes();

/*The is the admin route for post*/

Route::get('/dashboard', 'DashboardController@index');
Route::get('/post/create', 'DashboardController@create');
Route::post('post/store', 'DashboardController@store');
Route::get('post/view', 'DashboardController@viewpost');
Route::get('post/delete/{id}', 'DashboardController@post_delete');
Route::get('post/edit/{id}', 'DashboardController@post_edit');
Route::post('post/update/{id}', 'DashboardController@post_update');
Route::get('post/trash', 'DashboardController@post_trash');
Route::get('post/kill/{id}', 'DashboardController@post_kill');
Route::get('post/restore/{id}', 'DashboardController@post_restore');

/* /End of admin route for post */


/* This is admin route for category */
Route::get('category/create','DashboardController@category_create');
Route::post('category/store','DashboardController@category_store');
Route::get('category/delete/{id}','DashboardController@category_delete');
Route::get('category/edit/{id}','DashboardController@category_edit');
Route::post('category/update/{id}','DashboardController@category_update');

/* /This is admin route for category */


/*::::::::::: THE ADMIN ROUTE FOR TAGS :::::::::::::::::::*/
Route::get('tag/create','DashboardController@tag_create');
Route::get('tag/edit/{id}','DashboardController@tag_edit');
Route::post('tag/store','DashboardController@tag_store');
Route::post('tag/update/{id}','DashboardController@tag_update');
Route::get('tag/delete/{id}','DashboardController@tag_delete');
/*::::::::::: THE END OF ADMIN ROUTE FOR TAGS :::::::::::::::::::*/


/*:::::::::::::::::::::::::: THE USER ROUTES :::::::::::::::::::::::::*/
Route::get('user/allusers','DashboardController@user_showall');
Route::get('user/create','DashboardController@user_create')->middleware('admin');
Route::post('user/store','DashboardController@user_store');
Route::get('user/makeadmin/{id}','DashboardController@user_makeadmin')->middleware('admin');
Route::get('user/delete/{id}','DashboardController@user_delete')->middleware('admin');

/*:::::::::::::::::::::::::: END OF THE USER ROUTES :::::::::::::::::::::::::*/


/*::::::::::::::::::::::::::: THE PROFILE ROUTE:::::::::::::::::::::::::::::::*/
Route::get('profile/user', 'ProfileController@profile_page');
Route::post('profile/user/update', 'ProfileController@profile_update');

/*:::::::::::::::::::::::::::::END OF PROFILE PAGE:::::::::::::::::::::::::::*/


/*::::::::::::::::::::::::::: THE SITE SETTINGS:::::::::::::::::::::::::::::::*/
Route::get('site/setting', 'SettingController@setting_page')->middleware('admin');
Route::post('settings/update', 'SettingController@setting_update')->middleware('admin');
/*:::::::::::::::::::::::::::::END OF SITE SETTINGS:::::::::::::::::::::::::::*/


/*::::::::::::::::::::::: THE FRONT PAGE ROUTES ::::::::::::::::::::::::::::::*/
Route::get('/', 'FrontendController@welcome_page');
Route::get('/single/{slug}', 'FrontendController@single_page');
Route::get('/category/{name}','FrontendController@category');
Route::get('/tag/{name}','FrontendController@tag');
Route::get('/search', 'FrontendController@search');
/*:::::::::::::::::::::::: END OF FRONT PAGE VIEWW ::::::::::::::::::::::::::::*/


/*:::::::::::::::::::::::::::   MAIL CHIMP ::::::::::::::::::::::::::::::::::*/

Route::post('/subscribe',function(){
	$email = request('email');
	Newsletter::subscribe($email);
	return redirect()->back()->with(['success'=>'Your subscription was successful!']);
});

/*::::::::::::::::::::::::::: END OF  MAIL CHIMP ::::::::::::::::::::::::::::::::::*/