<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesManagerApiController;
use App\Http\Controllers\AuthController;

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
Route::middleware(['auth:sanctum'])->group(function () {
  // Route::resource('salesmanagers', 'SalesManagerApiController');
  Route::get('/salesmanagers/{id?}',[SalesManagerApiController::class,'index']);
  Route::post('/salesmanagers',[SalesManagerApiController::class,'store']);
  Route::put('/salesmanagers/{id}',[SalesManagerApiController::class,'update']);
  Route::delete('/salesmanagers/{id}',[SalesManagerApiController::class,'destroy']);
});

Route::post('/login',[AuthController::class,'login']);
