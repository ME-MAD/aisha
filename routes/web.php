<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ElementorController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupDayController;
use App\Http\Controllers\GroupStudentController;
use App\Http\Controllers\GroupSubjectController;
use App\Http\Controllers\GroupTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentLessonController;
use App\Http\Controllers\StudentLessonReviewController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SyllabusController;
use App\Http\Controllers\SyllabusReviewController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\GroupSubject;
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

Route::group(['namespace' => 'Auth'], function () {

    Route::get('/loginPage', [AuthController::class, 'loginPage'])->name('loginPage');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::get('/admin', function () {
    return redirect(route('admin.home'));
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin_auth'], function () {


    Route::get('logout', [AuthController::class, 'logout'])->name('logout');


    Route::group(['prefix' => 'home'], function () {
        Route::get('', [HomeController::class, 'index'])->name('home');
        Route::get('getHomeStatistics', [HomeController::class, 'getHomeStatistics'])->name('home.getHomeStatistics');
    });


    Route::group(['prefix' => 'teacher', 'as' => 'teacher.'], function () {
        Route::get('', [TeacherController::class, 'index'])->name('index');
        Route::get('/show/{teacher}', [TeacherController::class, 'show'])->name('show');
        Route::get('/create', [TeacherController::class, 'create'])->name('create');
        Route::post('/store', [TeacherController::class, 'store'])->name('store');
        Route::get('/edit/{teacher}', [TeacherController::class, 'edit'])->name('edit');
        Route::put('/update/{teacher}', [TeacherController::class, 'update'])->name('update');
        Route::get('/delete/{teacher}', [TeacherController::class, 'delete'])->name('delete');
        Route::get('/getTeacherShowDataAjax/{teacher}', [TeacherController::class, 'getTeacherShowDataAjax'])->name('getTeacherShowDataAjax');
        Route::get('/studentsSearchAjax', [TeacherController::class, 'studentsSearchAjax'])->name('studentsSearchAjax');
        Route::get('/getExpereincesDataForChart/{teacher}', [TeacherController::class, 'getExpereincesDataForChart'])->name('getExpereincesDataForChart');
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
        Route::get('show/{group}', [GroupController::class, 'show'])->name('show');
        Route::put('update/{group}', [GroupController::class, 'update'])->name('update');
        Route::get('delete/{group}', [GroupController::class, 'delete'])->name('delete');
        Route::get('getPaymentPerMonth/{group}', [GroupController::class, 'getPaymentPerMonth'])->name('getPaymentPerMonth');
        Route::get('groupAgesChartData', [GroupController::class, 'groupAgesChartData'])->name('groupAgesChartData');
        Route::get('getAllGroupsForPayment', [GroupController::class, 'getAllGroupsForPayment'])->name('getAllGroupsForPayment');
    });

    Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
        Route::get('', [StudentController::class, 'index'])->name('index');
        Route::get('create', [StudentController::class, 'create'])->name('create');
        Route::post('store', [StudentController::class, 'store'])->name('store');
        Route::get('show/{student}', [StudentController::class, 'show'])->name('show');
        Route::get('edit/{student}', [StudentController::class, 'edit'])->name('edit');
        Route::put('update/{student}', [StudentController::class, 'update'])->name('update');
        Route::get('delete/{student}', [StudentController::class, 'delete'])->name('delete');
        Route::get('getGroupStudents/{student}', [StudentController::class, 'getGroupStudents'])->name('getGroupStudents');
        Route::post('search', [StudentController::class, 'search'])->name('search');
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

        Route::get('getGroupDaysOfGroup', [GroupDayController::class, 'getGroupDaysOfGroup'])->name('getGroupDaysOfGroup');

        Route::get('getGroupDaysForCalendar', [GroupDayController::class, 'getGroupDaysForCalendar'])->name('getGroupDaysForCalendar');
    });


    Route::group(['prefix' => 'subject', 'as' => 'subject.'], function () {
        Route::get('', [SubjectController::class, 'index'])->name('index');
        Route::get('create', [SubjectController::class, 'create'])->name('create');
        Route::post('store', [SubjectController::class, 'store'])->name('store');
        Route::get('edit/{subject}', [SubjectController::class, 'edit'])->name('edit');
        Route::put('update/{subject}', [SubjectController::class, 'update'])->name('update');
        Route::get('delete/{subject}', [SubjectController::class, 'delete'])->name('delete');
        Route::get('getSubjectBook/{subject}', [SubjectController::class, 'getSubjectBook'])->name('getSubjectBook');
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
        Route::get('edit/{group_type}', [GroupTypeController::class, 'edit'])->name('edit');
        Route::put('update/{group_type}', [GroupTypeController::class, 'update'])->name('update');
        Route::get('delete/{group_type}', [GroupTypeController::class, 'delete'])->name('delete');

        Route::get('show/{group_type}', [GroupTypeController::class, 'show'])->name('show');
    });


    Route::group(['prefix' => 'exam', 'as' => 'exam.'], function () {
        Route::get('', [ExamController::class, 'index'])->name('index');
        Route::get('create', [ExamController::class, 'create'])->name('create');
        Route::post('store', [ExamController::class, 'store'])->name('store');
        Route::get('edit/{exam}', [ExamController::class, 'edit'])->name('edit');
        Route::put('update/{exam}', [ExamController::class, 'update'])->name('update');
        Route::get('delete/{exam}', [ExamController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
        Route::get('', [PaymentController::class, 'index'])->name('index');
        Route::get('create', [PaymentController::class, 'create'])->name('create');
        Route::post('store', [PaymentController::class, 'store'])->name('store');
        Route::get('getPaymentsOfGroupByMonth', [PaymentController::class, 'getPaymentsOfGroupByMonth'])->name('getPaymentsOfGroupByMonth');
        Route::get('getPaymentCountOfGroupByMonth', [PaymentController::class, 'getPaymentCountOfGroupByMonth'])->name('getPaymentCountOfGroupByMonth');
        Route::get('edit/{payment}', [PaymentController::class, 'edit'])->name('edit');
        Route::put('update/{payment}', [PaymentController::class, 'update'])->name('update');
        Route::get('delete/{payment}', [PaymentController::class, 'delete'])->name('delete');
        Route::post('totalPaymentsChartData', [PaymentController::class, 'totalPaymentsChartData'])->name('totalPaymentsChartData');
    });

    Route::group(['prefix' => 'group_students', 'as' => 'group_students.'], function () {
        Route::get('', [GroupStudentController::class, 'index'])->name('index');
        Route::get('create', [GroupStudentController::class, 'create'])->name('create');
        Route::post('store', [GroupStudentController::class, 'store'])->name('store');
        Route::get('edit/{groupStudent}', [GroupStudentController::class, 'edit'])->name('edit');
        Route::put('update/{groupStudent}', [GroupStudentController::class, 'update'])->name('update');
        Route::get('delete/{groupStudent}', [GroupStudentController::class, 'delete'])->name('delete');
        Route::get('getGroupStudents', [GroupStudentController::class, 'getGroupStudents'])->name('getGroupStudents');
        Route::get('getStudentGroups', [GroupStudentController::class, 'getStudentGroups'])->name('getStudentGroups');
    });

    Route::group(['prefix' => 'group_subjects', 'as' => 'group_subjects.'], function () {
        Route::get('', [GroupSubjectController::class, 'index'])->name('index');
        Route::get('create', [GroupSubjectController::class, 'create'])->name('create');
        Route::post('store', [GroupSubjectController::class, 'store'])->name('store');
        Route::get('edit/{groupSubject}', [GroupSubjectController::class, 'edit'])->name('edit');
        Route::put('update/{groupSubject}', [GroupSubjectController::class, 'update'])->name('update');
        Route::get('delete/{groupSubject}', [GroupSubjectController::class, 'delete'])->name('delete');
        Route::get('getGroupSubjects', [GroupSubjectController::class, 'getGroupSubjects'])->name('getGroupSubjects');
    });

    Route::group(['prefix' => 'syllabus', 'as' => 'syllabus.'], function () {
        Route::get('', [SyllabusController::class, 'index'])->name('index');
        Route::get('create', [SyllabusController::class, 'create'])->name('create');
        Route::post('store', [SyllabusController::class, 'store'])->name('store');

        Route::get('show/{syllabus}', [SyllabusController::class, 'show'])->name('show');
        Route::get('edit/{syllabus}', [SyllabusController::class, 'edit'])->name('edit');
        Route::put('update/{syllabus}', [SyllabusController::class, 'update'])->name('update');
        Route::get('delete/{syllabus}', [SyllabusController::class, 'delete'])->name('delete');
        Route::post('createNewLesson/', [SyllabusController::class, 'createNewLesson'])->name('createNewLesson');
        Route::post('finishNewLessonAjax/{syllabus}', [SyllabusController::class, 'finishNewLessonAjax'])->name('finishNewLessonAjax');
        Route::get('getStudentUnfinishedSyllabus/{student}/{group}', [SyllabusController::class, 'getStudentUnfinishedSyllabus'])->name('getStudentUnfinishedSyllabus');
    });


    Route::group(['prefix' => 'syllabus-review', 'as' => 'syllabusReview.'], function () {
        Route::post('finishNewLessonReviewAjax/{syllabusReview}', [SyllabusReviewController::class, 'finishNewLessonReviewAjax'])->name('finishNewLessonReviewAjax');

        Route::post('createNewLessonAjax/', [SyllabusReviewController::class, 'createNewLessonAjax'])->name('createNewLessonAjax');
    });


    Route::group(['prefix' => 'student_lesson', 'as' => 'student_lesson.'], function () {
        Route::get('ajaxStudentLessonFinished', [StudentLessonController::class, 'ajaxStudentLessonFinished'])->name('ajaxStudentLessonFinished');
        Route::get('show/{studentLesson}', [StudentLessonController::class, 'show'])->name('show');

        Route::post('store', [StudentLessonController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'student_lesson_review', 'as' => 'student_lesson_review.'], function () {
        Route::post('ajaxStudentLessonFinishedReview', [StudentLessonReviewController::class, 'ajaxStudentLessonFinishedReview'])->name('ajaxStudentLessonFinishedReview');
    });

    Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
        Route::get('', [RoleController::class, 'index'])->name('index');
        Route::get('create', [RoleController::class, 'create'])->name('create');
        Route::post('store', [RoleController::class, 'store'])->name('store');
        Route::get('edit/{role}', [RoleController::class, 'edit'])->name('edit');
        Route::put('update/{role}', [RoleController::class, 'update'])->name('update');
        Route::get('delete/{role}', [RoleController::class, 'delete'])->name('delete');
        Route::get('getRoleUsers/{role}', [RoleController::class, 'getRoleUsers'])->name('getRoleUsers');
    });

    Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
        Route::get('payment', [ReportController::class, 'payment'])->name('payment');
    });

    Route::group(['prefix' => 'note', 'as' => 'note.'], function () {
        Route::get('studentIndex', [NoteController::class, 'studentIndex'])->name('studentIndex');
        Route::post('studentStore', [NoteController::class, 'studentStore'])->name('studentStore');
        Route::get('delete/{note}', [NoteController::class, 'delete'])->name('delete');
        Route::get('toggleFavorite/{note}', [NoteController::class, 'toggleFavorite'])->name('toggleFavorite');
        Route::post('updateNoteType/{note}', [NoteController::class, 'updateNoteType'])->name('updateNoteType');
    });

    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('', [SettingController::class, 'index'])->name('index');
        Route::get('create', [SettingController::class, 'create'])->name('create');
        Route::post('/store/{setting}', [SettingController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'elementor', 'as' => 'elementor.'], function () {
        Route::get('', [ElementorController::class, 'index'])->name('index');
        Route::get('create', [ElementorController::class, 'create'])->name('create');
        Route::post('/store', [ElementorController::class, 'store'])->name('store');
        Route::get('edit/{elementor}', [ElementorController::class, 'edit'])->name('edit');
        Route::put('update/{elementor}', [ElementorController::class, 'update'])->name('update');
        Route::get('delete/{elementor}', [ElementorController::class, 'delete'])->name('delete');
    });
});
