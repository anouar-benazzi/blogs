<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [PostController::class, 'index'] );


// show create form

Route::get('posts/create', [PostController::class, 'create'] )->middleware('auth')->name("create_post");

// store post data

Route::post('/posts', [PostController::class, 'store'] )->middleware('auth');

// show edit form

Route::get('/posts/{post}/edit', [PostController::class, 'edit'] )->middleware('auth');

//update post
Route::put('/posts/{post}', [PostController::class, 'update'])->name("update_post")->middleware('auth');

//delete post

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware('auth');

// manage posts

Route::get('/posts/manage', [PostController::class, 'manage'] )->middleware('auth');



// show Registeration/create form

Route::get('/register', [UserController::class, 'create'] )->middleware('guest');

// create new user

Route::post('/users', [UserController::class, 'store'] );

// log user out
Route::post('/logout', [UserController::class, 'logout'] )->middleware('auth');

// show login form

Route::get('/login', [UserController::class, 'login'] )->name('login')->middleware('guest');

// Log In User
Route::post('/users/athenticate', [UserController::class, 'athenticate'] );

//show profile page form
Route::get('/users/profile', [UserController::class, 'show'])->middleware('auth')->name('MyProfile');

//update profile
Route::put('/users/profile/{user}', [UserController::class, 'update'])->name("updateProfile")->middleware('auth');

// manage posts

Route::get('/posts/manage', [PostController::class, 'manage'] )->middleware('auth');


// stote comment

Route::post('/add-comment/{post}',[PostController::class, 'addcomment'] )->middleware('auth')->name('add_comment');


// single post
Route::get('/posts/{post}', [PostController::class, 'show'] )->middleware('auth')->name("show_post");


// show add admin form
Route::get('/SuperAdmin/add_admin', [AdminController::class, 'ShowAdminForm'] )->middleware('auth')->name('ShowAdminForm');

// store admin
Route::post('/SuperAdmin/admins', [AdminController::class, 'StoreAdmin'] )->middleware('auth');

// manage users
Route::get('/SuperAdmin/manage_users', [AdminController::class, 'manage'] )->middleware('auth')->name('manage_users');

//delete user
Route::delete('/users/{user}', [AdminController::class, 'destroy'])->middleware('auth')->name('delete_user');

//show user
Route::get('/users/{user}', [AdminController::class, 'show'])->middleware('auth')->name('showUser');

//show user edit form
Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->middleware('auth')->name('showEditForm');

//update User
Route::put('/users/{user}', [AdminController::class, 'update'])->name("updateUser")->middleware('auth');

//update profile picture
Route::put('/users/{user}', [UserController::class, 'updatePicture'])->name("updateProfilePicture")->middleware('auth');


