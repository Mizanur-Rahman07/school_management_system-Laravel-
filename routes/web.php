<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [SMSController::class, 'index'])->name('/');
Route::get('/about', [SMSController::class, 'about'])->name('about');
Route::get('/course', [SMSController::class, 'course'])->name('course');
Route::get('/course-details/{slug}', [SMSController::class, 'courseDetails'])->name('course-details');
Route::get('/contact', [SMSController::class, 'contact'])->name('contact');

Route::get('/student-register', [StudentController::class, 'studentRegister'])->name('student-register');
Route::post('/new-student', [StudentController::class, 'saveStudent'])->name('new-student');
Route::get('/student-login', [StudentController::class, 'studentLogin'])->name('student-login');
Route::post('/student-login', [StudentController::class, 'studentLoginCheck'])->name('student-login');
Route::get('/student-logout', [StudentController::class, 'studentLogout'])->name('student-logout');
Route::get('/student-profile', [StudentController::class, 'studentProfile'])->name('student-profile');
Route::get('/edit-profile/{id}', [StudentController::class, 'editProfile'])->name('edit-profile');
Route::post('/update-profile', [StudentController::class, 'updateProfile'])->name('update-profile');
Route::post('/admission', [StudentController::class, 'studentAdmission'])->name('admission');

Route::get('/contact', [SMSController::class, 'contact'])->name('contact');
Route::get('/teacher-login', [TeacherController::class, 'teacherLogin'])->name('teacher-login');
Route::post('/teacher-login', [TeacherController::class, 'teacherLoginCheck'])->name('teacher-login');

Route::group(['middleware' => 'teacher'], function () {
    Route::get('/teacher-logout', [TeacherController::class, 'teacherLogout'])->name('teacher-logout');
    Route::get('/teacher-profile', [TeacherController::class, 'teacherProfile'])->name('teacher-profile');
    Route::get('/edit-tcr-profile/{id}', [TeacherController::class, 'editTcrProfile'])->name('edit-tcr-profile');
    Route::post('/update-tcr-profile', [TeacherController::class, 'updateTcrProfile'])->name('update-tcr-profile');
    Route::get('/add-course', [CourseController::class, 'addCourse'])->name('add-course');
    Route::get('/manage-course', [CourseController::class, 'manageCourse'])->name('manage-course');
    Route::post('/new-course', [CourseController::class, 'saveCourse'])->name('new-course');
    Route::get('/edit-course/{id}', [CourseController::class, 'editCourse'])->name('edit-course');
    Route::post('/update-course', [CourseController::class, 'updateCourse'])->name('update-course');
    Route::post('/delete-course', [CourseController::class, 'deleteCourse'])->name('delete-course');
    Route::get('/manage-applicant', [CourseController::class, 'manageApplicant'])->name('manage-applicant');
});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/add-teacher', [TeacherController::class, 'index'])->name('add-teacher');
    Route::post('/new-teacher', [TeacherController::class, 'saveTeacher'])->name('new-teacher');
    Route::get('/manage-teacher', [TeacherController::class, 'manageTeacher'])->name('manage-teacher');
    Route::post('/delete-teacher', [TeacherController::class, 'deleteTeacher'])->name('delete-teacher');
    Route::get('/edit-teacher/{id}', [TeacherController::class, 'editTeacher'])->name('edit-teacher');
    Route::post('/update-teacher', [TeacherController::class, 'updateTeacher'])->name('update-teacher');
    // Route::get('/student-register', [StudentController::class, 'addStudent'])->name('student-register');
    // Route::get('/new-student', [StudentController::class, 'addStudent'])->name('new-student');


});