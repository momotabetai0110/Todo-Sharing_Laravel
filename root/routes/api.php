<?php

use App\Http\Controllers\Api\TodoContentController;
use App\Http\Controllers\Api\TodoListController;
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
// サンプルAPIエンドポイント
Route::get('hello', function () {
    return response()->json([
        'message' => 'Hello, API!'
    ]);
});
// TODOリストのルート
Route::post('todo-lists', [TodoListController::class, 'store']);

// TODOコンテンツのルート
Route::get('todo-contents', [TodoContentController::class, 'index']);
Route::post('todo-contents', [TodoContentController::class, 'store']);
Route::delete('todo-contents', [TodoContentController::class, 'destroy']);