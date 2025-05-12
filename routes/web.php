<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
     //Email confirmation and password definition
     Route::get('/confirm-account/{token}', [ConfirmAccountController::class, 'confirmAccount'])->name('confirm-account');
     Route::post('/confirm-account', [ConfirmAccountController::class, 'confirmAccountSubmit'])->name('confirm-account-submit');
});


Route::middleware('auth')->group(function () {

     Route::redirect('/', 'home')->name('home');
     //Route::view('/home', 'home');

     Route::get('/home', function () {

          //Check if user is admin
          if (auth()->user()->role === 'admin') {
               return redirect()->route('admin.home');
          } elseif (auth()->user()->role === 'rh') {
               return redirect()->route('rh.management.home');
          } else {
               die('Vai para a página inicial do COLABORADOR');
          }
     })->name('home');

     // Use profile page
     Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');
     Route::post('/user/profile/update-password', [ProfileController::class, 'updatePassword'])->name('user.profile.update-password');
     Route::post('/user/profile/update-user-data', [ProfileController::class, 'updateUserData'])->name('user.profile.update-user-data');

     // Department route
     Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
     Route::get('/departments/new-department', [DepartmentController::class, 'newDepartment'])->name('departments.new-department');
     Route::post('/departments/create-department', [DepartmentController::class, 'createDepartment'])->name('departments.create-department');
     Route::get('/departments/edit-department/{id}', [DepartmentController::class, 'editDepartment'])->name('departments.edit-department');
     Route::post('/departments/update-department', [DepartmentController::class, 'updateDepartment'])->name('departments.update-department');
     Route::get('/departments/delete-department/{id}', [DepartmentController::class, 'deleteDepartment'])->name('departments.delete-department');
     Route::get('/departments/delete-department-confirm/{id}', [DepartmentController::class, 'deleteDepartmentConfirm'])->name('departments.delete-department-confirm');

     // RH colaborators routes
     Route::get('/rh-users', [RhUserController::class, 'index'])->name('colaborators.rh-users');
     Route::get('/rh-users/new-colaborator', [RhUserController::class, 'newColaborator'])->name('colaborators.rh.new-colaborator');
     Route::post('/rh-users/create-colaborator', [RhUserController::class, 'createRhColaborator'])->name('colaborators.rh.create-colaborator');
     Route::get('/rh-users/edit-colaborator/{id}', [RhUserController::class, 'editRhColaborator'])->name('colaborators.rh.edit-colaborator');
     Route::post('/rh-users/update-colaborator', [RhUserController::class, 'updateRhColaborator'])->name('colaborators.rh.update-colaborator');
     Route::get('/rh-users/delete/{id}', [RhUserController::class, 'deleteRhColaborator'])->name('colaborators.rh.delete-colaborator');
     Route::get('/rh-users/delete-confirm/{id}', [RhUserController::class, 'deleteRhColaboratorConfirm'])->name('colaborators.rh.delete-confirm');
     Route::get('/rh-users/restore/{id}', [RhUserController::class, 'restoreRhColaborator'])->name('colaborators.rh.restore');

     Route::get('/rh-users/management/home', [RhManagementController::class, 'home'])->name('rh.management.home');
     Route::get('/rh-users/management/new-colaborator', [RhManagementController::class, 'newColaborator'])->name('rh.management.new-colaborator');
     Route::post('/rh-users/management/create-colaborator', [RhManagementController::class, 'createColaborator'])->name('rh.management.create-colaborator');
     Route::get('rh-users/management/edit-colaborator/{id}' , [RhManagementController::class , 'editColaborator'])->name('rh.management.edit-colaborator');
     Route::post('rh-users/management/update-colaborator' , [RhManagementController::class , 'updateColaborator'])->name('rh.management.update-colaborator');
     Route::get('rh-users/management/details/{id}' , [RhManagementController::class , 'showDetails'])->name('rh.management.details');

     Route::get('rh-users/management/deletre/{id}' , [RhManagementController::class , 'deleteColaborator'])->name('rh.management.delete');
     Route::get('rh-users/management/delete-confirm/{id}' , [RhManagementController::class , 'deleteColaboratorConfirm'])->name('rh.management.delete-confirm');


     // Admin colaborators list
     Route::get('/colaborators', [ColaboratorsController::class, 'index'])->name('colaborators.all-colaborators');
     Route::get('/colaborators/detail/{id}', [ColaboratorsController::class, 'showDetails'])->name('colaborators.details');
     Route::get('/colaborators/delete/{id}', [ColaboratorsController::class, 'deleteColaborator'])->name('colaborators.delete');
     Route::get('/colaborators/delete-confirm/{id}', [ColaboratorsController::class, 'deleteColaboratorConfirm'])->name('colaborators.delete-confirm');
     Route::get('/colaborators/restore/{id}', [ColaboratorsController::class, 'restoreColaborator'])->name('colaborators.restore');

     // Admin routes
     Route::get('/admin/home' , [AdminController::class , 'home'])->name('admin.home');
});
