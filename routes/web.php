<?php

use Illuminate\Support\Facades\Route;
use App\Models\student;
use App\Models\school;
use App\Http\Controllers\StudentDetailController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\StudentProgressController;
use App\Http\Controllers\EmployeeDetailController;
use App\Http\Controllers\ClassMemberController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\PointTransactionController;
use App\Http\Controllers\StudentRewardTransactionController;
use App\Http\Controllers\StudentProjectController;
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
    return redirect(route('dashboard'));
});

Route::get('/manage-student', function () {
    return view('manageStudent')
    ->with('studentList',Student::all())->with('schoolList',school::all());
});

Route::get('/student/login',[StudentAuthController::class, 'login'])->name('studentauth.login');
Route::post('/student/check',[StudentAuthController::class, 'check'])->name('studentauth.check');
Route::post('/classmember/delete',[ClassMemberController::class, 'destroy'])->name('classmember.destroy2');
Route::get('/raisehand',[MilestoneController::class, 'raiseHand'])->name('raiseHand');
Route::get('/destroyhand/{id}',[MilestoneController::class, 'destroyHand'])->name('destroyHand');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {



    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resources([
        'students' => StudentDetailController::class,
        'courses' => CourseController::class,
        'project' => ProjectController::class,
        'milestone' => MilestoneController::class,
        'classes' => ClassController::class,
        'studentprogress' => StudentProgressController::class,
        'employee' => EmployeeDetailController::class,
        'classmember'=>ClassMemberController::class,
        'reward'=>RewardController::class,
        'point'=>PointTransactionController::class,
        'studentproject'=>StudentProjectController::class,
        'transaction'=>StudentRewardTransactionController::class,

    ]);
});



