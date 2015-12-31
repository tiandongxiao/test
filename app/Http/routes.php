<?php
use App\User;
use App\Post;

Route::get('/', function (){
    //return view('home');
    return view('search.index');
});

/***************	Begin 用户认证系统自带控制器处理		**************/
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
/*************** 	Ended 用户认证系统自带控制器处理 	**************/

/***************	Begin 用户认证系统 Email方式	**************/
Route::get('login/email', 'Auth\AuthController@getEmailLogin');
Route::post('login/email', 'Auth\AuthController@postEmailLogin');
/***************	Ended 用户认证系统 Email方式	**************/

/***************	Begin 用户注册及密码重置	**************/
Route::get('register', 'Auth\AuthController@getPhoneRegister');
Route::post('register', 'Auth\AuthController@postPhoneRegister');
Route::get('reset', 'Auth\PasswordController@getPhoneReset');
Route::post('reset', 'Auth\PasswordController@postPhoneReset');
Route::get('reset/confirm', 'Auth\PasswordController@getPhoneResetConfirm');
Route::post('reset/confirmed', 'Auth\PasswordController@postPhoneResetConfirm');

Route::get('register/email', 'Auth\AuthController@getEmailRegister');
Route::post('register/email', 'Auth\AuthController@postEmailRegister');
Route::get('active/email/{token}','Auth\AuthController@getActiveEmail');
Route::get('reset/email', 'Auth\PasswordController@getEmail');
Route::post('reset/email', 'Auth\PasswordController@postEmail');
Route::get('reset/email/{token}', 'Auth\PasswordController@getEmailReset');
Route::post('reset/email/confirmed', 'Auth\PasswordController@postEmailReset');
/************** 	Ended 用户注册及密码重置	*****************/

Route::get('user/avatar', 'UserController@getAvatar');
Route::post('user/avatar', 'UserController@postAvatar');

Route::get('profile/create','ProfileController@getCreate');
Route::post('profile/create','ProfileController@postCreate');

/************	Begin 超级管理员相关路由	***********/
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function()
{
	Route::get('/','AdminController@getAdmin');
	Route::get('/calendar','AdminController@getCalendar');
	Route::get('/taskline','AdminController@getTaskline');
	Route::get('/teamtalk','AdminController@getTeamtalk');	
});
/************	Ended 超级管理员相关路由	***********/

Route::group(['prefix' => 'install'], function()
{
	Route::get('/', 'InstallController@index');
	Route::get('/admin_config', 'InstallController@getAdminConfig');
	Route::post('/admin_config', 'InstallController@postAdminConfig');
});

Route::group(['prefix' => 'system'], function()
{
	Route::get('/','SystemController@index');
	Route::get('/phpinfo','SystemController@phpinfo');
	Route::get('/clear','SystemController@dbClear');
	Route::get('/backup','SystemController@dbBackup');
	Route::get('/recovery','SystemController@dbRecovery');
	Route::get('/maker/{model}','SystemController@mcMaker');
	Route::get('/faker/{model}','SystemController@dataFaker');
});

Route::group(['prefix' => 'tool'], function()
{
	Route::post('sms_send','ToolController@sendVerifySMS');
	Route::post('cpt_check','ToolController@captchaCheck');
	Route::get('cpt','ToolController@getCaptcha');
});

Route::group(['prefix' => 'map'], function()
{
	Route::get('/','MapController@index');
});

/************	Begin 用户以及权限管理路由	***********/
Route::resource('user','UserController');
Route::resource('role','RoleController');
Route::resource('permission','PermissionController');
Route::resource('user.profile','UserProfileController',['except' => ['show']]);
/************	Ended 用户以及权限管理路由	***********/


Route::resource('page','PageController');


/************	Begin Config 测试	***********/
Route::group(['prefix'=>'test'],function()
{
	Route::get('/queue','TestController@queueTest');
	Route::get('/put','TestController@putCacheValue');
	Route::get('/get','TestController@getCacheValue');

	Route::get('/rput','TestController@redisPut');
	Route::get('/rget','TestController@redisGet');

	Route::get('/cjobs','TestController@clearJobs');
	Route::get('/back','TestController@backup');
	Route::get('/init','TestController@init');
	Route::get('/config','TestController@init');
    
    Route::get('/qq/login','TestController@qqLogin');
    Route::get('/qq/callback','TestController@qqCallback');
    
    Route::get('/wb/login','TestController@wbLogin');
    Route::get('/wb/callback','TestController@wbCallback');
    
    Route::get('/wx/check','TestController@wxCheck');
    Route::get('/wx/login','TestController@wxLogin');
    Route::get('/wx/callback','TestController@wxCallback');
});
/************	Ended Config 测试	************/


/************	Begin API 接口定义区	***********/
$api = app('Dingo\Api\Routing\Router');

$api->version('v1',function($api){
	$api->get('users',function()
	{
		// $user = User::findOrFail($id);
		// $posts = $user->posts;		
		// return $posts;
		return ['user'=>'all users'];
		//return Post::all();
	});
});

$api->version('v2',function($api){
	$api->get('users',function()
	{
		return User::with('posts')->get();
	});
});
/************	Ended API 接口定义区	***********/

