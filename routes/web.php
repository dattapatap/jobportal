<?php
use Illuminate\Support\Facades\Route;


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
Route::get('loginEmployer/{provider}/rec', [App\Http\Controllers\Auth\LoginController::class, 'SocialRedirectEmployer']);
Route::get('loginEmp/{provider}/emp', [App\Http\Controllers\Auth\LoginController::class, 'SocialRedirectEmp']);
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
    Route::get('questions/create/', [App\Http\Controllers\QuestionsController::class, 'create']);
    Route::post('questions/create', [App\Http\Controllers\QuestionsController::class, 'store'])->name('questions.create');   
    Route::get('questions/edit/{id}', [App\Http\Controllers\QuestionsController::class, 'edit']);
    Route::post('questions/update', [App\Http\Controllers\QuestionsController::class, 'update'])->name('questions.update');   
    Route::get('questions/delete/{id}', [App\Http\Controllers\QuestionsController::class, 'delete']);

    Route::get('qpcategory', [App\Http\Controllers\QPaperCategoryController::class, 'index']);
    Route::get('qpcategory/manage/', [App\Http\Controllers\QPaperCategoryController::class, 'manageqpcategory']);
    Route::get('qpcategory/manage/{id}', [App\Http\Controllers\QPaperCategoryController::class, 'manageqpcategory']);
    Route::post('qpcategory', [App\Http\Controllers\QPaperCategoryController::class, 'store'])->name('qpcategory.process');
    Route::get('qpcategory/delete/{QPaperCategory}', [App\Http\Controllers\QPaperCategoryController::class, 'delete']);


    Route::get('qp', [App\Http\Controllers\QuestionPaperController::class, 'index']);
    Route::get('qp/create/', [App\Http\Controllers\QuestionPaperController::class, 'create']);
    Route::post('qp/create', [App\Http\Controllers\QuestionPaperController::class, 'store'])->name('qp.create');   
    Route::get('qp/edit/{id}', [App\Http\Controllers\QuestionPaperController::class, 'edit']);
    Route::post('qp/update', [App\Http\Controllers\QuestionPaperController::class, 'update'])->name('qp.update');   
    Route::get('qp/delete/{id}', [App\Http\Controllers\QuestionPaperController::class, 'delete']);

    
    Route::get('industries', [App\Http\Controllers\IndustriesController::class, 'index']);
    Route::get('industries/manage/', [App\Http\Controllers\IndustriesController::class, 'manageIndustries']);
    Route::get('industries/manage/{id}', [App\Http\Controllers\IndustriesController::class, 'manageIndustries']);
    Route::post('industries', [App\Http\Controllers\IndustriesController::class, 'store'])->name('industries.process');
    Route::get('industries/delete/{industries}', [App\Http\Controllers\IndustriesController::class, 'delete']);

    Route::get('states', [App\Http\Controllers\StatesController::class, 'index']);
    Route::get('states/manage/', [App\Http\Controllers\StatesController::class, 'manageStates']);
    Route::get('states/manage/{id}', [App\Http\Controllers\StatesController::class, 'manageStates']);
    Route::post('states', [App\Http\Controllers\StatesController::class, 'store'])->name('states.process');
    Route::get('states/delete/{state}', [App\Http\Controllers\StatesController::class, 'delete']);

    Route::get('cities', [App\Http\Controllers\CitiesController::class, 'index']);
    Route::get('cities/manage/', [App\Http\Controllers\CitiesController::class, 'manageCity']);
    Route::get('cities/manage/{id}', [App\Http\Controllers\CitiesController::class, 'manageCity']);
    Route::post('cities', [App\Http\Controllers\CitiesController::class, 'store'])->name('cities.process');
    Route::get('cities/delete/{city}', [App\Http\Controllers\CitiesController::class, 'delete']);

    Route::get('jobpositions', [App\Http\Controllers\JobPositionsController::class, 'index']);
    Route::get('jobpositions/manage/', [App\Http\Controllers\JobPositionsController::class, 'manageJobPosition']);
    Route::get('jobpositions/manage/{id}', [App\Http\Controllers\JobPositionsController::class, 'manageJobPosition']);
    Route::post('jobpositions', [App\Http\Controllers\JobPositionsController::class, 'store'])->name('jobposition.process');
    Route::get('jobpositions/delete/{jobpositions}', [App\Http\Controllers\JobPositionsController::class, 'delete']);


    Route::get('courses', [App\Http\Controllers\CoursesController::class, 'index']);
    Route::get('courses/manage/', [App\Http\Controllers\CoursesController::class, 'manageCourses']);
    Route::get('courses/manage/{id}', [App\Http\Controllers\CoursesController::class, 'manageCourses']);
    Route::post('courses', [App\Http\Controllers\CoursesController::class, 'store'])->name('courses.process');
    Route::get('courses/delete/{courses}', [App\Http\Controllers\CoursesController::class, 'delete']);

    Route::get('course/specifications', [App\Http\Controllers\CourseSpecificationsController::class, 'index']);
    Route::get('course/specifications/manage/', [App\Http\Controllers\CourseSpecificationsController::class, 'manageSpecification']);
    Route::get('course/specifications/manage/{id}', [App\Http\Controllers\CourseSpecificationsController::class, 'manageSpecification']);
    Route::post('course/specifications', [App\Http\Controllers\CourseSpecificationsController::class, 'store'])->name('specification.process');
    Route::get('courses/specifications/delete/{jobpositions}', [App\Http\Controllers\CourseSpecificationsController::class, 'delete']);





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

    Route::post('profile/updateprofile', [App\Http\Controllers\Employee\ProfileController::class, 'updateProfile']);
    Route::get('profile/editprofile/{id}', [App\Http\Controllers\Employee\ProfileController::class, 'editprofile']);
    Route::get('profile/editCareer/{id}', [App\Http\Controllers\Employee\ProfileController::class, 'editcareer']);
    Route::get('profile/editEducations/{id}', [App\Http\Controllers\Employee\ProfileController::class, 'editeducation']);
    Route::get('profile/editExperince/{id}', [App\Http\Controllers\Employee\ProfileController::class, 'editexperience']);
    Route::post('profile/addCareer', [App\Http\Controllers\Employee\ProfileController::class, 'addCareear']);
    Route::post('profile/addEducations', [App\Http\Controllers\Employee\ProfileController::class, 'addEducations']);  
    Route::post('profile/addExperience', [App\Http\Controllers\Employee\ProfileController::class, 'addExperience']);  
    Route::post('profile/addSkills', [App\Http\Controllers\Employee\ProfileController::class, 'addSkills']);  
    Route::post('profile/deleteSkill', [App\Http\Controllers\Employee\ProfileController::class, 'deleteSkills']);  
    Route::post('profile/uploadResume', [App\Http\Controllers\Employee\ProfileController::class, 'uploadResume']);  

    Route::post('profile/profilpicupload', [App\Http\Controllers\Employee\ProfileController::class, 'uploadProfile']);  


    Route::get('profile/getAllCoursesByEducation', [App\Http\Controllers\CoursesController::class, 'getAllByEducation']);
    Route::get('profile/getAllSpecByCourses', [App\Http\Controllers\CourseSpecificationsController::class, 'getAllBySpecifications']);
   

});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
