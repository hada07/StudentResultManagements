<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\lecturerProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\studentProfileController;
use App\Http\Controllers\studentRegisterSubject;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Models\Lecturers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/forgot', [AuthController::class, 'sendMail'])->name('forgotPassword');
Route::get('/reset', [AuthController::class, 'showResetpassword'])->name('resetPassword');
Route::post('/reset', [AuthController::class, 'resetPassword'])->name('post.resetPassword');

Route::get('/register', [RegisterController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::middleware('checkAdmin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('dashboard/search', [StudentController::class, 'search'])->name('admin.dashboard.search');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
    //student
    Route::prefix('students')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('admin.students');
        Route::post('/add', [StudentController::class, 'store'])->name('admin.students.add');
        Route::put('edit/{id}', [StudentController::class, 'update'])->name('admin.students.edit');
        Route::delete('delete/{id}', [StudentController::class, 'destroy'])->name('admin.students.delete');
        Route::post('/', [StudentController::class, 'search'])->name('admin.students.search');
    });
    //subject
    Route::prefix('/subjects')->group(function () {
        Route::get('/', [SubjectController::class, 'index'])->name('admin.subjects');
        Route::post('/add', [SubjectController::class, 'store'])->name('admin.subjects.add');
        Route::put('edit/{id}', [SubjectController::class, 'update'])->name('admin.subjects.edit');
        Route::delete('delete/{id}', [SubjectController::class, 'destroy'])->name('admin.subjects.delete');
        Route::post('/', [SubjectController::class, 'search'])->name('admin.subjects.search');
    });
    //lecturer
    Route::prefix('/lecturers')->group(function () {
        Route::get('/', [LecturerController::class, 'index'])->name('admin.lecturers');
        Route::post('/add', [LecturerController::class, 'store'])->name('admin.lecturers.add');
        Route::put('/edit/{id}', [LecturerController::class, 'update'])->name('admin.lecturers.edit');
        Route::delete('delete/{id}', [LecturerController::class, 'destroy'])->name('admin.lecturers.delete');
        Route::post('/', [LecturerController::class, 'search'])->name('admin.lecturers.search');
    });

    //result
    Route::prefix('/results')->group(function () {
        Route::get('/', [ResultController::class, 'index'])->name('admin.results');
        Route::get('/{id}', [ResultController::class, 'getResultStudent'])->name('admin.resultDetail');
        Route::post('/search', [StudentController::class, 'search'])->name('admin.results.search');
    });
    Route::get('/registerManagement', [SemesterController::class, 'registerManagement'])->name('admin.registerManagement');
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('admin.post.profile');
    Route::put('profile/changePassword/{id}', [ProfileController::class, 'changePassword'])->name('admin.profile.changePassword');
    Route::put('profile/avatar', [ProfileController::class, 'uploadAvatar'])->name('admin.profile.avatar');
});

Route::middleware('checkStudent')->prefix('/students')->group(function () {
    Route::get('/', [StudentController::class, 'getResultStudent'])->name('student.dashboard');
    Route::get('/registerSubject', [studentRegisterSubject::class, 'getSubject'])->name('student.getSubject');
    Route::post('/registerSubject', [studentRegisterSubject::class, 'registerSubject'])->name('student.registerSubject');
    Route::get('/profile', [studentProfileController::class, 'index'])->name('student.profile');
    Route::post('/profile/{id}', [studentProfileController::class, 'update'])->name('student.post.profile');
    Route::put('profile/changePassword/{id}', [studentProfileController::class, 'changePassword'])->name('student.profile.changePassword');
    Route::put('profile/avatar', [studentProfileController::class, 'uploadAvatar'])->name('student.profile.avatar');
    Route::delete('/subjectRegister/delete/{id}', [studentRegisterSubject::class, 'deleteSubject'])->name('subject.register.delete');
    Route::get('/subject', [studentRegisterSubject::class, 'getSubjectRegister'])->name('student.subject');
});

Route::middleware('checkLecturer')->prefix('/lecturers')->group(function () {
    Route::get('/', [LecturerController::class, 'getSubjectAssign'])->name('lecturer.dashboard');
    Route::get('/listStudent/{id}', [LecturerController::class, 'getStudentList'])->name('lecturer.subject.listStudent');
    Route::put('/listStudent/edit/{student_id}/{subject_id}', [LecturerController::class, 'updateMarkStudent'])->name('lecturer.edit.mark');
    Route::get('/profile', [lecturerProfileController::class, 'index'])->name('lecturer.profile');
    Route::post('/profile/{id}', [lecturerProfileController::class, 'update'])->name('lecturer.post.profile');
    Route::put('profile/changePassword/{id}', [lecturerProfileController::class, 'changePassword'])->name('lecturer.profile.changePassword');
    Route::put('profile/avatar', [lecturerProfileController::class, 'uploadAvatar'])->name('lecturer.profile.avatar');
});


Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];

    Mail::to('luctq610@gmail.com')->send(new \App\Mail\MyTestMail($details));

    dd("Email is Sent.");
});
Route::get('/upload', function () {
    return view('admin.file');
});
