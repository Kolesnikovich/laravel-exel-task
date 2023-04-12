<?php

use App\Http\Controllers\RowsController;
use App\Http\Middleware\BasicAuth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/rows')->group(function () {
    Route::get('/', [RowsController::class, 'get'])->middleware(BasicAuth::class);
    Route::post('/parse', [RowsController::class, 'parse'])->name('rows.parse')->middleware(BasicAuth::class);
});


