<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthenticationController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::apiResource('lectures', LectureController::class);
    Route::apiResource('student', StudentController::class);
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});