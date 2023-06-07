<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProjectsController;
use PHPUnit\Framework\Attributes\UsesClass;
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

Route::get('/', [PagesController::class, 'index'])->name('pages.index');

//User
Route::get('/register', [PagesController::class, 'register'])->name('pages.user.register');
Route::get('/login', [PagesController::class, 'login'])->name('pages.user.login');
route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::post('/user/register', [UsersController::class, 'register'])->name('user.register');
Route::post('/user/login', [UsersController::class, 'login'])->name('user.login');

//Projects
Route::get('/projects', [ProjectsController::class, 'projects'])->middleware('userAuth')->name('projects.list');
Route::get('/projects/make', [PagesController::class, 'projectsMake'])->middleware('userAuth')->name('pages.projects.make');

Route::post('/projects/make/send', [ProjectsController::class, 'projectsMake'])->middleware('userAuth')->name('projects.make');
