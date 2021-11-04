<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CategoryController::class, 'mainCategories'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('category/{category}', [CategoryController::class, 'getCategoryById'])->name('category.show');
Route::post('category', [CategoryController::class, 'createCategory'])->name('category.store');
Route::put('category/{category}', [CategoryController::class, 'updateCategory'])->name('category.update');
Route::delete('category/{category}', [CategoryController::class, 'destroy'])->name('category.delete');
