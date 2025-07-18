<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\BollywoodController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\DashboardController;


Route::get('/',[MovieController::class,'index'])->name('homepage');




Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/store', [MovieController::class, 'store'])->name('movies.store');
Route::get('/showmovies', [MovieController::class, 'showmovies'])->name('showmovies');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/movies/store', [MovieController::class, 'store'])->name('movies.store');
Route::get('/movies/edit/{id}', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('/movies/update/{id}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/delete/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

Route::get('/movies/{category}', [MovieController::class, 'categoryWise'])->name('movies.category');


Route::post('/store1', [CategoryController::class, 'storeCategory'])->name('categories.store1');



Route::get('/bollywood',[BollywoodController::class,'bollywood'])->name('bollywoodpage');
Route::get('/hollywood',[BollywoodController::class,'hollywood'])->name('hollywoodpage');
Route::get('/webseries',[BollywoodController::class,'webseries'])->name('webseriespage');
Route::get('/koreandrama',[BollywoodController::class,'koreandrama'])->name('koreandramapage');
Route::get('/anime',[BollywoodController::class,'anime'])->name('anime');
Route::get('/admin', [AdminController::class, 'admin']);


//mor moviesdetails
Route::get('/film/{id}', [FilmController::class, 'show'])->name('movie.show');

Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('Dashboard.page');
Route::get('/reports',[AdminController::class,'reports'])->name('reports.page');


//setting
Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
Route::post('/settings/update-profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
Route::post('/settings/change-password', [AdminController::class, 'changePassword'])->name('admin.changePassword');
Route::post('/settings/update-website', [AdminController::class, 'updateWebsiteSettings'])->name('admin.updateWebsiteSettings');
