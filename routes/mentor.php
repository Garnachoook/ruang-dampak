<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'role:mentor'])->prefix('mentor')->name('mentor.')->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Mentor\DashboardController@index')->name('dashboard');
    
    // Batches
    Route::get('/batch', 'App\Http\Controllers\Mentor\BatchController@index')->name('batch.index');
    Route::get('/batch/{batchId}', 'App\Http\Controllers\Mentor\BatchController@show')->name('batch.show');
    
    // Assignments
    Route::get('/batch/{batchId}/tugas', 'App\Http\Controllers\Mentor\AssignmentController@index')->name('tugas.index');
    Route::get('/batch/{batchId}/tugas/{assignmentId}', 'App\Http\Controllers\Mentor\AssignmentController@show')->name('tugas.show');
    Route::post('/batch/{batchId}/tugas/{assignmentId}/submission/{submissionId}/review', 'App\Http\Controllers\Mentor\AssignmentController@review')->name('tugas.review');
    
    // Profil
    Route::get('/profil', 'App\Http\Controllers\Mentor\ProfilController@index')->name('profil.index');
    Route::put('/profil', 'App\Http\Controllers\Mentor\ProfilController@update')->name('profil.update');
});
