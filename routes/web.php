<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobVacancyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckApplicant;
use App\Http\Middleware\CheckGuest;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckMSME;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->middleware(CheckLogin::class);
Route::get('/login', [UserController::class, 'index'])->middleware(CheckGuest::class);
Route::post('/login', [LoginController::class, 'login'])->middleware(CheckGuest::class);
Route::get('/register/MSME', [RegisterController::class, 'indexMSME'])->middleware(CheckGuest::class);
Route::get('/register/Applicant', [RegisterController::class, 'indexApplicant'])->middleware(CheckGuest::class);
Route::post('/register/MSME', [RegisterController::class, 'signUpMSME'])->middleware(CheckGuest::class);
Route::post('/register/Applicant', [RegisterController::class, 'signUpApplicant'])->middleware(CheckGuest::class);

Route::get('/register', function(){
    return view('register');
})->middleware(CheckGuest::class);

Route::get('/forum', [ForumController::class, 'index'])->middleware(CheckLogin::class);
Route::get('/forum/{id}', [ForumController::class, 'viewThread'])->middleware(CheckLogin::class);
Route::post('/forum/{id}', [ReplyController::class, 'createReply'])->middleware(CheckLogin::class);
Route::get('/createThread', [ForumController::class, 'createThreadIndex'])->middleware(CheckLogin::class);
Route::post('/createThread', [ForumController::class, 'createThread'])->middleware(CheckLogin::class);

Route::get('/logout', [LoginController::class, 'logout'])->middleware(CheckLogin::class);
Route::get('/home', [HomeController::class, 'index'])->middleware(CheckLogin::class);
Route::get('/search', [SearchController::class, 'getSearchResults'])->middleware(CheckLogin::class);

Route::get('/jobvacancy/view', [JobVacancyController::class, 'applicantview'])->middleware(CheckApplicant::class);
Route::get('/jobvacancy/manage', [JobVacancyController::class, 'index'])->middleware(CheckMSME::class);
Route::get('/jobvacancy/create', [JobVacancyController::class, 'create'])->middleware(CheckMSME::class);
Route::post('/jobvacancy/create', [JobVacancyController::class, 'save'])->middleware(CheckMSME::class);
Route::get('/jobvacancy/update/{id}', [JobVacancyController::class, 'update'])->middleware(CheckMSME::class);
Route::put('/jobvacancy/update/{id}', [JobVacancyController::class, 'saveupdate'])->middleware(CheckMSME::class);
Route::get('/jobvacancy/delete/{id}', [JobVacancyController::class, 'delete'])->middleware(CheckMSME::class);
Route::get('/jobvacancy/apply/{id}', [JobVacancyController::class, 'applicantapply'])->middleware(CheckApplicant::class);
Route::get('/jobvacancy/applied', [JobVacancyController::class, 'applicantproposal'])->middleware(CheckApplicant::class);
Route::get('/jobvacancy/applicantlist', [JobVacancyController::class, 'applicantlist'])->middleware(CheckMSME::class);
Route::get('/jobvacancy/hire/{id}', [JobVacancyController::class, 'applicanthire'])->middleware(CheckMSME::class);
Route::get('/jobvacancy/reject/{id}', [JobVacancyController::class, 'applicantreject'])->middleware(CheckMSME::class);

Route::get('/profile', [ProfileController::class, 'index'])->middleware(CheckLogin::class);
Route::post('/profile/update/applicant', [ProfileController::class, 'updateapplicant'])->middleware(CheckApplicant::class);
Route::post('/profile/update/msme', [ProfileController::class, 'updatemsme'])->middleware(CheckMSME::class);
Route::get('/profile/view/applicant/{id}', [ProfileController::class, 'viewprofileapplicant'])->middleware(CheckLogin::class);
Route::get('/profile/view/msme/{id}', [ProfileController::class, 'viewprofilemsme'])->middleware(CheckLogin::class);
Route::get('/profile/certification', [ProfileController::class, 'managecertification'])->middleware(CheckApplicant::class);
Route::get('/profile/certification/insert', [ProfileController::class, 'insertcertification'])->middleware(CheckApplicant::class);
Route::post('/profile/certification/insert', [ProfileController::class, 'savecertification'])->middleware(CheckApplicant::class);
Route::get('/profile/certification/update/{id}', [ProfileController::class, 'updatecertification'])->middleware(CheckApplicant::class);
Route::put('/profile/certification/update/{id}', [ProfileController::class, 'saveupdatecertification'])->middleware(CheckApplicant::class);
Route::get('/profile/certification/delete/{id}', [ProfileController::class, 'deletecertification'])->middleware(CheckApplicant::class);
Route::get('/profile/certification/view/{id}', [ProfileController::class, 'viewcertification'])->middleware(CheckLogin::class);