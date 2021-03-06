<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\EgroupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
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

//blog
Route::resource('/blog',BlogController::class);
Route::get('blog/{blog}-{slug}',[BLogCOntroller::class,'show'])->name('blog.show.slug');
Route::get('/blog-list',[BlogController::class,'list'])->name('blog.list');
Route::post('/blog/comment/{blog?}',[BlogController::class,'comments'])->name('blog.comment');
Route::get('/blog/like/{blog?}',[BlogController::class,'likes'])->name('blog.likes');
Route::get('/blog/like/{blog?}',[BlogController::class,'likes'])->name('blog.likes');

//fin blog


Route::resource('/team',TeamController::class);
Route::get('/team-list',[TeamController::class,'list'])->name('team.list');

Route::get('ckeditor', [CkeditorController::class,'index']);
Route::post('ckeditor/upload',[CkeditorController::class,'upload'])->name('ckeditor.upload');

//landing

Route::resource('/landing',LandingPageController::class);
Route::get('/landing-list',[LandingPageController::class,'list'])->name('landing.list');

//landing Menu
Route::get('/change/menu/{type?}',[LandingPageController::class,'changeMenu'])->name('menu.change');

// fin Landing


//e-group
Route::resource('/e-group',EgroupController::class);
Route::get('/e-group-list',[EgroupController::class,'list'])->name('e-groups.list');

//fin e-group
