<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/recregister', [App\Http\Controllers\Auth\RegisterController::class, 'recruiterView'])->name('recregister');

Route::group(['as'=>'admin.', 'prefix' => 'admin', 'namespace'=>'Admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['as'=>'recruiter.', 'prefix' => 'recruiter', 'namespace'=>'Recruiter', 'middleware' => ['auth', 'recruiter']], function(){
    Route::get('dashboard', [App\Http\Controllers\Recruiter\DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['as'=>'employee.', 'prefix' => 'employee', 'namespace'=>'Employee', 'middleware' => ['auth', 'employee']], function(){
    Route::get('dashboard',[App\Http\Controllers\Employee\DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
