<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactsController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('article', [ArticleController::class, 'index']);
Route::get('article/{id}', [ArticleController::class, 'show']);

Route::post('contact', [ContactsController::class, 'store']);
Route::get('contact', [ContactsController::class, 'index']);
Route::get('contact/{id}', [ContactsController::class, 'show']);


