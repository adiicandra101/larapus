<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Authorcontroller;
use App\Http\controllers\Bookcontroller;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 //Route tester admin template
 Route::get('tes-admin',function(){
 return view('admin');
 });

 auth::routes();\
 Route::group(
     ['prefix'=>'admin','middleware'=>['auth','role:admin']], function () {
         Route::get('/home',[App\Http\controllers\HomeController::class, 'index'])->name('home');
        });

        Route::group(
     ['prefix'=>'admin','middleware'=>['auth','role:member']], function () {
         Route::get('/home',[App\Http\controllers\HomeController::class, 'index'])->name('home');
        });
        
Route::resource('author',AuthorController::class );

Route::resource('book',BookController::class );
