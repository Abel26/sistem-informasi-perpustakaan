<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookExportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserExportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/users', [DashboardController::class, 'users'])->name('dashboard.users');
    Route::get('/dashboard/books', [DashboardController::class, 'books'])->name('dashboard.books');
    Route::get('/export-user', [UserExportController::class, 'export'])->name('export-user');
    Route::get('/export-book', [BookExportController::class, 'export'])->name('export-book');

    // Route hak akses admin
    Route::prefix('books')->name('books.')->group(function (){
        Route::middleware('can:manage book data')->group(function (){
            Route::get('/', [BookController::class, 'index'])->name('index');
            Route::get('/create', [BookController::class, 'create'])->name('create');
            Route::post('/create', [BookController::class, 'store'])->name('store');
            Route::get('/{books:id}/edit', [BookController::class, 'edit'])->name('edit');
            Route::put('/{books:id}/update', [BookController::class, 'update'])->name('update');
            Route::delete('/{books:id}/delete', [BookController::class, 'destroy'])->name('destroy');
            // Route::get('/{books:id}/read', [BookController::class, 'read'])->name('read');
            // Route::get('/{books:id}/download', [BookController::class, 'download'])->name('download');
        });

    });

    //  Route hak akses siswa
    Route::prefix('siswa')->name('siswa.')->group(function (){
        Route::middleware('can:manage reading page')->group(function (){
            // Route::get('/{book:id}', [SiswaController::class, 'index'])->name('index');
            Route::get('/', [SiswaController::class, 'index'])->name('index');
            Route::get('/history/{id}', [DashboardController::class, 'showHistory'])->name('history');
            Route::get('/{books:id}/read', [BookController::class, 'read'])->name('read');
            Route::get('/{books:id}/download', [BookController::class, 'download'])->name('download');
        });
    });

});

require __DIR__.'/auth.php';
