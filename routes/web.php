<?php

use Illuminate\Support\Facades\Route;

// Import Publik Controllers
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\LearningPathController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\TentangKamiController;

// Import Dashboard Controllers
use App\Http\Controllers\Peserta\DashboardController as PesertaDashboard;
use App\Http\Controllers\Mentor\DashboardController as MentorDashboard;
use App\Http\Controllers\Mitra\DashboardController as MitraDashboard;

// Import Helper
use App\Helpers\DummyData;

/*
|--------------------------------------------------------------------------
| Publik Routes (Bisa diakses tanpa login)
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index'])->name('welcome');

// Program
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program/{slug}', [ProgramController::class, 'show'])->name('program.show');

// Learning Path
Route::get('/learning-path', [LearningPathController::class, 'index'])->name('learning-path.index');
Route::get('/learning-path/{slug}', [LearningPathController::class, 'show'])->name('learning-path.show');

// Career / Lowongan
Route::get('/career', [CareerController::class, 'index'])->name('career.index');
Route::get('/career/{id}', [CareerController::class, 'show'])->name('career.show');

// Halaman Statis
Route::get('/komunitas', [KomunitasController::class, 'index'])->name('komunitas.index');
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami.index');

/*
|--------------------------------------------------------------------------
| Auth Routes (Bawaan Laravel Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Protected Routes (Hanya bisa diakses setelah login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // 1. Dashboard Routes (Mengarah ke Controller masing-masing)
    Route::get('/peserta/dashboard', [PesertaDashboard::class, 'index'])->name('peserta.dashboard');
    Route::get('/mentor/dashboard', [MentorDashboard::class, 'index'])->name('mentor.dashboard');
    Route::get('/mitra/dashboard', [MitraDashboard::class, 'index'])->name('mitra.dashboard');

    // 2. Halaman Belajar Peserta (Sementara menggunakan closure + dummy data)
    Route::get('/peserta/belajar/show', function () {
        return view('peserta.belajar.show', [
            'batch_name' => 'UI/UX Design — Batch 5',
            'program_name' => 'UI/UX Design Bootcamp',
            'modules' => DummyData::modules(),
            'sessions' => DummyData::liveSessions(),
            'assignments' => DummyData::assignments(),
            'active_module' => DummyData::modules()[3], // Membuat User Persona
            'progress' => 37,
        ]);
    })->name('peserta.belajar.show');

});