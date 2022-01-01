<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SavingsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/create_students', [SavingsController::class, 'store']);
Route::get('/all_students', [SavingsController::class, 'index']);
Route::put('/update_students/{id}', [SavingsController::class, 'update']);
Route::delete('/delete_students/{id}', [SavingsController::class, 'delete']);
