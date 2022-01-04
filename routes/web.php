<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;

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
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/ciudad/{name?}',[ DataController::class,'index'])->name('welcome');
Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::resource('/blog',BlogController::class);
Route::get('/blog-list',[BlogController::class,'list'])->name('blog.list');

Route::resource('/team',TeamController::class);
Route::get('/team-list',[TeamController::class,'list'])->name('team.list');

