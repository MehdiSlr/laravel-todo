<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class ,'index'])->name('todo.index');

Route::resource('todos', TodoController::class);

// Categiry Routes
/* | */Route::resource('categories', CategoryController::class); /* | */
//     --------------------------------------------------------
//
//                          |   |   |   |   |   |
//                          V   V   V   V   V   V
//
// ----------------------------------------------------------------------------------------------------------------------
// |     Route::get('/categories', [CategoryController::class ,'index'])->name('categories.index');                     |
// |     Route::get('/categories/create', [CategoryController::class ,'create'])->name('categories.create');            |
// |     Route::post('/categories', [CategoryController::class ,'store'])->name('categories.store');                    |
// |     Route::get('/categories/{category}/edit', [CategoryController::class ,'edit'])->name('categories.edit');       |
// |     Route::patch('/categories/{category}', [CategoryController::class ,'update'])->name('categories.update');      |
// |     Route::delete('/categories/{category}', [CategoryController::class ,'destroy'])->name('categories.destroy');   |
// ----------------------------------------------------------------------------------------------------------------------

