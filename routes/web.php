<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemoController;
use App\Livewire\Counter;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/counter', Counter::class)
    ->name('counter');

// Route::get('/counter', Counter::class)
//     ->name('counter');

// Route::get('/', function () {
//     return view('livewire.counter')->layout('layout');
// });


// Route::get('/', function() {
//     if (Auth::check()) {
//         return redirect()->action([MemoController::class, 'index']);
//     } else {
//         return redirect()->action([AuthController::class, 'showLoginForm']);
//     }
// });

// Route::middleware(['guest'])->group(function () {
//     Route::get('/login', [AuthController::class, 'showLoginForm'])
//         ->name('auth.showLoginForm');
//     Route::post('/login', [AuthController::class, 'login'])
//         ->name('auth.login');
//     Route::get('/register', [AuthController::class, 'showRegistrationForm'])
//         ->name('auth.showRegistrationForm');
//     Route::post('/register', [AuthController::class, 'register'])
//         ->name('auth.register');
// });

// Route::post('/logout', [AuthController::class, 'logout'])
//     ->name('auth.logout');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/index', [MemoController::class, 'index'])
//         ->name('memos.index');
//     Route::post('/memo', [MemoController::class, 'store'])
//         ->name('memos.store');
//     Route::get('/memo/{memo}/edit', [MemoController::class, 'edit'])
//         ->name('memos.edit');
//     Route::put('/memo/{memo}', [MemoController::class, 'update'])
//         ->name('memos.update');
//     Route::delete('/memo/{memo}', [MemoController::class, 'destroy'])
//         ->name('memos.destroy');
// });


