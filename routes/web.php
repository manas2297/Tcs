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

Auth::routes();

Route::get('/home', 'HomeController@index');
//Route::get('//logout','Auth\LoginController@userLogout')->name('home.logout');
Route::prefix('admin')->group(function(){
  Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('logout','Auth\AdminLoginController@logout')->name('admin.logout');

});

Route::resource('emp-manage','EmployeeManagementController');
Route::get('report/index', 'ReportController@index')->name('report.index');
Route::post('report/search', 'ReportController@search')->name('report.search');
Route::post('report/excel', 'ReportController@exportExcel')->name('report.excel');
Route::post('report/pdf', 'ReportController@exportPDF')->name('report.pdf');
