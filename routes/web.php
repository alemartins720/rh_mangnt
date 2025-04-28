<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){

    Route::redirect('/' , 'home')->name('home');
    Route::view('/home' , 'home');

    // Use profile page
    Route::get('/user/profile' , [ProfileController::class , 'index' ])->name('user.profile');
    Route::post('/user/profile/update-password' , [ProfileController::class , 'updatePassword'])->name('user.profile.update-password');
});