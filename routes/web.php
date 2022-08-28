<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupDayController;
use App\Http\Controllers\GroupTypeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\Experience;
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

// mohamed

Route::group(['prefix' => 'admin','as' => 'admin.'],function(){
    Route::get('loginPage',[AuthController::class,'loginPage'])->name('loginPage');
    Route::post('login',[AuthController::class,'login'])->name('login');
});

Route::get('/', function () {
    return redirect(route('admin.home'));
})->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', function () {
        return view('pages.home');
    })->name('home');

    Route::get('logout',[AuthController::class,'logout'])->name('logout');

    Route::group(['prefix' => 'teacher', 'as' => 'teacher.'], function () {
        Route::get('', [TeacherController::class, 'index'])->name('index');
        Route::get('/show/{teacher}', [TeacherController::class, 'show'])->name('show');
        Route::get('/create', [TeacherController::class, 'create'])->name('create');
        Route::post('/store', [TeacherController::class, 'store'])->name('store');
        Route::get('/edit/{teacher}', [TeacherController::class, 'edit'])->name('edit');
        Route::put('/update/{teacher}', [TeacherController::class, 'update'])->name('update');
        Route::get('/delete/{teacher}', [TeacherController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'experience', 'as' => 'experience.'], function () {
        Route::get('', [ExperienceController::class, 'index'])->name('index');
        Route::get('create', [ExperienceController::class, 'create'])->name('create');
        Route::post('/store', [ExperienceController::class, 'store'])->name('store');
        Route::get('edit/{experience}', [ExperienceController::class, 'edit'])->name('edit');
        Route::put('update/{experience}', [ExperienceController::class, 'update'])->name('update');
        Route::get('delete/{experience}', [ExperienceController::class, 'delete'])->name('delete');
    });


    Route::group(['prefix' => 'group', 'as' => 'group.'], function () {
        Route::get('', [GroupController::class, 'index'])->name('index');
        Route::get('create', [GroupController::class, 'create'])->name('create');
        Route::post('/store', [GroupController::class, 'store'])->name('store');
        Route::get('edit/{group}', [GroupController::class, 'edit'])->name('edit');
        Route::put('update/{group}', [GroupController::class, 'update'])->name('update');
        Route::get('delete/{group}', [GroupController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
        Route::get('', [StudentController::class, 'index'])->name('index');
        Route::get('create', [StudentController::class, 'create'])->name('create');
        Route::post('store', [StudentController::class, 'store'])->name('store');
        Route::get('edit/{student}', [StudentController::class, 'edit'])->name('edit');
        Route::put('update/{student}', [StudentController::class, 'update'])->name('update');
        Route::get('delete/{student}', [StudentController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('update/{user}', [UserController::class, 'update'])->name('update');
        Route::get('delete/{user}', [UserController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'group_day', 'as' => 'group_day.'], function () {
        Route::get('', [GroupDayController::class, 'index'])->name('index');
        Route::get('create', [GroupDayController::class, 'create'])->name('create');
        Route::post('store', [GroupDayController::class, 'store'])->name('store');
        Route::get('edit/{group_day}', [GroupDayController::class, 'edit'])->name('edit');
        Route::put('update/{group_day}', [GroupDayController::class, 'update'])->name('update');
        Route::get('delete/{group_day}', [GroupDayController::class, 'delete'])->name('delete');
    });


    Route::group(['prefix' => 'subject', 'as' => 'subject.'], function () {
        Route::get('', [SubjectController::class, 'index'])->name('index');
        Route::get('create', [SubjectController::class, 'create'])->name('create');
        Route::post('store', [SubjectController::class, 'store'])->name('store');
        Route::get('edit/{subject}', [SubjectController::class, 'edit'])->name('edit');
        Route::put('update/{subject}', [SubjectController::class, 'update'])->name('update');
        Route::get('delete/{subject}', [SubjectController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'lesson', 'as' => 'lesson.'], function () {
        Route::get('', [LessonController::class, 'index'])->name('index');
        Route::get('create', [LessonController::class, 'create'])->name('create');
        Route::post('store', [LessonController::class, 'store'])->name('store');
        Route::get('edit/{lesson}', [LessonController::class, 'edit'])->name('edit');
        Route::put('update/{lesson}', [LessonController::class, 'update'])->name('update');
        Route::get('delete/{lesson}', [LessonController::class, 'delete'])->name('delete');
    });


    Route::group(['prefix' => 'group_types', 'as' => 'group_types.'], function () {
        Route::get('', [GroupTypeController::class, 'index'])->name('index');
        Route::get('create', [GroupTypeController::class, 'create'])->name('create');
        Route::post('store', [GroupTypeController::class, 'store'])->name('store');
        Route::get('edit/{group_types}', [GroupTypeController::class, 'edit'])->name('edit');
        Route::put('update/{group_types}', [GroupTypeController::class, 'update'])->name('update');
        Route::get('delete/{group_types}', [GroupTypeController::class, 'delete'])->name('delete');
    });


    Route::group(['prefix' => 'exam', 'as' => 'exam.'], function () {
        Route::get('', [ExamController::class, 'index'])->name('index');
        Route::get('create', [ExamController::class, 'create'])->name('create');
        Route::post('store', [ExamController::class, 'store'])->name('store');
        Route::get('edit/{exam}', [ExamController::class, 'edit'])->name('edit');
        Route::put('update/{exam}', [ExamController::class, 'update'])->name('update');
        Route::get('delete/{exam}', [ExamController::class, 'delete'])->name('delete');
    });
});
