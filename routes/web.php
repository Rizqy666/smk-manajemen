<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\ProfileController;

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
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    // Rute untuk pengisian profil
    Route::get('/lengkapi-profil', [ProfileController::class, 'showCompleteProfileForm'])->name('profile.complete');
    Route::post('/lengkapi-profil', [ProfileController::class, 'completeProfile'])->name('profile.complete.store');
    // route complete
    Route::middleware('profile.complete')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::post('/send-verification', [ProfileController::class, 'sendVerification'])->name('profile.send.verification');

        Route::post('/verify', [ProfileController::class, 'verifyCode'])->name('profile.verify');

        // route admin
        Route::middleware('role:admin')->group(function () {
            Route::resource('user', UserController::class);
            Route::resource('jurusan', JurusanController::class);
            Route::resource('mapel', MataPelajaranController::class)->parameters([
                'mapel' => 'mataPelajaran',
            ]);
            Route::resource('kelas', KelasController::class)->parameters([
                'kelas' => 'kelas',
            ]);
        });
    });
});
