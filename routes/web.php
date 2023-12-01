<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [HomeController::class,'index']);
Route::get('/redirects', [HomeController::class,'redirect']);

Route::get('/show_users', [AdminController::class,'show_user']);
Route::get('/delete_users/{id}', [AdminController::class,'delete_user']);
Route::get('/foodmenu', [AdminController::class,'formmenu']);
Route::post('/addfood', [AdminController::class,'addfoods']);
Route::get('/show_foods', [AdminController::class,'showfoods']);
Route::get('/delete_food/{id}', [AdminController::class,'deletefood']);
Route::get('/edit_food/{id}', [AdminController::class,'editfood']);
Route::post('/update_food/{id}', [AdminController::class,'updatefood']);
Route::get('/chef_form', [AdminController::class,'chefform']);
Route::post('/addchef', [AdminController::class,'addchef']);
Route::get('/show_chefs', [AdminController::class,'showchefs']);
Route::get('/showreservation', [AdminController::class,'showreservation']);
Route::get('/delete_chefs/{id}', [AdminController::class,'deletechef']);
Route::get('/edit_chefs/{id}', [AdminController::class,'editchef']);
Route::post('/update_chef/{id}', [AdminController::class,'updatechef']);
Route::post('/add_cart/{id}', [HomeController::class,'addcart']);
Route::get('/show_cart/{id}', [HomeController::class,'showcart']);
Route::get('/delete_cart/{id}', [HomeController::class,'deletecart']);
Route::post('/confirm_order', [AdminController::class,'confirm_order']);
Route::get('/show_orders', [AdminController::class,'showorders']);
Route::get('/search', [AdminController::class,'search']);
Route::get('/search_reservation', [AdminController::class,'search_R']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
