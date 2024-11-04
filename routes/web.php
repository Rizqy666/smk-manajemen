<?php

use App\Http\Controllers\JadwalPelajaranController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TahunAjaranController;

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
            Route::resource('tahunAjaran', TahunAjaranController::class);
            Route::resource('jadwalPelajaran', JadwalPelajaranController::class);
            Route::get('jadwalPelajaran-all', [JadwalPelajaranController::class, 'showAllJadwal'])->name('jadwalPelajaran.showAll');
            Route::get('/get-guru-pengajar/{mataPelajaranId}', [JadwalPelajaranController::class, 'getGuruPengajar']);
            Route::get('siswa', [UserController::class, 'siswaIndex'])->name('siswa.index');
        });
        Route::middleware('role:siswa')->group(function () {
            Route::resource('pendaftaran', PendaftaranController::class);
            Route::get('/pendaftaran-data', [PendaftaranController::class, 'data'])->name('pendaftaran.data');
        });
    });
});
