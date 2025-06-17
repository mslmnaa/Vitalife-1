<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChatApiController;

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

// Chat API routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/chat/unread-count', [ChatApiController::class, 'getUnreadCount']);
    Route::post('/chat/send-message', [ChatApiController::class, 'sendMessage']);
});

// Test route that doesn't require authentication
Route::get('/test', function () {
    return response()->json(['status' => 'API is working!']);
});
