<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\AuthController;

Route::prefix('v1')->group(function(){
  Route::get('/users', [UserController::class, 'index']);
  Route::get('/users/{user}', [UserController::class, 'show']);    
  Route::apiResource('invoices', InvoiceController::class);
  Route::post('/login',[AuthController::class, 'login']);
//  Route::get('/invoices', [InvoiceController::class, 'index']);
//  Route::get('/invoices/{invoice}', [InvoiceController::class, 'show']); 
//  Route::post('/invoices', [InvoiceController::class, 'store']);
//  Route::put('/invoices/{invoice}', [InvoiceController::class, 'update']);
//  Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy']);
});
  
