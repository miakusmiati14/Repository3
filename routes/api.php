<?php

use App\Http\Controllers\API\RepositoryController;
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

Route::get('/repository', [RepositoryController::class, 'index']);
Route::post('/repository/store', [RepositoryController::class, 'store']);
Route::post('/repository/update', [RepositoryController::class, 'update']);
Route::get('/repository/{id}/destroy', [RepositoryController::class, 'destroy']);
Route::get('/repository/{id}/show', [RepositoryController::class, 'show']);