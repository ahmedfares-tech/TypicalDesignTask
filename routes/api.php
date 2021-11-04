<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
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

Route::get('category', [CategoryController::class, 'mainCategories']);
Route::get('category/{category}', [CategoryController::class, 'getCategoryById']);
Route::post('category', [CategoryController::class, 'createCategory']);
Route::put('category/{category}', [CategoryController::class, 'updateCategory']);
Route::delete('category/{category}', [CategoryController::class, 'destroy']);
