<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'role:peserta'])->prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Peserta\DashboardController@index')->name('dashboard');
    
    Route::get('/program-saya', 'App\Http\Controllers\Peserta\EnrollmentController@index')->name('program-saya.index');
    Route::get('/program-saya/{batchId}', 'App\Http\Controllers\Peserta\LearningController@index')->name('program-saya.show');
    
    // Module & Learning
    Route::get('/program-saya/{batchId}/modul/{moduleId}', 'App\Http\Controllers\Peserta\LearningController@module')->name('program-saya.module');
    
    // Assignments
    Route::get('/program-saya/{batchId}/tugas', 'App\Http\Controllers\Peserta\AssignmentController@index')->name('program-saya.tugas.index');
    Route::post('/program-saya/{batchId}/tugas/{assignmentId}/submit', 'App\Http\Controllers\Peserta\AssignmentController@submit')->name('program-saya.tugas.submit');
    
    // Quizzes
    Route::get('/program-saya/{batchId}/quiz/{quizId}', 'App\Http\Controllers\Peserta\QuizController@show')->name('program-saya.quiz.show');
    Route::post('/program-saya/{batchId}/quiz/{quizId}/submit', 'App\Http\Controllers\Peserta\QuizController@submit')->name('program-saya.quiz.submit');
    
    // Other Menu
    Route::get('/kalender', 'App\Http\Controllers\Peserta\KalenderController@index')->name('kalender');
    Route::get('/leaderboard', 'App\Http\Controllers\Peserta\LeaderboardController@index')->name('leaderboard');
    Route::get('/portofolio', 'App\Http\Controllers\Peserta\PortfolioController@index')->name('portofolio');
    Route::get('/sertifikat', 'App\Http\Controllers\Peserta\SertifikatController@index')->name('sertifikat');
    
    // Profil
    Route::get('/profil', 'App\Http\Controllers\Peserta\ProfilController@index')->name('profil.index');
    Route::put('/profil', 'App\Http\Controllers\Peserta\ProfilController@update')->name('profil.update');
});
