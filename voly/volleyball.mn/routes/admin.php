<?php

use App\Http\Controllers\admin\ArticlesController;
use App\Http\Controllers\admin\CommentsController;
use App\Http\Controllers\admin\CooperationController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\PicturesController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\PlayerController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompertitionController;

Route::get('/admin/index', [HomeController::class, 'index'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin', [HomeController::class, 'index'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');

#Cooperation Logo
Route::get('/admin/cooperation', [CooperationController::class, 'index'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/cooperation/add', [CooperationController::class, 'create'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::post('/admin/cooperation/add', [CooperationController::class, 'store'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/cooperation/drop/{id}', [CooperationController::class, 'destroy'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::post('/admin/cooperation/dropbox', [CooperationController::class, 'dropbox'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');


#Articles
Route::get('/admin/articles', [ArticlesController::class, 'index'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/articles/add', [ArticlesController::class, 'create'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::post('/admin/articles/add', [ArticlesController::class, 'store'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/articles/edit/{id}', [ArticlesController::class, 'edit'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::post('/admin/articles/edit/{id}', [ArticlesController::class, 'update'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/articles/drop/{id}', [ArticlesController::class, 'destroy'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/articles/show/{id}', [ArticlesController::class, 'show'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::post('/admin/articles/dropbox', [ArticlesController::class, 'dropbox'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/articles/search', [ArticlesController::class, 'search'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');


#Comments
Route::get('/admin/comments', [CommentsController::class, 'index'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/comments/show/{id}', [CommentsController::class, 'show'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/comments/drop/{id}', [CommentsController::class, 'destroy'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');


#Pictures
Route::get('/admin/pictures', [PicturesController::class, 'index'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/pictures/add', [PicturesController::class, 'create'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::post('/admin/pictures/add', [PicturesController::class, 'store'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/pictures/drop/{id}', [PicturesController::class, 'destroy'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::post('/admin/pictures/dropbox', [PicturesController::class, 'dropbox'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');


#Users
Route::get('/admin/users', [UsersController::class, 'index'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/users/add', [UsersController::class, 'create'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::post('/admin/users/add', [UsersController::class, 'store'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/users/edit/{id}', [UsersController::class, 'edit'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::post('/admin/users/edit/{id}', [UsersController::class, 'update'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/users/show/{id}', [UsersController::class, 'show'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::get('/admin/users/drop/{id}', [UsersController::class, 'destroy'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::post('/admin/users/dropbox', [UsersController::class, 'dropbox'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');
Route::post('/admin/users/edit/changepassword/{id}', [UsersController::class, 'changerpassword'])->middleware(['auth'])->name('VoleyBall.mn - Агуулга удирдах систем');

#Competition

Route::resource('Competition', CompertitionController::class);

#Teams
Route::resource('Teams', TeamsController::class);

#Player
Route::resource('Player', PlayerController::class);
