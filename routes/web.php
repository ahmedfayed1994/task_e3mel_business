<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


//auth
Route::get('/admin', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'Logout'])->name('logout');

Route::group(['middleware' => 'auth'],function() {

//Dashboard
    Route::get('admin/home', function (){ return view('admin.home');});

// categories
    Route::get('admin/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('admin/store/categories', [CategoryController::class, 'store'])->name('store.category');
    Route::get('admin/delete/categories/{category}', [CategoryController::class, 'delete'])->name('delete.category');
    Route::get('admin/edit/categories/{category}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::put('admin/update/categories/{category}', [CategoryController::class, 'update'])->name('update.category');


//course
    Route::get('admin/courses', [CourseController::class, 'index'])->name('courses');
    Route::get('admin/courses/add', [CourseController::class, 'create'])->name('add.course');
    Route::post('admin/store/courses', [CourseController::class, 'store'])->name('store.course');
    Route::get('admin/edit/courses/{course}', [CourseController::class, 'edit'])->name('edit.course');
    Route::put('admin/update/courses/{course}', [CourseController::class, 'update'])->name('update.course');
    Route::get('admin/delete/courses/{course}', [CourseController::class, 'delete'])->name('delete.course');
    Route::get('admin/inactive/course/{course}', [CourseController::class, 'inactive'])->name('inactive.course');
    Route::get('admin/active/course/{course}', [CourseController::class, 'active'])->name('active.course');

});


Route::get('search', [CourseController::class, 'search'])->name('search');
Route::get('filter', [CourseController::class, 'filter'])->name('filter');
