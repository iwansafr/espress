<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentCategoryController;
use App\Models\ContentCategory;
use Illuminate\Support\Facades\Route;

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

Route::get('/login',[AuthController::class, 'login'])->name('login');

Route::post('/login',[AuthController::class, 'check_login']);
Route::prefix('/dashboard')->middleware('auth')->group(function(){
    Route::get('/',function(){
        return view('dashboard.index');
    });

    Route::prefix('/content')->middleware('auth')->group(function(){
        Route::get('category', function(){
            return view('dashboard.content.category');
        });
        Route::post('category', [ContentCategoryController::class, 'save']);
    });
});
