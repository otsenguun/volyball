<?php

use App\Http\Controllers\website\IndexController;
use Illuminate\Support\Facades\Route;

$title = "Монголын волейболын залуучуудын холбоо - Mongolian volleyball youth association";
Route::get('/', [IndexController::class, 'index'])->name($title);
Route::get('/news/list', [IndexController::class, 'newslist'])->name($title);
Route::get('/news/category/{id}/{category}', [IndexController::class, 'categorylist'])->name($title);
Route::get('/news/search', [IndexController::class, 'search'])->name($title);
Route::get('/news/{id}/{slug}', [IndexController::class, 'singlenews'])->name($title);
Route::post('/news/{id}/{slug}', [IndexController::class, 'comment'])->name($title);
Route::get('/showCompetition/{id}',[IndexController::class,'showCompetition'])->name($title);

Route::get('/showAllteams',[IndexController::class,'showAllteams'])->name($title);
Route::get('/showTeam/{id}',[IndexController::class,'showTeam'])->name($title);

Route::get('allplayers_show',[IndexController::class,'AllPlayers'])->name($title);
Route::get('show_player/{id}',[IndexController::class,'ShowPlayers'])->name($title);
