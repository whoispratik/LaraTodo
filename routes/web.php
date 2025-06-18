<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn() => Inertia::render('Index'))->name('home');

Route::resource('todos', TodoController::class)->middleware(['auth']);

Route::patch('todos/{todo}/mark', [TodoController::class, 'mark'])->name('todos.mark')->middleware(['auth']);
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
