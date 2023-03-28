<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerfumeController;
use App\Http\Middleware\AdminMiddleware;

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get("/perfumes", [PerfumeController::class, "index"])->name('perfumes.index');
    Route::get("/perfumes/create", [PerfumeController::class, "create"])->name('perfumes.create');
    Route::get("/perfumes/{slug}", [PerfumeController::class, "show"])->name('perfumes.show');
    Route::get('/perfumes/{slug}/edit', [PerfumeController::class, 'edit'])->name('perfumes.edit');
    Route::put('/perfumes/{slug}', [PerfumeController::class, 'update'])->name('perfumes.update');
    Route::delete('/perfumes/{slug}', [PerfumeController::class, 'destroy'])->name('perfumes.destroy');
    Route::post("/perfumes", [PerfumeController::class, "store"])->name('perfumes.store');
});

require __DIR__.'/auth.php';
