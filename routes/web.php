<?php

use App\Http\Controllers\posts;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [posts::class, 'index']);

/**
 * show create page
 */
Route::get('listing/create', [posts::class, 'create'])->middleware('auth');
/**
 * Route for create a new post
 */
Route::post('/listings', [posts::class, 'store'])->middleware('auth');

/**
 * Route for show an Edit page
 */
Route::get('/listing/{id}/edit', [posts::class, 'edit'])->middleware('auth');
/**
 * Route for update (put) current post
 */
Route::put('/listing/{id}', [posts::class, 'update'])->middleware('auth');
/**
 * DELETE A POST
 */
Route::delete('/listing/{id}', [posts::class, 'destroy'])->middleware('auth');


//////////////////////////////////AUTH SIDE/////////////////////////////////////////

/**
 * show register form
 */
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
/**
 *create a new user
 */
Route::post('/register', [UserController::class, 'store']);
/**
 * logout
 */
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
/**
 * show login form
 */
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
/**
 * login
 */
Route::post('login', [UserController::class, 'CheckLogin']);


/////////////////////////mange current user post (job)//////////////////////////

Route::get('/Mange', [UserController::class, 'mange'])->middleware('auth');
////////////////////////show single listing/////////////////////////////////////
/**
 * show single listing :)
 */

Route::get('/listing/{id}', [posts::class, 'show']);







