<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication Routes...
Route::auth();
Route::get('test', 'TestController@index');
Route::get('carbon', 'TestController@carbon');


/**
 * Index Route
 * If user not logged in show login form.
 * If user is logged in redirect to admin dashboard.
 */ 
Route::get('/', function () {
	return view('welcome')->with(['page' => 'welcome']);
	
	// if ( Auth::guest() ) {
	// 	// return view('login');
	// } else {
	// 	return redirect('dashboard');
	// }
});

// Dashboard Route
Route::get('/dashboard', 'DashboardController@index');
Route::get('/about-us', 'DashboardController@aboutus');
Route::get('app-description', function() {
	return view('app-description', ['main_menu' => 'app_description']);
});

// Route::get('/meet-the-team', function() {
// 	return view('meet-the-team');
// });
/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| 
*/
// Route::get('/users/{id}/surveys', 'UsersController@surveys_created');
// Route::get('/users/{id}/surveys/answered', 'UsersController@surveys_answered');
// Route::get('/users/{id}/surveys/favorites', 'UsersController@surveys_favorites');
// Route::get('/users/{id}/followers', 'UsersController@followers');
// Route::get('/users/{id}/following', 'UsersController@following');
// Route::get('/users/{id}/notifications', 'UsersController@notifications');
Route::get('/users/{id}/chart', 'UsersController@chart');
Route::resource('users', 'UsersController');
Route::resource('users.appointments', 'UserAppointments');


/*
|--------------------------------------------------------------------------
| Appointments Routes
|--------------------------------------------------------------------------
|
| 
*/
Route::resource('/appointments', 'AppointmentsController');


Route::get('backupdb', function() {
	Artisan::call('backup:run');
	return "DONE " . Artisan::output();
	// $mysql_host = env('DB_HOST', 'localhost');
	// $mysql_user = env('DB_USERNAME', 'root');
	// $mysql_pass = env('DB_PASSWORD', '');
	// $mysql_database = env('DB_DATABASE', 'inanay52_v2');
	// $backup_folder = "E:\inanay_DBbackup";

	// exec("mysqldump -h $mysql_host -u $mysql_user -p $mysql_pass $mysql_database  > $backup_folder/my-sql-backup.sql", $results, $result_value);
	// if ($result_value == 0){
	//     echo "The MySql backup successfully created!";
	// } else {
	//     echo "MySql backup creation failed!";
	// }
});

