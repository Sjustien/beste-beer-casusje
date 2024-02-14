<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BierController;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [BierController::class, 'index'])->name('bier.index');
Route::get('/bier/{bier}', [BierController::class, 'show'])->name('bier.show');
Route::put('/bier/{bier}', [BierController::class, 'update'])->name('bier.update');
Route::get('/bier/search', [BierController::class, 'search'])->name('bier.search');

Route::post('/comments/{bier}', [CommentController::class, 'store'])->name('comments.store');

require __DIR__ . '/auth.php';
