<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    Route::redirect('/', 'home')->name('home');
    Route::view('/home', 'home');

    // Use profile page
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/user/profile/update-password', [ProfileController::class, 'updatePassword'])->name('user.profile.update-password');
    Route::post('/user/profile/update-user-data', [ProfileController::class, 'updateUserData'])->name('user.profile.update-user-data');

    // Department route
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
    Route::get('/departments/new-department', [DepartmentController::class, 'newDepartment'])->name('departments.new-department');
    Route::post('/departments/create-department', [DepartmentController::class, 'createDepartment'])->name('departments.create-department');
});
