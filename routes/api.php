<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::middleware('auth:sanctum')->prefix('/admin')->group(function () {
    Route::get('/products', [ProductController::class, 'getProducts']);
    Route::post('/products', [ProductController::class, 'insertProduct']);
    Route::get('/categories', [CategoryController::class, 'getCategories']);
    Route::post('/categories', [CategoryController::class, 'insertCategory']);
    Route::get('/transactions', [TransactionController::class, 'getTransactions']);
    Route::get('/transaction-detail/{id}', [TransactionController::class, 'getTransactionDetail']);
    Route::post('/transactions', [TransactionController::class, 'insertTransaction']);
    Route::get('/transaction-amount',[DashboardController::class,'getTotalTransaction']);
});

Route::prefix('/auth')->group(function () {
    Route::post('/login',[AuthController::class,'login']);
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/forgot',[AuthController::class,'forgotPassword']);
});


Route::middleware(['auth:sanctum'])->prefix('/user')->group(function () {
    Route::get('/transactions', [UserController::class,'transactions']);
});
