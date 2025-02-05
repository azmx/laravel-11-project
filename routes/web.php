<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\GradeAdminController;
use App\Http\Controllers\Admin\DepartmentAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/students', [StudentController::class, 'index']);

Route::get('/grades', [GradeController::class, 'index']);

Route::get('/department', [DepartmentController::class, 'index']);





Route::prefix('admin')->group(function () {

    // Route::get('/department-admin', [DepartmentAdminController::class, 'index']); // Tetap tanpa nama

    // Route::get('/grade-admin', [GradeAdminController::class, 'index']); // Tetap tanpa nama

    Route::prefix('students')->name('admin.students.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\StudentAdminController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\StudentAdminController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\StudentAdminController::class, 'store'])->name('store');
        Route::get('/edit/{student}', [App\Http\Controllers\Admin\StudentAdminController::class,'edit'])->name('edit');
        Route::put('/update/{student}', [App\Http\Controllers\Admin\StudentAdminController::class,'update'])->name('update');
        Route::delete('/delete/{student}', [App\Http\Controllers\Admin\StudentAdminController::class,'destroy'])->name('delete');
    });

    Route::prefix('grades')->name('admin.grades.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\GradeAdminController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\GradeAdminController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\GradeAdminController::class, 'store'])->name('store');
        Route::get('/edit/{grade}', [App\Http\Controllers\Admin\GradeAdminController::class,'edit'])->name('edit');
        Route::put('/update/{grade}', [App\Http\Controllers\Admin\GradeAdminController::class,'update'])->name('update');
        Route::delete('/delete/{grade}', [App\Http\Controllers\Admin\GradeAdminController::class,'destroy'])->name('delete');
    });

    Route::prefix('departments')->name('admin.departments.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DepartmentAdminController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\DepartmentAdminController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\DepartmentAdminController::class, 'store'])->name('store');
        Route::get('/edit/{department}', [App\Http\Controllers\Admin\DepartmentAdminController::class,'edit'])->name('edit');
        Route::put('/update/{department}', [App\Http\Controllers\Admin\DepartmentAdminController::class,'update'])->name('update');
        Route::delete('/delete/{department}', [App\Http\Controllers\Admin\DepartmentAdminController::class,'destroy'])->name('delete');
    });

});




