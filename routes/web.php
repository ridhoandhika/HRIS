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

Route::get('/', function () {
    return view('welcome');
});

Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin'],
    function () {
        /* Route::get('home', function(){
            return view('admin.home');
        });  */
    route::get('home', 'DashboardController@index');
    Route::resource('employees', 'EmployeeController');
    Route::resource('divisions', 'DivisionController');
    Route::resource('departements', 'DepartementController');
   // Route::get('divisions', 'EmployeeController@divisions');
    //Route::get('departements/{division}', 'EmployeeController@departements');



    }
);
