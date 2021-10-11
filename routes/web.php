<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Craftsys\Msg91\Facade\Msg91;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Website
Route::get('/dddd', function(){



//    $xyz = Msg91::sms()->to(7620297516)->flow('6062fb8cd4d3613a7132a18e')->variable('name', 'Dattatray')->send();
//    Msg91::otp()->to(7620297516)->send();
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/index', [HomeController::class, 'index']);
Route::get('/job/search/{id}/details', [HomeController::class, 'jobView']);
Route::get('/jobs', [HomeController::class, 'alljobs']);
Route::get('/jobs/search', [HomeController::class, 'jobSearch']);
Route::get('/jobs/job-filter', [HomeController::class, 'filterJobsPage']);
Route::get('/jobs/topsearch', [HomeController::class, 'topSearch']);
Route::get('/jobs/category/{jobcategory}/', [HomeController::class, 'searchByCategories']);

Route::get('/about-us', function(){  return view('about-us'); });
Route::get('/contact-us', function(){  return view('contact-us'); });
Route::get('/blogs', [BlogController::class, 'blogs']);
Route::get('/blog/{id}/details', [BlogController::class, 'blogView']);

Route::get('job-submit', function(){
    if(Auth::check() && Auth::user()->role_id == 2)
        return redirect('recruiter/jobs/add-newjob');
    else
        return redirect('/recr/login');

});
Route::get('emp-resume', function(){
    if(Auth::check() && Auth::user()->role_id == 3)
        return redirect('employee/profile/profile');
    else
        return redirect('/login');

});
Route::get('/user-register', function(){
    if(Auth::user() && Auth::user()->role_id === 3)
        return redirect('employee/profile/profile');
    else
        return redirect('/register');

});
Route::get('/upload-web-resume', function(){
    if(Auth::user() && Auth::user()->role_id == 3)
        return redirect('employee/profile/profile');
    elseif(Auth::user() && Auth::user()->role_id == 2)
        return redirect('recruiter/dashboard');
    else
        return redirect('/login');

});

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

Route::get('job/{id}/apply', [App\Http\Controllers\Employee\EmpJobAppliedController::class, 'apply']);
Route::get('job/{id}/save', [App\Http\Controllers\Employee\EmpJobSavedController::class, 'save']);

Route::group(['as'=>'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('editprofile', [App\Http\Controllers\Admin\ProfileController::class, 'editProfile']);
    Route::post('profile/manageprofile', [App\Http\Controllers\Admin\ProfileController::class, 'manageProfile'])->name('profile.manageprofile');

    Route::get('employee', [App\Http\Controllers\Admin\AdminEmployee::class, 'index'])->name('employee');
    Route::get('employee/view/{id}', [App\Http\Controllers\Admin\AdminEmployee::class, 'view']);

    Route::get('recruiter', [App\Http\Controllers\Admin\AdminRecruiter::class, 'index'])->name('recruiter');
    Route::get('recruiter/view/{id}', [App\Http\Controllers\Admin\AdminRecruiter::class, 'view']);
    Route::get('recruiter/status', [App\Http\Controllers\Admin\AdminRecruiter::class, 'updateRecruiterStatus']);
    Route::get('recruiter/verify', [App\Http\Controllers\Admin\AdminRecruiter::class, 'verifyRecruiter']);

    Route::get('postedjobs', [App\Http\Controllers\Admin\JobsController::class, 'index']);
    Route::get('jobs/view/{id}', [App\Http\Controllers\Admin\JobsController::class, 'viewJobs']);
    Route::get('postedjobs/status/{jobs}', [App\Http\Controllers\Admin\JobsController::class, 'changeStatus']);

    Route::get('skills', [App\Http\Controllers\SkillController::class, 'index']);
    Route::get('skills/manage/', [App\Http\Controllers\SkillController::class, 'manageSkills']);
    Route::get('skills/manage/{id}', [App\Http\Controllers\SkillController::class, 'manageSkills']);
    Route::post('skills', [App\Http\Controllers\SkillController::class, 'store'])->name('skills.process');
    Route::get('skills/delete/{skills}', [App\Http\Controllers\SkillController::class, 'delete']);

    Route::get('questions', [App\Http\Controllers\QuestionsController::class, 'index']);
    Route::get('questions/create/', [App\Http\Controllers\QuestionsController::class, 'create']);
    Route::get('questions/upload/', [App\Http\Controllers\QuestionsController::class, 'upload']);
    Route::post('questions/create/new', [App\Http\Controllers\QuestionsController::class, 'store']);
    Route::post('questions/import', [App\Http\Controllers\QuestionsController::class, 'excelUpload']);

    Route::get('questions/edit/{id}', [App\Http\Controllers\QuestionsController::class, 'edit']);
    Route::post('questions/update', [App\Http\Controllers\QuestionsController::class, 'update']);
    Route::get('questions/delete/{id}', [App\Http\Controllers\QuestionsController::class, 'delete']);

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

    Route::get('testslots/status/{id}', [App\Http\Controllers\TestSlotsController::class, 'status']);
    Route::resource('testslots', App\Http\Controllers\TestSlotsController::class);

    Route::resource('country', App\Http\Controllers\CountryController::class);
    Route::resource('organisation', App\Http\Controllers\OrganisationController::class);
    Route::resource('audit', App\Http\Controllers\AuditController::class);


    Route::get('blog/status', [App\Http\Controllers\BlogController::class, 'changeStatus']);
    Route::resource('blogs', App\Http\Controllers\BlogController::class);

    Route::get('packages/status/{id}', [App\Http\Controllers\PackageController::class, 'changeStatus']);
    Route::resource('packages', App\Http\Controllers\PackageController::class);

    Route::get('payments', [App\Http\Controllers\PaymentsController::class, 'index'])->name('payments');

    Route::get('notifications', [App\Http\Controllers\Admin\NotificationController::class, 'index']);
    Route::post('notification/read', [App\Http\Controllers\Admin\NotificationController::class, 'markAsRead'])->name('markNotification');

    Route::get('profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
    // Admin Profile
    Route::post('profile/upload', [App\Http\Controllers\Admin\ProfileController::class, 'uploadProfile'])->name('profile.upload');
    Route::get('changepassword', [App\Http\Controllers\Admin\ProfileController::class, 'changepassword']);
    Route::post('profile/changepassword', [App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('change.password');

    Route::get('package/settings', [App\Http\Controllers\PaymentSettingController::class, 'index'])->name('package_settings');
    Route::post('package/setting/update', [App\Http\Controllers\PaymentSettingController::class, 'update'])->name('packagesetting.update');


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

    Route::get('viewdcandidate', [App\Http\Controllers\Recruiter\CandidatesController::class, 'index']);
    Route::get('employee/search', [App\Http\Controllers\Recruiter\CandidatesController::class, 'search']);
    Route::post('emp/showinterest', [App\Http\Controllers\Recruiter\CandidatesController::class, 'showInterest']);


    Route::get('notifications', [App\Http\Controllers\Recruiter\NotificationController::class, 'index']);
    Route::post('notification/read', [App\Http\Controllers\Recruiter\NotificationController::class, 'markAsRead'])->name('markNotification');

    Route::get('postedjobs', [App\Http\Controllers\Recruiter\JobsController::class, 'index']);
    Route::get('jobs/add-newjob', [App\Http\Controllers\Recruiter\JobsController::class, 'viewnewjobform']);
    Route::post('jobs/new/create', [App\Http\Controllers\Recruiter\JobsController::class, 'create'])->name('createjob');
    Route::post('jobs/new/update', [App\Http\Controllers\Recruiter\JobsController::class, 'update'])->name('updatejob');
    Route::get('postedjobs/view/{jobs}', [App\Http\Controllers\Recruiter\JobsController::class, 'viewjobs']);
    Route::get('postedjobs/edit/{jobs}', [App\Http\Controllers\Recruiter\JobsController::class, 'editjobs']);
    Route::get('postedjobs/delete/{jobs}', [App\Http\Controllers\Recruiter\JobsController::class, 'delete']);
    Route::get('postedjobs/status/{jobs}', [App\Http\Controllers\Recruiter\JobsController::class, 'changeStatus']);

    // Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
    Route::post('payment', [App\Http\Controllers\PaymentsController::class, 'payment'])->name('payment.pay_now');
    Route::get('activeplan/', [App\Http\Controllers\Recruiter\EmployerPackageController::class, 'index']);
    Route::get('transactions/', [App\Http\Controllers\Recruiter\EmployerPackageController::class, 'transactions']);
    Route::get('transactions/{id}/details', [App\Http\Controllers\Recruiter\EmployerPackageController::class, 'viewinvoice']);


});

Route::group(['as'=>'employee.', 'prefix' => 'employee', 'namespace'=>'Employee', 'middleware' => ['auth', 'employee']], function(){
    Route::get('dashboard',[App\Http\Controllers\Employee\DashboardController::class, 'index'])->name('dashboard');


    Route::get('teststatusss',[App\Http\Controllers\Employee\DashboardController::class, 'checkTestGivenOrNot'])->name('checkTestGivenOrNot');
    Route::get('assessment/testschedule', [App\Http\Controllers\Employee\Assessment::class, 'sheduleAssessmentPopup']);
    Route::get('assessment/instructions',function(){ return view('employee/assessment/testwelcome'); });
    Route::get('assessment/start', [App\Http\Controllers\Employee\Assessment::class, 'startTest']);


    Route::get('profile', [App\Http\Controllers\Employee\ProfileController::class, 'index'])->name('profile');
    Route::get('jobs', [App\Http\Controllers\Employee\EmpJobAppliedController::class, 'index'])->name('savedjobs');
    Route::post('jobs/delete', [App\Http\Controllers\Employee\EmpJobSavedController::class, 'delete'])->name('savedjob.delete');

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
    Route::post('profile/addAudits', [App\Http\Controllers\Employee\ProfileController::class, 'addAudit']);
    Route::post('profile/deleteaudit', [App\Http\Controllers\Employee\ProfileController::class, 'deleteAudit']);
    Route::post('profile/addOrganisations', [App\Http\Controllers\Employee\ProfileController::class, 'addorganisation']);
    Route::post('profile/deleteOrgs', [App\Http\Controllers\Employee\ProfileController::class, 'deleteorganisation']);

    Route::post('profile/uploadResume', [App\Http\Controllers\Employee\ProfileController::class, 'uploadResume']);

    Route::post('profile/profilpicupload', [App\Http\Controllers\Employee\ProfileController::class, 'uploadProfile']);
    Route::get('profile/getAllCoursesByEducation', [App\Http\Controllers\CoursesController::class, 'getAllByEducation']);
    Route::get('profile/getAllSpecByCourses', [App\Http\Controllers\CourseSpecificationsController::class, 'getAllBySpecifications']);


    //Assessment
    Route::get('assessment', [App\Http\Controllers\Employee\Assessment::class, 'index']);
    Route::post('assessment/schedule', [App\Http\Controllers\Employee\Assessment::class, 'scheduleTest']);
    Route::post('assessment/updateTestStatus', [App\Http\Controllers\Employee\Assessment::class, 'updateTestStatus']);

    Route::get('assessment/startpage', [App\Http\Controllers\Employee\Assessment::class, 'testStartPage']);
    Route::post('assessment/updateRemaningTime', [App\Http\Controllers\Employee\TestFactoryController::class, 'updateRemainingTime']);
    Route::post('assessment/nextQuestion', [App\Http\Controllers\Employee\TestFactoryController::class, 'getNextQuestions'])->name('assessment.nextQuestion');

    Route::get('assessment/testpage', function(){ return view('employee.assessment.testpage'); });
    Route::get('assessment/testTaken', function(){ return view('employee.assessment.testTaken');  });
});





