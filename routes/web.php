<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/', function () { return view('index'); });
Route::get('/index', function () { return view('index'); });

Route::get('/jobs', function(){  return view('jobs');});
Route::get('/recruiters', function(){  return view('recruiters'); });

Auth::routes();


Route::post('/emp/login', [App\Http\Controllers\Auth\LoginController::class, 'empLogin'])->name('login-employee');
Route::post('/emp/register', [App\Http\Controllers\Auth\RegisterController::class, 'employeeRegister'])->name('emp-register');


Route::get('/recr/register', [App\Http\Controllers\Auth\RegisterController::class, 'recruiterRegisetrShow'])->name('rec-regisetr');
Route::post('/recr/register', [App\Http\Controllers\Auth\RegisterController::class, 'recruiterRegister'])->name('recr-register');

Route::get('/recr/login', [App\Http\Controllers\Auth\LoginController::class, 'recruiterLoginShow'])->name('recr-login');
Route::post('/recr/login', [App\Http\Controllers\Auth\LoginController::class, 'recruiterLogin'])->name('login-recruiter');

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'adminLoginshow']);
Route::post('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin-login');

Route::get('loginEmployer/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'SocialRedirectEmployer']);
Route::get('loginEmp/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'SocialRedirectEmp']);
Route::get('login/{provider}/callback',[App\Http\Controllers\Auth\LoginController::class, 'SocialCallback']);



Route::group(['as'=>'admin.', 'prefix' => 'admin', 'namespace'=>'Admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

});


Route::group(['as'=>'recruiter.', 'prefix' => 'recruiter', 'namespace'=>'Recruiter', 'middleware' => ['auth', 'recruiter']], function(){
    Route::get('dashboard', [App\Http\Controllers\Recruiter\DashboardController::class, 'index'])->name('dashboard');
});




Route::group(['as'=>'employee.', 'prefix' => 'employee', 'namespace'=>'Employee', 'middleware' => ['auth', 'employee']], function(){
    Route::get('dashboard',[App\Http\Controllers\Employee\DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile/profile', [App\Http\Controllers\Employee\ProfileController::class, 'index'])->name('profile');
    Route::get('profile/editprofile', [App\Http\Controllers\Employee\ProfileController::class, 'editprofile'])->name('editprofile');
    Route::post('profile/updateProfile', [App\Http\Controllers\Employee\ProfileController::class, 'updateProfile'])->name('updateProfile');



});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
