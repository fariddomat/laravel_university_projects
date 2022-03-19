<?php

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

use App\Http\Controllers\Admin\ProfessorController;

Route::get('/home-dashboard', 'HomeController@index')->name('home');
Route::get('search', 'WelcomeController@search')->name('search');
Route::post('registerUok', 'RegisterUOKController@register')->name('registerUok');
Route::get('registerUok', 'RegisterUOKController@register')->name('registerUok');
Route::post('/registersave', 'RegisterUOKController@registersave')->name('registersave');
// Route::get('registersave', 'RegisterUOKController@registersave')->name('registersave');

Route::get('/about', 'WelcomeController@about')->name('about');
Route::get('/contact', 'WelcomeController@contact')->name('contact');

Route::get('/404', function(){
    return view('404');
})->name('404');

//comments
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
Route::get('/comment/destroy/{id}', 'CommentController@destroy')->name('comment.destroy');

//rating
Route::post('/projects/rateProject', 'ProjectController@rateProject')->name('projects.rateProject');

Route::group([
    'middleware' => ['role:Admin'],
    'prefix' => 'admin/dashboard'
], function ($router) {
    Route::get('index', 'Admin\HomeController@index')->name('admin.dashboard.index');
    Route::post('search', 'Admin\HomeController@search');

});


Route::group([
    'middleware' => ['role:Admin'],
    'prefix' => 'admin/students'
], function ($router) {
    Route::get('index', 'Admin\StudentController@index')->name('admin.students.index');
    Route::get('create', 'Admin\StudentController@create')->name('admin.students.create');
    Route::post('store', 'Admin\StudentController@store')->name('admin.students.store');
    Route::post('destroy/{id}', 'Admin\StudentController@destroy')->name('admin.students.destroy');
    Route::get('edit/{id}', 'Admin\StudentController@edit')->name('admin.students.edit');
    Route::post('update/{id}', 'Admin\StudentController@update')->name('admin.students.update');
});
Route::group([
    'middleware' => ['role:Admin'],
    'prefix' => 'admin/professors'
], function ($router) {
    Route::get('index', 'Admin\ProfessorController@index')->name('admin.professors.index');
    Route::get('create', 'Admin\ProfessorController@create')->name('admin.professors.create');
    Route::post('store', 'Admin\ProfessorController@store')->name('admin.professors.store');
    Route::post('destroy/{id}', 'Admin\ProfessorController@destroy')->name('admin.professors.destroy');
    Route::get('edit/{id}', 'Admin\ProfessorController@edit')->name('admin.professors.edit');
    Route::post('update/{id}', 'Admin\ProfessorController@update')->name('admin.professors.update');
});

Route::group([
    'middleware' => ['role:Admin'],
    'prefix' => 'admin/projects'
], function ($router) {
    Route::get('index', 'Admin\ProjectController@index')->name('admin.projects.index');
    Route::get('create', 'Admin\ProjectController@create')->name('admin.projects.create');
    Route::post('store', 'Admin\ProjectController@store')->name('admin.projects.store');
    Route::post('destroy/{id}', 'Admin\ProjectController@destroy')->name('admin.projects.destroy');
    Route::get('edit/{id}', 'Admin\ProjectController@edit')->name('admin.projects.edit');
    Route::post('update/{id}', 'Admin\ProjectController@update')->name('admin.projects.update');
});


Route::group([
    'middleware' => ['role:Admin'],
    'prefix' => 'admin/categories'
], function ($router) {
    Route::get('index', 'Admin\CategoryController@index')->name('admin.categories.index');
    Route::get('create', 'Admin\CategoryController@create')->name('admin.categories.create');
    Route::post('store', 'Admin\CategoryController@store')->name('admin.categories.store');
    Route::post('destroy/{id}', 'Admin\CategoryController@destroy')->name('admin.categories.destroy');
    Route::get('edit/{id}', 'Admin\CategoryController@edit')->name('admin.categories.edit');
    Route::post('update/{id}', 'Admin\CategoryController@update')->name('admin.categories.update');
});

Route::group([
    'middleware' => ['role:Admin'],
    'prefix' => 'admin/collegues'
], function ($router) {
    Route::get('index', 'Admin\CollegueController@index')->name('admin.collegues.index');
    Route::get('create', 'Admin\CollegueController@create')->name('admin.collegues.create');
    Route::post('store', 'Admin\CollegueController@store')->name('admin.collegues.store');
    Route::post('destroy/{id}', 'Admin\CollegueController@destroy')->name('admin.collegues.destroy');
    Route::get('edit/{id}', 'Admin\CollegueController@edit')->name('admin.collegues.edit');
    Route::post('update/{id}', 'Admin\CollegueController@update')->name('admin.collegues.update');
});
//professor_roles

Route::group([
    'middleware' => ['role:Admin'],
    'prefix' => 'admin/professor_roles'
], function ($router) {
    Route::get('index', 'Admin\ProfessorRoleController@index')->name('admin.professor_roles.index');
    Route::get('create', 'Admin\ProfessorRoleController@create')->name('admin.professor_roles.create');
    Route::post('store', 'Admin\ProfessorRoleController@store')->name('admin.professor_roles.store');
    Route::post('destroy/{id}', 'Admin\ProfessorRoleController@destroy')->name('admin.professor_roles.destroy');
    Route::get('edit/{id}', 'Admin\ProfessorRoleController@edit')->name('admin.professor_roles.edit');
    Route::post('update/{id}', 'Admin\ProfessorRoleController@update')->name('admin.professor_roles.update');
});
Route::group([
    'middleware' => ['role:Professor'],
    'prefix' => 'professor/dashboard'
], function ($router) {
    Route::get('index', 'Professor\HomeController@index')->name('professor.dashboard.index');
    Route::post('search', 'Professor\HomeController@search');

});

