<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\PostInc;

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


/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return ('Hello World ');
 });

 Route::get('/user/{id}/{name}', function ($data, $name){
    return 'Thhis user is '. $name .' with an ID of '.$data;
});
*/

Route::get('/', [PagesController::class, 'index']);
    
Route::get('/about',[PagesController::class, 'about']);
    
Route::get('/services', [PagesController::class, 'services']);


Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/show/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/create', [PostController::class, 'store'])->name('post.store');
Route::get('/post/{id}/edit', [PostController::class ,'edit']);
Route::put('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{id}/delete', [PostController::class, 'destroy'])->name('post.delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
