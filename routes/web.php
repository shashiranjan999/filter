<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilterController;

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

Route::get('/', [FilterController::class,'index']);
Route::post('/search', [FilterController::class,'search']);
Route::post('/load', [FilterController::class,'loadmore']);
Route::post('/filter', [FilterController::class,'comdata']);
