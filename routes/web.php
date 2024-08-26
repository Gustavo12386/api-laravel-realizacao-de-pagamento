<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Auth;

Route::prefix('v1')->group(function(){
    Route::get('/users', [UserController::class, 'index']);          
    Route::post('/login',[AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function(){
      Route::get('/teste',[TesteController::class, 'index'])->middleware('ability:teste-index');
      Route::get('/users/{user}',[UserController::class, 'show'])->middleware('ability:user-get');
      Route::get('/logout',[AuthController::class, 'logout']);
    });
    Route::apiResource('invoices', InvoiceController::class); 
  //  Route::get('/invoices', [InvoiceController::class, 'index']);
  //  Route::get('/invoices/{invoice}', [InvoiceController::class, 'show']); 
  //  Route::post('/invoices', [InvoiceController::class, 'store']);
  //  Route::put('/invoices/{invoice}', [InvoiceController::class, 'update']);
  //  Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy']);
});
    

//Route::get('/', function () {
//    return view('welcome');
//});






