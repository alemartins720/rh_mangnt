<?php


use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){

    Route::redirect('/' , 'home')->name('home');
    Route::view('/home' , 'home');
});