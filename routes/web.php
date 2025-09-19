<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class,'show'])->name('register');
    Route::post('register', [RegisterController::class,'register']);

    Route::get('login', [LoginController::class,'show'])->name('login');
    Route::post('login', [LoginController::class,'login']);
});

// logout
Route::post('logout', [LoginController::class,'logout'])->middleware('auth')->name('logout');

// protected dashboard
Route::get('/dashboard', function() {
    return view('dashboard'); // create resources/views/dashboard.blade.php
})->middleware('auth')->name('dashboard');

// sample role-protected route (only accessible to super-admin role)
Route::get('/admin', function() {
    return 'Admin area';
})->middleware(['auth','role:super-admin'])->name('admin.home');