Route::group([
    'middleware' => ['role:Professor'],
    'prefix' => 'professor/projects'
], function ($router) {
    Route::get('index', 'Professor\ProjectController@index')->name('professor.projects.index');
    Route::get('create', 'Professor\ProjectController@create')->name('professor.projects.create');
    Route::post('store', 'Professor\ProjectController@store')->name('professor.projects.store');
    Route::post('destroy/{id}', 'Professor\ProjectController@destroy')->name('professor.projects.destroy');
    Route::get('edit/{id}', 'Professor\ProjectController@edit')->name('professor.projects.edit');
    Route::post('update/{id}', 'Professor\ProjectController@update')->name('professor.projects.update');

    Route::get('show/{id}', 'Professor\ProjectController@show')->name('professor.projects.show');

    Route::post('complete/{id}', 'Professor\ProjectController@complete')->name('professor.projects.complete');
    Route::post('incomplete/{id}', 'Professor\ProjectController@incomplete')->name('professor.projects.incomplete');
    Route::post('reject/{id}', 'Professor\ProjectController@reject')->name('professor.projects.reject');

});
Route::group([
    'middleware' => ['role:Professor'],
    'prefix' => 'professor/projectForms'
], function ($router) {
    Route::get('index', 'Professor\ProjectFormController@index')->name('professor.projectForms.index');
    Route::get('incomplete', 'Professor\ProjectFormController@incomplete')->name('professor.projectForms.incomplete');

    Route::get('create', 'Professor\ProjectFormController@create')->name('professor.projectForms.create');
    Route::post('store', 'Professor\ProjectFormController@store')->name('professor.projectForms.store');
    Route::post('destroy/{id}', 'Professor\ProjectFormController@destroy')->name('professor.projectForms.destroy');
    Route::get('edit/{id}', 'Professor\ProjectFormController@edit')->name('professor.projectForms.edit');
    Route::post('update/{id}', 'Professor\ProjectFormController@update')->name('professor.projectForms.update');

    Route::get('professorApprove/{id}', 'Professor\ProjectFormController@professorApprove')->name('professor.projectForms.professorApprove');
    //makeEvent
    Route::post('makeEvent/{id}', 'Professor\ProjectFormController@makeEvent')->name('professor.projectForms.makeEvent');

    Route::get('reject/{id}', 'Professor\ProjectFormController@reject')->name('professor.projectForms.reject');
    Route::post('reject_message/{id}', 'Professor\ProjectFormController@reject_message')->name('professor.projectForms.reject_message');
});
//
Route::group([
    'middleware' => ['role:Professor'],
    'prefix' => 'professor/students'
], function ($router) {
    Route::get('index', 'Professor\StudentController@index')->name('professor.students.index');
});


Route::group([
    'middleware' => ['role:Student'],
    'prefix' => 'student/dashboard'
], function ($router) {
    Route::get('index', 'Student\HomeController@index')->name('student.dashboard.index');
    Route::post('search', 'Student\HomeController@search');

});

Route::group([
    'middleware' => ['role:Student'],
    'prefix' => 'student/projects'
], function ($router) {
    Route::get('index', 'Student\ProjectController@index')->name('student.projects.index');
    Route::get('incomplete', 'Student\ProjectController@incomplete')->name('student.projects.incomplete');

    Route::get('create', 'Student\ProjectController@create')->name('student.projects.create');
    Route::post('store', 'Student\ProjectController@store')->name('student.projects.store');
    Route::post('storeNew', 'Student\ProjectController@store_new')->name('student.projects.storeNew');
    Route::post('destroy/{id}', 'Student\ProjectController@destroy')->name('student.projects.destroy');
    Route::get('edit/{id}', 'Student\ProjectController@edit')->name('student.projects.edit');
    Route::post('update/{id}', 'Student\ProjectController@update')->name('student.projects.update');
});

Route::group([
    'middleware' => ['role:Student'],
    'prefix' => 'student/projectForms'
], function ($router) {
    Route::get('index', 'Student\ProjectFormController@index')->name('student.projectForms.index');
    Route::get('create', 'Student\ProjectFormController@create')->name('student.projectForms.create');
    Route::post('store', 'Student\ProjectFormController@store')->name('student.projectForms.store');
    Route::post('destroy/{id}', 'Student\ProjectFormController@destroy')->name('student.projectForms.destroy');
    Route::get('edit/{id}', 'Student\ProjectFormController@edit')->name('student.projectForms.edit');
    Route::post('update/{id}', 'Student\ProjectFormController@update')->name('student.projectForms.update');
});

Route::group([
    'middleware' => ['role:Student'],
    'prefix' => 'student/profile'
], function ($router) {
    Route::get('index', 'Student\ProfileController@index')->name('student.profile.index');
    Route::post('update', 'Student\ProfileController@update')->name('student.profile.update');

});


Route::get('/', 'WelcomeController@index')->name('index');
Route::get('/events', 'WelcomeController@events')->name('events');
Route::get('/projects', 'ProjectController@index')->name('projects');
Route::get('/project/{id}','ProjectController@show')->name('project');
Route::get('/students','StudentController@index')->name('students');
Route::get('/student/{id}','StudentController@show')->name('student');
Route::get('/teachers','ProfessorController@index')->name('teachers');
Route::get('/teacher/{id}','ProfessorController@show')->name('teacher');

Auth::routes();

Route::group(['middleware'=>'auth',
'prefix' => 'admin'],function(){


});

