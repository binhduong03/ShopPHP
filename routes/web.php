<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;

//FRONTEND
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);


//BACKEND


Route::get('/admin', [AdminController::class, 'index']);
Route::get('/login-admin', [AdminController::class, 'admin']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'admin_dashboard']);


// Post
Route::get('/all-post', [PostController::class, 'all_post']);
Route::get('/add-post', [PostController::class, 'add_post']);