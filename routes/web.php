<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuizController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('top', [CategoryController::class, 'top'])->name('top');

    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::get('{categoryId}', [CategoryController::class, 'show'])->name('show');
        Route::get('{categoryId}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::post('{categoryId}/update', [CategoryController::class, 'update'])->name('update');
        Route::post('{categoryId}/destroy', [CategoryController::class, 'destroy'])->name('destroy');

        Route::prefix('{categoryId}/quizzes')->name('quizzes.')->group(function () {
            Route::get('create', [QuizController::class, 'create'])->name('create');
            Route::post('store', [QuizController::class, 'store'])->name('store');
            Route::get('{quizId}/edit', [QuizController::class, 'edit'])->name('edit');
            Route::post('{quizId}/update', [QuizController::class, 'update'])->name('update');
            Route::post('{quizId}/destroy', [QuizController::class, 'destroy'])->name('destroy');
        });
    });
});
