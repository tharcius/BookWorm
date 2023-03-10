<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware(['auth:sanctum'])
//    ->get(
//        '/user',
//        function (Request $request) {
//            return $request->user();
//        }
//    );

Route::post(
    '/login',
    [AuthController::class, 'login']
);

Route::middleware(['auth:sanctum'])
    ->get(
        '/logout',
        [AuthController::class, 'logout']
    );

Route::middleware(['auth:sanctum'])
    ->prefix('/users')->group(function () {
        require __DIR__.'/users.php';
    });

Route::middleware(['auth:sanctum'])
    ->prefix('/authors')->group(function () {
        require __DIR__.'/authors.php';
    });
