<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::controller(UserController::class)->group(function(){
//     Route::get('/user/index','index')->name('user.index');
// });

Route::group([],function(){
    Route::resource('user', UserController::class);
    Route::resource('election', ElectionController::class);
    Route::controller(CandidateController::class)->group(function() {
        Route::get('/candidate/create','create')->name('candidate.create');
        Route::post('/candidate/create','store')->name('candidate.store');
        Route::delete('/candidate/{candidate}','destroy')->name('candidate.destroy');
    });
});
