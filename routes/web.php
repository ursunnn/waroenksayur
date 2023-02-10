<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('about_us');
Route::get('/products', [PageController::class, 'getMusic'])->name('music_list');
Route::get('/details/{id}', [PageController::class, 'details']);
Route::get('/products/search', [PageController::class, 'search'])->name('search_music');
// Route::post('/products/search', [PageController::class, 'search'])->name('search_music');


Route::get('/user/cart', [PageController::class,'cart'])->name('index_cart')->middleware('memberMiddleware');
Route::get('/user/checkout', [PageController::class,'index_checkout'])->name('index_checkout')->middleware('memberMiddleware');
Route::get('/user/transaction', [PageController::class,'transaction_history'])->name('index_transaction')->middleware('memberMiddleware');


Route::get('/admin/create', [AdminController::class, 'create'])->name('create')->middleware('AdminMiddleware');
Route::post('/admin/add', [AdminController::class, 'add_music'])->name('add_music');
Route::get('admin/edit/{id}', [AdminController::class, 'showDetail'])->middleware('AdminMiddleware');
Route::post('/admin/edit/{id}', [AdminController::class, 'edit']);
Route::get('admin/category', [AdminController::class, 'create_category'])->name('create_category')->middleware('AdminMiddleware');
Route::post('/admin/addCategory', [AdminController::class, 'add_category'])->name('add_category');
Route::post('/admin/delete/{id}', [AdminController::class, 'delete']);



Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('AuthenticatedMiddleware');
Route::get('/profile/update', [UserController::class, 'update'])->name('index_update')->middleware('AuthenticatedMiddleware');
Route::post('/profile/update', [UserController::class, 'edit'])->name('update');
Route::post('/cart/add/{id}',[UserController::class, 'addToCart']);
Route::post('/cart/update/{id}',[UserController::class, 'updateCart']);
Route::post('/cart/delete/{id}',[UserController::class, 'deleteItem']);
Route::post('/cart/checkout/{id}',[UserController::class, 'checkout']);


Route::get('/login', [UserController::class, 'index_login'])->name('index_login')->middleware('guestMiddleware');
Route::post('/auth/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'index_register'])->name('index_register')->middleware('guestMiddleware');
Route::post('/auth/register', [UserController::class, 'register'])->name('register');
Route::post('/auth/logout', [UserController::class, 'logout'])->name('logout');
