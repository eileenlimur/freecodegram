<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewUserWelcomeMail;

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


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);

Route::get('/email', function () {
  return new NewUserWelcomeMail();
});

Route::post('follow/{user}', [App\Http\Controllers\FollowsController::class, 'store']);

Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index']);
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');