<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\userControl;

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

//Route::get('/user',[userControl::class,'index']);
Route::get('/user/{id}',[userControl::class,'index']);


Route::get('/registro',[userControl::class,'registro']);

Route::get('/perfil/{id}', [userControl::class,'perfil']);

Route::get('/admin', [userControl::class,'admin']);
    
