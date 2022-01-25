<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\admin\AdminController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\Controller::class, 'home'])->name('banner');

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/voter', [App\Http\Controllers\VoterController::class, 'voterView'])->name('voter');

Route::get('/campaign', function(){
    return view("vote_campaign");
});
