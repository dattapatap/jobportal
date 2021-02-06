<?php

use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
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



Route::group(['as'=>'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');


    Route::get('employee', [App\Http\Controllers\Admin\AdminEmployee::class, 'index'])->name('employee');

    Route::get('recruiter', [App\Http\Controllers\Admin\AdminRecruiter::class, 'index'])->name('recruiter');
    Route::get('recruiter/view/{id}', [App\Http\Controllers\Admin\AdminRecruiter::class, 'view']);
    Route::get('recruiter/status', [App\Http\Controllers\Admin\AdminRecruiter::class, 'updateRecruiterStatus']);
    Route::get('recruiter/verify', [App\Http\Controllers\Admin\AdminRecruiter::class, 'verifyRecruiter']);

    Route::get('postedjobs', [App\Http\Controllers\Admin\JobsController::class, 'index']);
    Route::get('jobs/view/{id}', [App\Http\Controllers\Admin\JobsController::class, 'viewJobs']);


    Route::get('questionCategory', [App\Http\Controllers\QuestionCategoryController::class, 'index']);
    Route::get('questionCategory/manage/', [App\Http\Controllers\QuestionCategoryController::class, 'manageCategory']);
    Route::get('questionCategory/manage/{id}', [App\Http\Controllers\QuestionCategoryController::class, 'manageCategory']);
    Route::post('questionCategory', [App\Http\Controllers\QuestionCategoryController::class, 'store'])->name('questionCategory.process');
    Route::get('questionCategory/delete/{questionCategory}', [App\Http\Controllers\QuestionCategoryController::class, 'delete']);

    Route::get('questions', [App\Http\Controllers\QuestionsController::class, 'index']);
    Route::get('questions/manage/', [App\Http\Controllers\QuestionsController::class, 'manageQuestions']);
    // Route::get('questions/manage/{id}', [App\Http\Controllers\QuestionsController::class, 'manageQuestions']);
    // Route::post('questions', [App\Http\Controllers\QuestionsController::class, 'store'])->name('questions.process');
    // Route::get('questions/delete/{questions}', [App\Http\Controllers\QuestionsController::class, 'delete']);





    Route::get('profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
    // Admin Profile
    Route::post('profile/upload', [App\Http\Controllers\Admin\ProfileController::class, 'uploadProfile'])->name('profile.upload');
    Route::get('changepassword', [App\Http\Controllers\Admin\ProfileController::class, 'changepassword']);
    Route::post('profile/changepassword', [App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('change.password');
});





Route::group(['as'=>'recruiter.', 'prefix' => 'recruiter', 'namespace'=>'Recruiter', 'middleware' => ['auth', 'recruiter']], function(){
    Route::get('dashboard', [App\Http\Controllers\Recruiter\DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [App\Http\Controllers\Recruiter\ProfileController::class, 'index'])->name('profile');
    Route::post('profile/upload', [App\Http\Controllers\Recruiter\ProfileController::class, 'uploadProfile'])->name('profile.upload');
    Route::post('profile/manageprofile', [App\Http\Controllers\Recruiter\ProfileController::class, 'manageProfile'])->name('profile.manageprofile');
    Route::get('editprofile', [App\Http\Controllers\Recruiter\ProfileController::class, 'editProfile']);

    Route::get('changepassword', [App\Http\Controllers\Recruiter\ProfileController::class, 'changepassword']);
    Route::post('profile/changepassword', [App\Http\Controllers\Recruiter\ProfileController::class, 'updatePassword'])->name('change.password');

    Route::get('packages', [App\Http\Controllers\Recruiter\PackageController::class, 'index']);
    Route::get('postedjobs', [App\Http\Controllers\Recruiter\JobsController::class, 'index']);
    Route::get('jobs/add-newjob', [App\Http\Controllers\Recruiter\JobsController::class, 'viewnewjobform']);


    
    Route::get('postedjobs/view/{jobs}', [App\Http\Controllers\Recruiter\JobsController::class, 'viewjobs']);
    Route::post('jobs/new/create', [App\Http\Controllers\Recruiter\JobsController::class, 'create'])->name('createjob');


});

Route::group(['as'=>'employee.', 'prefix' => 'employee', 'namespace'=>'Employee', 'middleware' => ['auth', 'employee']], function(){
    Route::get('dashboard',[App\Http\Controllers\Employee\DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile/profile', [App\Http\Controllers\Employee\ProfileController::class, 'index'])->name('profile');

    Route::post('profile/updateprofile', [App\Http\Controllers\Employee\ProfileController::class, 'updateProfile'])->name('profile-update');
    Route::get('profile/editprofile/{id}', [App\Http\Controllers\Employee\ProfileController::class, 'editprofile'])->name('editprofile');    
   

});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
