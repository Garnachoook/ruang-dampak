<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'role:mitra'])->prefix('mitra')->name('mitra.')->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Mitra\DashboardController@index')->name('dashboard');
    
    // Job Listings
    Route::get('/lowongan', 'App\Http\Controllers\Mitra\JobListingController@index')->name('lowongan.index');
    Route::post('/lowongan', 'App\Http\Controllers\Mitra\JobListingController@store')->name('lowongan.store');
    Route::get('/lowongan/{id}/edit', 'App\Http\Controllers\Mitra\JobListingController@edit')->name('lowongan.edit');
    Route::put('/lowongan/{id}', 'App\Http\Controllers\Mitra\JobListingController@update')->name('lowongan.update');
    Route::delete('/lowongan/{id}', 'App\Http\Controllers\Mitra\JobListingController@destroy')->name('lowongan.destroy');
    
    // Profil
    Route::get('/profil', 'App\Http\Controllers\Mitra\ProfilController@index')->name('profil.index');
    Route::put('/profil', 'App\Http\Controllers\Mitra\ProfilController@update')->name('profil.update');
});
