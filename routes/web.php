<?php

use App\Classes\Form;
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
    return view('home.index');
});


Route::get('/login',function(){
    return view('auth.login');
})->middleware('guest')->name('login');

Route::prefix('/dashboard')->middleware('auth')->group(function(){
    Route::get('/',function(){
        return view('dashboard.index');
    });

    Route::prefix('/content')->middleware('auth')->group(function(){
        Route::get('category', function(){
            return view('dashboard.content.category');
        });
        // Route::post('category', [ContentCategoryController::class, 'save']);
    });

    Route::prefix('/user')->middleware('auth')->group(function(){
        Route::get('role', function(){
            $form = new Form();
            return $form->liveview('user.role');
        });
    });
});

Route::get('/home',function(){
    return view('home.index');
});
