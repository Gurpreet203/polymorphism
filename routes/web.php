<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function(){
    return view('welcome');
});

Route::controller(PostController::class)->group(function(){

    Route::get('posts/create', 'create')->name('posts.create');

    Route::post('posts/store', 'store')->name('posts.store');

    Route::get('posts/{post}/show', 'show')->name('posts.show');
});

Route::controller(VideoController::class)->group(function(){

    Route::get('videos/create', 'create')->name('videos.create');

    Route::post('videos/store', 'store')->name('videos.store');

    Route::get('videos/{video}/show', 'show')->name('videos.show');
});
