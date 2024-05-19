<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Middleware\CorsMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => [CorsMiddleware::class, 'api']], function () {

    //Add Register Method And Modify Login Logic
    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', [AuthController::class, 'register'])->name('api.register');
        Route::post('login', [AuthController::class, 'login'])->name('api.login');
    });

    Route::group(['middleware' => 'auth:api'], function () {
//        Route::group(['prefix' => 'auth'], function () {
//            Route::post('refresh', [AuthController::class, 'refresh']);
//            Route::post('logout', [AuthController::class, 'logout']);
//        });

        Route::get('profile', [AuthController::class, 'profile']);

        Route::controller(PostController::class)->name('post.')->prefix('post')->group(function (){
            Route::post('/create', 'store')->name('store');
            Route::get('/getPosts', 'getPosts')->name('getPosts');
        });


    });

});

