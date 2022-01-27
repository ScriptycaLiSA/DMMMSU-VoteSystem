<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\admin\AdminController;

// Routes

Route::get('/', [App\Http\Controllers\Controller::class, 'home'])->name('banner');

Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/voter', [App\Http\Controllers\VoterController::class, 'voterView'])->name('voter');

Route::get('/webm', [App\Http\Controllers\admin\WebmController::class, 'index'])->name('dashboard');

Route::get('/about', [App\Http\Controllers\Controller::class, 'about'])->name('about');

Route::get('/campaign', function(){
    return view("vote_campaign");
});

Auth::routes();
