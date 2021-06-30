<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [NewsController::class, 'index']);
Route::get('/dashboard/news', [Newscontroller::class, 'list']);
Route::get('/dashboard/news/create', [NewsController::class, 'createView']);
Route::post('/dashboard/news/create', [NewsController::class, 'create']);
Route::get('/dashboard/news/edit/{id}', [NewsController::class, 'editView']);
Route::post('/dashboard/news/edit/{id}', [NewsController::class, 'edit']);
Route::post('/dsahboard/news/delete/{id}', [NewsController::class, 'delete']);